# Four new city pages + wiring — 2026-07-04

Added four new city service-area pages (bringing the total from 12 → 16), fully
integrated into navigation, the Service Areas hub, sitewide schema, the sitemap,
and Google indexing.

## New pages (all live, HTTP 200, compliance-clean)

| City | Slug | Page ID | Menu item |
|---|---|---|---|
| American Fork | `/roofing-american-fork-utah/` | 2863 | 2868 |
| Saratoga Springs | `/roofing-saratoga-springs-utah/` | 2864 | 2869 |
| Eagle Mountain | `/roofing-eagle-mountain-utah/` | 2865 | 2870 |
| Bluffdale | `/roofing-bluffdale-utah/` | 2866 | 2871 |

Each page: ~1,600 words of unique, wind-first local content (equal billing hail/wind
per owner directive), inline FAQPage JSON-LD, honest local price ranges, the full CTA
set (instant quote `/roof-quote/` + CRM scheduling + tap-to-call), and geo-specific
internal links. All four passed compliance verification clean on first pass (no
insurance-claims language, no warranty durations).

Local angles: American Fork Canyon wind + old Main Street plank decking; Saratoga
Springs lake-effect wind + mid-2000s neighborhoods aging together; Eagle Mountain
Cedar Valley / Pony Express gap winds (wind-first framing); Bluffdale Point of the
Mountain gap winds + Independence at the Point.

## Wiring

- **Navigation (menu 6):** added all 4 as `page`-type children of the "Service Areas"
  parent (item 2336). Header dropdown now lists 16 cities. Verified live.
- **Service Areas hub (page 2534):** inserted the 4 into the county lists — American
  Fork / Saratoga Springs / Eagle Mountain under **Utah County**, Bluffdale under
  **Salt Lake County**. Verified all 4 links render.
- **Sitewide schema (WPCode snippet 2352, RoofingContractor):** appended the 4 cities
  to `areaServed`. Verified live in the anonymous (Flying-Scripts-delayed) HTML.
- **Rank Math titles:** `updateMetaBulk` set descriptions fine, but titles didn't
  persist on the new pages (known Rank Math quirk). Fixed via run-once PHP
  `update_post_meta($id,'rank_math_title',wp_slash(...))` through WPCode slot 2774
  (guarded by `rooval_city_titles_0704`; verified DONE marker on first load). All 4
  live `<title>`s now read "<City> UT Roofing | Repair & Replacement | Rooval".
- **Sitemap:** the new pages were missing from `page-sitemap.xml` (stale Rank Math
  cache — same issue as the July posts). Purged via run-once PHP
  `\RankMath\Sitemap\Cache::invalidate_storage()` (slot 2774, guarded by
  `rooval_sitemap_purge_0704`). Sitemap `<loc>` count 27 → 31; all 4 present.
- **Google indexing:** requested priority crawl for American Fork, Saratoga Springs,
  and Eagle Mountain (all "added to priority crawl queue"). **Bluffdale hit the GSC
  daily quota (10/day)** — it is already in the sitemap and will be crawled; resubmit
  manually 2026-07-05 when quota resets.

## Snapshots

Page content snapshotted to `pages/city-pages-2026-07-04/roofing-<city>-utah-<id>.html`
(head comment carries the rmTitle/rmDesc). Full Elementor blobs intentionally excluded
per the repo's version-control model.
