# 2026-07-23 — FAQ page + insurance-messaging tightening

## New: /faq/ (page 3227) — Western-Timber-Frame-style FAQ hub
Built a categorized, collapsible FAQ page pulling together the questions Utah homeowners actually ask (from the 2026-07-23 homeowner-question audit). **37 Q&As across 6 categories**, each answer leading with a direct sentence (AI-citation format), with a valid **FAQPage JSON-LD block covering all 37** — the GEO/AI-answer-engine signal.
- Categories: 💰 Cost & Financing (7) · ⛈️ Leaks, Hail & Wind Damage (7) · 🌩️ Storm Damage & Documentation (2) · 🤝 Trust, Licensing & Warranty (7) · 🏠 Materials & Options (6) · 🗓️ Process, Timeline & Service Area (8).
- Native `<details>`/`<summary>` accordion (no plugin), scoped inline `<style>`, dark-CTA closing block. Content-only page (not Elementor) so `content.raw` is the source of truth (mirrored here).
- Rank Math: title "Roofing FAQ | Rooval Roofing, Lehi Utah" + meta description set.
- **Nav:** added "FAQ" to the primary menu (item 3229) at order 8 (after Service Areas, before Blog; Blog bumped to 9).

## ⚠️ Insurance messaging TIGHTENED (owner directive, liability-driven)
Owner: stay out of the insurance weeds — insurers can come after us; we are NOT insurance experts. Applied to the FAQ:
- The "Insurance & Claims" category was collapsed to **2 roof-side questions** ("Do you help with storm damage insurance claims?" / "Do you deal with my adjuster?"), renamed **Storm Damage & Documentation**.
- REMOVED entirely: deductible, "will insurance cover it," "free roof," how-to-file. Any coverage/policy/deductible question is deflected to "that's between you and your insurance company; we're roofers, not insurance experts." Documentation is framed as a **service we can help with — never called "free," and we don't file it.**
- Also de-salesified: the word "free" now applies only to the inspection (~3–4 uses total, down from ~20); "no obligation/no strings/no pressure" filler removed. See memory rule insurance-messaging-rule (tightened 2026-07-23).

## Owner still to confirm (3 answers published in SAFE form — nothing unverified live)
1. Response time window · 2. Whether Rooval always pulls the permit · 3. GL + workers' comp coverage and own-crew-vs-subs. Fill these → the three answers get strengthened.

## Open follow-ups (not done — flagged for owner)
- The **existing storm pages** (/hail-damage-repair-utah/, /wind-damage-roof-repair-utah/, /storm-damage-roof-documentation-utah/) still carry the OLDER, heavier insurance FAQ content ("will insurance cover…") that predates this tightening — should be pulled back to match the new rule.
- Rank Math sitemap did not immediately include /faq/ (cache) — purge via `\RankMath\Sitemap\Cache::invalidate_storage()`.
