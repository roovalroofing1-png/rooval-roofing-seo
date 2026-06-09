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
- `snippets/` — verbatim copies of the WPCode snippets running on the live site (one file per snippet, named `<slug>-<id>.php|html`). These are **restore references**: paste back into WordPress → Code Snippets to recover a snippet. Keep byte-faithful to live (verify with a length/charSum/rollHash fingerprint when in doubt).
- `config/` — exported structure of DB-only objects kept as a rebuild reference (e.g. `nav-menu-header-6.json` = the Header menu). Reference copies, **not** auto-restores.
- `meta/`, `schema/` — Rank Math meta + JSON-LD reference text.
- `blog-posts/`, `*.md` — content drafts and human-readable change/plan logs (`service-area-pages.md`, `service-areas-hub-page.md`, `city-page-cta-and-links.md`, `seo-upgrade-plan.md`).
- **`RESTORE.md`** — the recovery runbook: how to undo each kind of change and each disaster class. **Read it before any risky edit or restore.**

## Version control model (two tracks — IMPORTANT)

The live site is **split-brain**: code-like artifacts vs. database content. Use the right track for each, and never let Git give false confidence.

- **Track 1 — Git (this repo):** a readable history of the *diffable, code-like* pieces — WPCode snippet code, schema/meta text, menu structure, content drafts. Restoring from Git means a human/AI **pastes the saved text back into WordPress**. It is NOT a `git revert` of the running site.
- **Track 2 — Backups (the real revert net for the live DB):** Hostinger native backups + UpdraftPlus off-site + built-in WordPress/Elementor **revisions**. These are the only things that restore page layouts, menus, plugin settings, and content. See `RESTORE.md` for setup status and the per-disaster playbook.
- **Git captures NONE of the owner's day-to-day edits automatically** (editing a page, reordering the menu, changing a plugin setting are all DB writes with zero Git diff). The repo only reflects reality when an AI **deliberately re-snapshots after a change** — which is why the per-change routine below is mandatory.
- **Full Elementor `_elementor_data` blobs are intentionally NOT committed** (1–2 MB each, poor diffs, lossy on re-import). Backups own full structural restore; the repo holds the human-readable content + the small code artifacts.

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
- Never commit secrets (API keys, tokens, passwords). Note: when pulling page data via `context=edit`/authenticated REST, scrub any embedded API keys, nonces, or draft/PII before committing.

```bash
git add <file>
git commit -m "descriptive message"
git push
```
Remote: https://github.com/roovalroofing1-png/rooval-roofing-seo (push over SSH — no `gh` CLI/token on this machine)

### Per-change routine (run this on EVERY site change)

1. **Classify:** is it CODE-like (a WPCode snippet, schema/meta, an Elementor *structural* rebuild) or pure CONTENT (text tweak, image swap, menu reorder, plugin setting)?
2. **Before anything risky** (plugin/theme/core update, bulk edit, editing the PHP FAQ snippet, structural rebuild): ⚠️ on-demand Hostinger backups are **LOCKED** on the current plan (verified 2026-06-09 — auto-backups are weekly only). So your safety nets before a risky change are: (a) run an **UpdraftPlus** "Backup Now" if installed, (b) otherwise know the last weekly backup date (hPanel → Files → Backups) and that Elementor **revisions** can undo a single page. For anything that could white-screen the site (the PHP FAQ snippet), be extra careful — there's no instant pre-backup available.
3. **Make the change** via the established path (REST for page content; admin-ajax `elementor_ajax` `save_builder` to force Elementor re-render; WPCode editor for snippets).
4. **Elementor structural change?** finish with the `save_builder` call (re-renders) or Elementor → Tools → Regenerate CSS — writing `_elementor_data` alone leaves a STALE render.
5. **Snapshot to Git:** if a snippet changed, overwrite its `snippets/*` file with the exact new code (verify byte-fidelity — length/charSum/rollHash — since WPCode/REST won't return code through some tool filters; reconstruct from the authored source and confirm the fingerprint matches live). If the menu changed, refresh `config/nav-menu-header-6.json`. Update the relevant `*.md` if content changed.
6. **Commit with a descriptive message** (what + why), then **push immediately**.
7. **Never commit secrets**; live DB, media, and `wp-config` stay OUT of Git (that's the backup layer's job).

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

### 2026-06-08 — AYS teardown → Utah SEO upgrade (DEPLOYED LIVE)
- Crawled mentor site **aysroofing.com** in full; gap analysis + Utah-only roadmap in `seo-upgrade-plan.md`.
- **Created Service Areas hub page** `/service-areas/` (**page id 2534**): trust-trio, 12 cities grouped by county, services, why-us, 5-step process, reviews, Utah FAQ, CTA. **Repointed nav item 2336** ("Service Areas") from the Alpine placeholder → `/service-areas/`.
- **Added a standardized CTA band + geo-clustered "Nearby Cities We Serve" internal-link block to all 12 city pages** (closes the long-standing internal-links TODO). CTA → `/contact-us/` (the real contact page — there is **no** `/free-inspection/` or `/reviews/` page) + click-to-call (385) 424-8810. Inline-styled (no Customizer dependency). Verified all 12 render live with a single H1.
- **⚙️ REUSABLE DEPLOY TECHNIQUE for Elementor city pages:** content lives in ONE `text-editor` widget inside `_elementor_data`. Writing `_elementor_data` via REST **persists but Elementor serves a STALE cached render**. To regenerate render+CSS without opening the editor UI: `POST /wp-admin/admin-ajax.php` with `action=elementor_ajax`, `_nonce=elementorCommonConfig.ajax.nonce`, `editor_post_id=<id>`, `actions={"save_builder":{"action":"save_builder","data":{"status":"publish","elements":<full _elementor_data array>}}}`. Goes through Elementor's official save pipeline. (No Cloudflare/LiteSpeed page cache in front currently.)
- New repo files: `seo-upgrade-plan.md`, `service-areas-hub-page.md`, `city-page-cta-and-links.md`.
- **Not yet done:** FAQPage JSON-LD on city pages; instant-quote lead tool — will use the owner's **`rooval-roof-tool`** repo (github.com/roovalroofing1-png/rooval-roof-tool) as the measurement engine for a Roofle-style address→price lead magnet.

### 2026-06-09 — Conversion features + version-control hardening
- **Roof tool deployed live** at `/roof-quote/` (the `rooval-roof-tool` static app, base64-inlined single file) and wired into the site. Added a **"Free Quote"** nav item (menu id 6, item 2610 → `/roof-quote/`), repointed the homepage hero + all 12 city CTA bands to `/roof-quote/`, and added a site-wide sticky **"Free Roof Quote"** side tab.
- **3 new WPCode snippets created (now mirrored in `snippets/`):**
  - `sticky-free-roof-quote-tab-2611.html` (id 2611) — fixed right-edge quote tab, every page.
  - `footer-legal-bar-2618.html` (id 2618) — site-wide Privacy | Sitemap | Terms bar (red `#cc0000`, white text).
  - `city-pages-faq-faqpage-schema-2621.php` (id 2621) — **FAQPage JSON-LD + visible accordion FAQ on all 12 city pages** (closes the long-standing FAQPage TODO). Per-city Q1 (local cost range) + Q6 (local geography) + 4 shared Qs; CTA → `/roof-quote/`. *(This is the only PHP snippet that can white-screen the site if broken — pre-backup before editing it.)*
- **Legal pages created:** Privacy Policy (2614), Terms & Conditions (2615), Sitemap (2616) — original Rooval wording, Utah/Lehi based.
- **Footer fixes (Elementor template 2026):** shrank the giant "ROOVAL-ROOFING" heading (widget 29eb115) from `typography_font_size` 200px → 60px/48px/36px (the earlier 200px lived in `typography_font_size`, not `title_font_size`); legal bar restyled red for visibility.
- **Homepage:** removed the stock-video section (1723) — **LIVE & verified** (hero CTA → /roof-quote/ preserved; Elementor revision created for rollback). Still open: de-clutter the homepage for mobile.
- **Free Roof Tune-Up / Repair page — BUILT & LIVE** at `/roof-tune-up/` (**page id 2626**; content mirrored in `pages/roof-tune-up-2626.html`). Standard WP page, self-contained inline CSS (`.rrtu`), on-brand red/gold. Sections: hero → what-is-a-tune-up → what's-included checklist → leak/storm repair callout → why-it-pays-off → CTA band. CTAs funnel to `/roof-quote/` + tel:(385) 424-8810 (interim; repoint to the **CRM** when chosen — owner's plan). Uses "workmanship warranty," no "15-year". **Not yet in nav** (pending owner decision on placement — likely under Our Services rather than a 7th top-level item). TODO: Rank Math meta title/description for the page.
- **Version control hardened (this is the "use Git for the project" directive, done right):** confirmed the canonical site repo is THIS repo (not a new one — avoids sprawl). Brought it current with the 3 new snippets (verified **byte-faithful** to live via length/charSum/rollHash fingerprints) + `config/nav-menu-header-6.json`. Added **`RESTORE.md`** (two-track recovery runbook) and the **per-change routine** + **version-control model** sections above. Backups (Hostinger native + UpdraftPlus off-site) are the live-DB revert net and need owner action — tracked as a checklist in RESTORE.md.
