# CRM Lead Intake — Fix Handoff

**Date:** July 4, 2026
**For:** Railway / CRM manager
**From:** Matthew (Rooval Roofing)
**Priority:** Medium — main lead funnel is working; one backup path may be silently dropping leads.

---

## TL;DR (the 4 things to know)

1. **`LEAD_INGEST_KEY` is now SET and ENFORCED** on the CRM's public lead endpoint. Verified live on July 4: a keyless POST **and** a POST using the old `YOUR_LEAD_INGEST_KEY` placeholder both return **HTTP 401 Unauthorized**.
2. **The main lead funnel still works.** The instant-quote roof tool and the embedded contact form submit from the browser on `rooval-roofing.com`, and the deployed endpoint authorizes those **by site origin, no key needed**. No action required there.
3. **Server-to-server forwarders that still contain the placeholder key are being rejected.** The WordPress lead forwarder (`rooval_send_lead`) is the one to check — if it still has `YOUR_LEAD_INGEST_KEY`, any lead routed through it has been silently 401-dropped since the key was turned on.
4. **The Gmail Apps Script lead catcher is retired.** Its `syncLeadsToCRM` function had been removed but a 1-minute trigger was left behind, failing every minute (1,441 failure emails since July 3, 6:11 PM MDT). The orphaned trigger was **deleted July 4** at script.google.com. We chose **not** to rebuild it — it was a redundant backup path.

---

## Evidence (what was verified, and how)

| Check | Result |
|---|---|
| `POST https://rooval-crm-production.up.railway.app/api/v1/leads` — no key, no browser Origin | **401** `{"error":"Unauthorized"}` |
| Same POST with `?key=YOUR_LEAD_INGEST_KEY` (the literal placeholder) | **401** |
| Deployed code (repo `rooval-crm`, `origin/main` @ `e7d15a7`, `src/app/api/v1/leads/route.ts`) | `authorized()` allows: (a) exact `?key=` match, (b) any browser caller whose Origin/Referer matches `*.rooval-roofing.com`. Fail-open **only** when the key env var is unset — it is set now, so this no longer applies. |
| Duplicate risk | None — the endpoint **dedupes by phone** (idempotent; repeat submissions update the existing lead). Fixing a forwarder cannot double-create leads. |
| Apps Script | Project **"Rooval"** (script.google.com) had exactly one trigger: time-based, every minute, function `syncLeadsToCRM`, **100% error rate** ("Script function not found"). Trigger deleted July 4. The script project itself was left in place. |

---

## Action items (in order)

### 1. Confirm whether website-form leads are still arriving (~1 min)
CRM → **Leads**. Look for leads created **since July 3** with source **"Website form"** (`WEBSITE_FORM`).
- **If present** → the WordPress forwarder already has the real key. You're done; skip to item 4.
- **If the only recent leads are "Instant Estimate"** (roof tool) → the WordPress forwarder is still on the placeholder and is being 401-rejected. Continue to item 2.

### 2. Fix the WordPress forwarder key
The live sender function is `rooval_send_lead()`. It is **called** by WPCode snippet **2636 "CRM lead webhook"** (a small Elementor-form hook), but the function itself is **defined somewhere outside the WPCode snippet list** — check, in order:
- the active theme's `functions.php` (Blocksy child theme, if any),
- `wp-content/mu-plugins/`,
- any other code-snippets plugin.

Reference copy of the intended code: `rooval-crm` repo → `docs/wordpress-lead-webhook.php`.

**The fix:** in the live `rooval_send_lead()` definition, replace `YOUR_LEAD_INGEST_KEY` in the webhook URL
`https://rooval-crm-production.up.railway.app/api/v1/leads?key=...`
with the **real** `LEAD_INGEST_KEY` from **Railway → Variables**. Then submit a test form and confirm the lead appears in the CRM.

> The `DEPLOY_HANDOFF.md` in the `rooval-crm` repo (ACTION 2) called for updating **both** integration snippets (WordPress + Gmail) when the key was set. The Gmail one is now moot (retired); the WordPress one is the item to close out.

### 3. (Optional) Roof-tool webhook URL
The roof tool's saved webhook URL (tool → `?admin=1` → "Lead webhook" field) may also contain the placeholder. Browser origin-auth covers it today, so it works either way — but pasting the real key there too makes it robust if the origin rule ever changes.

### 4. Decide: keep or retire the WordPress email/form-catcher path
If every lead-capturing form on the site is now the embedded CRM iframe (`estimate.rooval-roofing.com/quote`) or the roof tool, the `rooval_send_lead` path may be dead weight. Options:
- **Keep + fix key** — harmless safety net (dedupe prevents duplicates), or
- **Retire it** — remove the hook + sender so there's no placeholder-key path left to maintain.

### 5. Reminder — pending Phase 4 deploy (separate, pre-existing)
Branch `phase4-speed-to-lead` in `rooval-crm` (security hardening + instant lead alerts + fail-closed auth) is still **unmerged**; `origin/main` is what's deployed. Per `DEPLOY_HANDOFF.md` it needs `JWT_SECRET` set in Railway before merge (the new build fail-closes without it). `LEAD_INGEST_KEY` appears done — `JWT_SECRET` status unknown from our side.

---

## Security notes

- **Never commit the real `LEAD_INGEST_KEY` to any repo.** The previous key was committed in plaintext (since scrubbed) and must be treated as compromised/rotated — presumably why the new one was set.
- Paste the key directly into the live WordPress code; don't send it through chat/email if avoidable.
- The Gmail Apps Script body remains at script.google.com (project "Rooval") as documentation only — it has no trigger and does nothing. Delete the project entirely if you prefer.

---

## What was already done (no action needed)

- ✅ Deleted the orphaned every-minute `syncLeadsToCRM` trigger (July 4) — the failure-email spam has stopped.
- ✅ Verified the deployed endpoint's auth + dedupe behavior against `origin/main` code and a live probe.
- ✅ Confirmed browser-origin lead paths (roof tool, embedded quote form) are unaffected and working.
