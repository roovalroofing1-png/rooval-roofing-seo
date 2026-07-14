# Remove hardcoded review counts from visible copy (owner rule, 2026-07-13)

Owner: never show a review COUNT in visible copy — say "5-star rated" only (count goes stale). See memory no-review-count-in-copy.

## Stripped visible counts from 15 pages (rating phrasing kept, count removed)
- Storm pages (plain content, via REST content field): /hail-damage-repair-utah/ (2979), /wind-damage-roof-repair-utah/ (2980), /storm-damage-roof-documentation-utah/ (2981).
- 11 Elementor city pages (via _elementor_data + save_builder — REST `content` edits do NOT render on Elementor pages): Lehi 2391, Provo 2310, Draper 2308, Orem 2306, Sandy 2304, SLC 2302, Springville 2301, Pleasant Grove 2300, Lindon 2299, Highland 2298, Alpine 2296.
- Removed phrasings: "from/across/of/by N (Google) review(er)s", "(N reviews)", ", N reviews". Included stale "31 reviews" (old template) + "33 reviews" I'd added in WS2 openings.
- Verified live: 0 visible review counts across all 15 pages.

## KEPT (intentionally)
- Schema `aggregateRating.reviewCount` in WPCode 2352 — hidden structured data, REQUIRED for Google star rating display. Not visible copy. Update toward true GBP count periodically.

## Lesson
Elementor pages render from `_elementor_data`, NOT the REST `content` field. To change visible text on a city page you MUST edit the text-editor widget in `_elementor_data` and save_builder. Editing `content` silently no-ops on the live render.
