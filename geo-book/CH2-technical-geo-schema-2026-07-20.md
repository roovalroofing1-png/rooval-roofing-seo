# Chapter 2 — Technical GEO: Making Content AI-Retrievable — for rooval-roofing.com

**Date:** 2026-07-20 · **Book:** M. Jacobs, *GEO Playbook*, Ch. 2 · **Scope:** roofing site.

Chapter 2 has two halves. Chapter 1 already proved the **crawlability** half is essentially solved, so this chapter formalizes that and spends its effort on the **schema** half — which turned out much healthier than the old audit notes implied. **Two minimal, reversible live schema enrichments were made** (DOPL license credential + verified GBP `sameAs`); everything else was confirm-clean.

> Method: raw `curl` only for JSON-LD (never a markdown fetcher); `python3 re` for extraction; `?cb=` for freshness but **final assertions on the no-cache-buster canonical URL** (what Googlebot/AI crawlers/RRT fetch). WPCode edit done via CodeMirror in an hPanel auto-login wp-admin session (no password typed).

---

## 2.1 Crawlability — CONFIRM-CLEAN (from Ch1)

- **Server-rendered:** every page type serves its body copy in the initial HTML (Ch1 §2.1). No JS-rendering visibility problem; Flying Scripts delays only third-party scripts, not page copy.
- **robots.txt:** generic/open. **llms.txt:** live via WPCode 3107. *Book-vs-project conflict #1:* the book advocates llms.txt; this project's adversarial research **refuted** it as a non-lever. It stays deployed as **inert/harmless** — not removed (not a defect), not expanded (not a lever).
- **AI crawler matrix (Ch1, one polite run — not re-probed):** GPTBot/1.1 and meta-externalagent/1.1 → **429** (Hostinger-origin fleet signature block, owner-escalated 07-17, refused, **not fixable site-side**). GPTBot/2.0, OAI-SearchBot, ChatGPT-User, PerplexityBot, ClaudeBot, Google-Extended, Googlebot, Bingbot, browser → **200**. Impact is bounded: GPTBot's *training index* + Meta AI are lost; every **live-answer** fetcher reaches the site.

### Core Web Vitals snapshot
Keyless PageSpeed API was rate-limited today (429 — the anonymous endpoint needs a key). Recording the last measured status rather than chasing a fresh number: **desktop ~94; mobile swings ~47–67; mobile LCP historically ~6s (fails the CWV threshold), driven by third-party JS (server-side GTM + Maps + reviews widget) that WP script-delay plugins can't reach.** **Standing stance (owner-corrected):** CWV pass/fail + local SEO drive roofing leads — the Lighthouse *score* is not a ranking factor and is not chased. The book ties CWV to retrieval, but retrieval here is already proven fine (crawlers get 200, content is in HTML), so mobile LCP is a UX/conversion item, not a GEO-retrieval blocker. Logged, not actioned this chapter.

---

## 2.2 Schema Markup — the real Chapter 2 work

### What the sweep found (vs. the old audit's framing)
The task premise ("two competing entities with no shared @id; reviewCount 17 vs 31") is **stale**. Live state on 2026-07-20:

- **The business entity is ALREADY MERGED.** Both the Rank Math node (`[RoofingContractor, Organization]`) and the hand-written WPCode-2352 node (`RoofingContractor`) carry the **same** `@id = https://rooval-roofing.com/#organization` on every page. Per JSON-LD `@id` semantics, Google treats them as **one** business (the WS5 merge held). Nothing to rebuild.
- **reviewCount = 33, and it MATCHES GBP.** Live GBP shows 5.0 / **33 reviews** today; schema emits `33`. The "17 vs 31" conflict is gone (17 survives only in a stale repo asset file, noted for later cleanup). No change made; no owner gate needed.
- **Author = Matthew Thompson** (the real owner) everywhere; the scrubbed **"Mike Sorensen" persona is absent** from all schema (0 matches). Honesty confirmed.
- **All JSON-LD parses** across page types; 0 parse failures.

### The two enrichments made (live, verified)
Both add to the merged `#organization` node via WPCode snippet **2352** (HTML type). Rollback artifacts committed: `snippets/snippet-2352-sitewide-localbusiness.BEFORE-2026-07-20.txt` and `…AFTER-2026-07-20.txt`.

1. **`hasCredential` — the DOPL license.** Added an `EducationalOccupationalCredential` node naming *"Utah DOPL Contractor License #13861046-5501"*, `recognizedBy` the Utah Division of Professional Licensing — mirroring the real, already-visible footer text (schema mirrors on-page content, per Google's structured-data policy). This makes the license machine-readable, directly serving Ch1 gap **G3** and the E-E-A-T layer.
2. **`sameAs` — the verified GBP.** Appended the roofing Google Business Profile Maps URL (`?cid=17723741517551256012`, **verified against the live GBP panel today** — 5.0, 33 reviews, Lehi) to the existing `sameAs` (Facebook + the deck sister-site). This is the highest-value schema move for the program because **Ch1's #1 finding was entity-recognition failure** (a brand query cited a competitor, not Rooval): linking the site entity to the verified GBP entity, in both directions, is exactly how you become a recognized entity.

### Verification (primary gate = semantic, per plan)
On the canonical no-cache-buster URLs (homepage + a city page): 3 valid JSON-LD blocks, 0 parse failures; the two `#organization` nodes share the one `@id`; and **exactly one node carries the rich business fields** — now `hasCredential=true`, `sameAs`=3, `reviewCount`=33, `telephone`=+13854248810. The change was live immediately on both cached and cache-busted fetches (no stale-cache lag). *Note (per plan):* Google's Rich Results Test may still *count* two LocalBusiness script-blocks because it counts per-block, not per-merged-graph — that is not a failure of the merge; the semantic single-entity result above is the gate.

### Deliberately NOT changed (honesty)
- **`telephone` / `url`:** already correct and consistent (`+13854248810` E.164; `https://rooval-roofing.com` no-slash on both emitters). The task's "normalize to +1-385-…" would have *broken* the phone — **not done**.
- **`reviewCount`:** left at 33 (matches GBP). Never guessed.
- **FAQPage schema:** kept for AI-retrieval structure. *Book-vs-project conflict #2:* "FAQPage = citation amplifier" is refuted (and Google retired FAQ rich results for most sites May 2026). Schema is kept because it's cheap and correct — **not** framed as a citation multiplier. ~9 FAQPage blocks have inconsistent/missing `@id`; logged, not fixed (snippet 2621 is white-screen-risk PHP, touched only for a real drift or compliance violation, of which the sweep found none).

---

## 3. Owner-decision flags (surfaced, not unilaterally changed)

Two items are genuine owner judgment calls, so they're flagged rather than altered:

1. **Hours contradiction (minor).** Schema (via Rank Math Local SEO) emits **Mon–Sun 09:00–17:00**, but the GBP publicly shows **"Open 24 hours."** Two different published hours for one business is a small consistency nit an entity resolver can notice. *Owner: which is right?* — then schema is aligned to it (or the schema field is cleared, letting GBP be the single hours authority). Not decided here because it's a fact about the business only the owner knows.
2. **Borderline insurance phrasing on /roof-replacement-cost-utah/.** The storm FAQ says *"we walk you through the claims process so you know what to file… You file the claim with your insurer, your insurer decides what's covered."* The homeowner-files framing is compliant and strong, but *"walk you through the claims process"* edges toward claims-guidance positioning — the class of phrase scrubbed before under the insurance-messaging rule. Owner-approved wording, so **surfaced for owner review, not rewritten.**

---

## 4. Carry-forward to Chapters 3–4

- **Ch 3 (E-E-A-T):** the DOPL credential is now in schema (G3 half-done at the markup level); still need the *visible extractable license passage* + the *warranty passage* (G4). Author entity = Matthew Thompson, real.
- **Ch 4 (Entity/Authority):** the GBP `sameAs` link is the first concrete step against Ch1's entity-recognition gap; Ch 4 extends it — off-site presence (Reddit/directories are the most-cited domains), consistent NAP across web properties, and monitoring whether the brand-probe citation flips from "cites a competitor" to "cites rooval-roofing.com."
- **Stale-asset cleanup:** `schema-markup.html` in the repo still shows reviewCount 17 — reconcile to 33 in a later housekeeping pass.

## Owner rules honored
No per-unit pricing anywhere. No insurance-claims language added (the one borderline phrase is pre-existing owner copy, flagged not touched). No review count in visible copy; schema count (33) matches GBP and was not invented. Author is the real owner. DOPL license is real and already public. Organic only. Schema is kept because it's correct, never framed as a magic citation lever. Two minimal reversible live changes, both with committed rollback artifacts.
