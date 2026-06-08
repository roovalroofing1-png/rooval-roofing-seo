# Rooval SEO Upgrade Plan — AYS Teardown → Utah Market

Source: full crawl of mentor site **aysroofing.com** (Cincinnati/Cleveland) on 2026-06-08, mapped against our existing Utah service-area hub. **Keep everything Utah-focused** (Utah County + Salt Lake County). Do **NOT** copy Cincinnati cities/landmarks or AYS's thin "near me" doorway pages.

## What we already have (equal to / ahead of AYS)
- 12 live Utah city pages with unique local content + photos.
- Real **financing** section ("Use Our Money to Build Your Roof") — AYS's financing page is vague; we're ahead.
- GBP 5.0★ / 30 reviews, GA4 live, GSC verified, schema (RoofingContractor / FAQPage / WebSite), Service Areas nav dropdown.

## Prioritized changes (gaps vs AYS)

### P1 — Service Areas hub index page (MISSING)
We have city pages + a dropdown but **no central `/service-areas/` landing page** (nav parent points at Alpine as a placeholder). AYS's strongest page is its regional hub (services + why-us + process + reviews + FAQ + city links). Build one → see `service-areas-hub-page.md`. Then repoint the nav "Service Areas" parent (menu item 2336) to it.

### P1 — Internal linking between city pages (OPEN TODO)
Add a geo-clustered **"Nearby Cities We Serve"** block to each city page. Beat AYS, who dump the same 13-link list on every page (and link each page to itself). Map below — link **only to existing pages**.

### P2 — FAQ + FAQPage schema on every city page
AYS omits FAQ on 9 of 13 pages. Add 4–5 Utah-specific Q&As per city + JSON-LD FAQPage. Angle on Utah climate: snow load, ice dams, freeze-thaw, high-altitude UV, canyon wind, occasional hail.

### P2 — Standardize a trust bar (value-prop trio)
Top of every page: **"Workmanship Warranty · Local Lehi-Based Utah Roofers · Free Inspection & Estimate"** (mirrors AYS's repeated trio). Keep the rule: **never** a specific term like "15-year."

### P2 — Diagnostic + process sections
Add AYS's high-converting blocks, Utah-ized:
- **"When Is It Time to Replace Your Roof?"** symptom checklist (ice-dam damage, wind-lifted/missing shingles, granules in gutters, UV cracking, age).
- **"Our Process"** 5 steps (Inspection → Estimate & Options → Schedule → Install → Cleanup + Workmanship Warranty).

### P3 — Instant Quote lead tool (our Roofle equivalent)
AYS uses Roofle: address → satellite-measures roof → **gates name/phone/email → reveals Good/Better/Best price**. We already own the roof-measurement engine — wrap it as our own lead magnet. Add a **pitch/waste multiplier** (~15% low vs EagleView on steep roofs). Separate build.

### P3 — Reviews page + dedicated service pages
- `/reviews/` page with a Google "leave a review" deep link that **displays** the 5.0★/30 count (AYS hides theirs).
- Verify whether standalone service pages (repair / replacement / metal / gutters) exist; if not, build them on the AYS service-page template (hero + trio → local intro → "types we install" cards → diagnostic → FAQ → CTA), Utah-localized.

## Geo-clustered internal-link map (link only to existing city pages)
Two clusters; **Lehi ↔ Draper** bridges them (Point of the Mountain).

| City page | "Nearby Cities We Serve" → link to |
|-----------|-------------------------------------|
| Lehi | Alpine, Highland, Pleasant Grove, Lindon, Draper |
| Alpine | Highland, Lehi, Pleasant Grove |
| Highland | Alpine, Lehi, Pleasant Grove |
| Pleasant Grove | Highland, Lindon, Lehi, Orem |
| Lindon | Orem, Pleasant Grove, Provo |
| Orem | Provo, Lindon, Pleasant Grove, Springville |
| Provo | Orem, Springville, Lindon |
| Springville | Provo, Orem |
| Draper | Sandy, Lehi, Murray |
| Sandy | Murray, Draper, Salt Lake City |
| Murray | Salt Lake City, Sandy, Draper |
| Salt Lake City | Murray, Sandy, Draper |

Future cities to add when ready (have GBP coverage, no page yet): American Fork, Saratoga Springs, Eagle Mountain, Vineyard, Cedar Hills, Cottonwood Heights, Riverton.

## What NOT to do (AYS mistakes to avoid)
- No thin "near me" / generic-keyword doorway pages (fragile under Google's helpful-content rules).
- No identical link block on every page — localize it (above).
- Never state a specific warranty term ("15-year") — "workmanship warranty" only.
- QA every city name on deploy (AYS shipped "Kentwood" for Kenwood and a Loveland leak on the Madeira page).
- Don't chase Lighthouse 100 — CWV pass + local SEO drive leads.
