# 2026-07-12 — Bing Webmaster Tools setup (rooval-roofing.com)

Mirrors the deck-site indexing work. Bing feeds ChatGPT search + Copilot citations.

1. **Property added** to the Bing Webmaster account (signed in via Google as
   roovaldeckbuilders@gmail.com — one Bing account now manages BOTH sites).
   GSC import couldn't be used (roofing GSC lives under roovalroofing1@gmail.com,
   Bing kept the deck account's token), so verified via HTML meta tag instead.
2. **Verification meta tag** added to WPCode -> Header & Footer -> Header box
   (id ihaf_insert_header), appended AFTER the existing GA4 gtag (G-7D5VK6JDVE
   preserved, verified live):
   <meta name="msvalidate.01" content="B2EC5F765622A22AAC210011BEB5DF15" />
   DO NOT REMOVE — removing it un-verifies the site in Bing.
3. **Sitemap submitted**: https://rooval-roofing.com/sitemap_index.xml (status Processing;
   Bing had already crawled it organically on 7/8).
4. **37 URLs bulk-submitted** via URL Submission (quota 100/day): homepage, 16 city
   pages, 5 service pages + tune-up, 8 blog posts, rooval-roofing bio page, hubs
   (our-services, service-areas, about, contact, blog). Skipped privacy/terms/sitemap.

Also this day (separate changelog): footer legal-bar link + schema sameAs to
roovaldeckbuilders.com.
