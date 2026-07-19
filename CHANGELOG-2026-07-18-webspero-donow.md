# 2026-07-18 — WebSpero triage: DO-NOW items implemented (owner pipeline, fable5-plan wf_80e1d2af-30a)

Owner asked to front-run WebSpero's strategy package (email 7/18, docs in research/webspero-2026-07/). Full 7-stage pipeline: 11-agent research/plan/review, orchestrator implement, adversarial panel to follow.

## Shipped this pass
1. **Meta fixes (step 3):** 7 titles rewritten to 50–60 chars (cost page 2950, storm-history 2991, gutters post 2361, choose-contractor 2362, contact 42, about 40, our-services 51) + 9 over-length descriptions rewritten to 140–155 (incl. homepage 1723). Before-state: `meta-backups/2026-07-18.json` (rollback = re-POST those values). All verified live.
2. **Homepage GEO block (step 4) — WPCode snippet 3115** (`snippets/homepage-geo-answer-faq-3115.php`): direct-answer paragraph under the H1 (the_content filter, **priority 15 — must run AFTER Elementor's content filter or the prepend is discarded**; in_the_loop/is_main_query guards removed — they block Elementor's render path) + FAQPage JSON-LD built VERBATIM from the homepage accordion's 5 visible Q&As (wp_head, is_front_page-scoped; snippet 2621 untouched). Verified: block + exactly one FAQPage for anon/Googlebot/OAI-SearchBot UAs; zero interior-page leakage; interior FAQPage schema unchanged.
3. **Insurance-wording fix (bonus, 7/14-reversal compliance):** homepage accordion answer 4 still said "We're roofers, not a claims service, so we don't handle or negotiate the claim itself" → replaced in `_elementor_data` via admin-ajax save_builder (1 replacement, saveOk) with the current stance: inspect + document + "walk you through the claims paperwork... You file the claim with your insurer." Rollback: `elementor-data/homepage-pre-2026-07-18.json`.
4. **4 new GEO posts (steps 5–6):** ids 3116 `/utah-heat-damage-asphalt-shingles/` (per WebSpero's own sample outline incl. its hedges), 3117 `/roof-leak-detection-utah/`, 3118 `/emergency-roof-repair-utah-storm/` (targets the GEO-tracker storm query roof-06 where we had zero presence), 3119 `/utah-roof-maintenance-schedule/`. Each: answer-first intro, 4-Q FAQ + verbatim FAQPage JSON-LD in a `<!-- wp:html -->` wrapper (wpautop-safe, parse-verified live), 5–7 internal links, Rank Math title+desc (titles persisted — verified). Inbound links added to the "Helpful next steps" blocks on 2979/2980/2981/2991.
5. **Sitemap purge:** run-once `\RankMath\Sitemap\Cache::invalidate_storage()` via slot 2774 (flag `rooval_sitemap_purge_20260718`, slot re-deactivated) → post-sitemap 9→18 locs, all 4 new posts present.
6. **Footer copyright year (step 8):** snippet 2881 extended with `rr-copyright-year` JS (© 2025 → current year at runtime, footer-scoped).

## Deferred / not done this pass
- **GBP website UTM tagging (step 10):** BPM edit dialog wouldn't open under automation; spec preserved in the plan (utm_source=google-business-profile&utm_medium=referral&utm_campaign=gbp-listing — NOT medium=organic). Retry next session or owner can paste the URL into GBP → Edit profile → Website.
- **Step 7 (Elementor-page internal-link inserts), step 11 (Lehi additive upgrade — owner-approved-copy gate), step 12 (image filenames/webp):** deferred; step 11 needs owner sign-off on copy by design.
- Blog index page 2682 cards for the 4 new posts (manual-card convention) — quick follow-up.

## Triage record
See `research/webspero-triage-2026-07-18.md` (ALREADY-DONE evidence + full REJECT list) and `docs/NEEDS-OWNER-2026-07-18.md`.

## Rollback map
- Metas: re-POST `meta-backups/2026-07-18.json` values via rankmath updateMetaBulk.
- Homepage block/schema: deactivate WPCode 3115.
- Accordion answer: restore `elementor-data/homepage-pre-2026-07-18.json` via save_builder.
- Posts: unpublish ids 3116–3119. Inbound links: remove the 4 added `<li>`s (mirrors show exact state).
- Footer year: remove the `rr-copyright-year` script block from snippet 2881.
