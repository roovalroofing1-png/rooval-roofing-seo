# 2026-07-21 — Remove the instant quote tool from rooval-roofing.com

Owner directive: "take the instant quote tool off Rooval roofing." Ran through the full owner pipeline (fable5-plan → implement → fable5-adversarial → revise). The adversarial panel caught that the first implementation pass was too narrowly scoped; this changelog reflects the final, panel-verified state.

## What the tool was
- **`/roof-quote/`** — a self-contained satellite-measuring roof-cost calculator served as a **static directory** in `public_html/` (outside WordPress: `index.php` + a server-side admin gate + downloadable `index.html.bak` / `index.html.off-2026-07-16` backup files).
- **`estimate.rooval-roofing.com/quote`** — a separate CRM-side instant-quote app (Railway, manager-controlled). The site linked to it from the header CTA and a contact-page iframe.

## What was done (final state — verified 0 references across all 55 sitemap URLs + llms.txt)
1. **Removed the static tool:** moved `public_html/roof-quote/` **out of the webroot** to `/files/` (home root). The tool + its publicly-downloadable backup files are no longer reachable. (Reversible: move the folder back.)
2. **301 redirect** `^roof-quote(/|$) → /free-roof-inspection-utah/` added to the **top of root `.htaccess`** (rule fires before LiteSpeed serves any cached response — the ONLY thing that beat a stubborn LiteSpeed-cached 301 that Hostinger "Clear cache", `wp_cache_flush()`, and Rank Math edits could not purge). All variants (`/roof-quote/`, `/roof-quote`, `/index.html`, `?probe=`) now 301 to free-inspection in **one hop**. Before/after `.htaccess` in `live-mirror/2026-07-21-pre-roofquote-removal/`.
   - Also: WPCode snippet **2849** gained a `template_redirect` prefix fallback → free-inspection; the old Rank Math redirect (`roof-quote/` → estimate) was re-pointed to free-inspection then **deactivated** (htaccess is authoritative).
3. **Header CTA (sitewide):** Blocksy `header_placements` theme-mod — `header_button_link` `estimate.rooval-roofing.com/quote` → `/free-roof-inspection-utah/`, `header_button_text` "Get a Free Estimate" → "Free Inspection". Fixes the button on all 55 pages.
4. **Contact page:** the `estimate.rooval-roofing.com/quote` iframe → `rooval-crm-production.up.railway.app/quote` (the inspection **scheduler** — a different app that keeps lead capture alive). Nav "Instant Quote" item 2610 → "Free Inspection"; duplicate dropdown item 3104 deleted; red side-ribbon (WPCode 2611) → "Get Your Free Roof Inspection"; llms.txt line (WPCode 3107) reworded; roof-tune-up gold CTA → free-inspection.
5. **35 pages/posts** swept via REST — every `/roof-quote/` link (absolute + relative) → `/free-roof-inspection-utah/`, and all **tool-describing copy** reworded to free-inspection framing (removed "instant quote tool / measures your roof from satellite/aerial imagery / real ballpark in about a minute / instant roof quote tool", plus anchor display-text `rooval-roofing.com/roof-quote`, button labels "Get My Instant Roof Quote" → "Book My Free Inspection", "Free Roof Quote" → "Free Roof Inspection"). Grammar/article fixes applied. All 35 mirrored to `live-mirror/pages|posts/`.
   - The 12 Elementor city pages needed their render cache cleared (Elementor → Tools → **Clear Files & Data**) after the REST `_elementor_data` write, or they served the old cached HTML.
6. **Folded-in fixes:** footer "© 2025" → "© 2026" (via the removal run-once); `/our-services/` title lengthened to 52ch ("Roofing Services Across Utah County | Rooval Roofing").

## ⚙️ Reusable findings
- **REST CAN write `meta._elementor_data`** (it's an exposed, writable meta key) — no run-once needed to change Elementor content; but the **render** stays cached until Elementor's element cache is cleared (Elementor → Tools → Clear Files & Data). `_elementor_element_cache` / `_elementor_css` are NOT REST-writable.
- **WPCode "add new" (custom=1) `requestSubmit` saves are flaky**; editing an EXISTING snippet + `requestSubmit` is reliable.
- A **LiteSpeed-cached 301** on Hostinger is not purged by hPanel "Clear cache", `wp_cache_flush`, or object-cache flush — an `.htaccess` rule at the top of root wins because rewrites run before the cache-serve.

## Rollback
- Static tool: File Manager → move `roof-quote` from `/files/` back into `public_html/`.
- `.htaccess`: restore `htaccess-root.BEFORE`.
- Header CTA: re-set `header_placements` button link/text (before-values recorded above).
- Page content: prior `content.raw` in git history of `live-mirror/pages|posts/` (pre-this-commit).

## ⚠️ KNOWN MINOR OPEN ITEM (not the quote task — a folded-in leftover from 7/18)
Four meta **descriptions** render ~8-14ch over the 155 ideal (home 164, our-services 169, about-us 163, contact-us 156 — cosmetic; Google truncates the tail). Root cause discovered: **Rank Math is NOT emitting these descriptions — a separate source overrides it** (no Rank Math head block on the pages; `rank_math_title` DOES apply but `rank_math_description` does not, so `updateMeta`/`updateMetaBulk` writes have no effect). Almost certainly a **per-page-meta WPCode snippet** (like the deck site's snippet 293). NEXT: locate that snippet in WPCode and edit the four description strings there (≤155ch), or disable it so Rank Math wins. Titles + footer year DID land.

## Owner follow-up (unchanged from plan)
`estimate.rooval-roofing.com` DNS / Railway app shutdown is the manager's call — do that ONLY after confirming nothing else references it (site now references it **zero** times).
