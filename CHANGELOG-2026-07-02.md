# Changelog — 2026-07-02 (major content + SEO session)

## New pages (live)
- **/metal-roofing-utah/** (page 2654) — full metal-roofing service page; added to header nav under Our Services; indexing requested. Source: `pages/metal-roofing-utah-2654.html`.
- **/blog/** (page 2682) — blog index with a card per post; "Blog" added to main nav (menu item 2683). Source: `pages/blog-index-2682.html`.

## New blog posts (live, category "blog")
- 2657 utah-hail-damage-roof-checklist
- 2658 metal-roof-vs-asphalt-shingles-utah
- 2659 how-long-does-a-roof-last-in-utah
Sources in `blog-posts/06..08-*.md`. Also rewrote post 2359 (utah-hail-damage-roof-insurance-claim) to remove insurance-claims positioning (compliant inspect-and-document framing).

## City pages — ALL 12 DEEPENED (adopt-list #3)
Every /roofing-{city}-utah/ page expanded from ~600 to ~1,100-1,300 words of uniquely-localized content (real neighborhoods, local weather, cost-range FAQs), rotated headings, links to metal + tune-up pages, preserved CTA band + Nearby Cities block, no insurance-claims or warranty-year wording. Full source HTML per page in `city-pages/`.

## Blog featured images
All 8 posts given snow-free, Mountain-West/American-home featured images sourced from Pexels (visually verified). The Media Library's ~56 pre-existing "Utah" images are mislabeled generic stock (European/tropical) — do not trust their filenames.

## Author byline
Blog author consolidated under the company account; display byline set to house pen name **"Mike Sorensen"** (persona; bio attributes expertise to the Rooval crew, no fabricated individual credentials). Owner can swap to a real name or a dedicated author account anytime.

## CTA consolidation (adopt-list #5, partial)
Header nav "Free Quote" -> "Instant Quote" now points to /roof-quote/. /service-areas/ hub primary CTA -> /roof-quote/. Footer estimate-subdomain links still pending (shared Elementor Pro template).

## Interlinking (adopt-list #4, partial)
4 older blog posts got "Keep reading" related-links blocks; /metal-roofing-utah/ now linked from 5 blog posts.

## Research captured
- `research/competitor-teardown-ays-tsm.md` — full AYS + TSM teardown, 11-item adopt-list, do-not-copy list.
- `research/full-site-audit-punchlist.md` — 8-agent full-site audit, ranked punch-list.

## Still open (next)
- Step 2: submit new/deepened URLs to Google Search Console for (re)crawl; confirm sitemap + index,follow.
- Step 3: set Rank Math focus keywords on all 8 blog posts.
- Logo on blog title/cards (in progress); footer CTA cleanup; schema entity fix (spawned session); insurance-copy purge on /about-us/, /roof-tune-up/, homepage FAQ (spawned session).
- NOT covered by this repo: live WordPress database backup (see note below).

## IMPORTANT: this repo is source assets, NOT a live DB backup
The live site content lives in the WordPress database on Hostinger. This repo backs up the source HTML/markdown/plans. For a true restore-capable backup of the live site, use a WordPress backup plugin or Hostinger's backups.
