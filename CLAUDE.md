# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the SEO and digital growth asset repository for **Rooval Roofing** (rooval-roofing.com) — a Utah-based roofing contractor. The repo stores code that gets deployed to a WordPress site hosted on Hostinger. There is no local build process; files are deployed directly to the live site via browser automation (Claude Chrome Extension) or the WordPress REST API.

## Deployment Method

Changes go live through one of two paths:

1. **WPCode plugin** (Insert Headers & Footers) — the primary method for injecting scripts/meta tags into WordPress without editing theme files. Navigate to the WPCode settings in the WordPress dashboard and paste into "Scripts in Header" or "Scripts in Footer."
2. **WordPress REST API** — used to create/update pages programmatically:
   ```javascript
   fetch('/wp-json/wp/v2/pages', {
     method: 'POST',
     headers: { 'Content-Type': 'application/json', 'X-WP-Nonce': wpApiSettings.nonce },
     body: JSON.stringify({ title, content, status: 'publish', slug })
   })
   ```
   The nonce must come from `wpApiSettings.nonce` injected by WordPress on the page — run this via `javascript_tool` while the browser is on a logged-in WordPress admin page.

## Repository Structure

- `schema-markup.html` — canonical reference for all JSON-LD structured data deployed to the site footer via WPCode. Contains three schema blocks: `RoofingContractor`, `FAQPage`, and `WebSite`.

## WordPress Site Details

- **URL**: https://rooval-roofing.com
- **Plugins in use**: WPCode (code injection), Rank Math SEO (meta/sitemap), Elementor Pro + Blocksy (theme/page build), Autoptimize (CSS/JS optimization), Flying Scripts (delay 3rd-party JS), Chaty, GTM Kit, WPForms, Google Reviews. *Note: LiteSpeed Cache is no longer present — as of 2026-06-01 there was no caching plugin, so Autoptimize was added.*
- **Domain registrar**: Squarespace Domains LLC (formerly Google Domains) — domain is registered there but **DNS is managed in Hostinger hPanel**, NOT Squarespace. The domain NS records point to `ns1.dns-parking.com` / `ns2.dns-parking.com` (Hostinger's nameservers). DNS Zone Editor: https://hpanel.hostinger.com/external-domain/rooval-roofing.com/dns
- **Hosting**: Hostinger (LiteSpeed server)

## Business Details (used in copy and schema)

- **Address**: 2526 N Elm Dr, Lehi, UT 84043
- **Phone**: (385) 424-8810 / +13854248810 — keep consistent **everywhere** (matches the Google Business Profile; required for local-SEO NAP). *Changed from the old (801) 471-4062 on 2026-06-01.*
- **Email**: info@rooval-roofing.com
- **Hours**: Mon–Fri 8am–6pm, Sat 8am–4pm
- **Key differentiator**: workmanship warranty + financing ("Use our money to build your roof"). **Say "workmanship warranty" — never state a specific term like "15-year."**
- **Service areas**: Lehi, Provo, Orem, Salt Lake City, Sandy, Murray, Draper, American Fork, Pleasant Grove, Springville (and growing)
- **Services**: Roof Installation, Repair, Replacement, Inspection, Maintenance, Gutters, Metal Roofing

## Git Workflow

**Commit and push to GitHub regularly as you work — never let changes pile up uncommitted.**
This keeps a saved version of the project at all times so we never lose the status of our
work and can always revert.

- Commit after each meaningful unit of work (one logical change per commit), not once per session.
- Write clean, descriptive messages stating what changed and why
  (e.g. `Rewrite Provo city page with unique local content + photos`).
- Push to GitHub immediately after committing.
- Never commit secrets (API keys, tokens, passwords).

```bash
git add <file>
git commit -m "descriptive message"
git push
```
Remote: https://github.com/roovalroofing1-png/rooval-roofing-seo

## Pending Work

- ~~Google Search Console DNS verification~~ — DONE (verified, collecting data; URL-prefix property https://rooval-roofing.com/).
- ~~Submit sitemap `sitemap_index.xml`~~ — DONE (re-submitted 2026-06-02 so Google re-reads after the June-1 city-page rebuild; 16 pages discovered, only 6 indexed as of 06-02).
- **Indexing (2026-06-02):** the 12 city pages were "unknown to Google" (new/never crawled). Requested **priority indexing** for the top 4 (Lehi, Provo, Orem, Salt Lake City) via URL Inspection. Remaining 8 cities will be crawled via the sitemap (GSC rate-limits manual requests ~10/day). Watch GSC → Pages; indexed count should climb 6 → 16+ over ~2 weeks.
- ~~Build remaining city service area pages~~ — all live; **Lehi page added 2026-06-01** (now 12; see service-area-pages.md)
- ~~Add service area pages to WordPress navigation menu~~ — done May 22 2026 (menu ID 6)
- **Repo sync TODO (2026-06-01):** the `schema/` and `meta/` files still contain the OLD phone (801) 471-4062 and "15-year" wording. Update them to (385) 424-8810 / "workmanship warranty" so this canonical source matches the live site.

## Session Log

### 2026-06-01
- **Phone changed site-wide** to (385) 424-8810 (was 801-471-4062) for NAP consistency with the Google Business Profile — header, footer, page content, `tel:` links, WhatsApp/Chaty, and schema updated on the live site.
- **Dropped all "15-year" warranty claims** in favor of "workmanship warranty."
- **Rebuilt all 12 city pages** (Provo, Orem, Salt Lake City, Lehi, Alpine, Highland, Lindon, Pleasant Grove, Springville, Murray, Sandy, Draper) with a professional, conversion-focused flow (intro → local-expertise H3 → services list → "Why … Choose" trust list → CTA), unique local content per city (neighborhoods + local roof challenges), and 2 small unique photos each (Pexels → Media Library, max-width 300px). All live and verified; "workmanship warranty," no "15-year."
- **Homepage SEO title** set to "Lehi & Utah County Roofing Contractor | Rooval Roofing."
- **Crawlable-links fix:** footer Facebook icon linked to the FB page; removed dead Twitter/YouTube icons.
- **Performance:** installed/configured Autoptimize and Flying Scripts (delay FB Pixel / GTM / Google Maps).
- **Accessibility:** darkened top-bar gradient (AA contrast); fixed the Service Areas dropdown (was dark-on-dark/invisible → white panel with dark links); darkened reviews-widget text.
- **Performance pass:** set Autoptimize to defer Google Fonts (removed ~2.25s of render-blocking), removed the WP core emoji script, and added a `fonts.gstatic.com` preconnect. Reactivated **Flying Scripts** (it had been left *deactivated* — the cause of the TBT spike to ~1,230ms). NOTE: the heavy third-party weight (gtag, fbevents, GTM ~400KB) is **runtime-injected by the server-side GTM** (`gtm.rooval-roofing.com`), so it can't be deferred at the WordPress level — Flying Scripts only catches static scripts. The real fix is a **GTM-container audit**.
- **GTM audit + FIX done (2026-06-01):** GTM web container = **GTM-K9Q9S982**, server container = **GTM-57PQW8MG** (server-side GTM via gtm.rooval-roofing.com). A freelancer (webanalyticsmashiur@gmail.com) built it 3 months ago but left the GA4 Measurement ID as placeholder **`G-TESTM`**, so GA4 recorded **nothing for 3 months**. Real GA4 property exists (account 330901326 / property 460652243, **Measurement ID `G-7D5VK6JDVE`**). **FIXED:** changed the web container's `G-TESTM || M` Constant variable (referenced by all 3 GA4 tags: GA4 config, SS||PageView, SS||Lead) from `G-TESTM` → `G-7D5VK6JDVE`; published **Version 9**. **Facebook Pixel `470867249167206` left untouched (real/active).**
  - **Web fix confirmed** (page now loads gtag with `G-7D5VK6JDVE`), BUT GA4 Realtime still showed 0. **Root cause found in the SERVER container (`GTM-57PQW8MG`):** it has the **GA4 client (receiving)** + a **Facebook Conversion API tag**, but **NO GA4 forwarding tag** — GA4 events dead-end at the server. The freelancer built the FB side and never added the GA4 tag. **BLOCKERS:** (1) owner account `roovalroofing1@gmail.com` is **view-only/read-only on the server container** (can't edit); (2) needs a new tag created. **FIX NEEDED (by someone with Edit access):** add a "Google Analytics: GA4" tag in `GTM-57PQW8MG`, forward to Measurement ID `G-7D5VK6JDVE`, trigger = the GA4 client, then Publish. Then verify GA4 Realtime. Also: get owner Edit+Publish on both containers. FB conversion tracking IS working.
  - **RESOLVED 2026-06-01 (the smart way — bypassed the broken server-side):** Owner only had view access to the server container + it was missing the GA4 tag, so instead of paying the freelancer, added a **standard direct GA4 gtag** for `G-7D5VK6JDVE` via **WPCode → Global Header** (`<head>`). Confirmed live: page fires a hit to **www.google-analytics.com (tid=G-7D5VK6JDVE)** and **GA4 Realtime showed 1 active user**. Analytics is WORKING (owner fully controls it in WPCode). ⚠️ Do NOT also add the GA4 forwarding tag to the server container now, or visits will **double-count** — the direct WPCode tag is the keeper. The server container still quietly handles FB Conversions API.
- **Logo optimized (done):** replaced the 1280x629 (~68KB) logo with a 456x224 / ~15KB WebP (attachment 2528). Blocksy stores the header logo nested in the `header_placements` customizer setting (`items[id=logo].values.custom_logo`), NOT the WP core `custom_logo` — updated there and verified live.

### 2026-06-02
- **GA4 confirmed live** (direct WPCode tag) and **Search Console** verified + sitemap re-submitted + priority indexing requested for the top 4 city pages (Lehi/Provo/Orem/SLC) — see Pending Work.
- **Organic-only growth strategy** (owner does NOT want to run paid ads). Priorities: Google Business Profile + reviews (fastest), then website SEO (indexing, content, citations).
- **Google Business Profile optimization (in progress):** strong base — 5.0★, 30 reviews, correct (385) 424-8810 phone, owner manages it — but Profile Strength is incomplete. Fixing: **Areas Served** (currently just "Lehi and nearby areas" → add all 12 cities), services, description, complete-profile fields, and **reply to the 4 new reviews**. ⚠️ GBP **categories to clean up**: remove wrong ones — "Hair extension technician" and "Commercial real estate inspector" (keep primary "Roofing contractor").
  - **GBP progress (2026-06-02, pending Google ~10min review):** (1) **Service area is actually already good** (~20 Utah-County cities populated; public "Lehi and nearby areas" is just Google's summary) — only **Salt Lake City + Murray missing** (have website pages; owner to confirm if they serve there). (2) **Removed the 2 wrong categories** (hair extension, commercial real estate inspector). (3) **Rewrote the Description** — was mis-focused on "American Fork" w/ typo "American Forks"; now Lehi/Utah-County-focused, accurate, (385) phone, no "15-year" (685/750 chars). STILL TODO: reply to the 4 new reviews, add job photos + weekly Posts, structure Services list, fill remaining "complete profile" fields. Borderline categories left (Home builder/Custom home builder — a roofer isn't a builder; ask owner).
  - **GBP update 2 (2026-06-02):** Owner chose to **keep Home builder/Custom home builder** (relatable construction trades; no clearly-better roofing category to swap). **Replied to ALL unreplied reviews** (6: Oriana, Rob, Austin, Brent, Geoff, pablo) with warm, personalized responses as the Owner. **Service area decision:** left as-is — it's already at Google's **20-city max**, tightly focused on Utah County (ideal for map-pack ranking); did NOT add SLC/Murray (too far + would require removing closer cities; website pages handle their organic search). STILL TODO (needs owner's content): add job/before-after **photos** (biggest remaining ranking signal) + weekly **Posts**; optionally structure the **Services** list (Edit services).
