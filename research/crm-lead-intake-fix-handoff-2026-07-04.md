# CRM Lead Intake — Status Report & Handoff

**Date:** July 4, 2026 — **UPDATED July 5, 2026 after full on-site diagnosis**
**For:** Railway / CRM manager
**From:** Matthew (Rooval Roofing)
**Priority:** Low — **no leads are being lost.** Everything urgent is resolved; only optional decisions remain.

---

## TL;DR

1. **No leads are being lost.** Verified July 5 with an on-site runtime diagnostic (details below). All live lead sources — the instant-quote roof tool and the embedded quote/contact form — post to the CRM directly from the browser and are authorized **by site origin, no key needed**. Working.
2. **`LEAD_INGEST_KEY` is set and enforced** on the CRM lead endpoint (verified July 4: keyless POST and placeholder-key POST both return **HTTP 401**). Good — that closes the old fail-open hole.
3. **The WordPress→CRM email/form forwarder turned out to be fully inert — it was never functional.** The sender function `rooval_send_lead()` is **not defined anywhere** on the live site; the only snippet referencing it (WPCode 2636 "CRM lead webhook") is **inactive**; no placeholder key exists anywhere in WPCode; and the only Elementor form left on the site lives in an orphaned 2024 template that can never render (post 123, unregistered post type `elementor-hf`). Nothing to fix — just a decision to make (below).
4. **The Gmail Apps Script lead catcher is retired.** Its function had been removed but a 1-minute trigger was left behind, failing every minute (1,441 failure emails since July 3). The orphaned trigger was **deleted July 4**; the spam has stopped. It had nothing to catch anyway (see #3).

---

## Evidence

| Check (July 4–5) | Result |
|---|---|
| `POST https://rooval-crm-production.up.railway.app/api/v1/leads` — no key, no browser Origin | **401** `{"error":"Unauthorized"}` |
| Same POST with `?key=YOUR_LEAD_INGEST_KEY` (the literal old placeholder) | **401** |
| Deployed endpoint code (`rooval-crm` repo, `origin/main` @ `e7d15a7`) | Allows exact `?key=` match OR any browser caller from `*.rooval-roofing.com` (origin/referer). Dedupes by phone (idempotent). |
| Runtime check: `function_exists('rooval_send_lead')` on the live site | **false** — the sender is not defined anywhere (theme, mu-plugins, or snippets) |
| DB scan: any WPCode snippet defining `rooval_send_lead` or containing `YOUR_LEAD_INGEST_KEY` | **None** |
| WPCode snippet 2636 "CRM lead webhook" (hooks `elementor_pro/forms/new_record`, calls the undefined function, no `function_exists` guard) | **INACTIVE** — never runs |
| Live Elementor forms on the site | **Zero.** The only `_elementor_data` containing a form widget is post 123 — an `elementor-hf` "Footer" template from Sept 2024 whose post type is no longer registered (leftover from the old theme; cannot render) |
| Apps Script (script.google.com, project "Rooval") | Single every-minute trigger for the removed `syncLeadsToCRM` function, 100% error rate → **trigger deleted July 4**. Script body left in place as documentation. |

---

## What this means

- **The main funnel is healthy:** roof tool (`estimate.rooval-roofing.com`) and the embedded quote form submit browser→CRM with origin auth. The key change didn't affect them.
- **The "email catcher" architecture (WordPress `wp_mail` hook + Gmail Apps Script) was never fully installed** — the reference implementations exist only as docs in the `rooval-crm` repo (`docs/wordpress-lead-webhook.php`, `docs/gmail-lead-catcher.gs`). The live remnants (inactive snippet 2636, the orphaned Gmail trigger) were dead weight; the Gmail trigger is now removed.
- **No silent lead loss occurred** — there was no functioning path to break.

---

## Decisions / actions for you (all optional, no urgency)

1. **(Recommended, 2 min)** Sanity-check CRM → Leads: confirm roof-tool / quote-form leads are arriving normally. Everything verified says they are.
2. **Decide the fate of the email-catcher path:**
   - **Leave it retired** (recommended) — it's already inert; the browser paths cover all live forms. Optionally delete inactive snippet 2636 and the Apps Script project "Rooval" as housekeeping.
   - **Or resurrect it as a safety net** — install `docs/wordpress-lead-webhook.php` fresh via WPCode with the **real** `LEAD_INGEST_KEY` from Railway → Variables (never commit the key). Dedupe-by-phone means it can't create duplicates. Only worth it if plain WordPress forms ever come back.
3. **Pending Phase 4 deploy (separate, pre-existing):** branch `phase4-speed-to-lead` in `rooval-crm` (security hardening, instant lead alerts, fail-closed auth) is still unmerged; per `DEPLOY_HANDOFF.md` it needs `JWT_SECRET` set in Railway before merge. `LEAD_INGEST_KEY` appears done — `JWT_SECRET` status unknown from our side.

---

## Security notes

- Never commit the real `LEAD_INGEST_KEY` to any repo (the old key was committed in plaintext, since scrubbed — treat as rotated).
- The diagnostic used on July 5 was a temporary admin-only WPCode snippet (id 2774) that reported only booleans/IDs; it has been **deactivated**. No secrets were read or transmitted.

---

## Already done (no action needed)

- ✅ Deleted the orphaned every-minute `syncLeadsToCRM` trigger (July 4) — failure-email spam stopped.
- ✅ Verified endpoint auth + dedupe behavior against deployed code and live probes (July 4).
- ✅ Full on-site diagnosis (July 5): confirmed zero live Elementor forms, sender function absent, snippet 2636 inactive, no placeholder keys anywhere → **no lead loss**.
- ✅ Diagnostic snippet deactivated; site left in its normal state.
