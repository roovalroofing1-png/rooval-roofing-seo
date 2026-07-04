# City-page hero photos — 2026-07-04

## Problem
All 16 city service-area pages had **zero local photos** — only the sitewide
`footer-scaled.webp` graphic rendered. The "2 small photos each" added on 2026-06-01
were wiped by a later rebuild. Pages were walls of text: bad for engagement *and* a
weak local-SEO signal.

## Solution — WPCode snippet 2880 "City page hero photos"
New PHP snippet (`snippets/city-pages-hero-photos.php`, **id 2880**, Auto-Insert /
Run Everywhere). Injects via `the_content` at **priority 15** so it works on BOTH the
Elementor city pages and the 4 plain new-city pages. For each city (keyed by slug) it
prepends a **hero band** — local landmark photo + gradient scrim + gold kicker
("Rooval Roofing · <City>, Utah") + a marketing headline + **Get My Free Quote**
(`/roof-quote/`) and **Call (385) 424-8810** CTAs — and appends a **roofing figure**
(local/roofing photo + caption). Data is keyed to **attachment IDs**, so
`wp_get_attachment_image($id,'large')` resolves the correct **responsive srcset**
server-side. Safe by design: if an attachment is missing, the page is returned unchanged.

## Photos — sourcing + licensing (professional, no Getty-letter risk)
- **Community/landmark heroes:** Wikimedia Commons (CC BY-SA / Public Domain). A discreet
  photo credit is shown for CC-BY-SA images (Provo, Lehi); PD images (Orem, Alpine) need none.
- **Roofing/home photos:** Pexels (Pexels License — free commercial, no attribution).
- **Every image was personally viewed and vetted:** clean, sunny, Utah/Mountain-West look,
  no snow, no watermarks, no clutter. (Snow-capped-peak shots were rejected per owner rule.)
- **Upload path (no giant base64 transfers):** the browser fetches each image straight from
  the CDN and POSTs it to `wp/v2/media`. CORS notes: Pexels is directly fetchable;
  Wikimedia needs the **Commons API with `origin=*`** to get a CORS-open `upload.wikimedia.org`
  thumb URL (the `Special:FilePath` redirect is NOT CORS-open). WP auto-generates a 1024px
  "large" size which is what the snippet embeds (fast).

## Wave 1 — LIVE & verified (4 cities)
| City | Hero (landmark) | License | Roofing photo | Hero id / body id |
|---|---|---|---|---|
| Orem | Orem City Center | Public domain | aerial upscale neighborhood | 2874 / 2877 |
| Provo | Provo City Center Temple | CC BY-SA 4.0 (Farragutful) | craftsman stone+shingle home | 2875 / 2878 |
| Lehi | Lehi Roller Mills | CC BY-SA 2.0 (brewbooks) | roofer nailing shingles | 2873 / 2872 |
| Alpine | Alpine valley aerial | Public domain | tan craftsman, stone+metal | 2876 / 2879 |

Verified live on all 4: hero renders, responsive `srcset` present, body figure renders,
taglines correct, **no insurance-claims language**, no mojibake.

## Deploy-technique notes (for next time)
- **WPCode is now a React SPA** on this install — no server-rendered `<form>`, and the old
  "serialize form fields + POST" trick does not apply. `admin-ajax` action `wpcode_save_snippet`
  returns `0` (not registered). **Reliable path: drive the UI** — Add Snippet → PHP Snippet →
  set CodeMirror via `document.querySelector('.CodeMirror').CodeMirror.setValue(...)`, set the
  React title via the native value setter + `input` event, confirm Auto-Insert / Run Everywhere,
  toggle Active, click Save.
- ⚠️ **`atob()` of a base64'd UTF-8 string mangles multibyte chars** (em-dash → mojibake that
  then double-encodes on save). Keep snippet code **ASCII-only** (use `-` not `—`), or decode
  with `new TextDecoder().decode(Uint8Array.from(atob(b64),c=>c.charCodeAt(0)))`.

## Remaining (next waves)
12 cities still need photos sourced/vetted/uploaded + a row added to the snippet-2880 map:
Salt Lake City, Sandy, Murray, Draper, Highland, Pleasant Grove, Springville, Lindon,
American Fork, Saratoga Springs, Eagle Mountain, Bluffdale. (Candidates already scouted for
Lindon; Wikimedia landmark search terms known for the rest.)

## Repo-sync TODO (pre-existing, unrelated to this change)
`snippets/city-pages-faq-faqpage-schema-2621.php` in the repo is **stale** — it still contains
banned insurance-claims phrasing that was already fixed on the LIVE snippet (live Orem/Provo/etc.
FAQ verified clean this session). Re-pull the live 2621 code and overwrite the repo copy.
