# Service Area Pages — Rooval Roofing

All pages created via WordPress REST API and published live.

## Page Inventory

### Original 4 (created May 22, 2026 — Session 1)
| ID   | City           | URL                                          |
|------|----------------|----------------------------------------------|
| 2296 | Alpine, UT     | /roofing-alpine-utah/                        |
| 2298 | Highland, UT   | /roofing-highland-utah/                      |
| 2299 | Lindon, UT     | /roofing-lindon-utah/                        |
| 2300 | Pleasant Grove | /roofing-pleasant-grove-utah/                |

### New 7 (created May 22, 2026 — Session 2)
| ID   | City            | URL                                          |
|------|-----------------|----------------------------------------------|
| 2310 | Provo, UT       | /roofing-provo-utah/                         |
| 2306 | Orem, UT        | /roofing-orem-utah/                          |
| 2302 | Salt Lake City  | /roofing-salt-lake-city-utah/                |
| 2304 | Sandy, UT       | /roofing-sandy-utah/                         |
| 2303 | Murray, UT      | /roofing-murray-utah/                        |
| 2308 | Draper, UT      | /roofing-draper-utah/                        |
| 2301 | Springville, UT | /roofing-springville-utah/                   |

### Added later (2026-06-01)
| ID   | City            | URL                                          |
|------|-----------------|----------------------------------------------|
| 2391 | Lehi, UT        | /roofing-lehi-utah/                          |

## Total: 12 service area pages live

## Page Structure (used on all pages)
- H1: "Roofing Services in [City], UT – Rooval Roofing"
- Intro paragraph with city name bolded
- H2: Financing section – "Use Our Money to Build Your Roof!"
- H2: Services list (7 services)
- H2: Why Choose Rooval Roofing (5 trust bullets)
- H2: Serving [City] and Nearby Areas
- H2: CTA with phone (385) 424-8810

## Rank Math SEO Titles (set via Gutenberg editor saves — May 22, 2026)

| ID   | City            | SEO Title (`rank_math_title`)                                    |
|------|-----------------|------------------------------------------------------------------|
| 2296 | Alpine          | Alpine, UT Roofing Company \| Free Estimates \| Rooval Roofing  |
| 2298 | Highland        | Highland, UT Roofing Company \| Free Estimates \| Rooval Roofing |
| 2299 | Lindon          | Lindon, UT Roofing Company \| Free Estimates \| Rooval Roofing  |
| 2300 | Pleasant Grove  | Pleasant Grove UT Roofing \| Free Estimates \| Rooval Roofing   |
| 2301 | Springville     | Springville UT Roofing \| Free Estimates \| Rooval Roofing      |
| 2302 | Salt Lake City  | Salt Lake City UT Roofing \| Free Estimates \| Rooval Roofing   |
| 2303 | Murray          | Murray, UT Roofing Company \| Free Estimates \| Rooval Roofing  |
| 2304 | Sandy           | Sandy, UT Roofing Company \| Free Estimates \| Rooval Roofing   |
| 2306 | Orem            | Orem, UT Roofing Company \| Free Estimates \| Rooval Roofing    |
| 2308 | Draper          | Draper, UT Roofing Company \| Free Estimates \| Rooval Roofing  |
| 2310 | Provo           | Provo, UT Roofing Company \| Free Estimates \| Rooval Roofing   |

All titles verified live via curl. Focus keywords set to "roofing company [city] utah" for each.

## WordPress Navigation Menu (Menu ID 6)

Added May 22, 2026. Structure: "Service Areas" parent → 11 city children (dropdown).

| Menu Item ID | City            | Links To                              |
|--------------|-----------------|---------------------------------------|
| 2336         | Service Areas   | (parent, href = Alpine as placeholder)|
| 2337         | Alpine          | /roofing-alpine-utah/                 |
| 2338         | Highland        | /roofing-highland-utah/               |
| 2339         | Lindon          | /roofing-lindon-utah/                 |
| 2340         | Pleasant Grove  | /roofing-pleasant-grove-utah/         |
| 2341         | Springville     | /roofing-springville-utah/            |
| 2342         | Salt Lake City  | /roofing-salt-lake-city-utah/         |
| 2343         | Murray          | /roofing-murray-utah/                 |
| 2344         | Sandy           | /roofing-sandy-utah/                  |
| 2345         | Orem            | /roofing-orem-utah/                   |
| 2346         | Draper          | /roofing-draper-utah/                 |
| 2347         | Provo           | /roofing-provo-utah/                  |

Note: Provo page had auto-slug `roofing-provo-utah-3` (WP dedup) — fixed to `roofing-provo-utah` via REST API on May 22, 2026.

## DONE (2026-06-08)
- ✅ Internal links between city pages — geo-clustered "Nearby Cities We Serve" block live on all 12 pages (map in `seo-upgrade-plan.md`).
- ✅ Central Service Areas hub page **live at `/service-areas/` (page id 2534)**; nav item 2336 repointed from Alpine placeholder → `/service-areas/`.
- ✅ Standardized CTA band live on all 12 city pages (→ `/contact-us/` + tel:(385) 424-8810).

## TODO
- Add FAQPage JSON-LD to each city page + the hub (content/FAQ copy ready in `seo-upgrade-plan.md` / `service-areas-hub-page.md` P2).
- Instant-quote lead tool using the `rooval-roof-tool` repo (Roofle-style address → price; P3).

See **`seo-upgrade-plan.md`** for the full AYS-teardown → Utah upgrade roadmap.

---

## 2026-07-02 — ALL 12 city pages DEEPENED (adopt-list #3)
Every page rewritten from ~600 to ~1,100–1,300 words of uniquely-localized content:
real neighborhoods, local weather (bench snow/ice dams, canyon wind, high-UV, freeze-thaw),
honest cost-range FAQs, rotated section headings (anti-fingerprint), links to
/metal-roofing-utah/ and /roof-tune-up/, preserved CTA band + Nearby Cities block.
No insurance-claims positioning, no warranty-year wording. Full source HTML for each page
is committed under `city-pages/roofing-{city}-utah-{id}.html`. All verified live (HTTP 200).
