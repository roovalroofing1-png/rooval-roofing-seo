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

- Google Search Console DNS verification: TXT record `google-site-verification=K5OcOIDQkM6KiDf0XVKt_vi-x6uCLwBBzX6mnBhEqsc` added to Hostinger DNS Zone Editor on May 22 2026 — pending propagation. Once live, click Verify in GSC.
- Submit sitemap `https://rooval-roofing.com/sitemap_index.xml` to GSC after verification
- ~~Build remaining city service area pages~~ — all live; **Lehi page added 2026-06-01** (now 12; see service-area-pages.md)
- ~~Add service area pages to WordPress navigation menu~~ — done May 22 2026 (menu ID 6)
- **Repo sync TODO (2026-06-01):** the `schema/` and `meta/` files still contain the OLD phone (801) 471-4062 and "15-year" wording. Update them to (385) 424-8810 / "workmanship warranty" so this canonical source matches the live site.

## Session Log

### 2026-06-01
- **Phone changed site-wide** to (385) 424-8810 (was 801-471-4062) for NAP consistency with the Google Business Profile — header, footer, page content, `tel:` links, WhatsApp/Chaty, and schema updated on the live site.
- **Dropped all "15-year" warranty claims** in favor of "workmanship warranty."
- **Rebuilding all 12 city pages** with a professional, conversion-focused flow (intro → local expertise → services → trust → CTA), unique local content per city, and 2 small photos each (Pexels → Media Library). Provo, Orem, Salt Lake City, and Lehi done; remaining cities in progress.
- **Homepage SEO title** set to "Lehi & Utah County Roofing Contractor | Rooval Roofing."
- **Crawlable-links fix:** footer Facebook icon linked to the FB page; removed dead Twitter/YouTube icons.
- **Performance:** installed/configured Autoptimize and Flying Scripts (delay FB Pixel / GTM / Google Maps).
- **Accessibility:** darkened top-bar gradient (AA contrast); fixed the Service Areas dropdown (was dark-on-dark/invisible → white panel with dark links); darkened reviews-widget text.
