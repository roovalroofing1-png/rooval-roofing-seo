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
- **Plugins in use**: WPCode (code injection), Rank Math SEO (meta/sitemap), LiteSpeed Cache
- **Domain registrar**: Squarespace Domains LLC (formerly Google Domains) — domain is registered there but **DNS is managed in Hostinger hPanel**, NOT Squarespace. The domain NS records point to `ns1.dns-parking.com` / `ns2.dns-parking.com` (Hostinger's nameservers). DNS Zone Editor: https://hpanel.hostinger.com/external-domain/rooval-roofing.com/dns
- **Hosting**: Hostinger (LiteSpeed server)

## Business Details (used in copy and schema)

- **Address**: 2526 N Elm Dr, Lehi, UT 84043
- **Phone**: (801) 471-4062 / +18014714062
- **Email**: info@rooval-roofing.com
- **Hours**: Mon–Fri 8am–6pm, Sat 8am–4pm
- **Key differentiator**: 15-year workmanship guarantee + financing ("Use our money to build your roof")
- **Service areas**: Lehi, Provo, Orem, Salt Lake City, Sandy, Murray, Draper, American Fork, Pleasant Grove, Springville (and growing)
- **Services**: Roof Installation, Repair, Replacement, Inspection, Maintenance, Gutters, Metal Roofing

## Git Workflow

Every change should be committed and pushed:
```bash
git add <file>
git commit -m "descriptive message"
git push
```
Remote: https://github.com/roovalroofing1-png/rooval-roofing-seo

## Pending Work

- Google Search Console DNS verification: TXT record `google-site-verification=K5OcOIDQkM6KiDf0XVKt_vi-x6uCLwBBzX6mnBhEqsc` added to Hostinger DNS Zone Editor on May 22 2026 — pending propagation. Once live, click Verify in GSC.
- Submit sitemap `https://rooval-roofing.com/sitemap_index.xml` to GSC after verification
- ~~Build remaining city service area pages~~ — all 11 live (see service-area-pages.md)
- ~~Add service area pages to WordPress navigation menu~~ — done May 22 2026 (menu ID 6)
