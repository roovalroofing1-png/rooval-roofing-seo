# Rooval Roofing — Full-Site Audit & Strength Report (2026-07-03)

Six specialist audit agents swept all 34+ live pages in parallel (on-page SEO, technical SEO,
content/compliance, internal linking, conversion/UX, local SEO), with adversarial verification of
critical findings. Raw findings: `full-site-audit-2026-07-03-findings.json`.

## Overall site health: 68/100 → ~78/100 after same-day fixes
Strong foundations with one serious compliance blind spot (now fixed) and a clear growth path.

| Dimension | Score | Verdict |
|---|---|---|
| Conversion/UX | 72 | Strongest — CTAs everywhere, zero dead links, consistent NAP |
| On-page SEO | 62 | Solid craft; unique titles/descs, good H1s on 30/34 pages |
| Technical SEO | 62 | Clean crawl: all 200s, no broken links, proper canonicals |
| Local SEO | 62 | 12 genuinely unique city pages; schema needs consolidation |
| Internal linking | 58 | New service pages under-linked (nav-only) |
| Content/compliance | 55→~85 | Was dragged down by legacy insurance copy — FIXED today |

## How the site is RANKING (GSC, last 28 days)
- **12.3K impressions** (up ~4x across June: ~200/day → ~900/day), 15 clicks, avg position 20.6
- **Page 1 already:** roofers near me (2.7), local roofers (1.0–1.2), commercial roofers near me (1.0),
  roof installation (1.0), tpo roofing near me (1.0), metal roofing near me (1.0), roof inspection (1.0),
  tpo roofing (4.1), roof replacement (4.7), roof repair near me (5.1), roofers (5.4), metal roofing (6.3)
- **Biggest impression pools (position 9–25, no clicks yet):** roof repair highland ut (816 @ 9.0 — GSC
  flags it "+120% impressions"), roofing highland ut (665 @ 10.6), roof repair sandy ut (639 @ 16.7),
  roofing sandy ut (620), roof repair provo ut (546 @ 25.4) — 606 total ranking queries
- GSC page indexing: 18 indexed / 14 not; the 4 new service pages were submitted to the priority
  crawl queue today (all 4 "Indexing requested" confirmed)
- **The story:** visibility exploded in June from the city-page work; clicks lag because most queries sit
  at positions 9–25 where nobody clicks. The new /roof-repair-utah/ + /roof-replacement-utah/ pages
  target exactly the biggest query pools ("roof repair …"), and the punch-list below is aimed at pushing
  those 9–25 positions into the top 5.

## FIXED same-day (all live-verified)
1. **CRITICAL compliance:** legacy FAQ on all 12 city pages — visible text AND FAQPage schema — said
   Rooval "works with all major insurance carriers … guide you through the claims process." Replaced
   with approved inspect-and-document wording (WPCode snippet 2621). Also fixed Sandy's
   "coordinate with your insurance carrier" and Springville's "insurance-backed" lines.
2. **CRITICAL compliance:** About Us bullet "Get Help with Claims …" → "Get It Documented …".
3. **CRITICAL compliance + root cause:** hail post's meta/og/twitter descriptions still said Rooval
   "assists homeowners through the full process." Root cause found: **WPCode snippet 2368 — an
   unguarded June 'run-once' that actually ran on EVERY page load**, perpetually re-writing June-era
   meta onto posts 2358–2362 and silently reverting every fix. Deactivated it; set the compliant
   description; verified meta/og/twitter all clean.
4. **Schema logo 404** → fixed to the real /wp-content/uploads/2025/10/ URL (snippet 2352).
5. **Mis-targeted button:** "Downspout repair and replacement" on /our-services/ pointed at
   /roof-repair-utah/ → now /gutter-services-utah/.

## TOP-10 PUNCH-LIST (by lead impact; remaining work)
1. **Link the 4 new service pages from the 12 city pages** (they currently only link metal + tune-up;
   new pages have 3–4 inbound content links vs 31 for metal). Effort M — biggest ranking lever.
2. **Add Repair / TPO / Tune-Up cards to /our-services/ hub** (hub omits 3 of 6 services). Effort S.
3. **Consolidate the two RoofingContractor schema entities** (Rank Math's + snippet 2352's), fix
   openingHours format, decide reviewCount (schema says 17, site copy says 31 — needs the true GBP
   number), add GBP/social URLs to sameAs. Effort M — needs owner's true review count.
4. **Header phone → tel: link** (Blocksy Customizer, top bar is plain text on all pages). Effort S — owner/manager 30-second Customizer edit, or next session.
5. **/roof-quote/ page: 1.97 MB HTML payload** on the money page every CTA funnels into; also no
   canonical + duplicate /index.html?v=3 URL variant. Effort M/L — big mobile-conversion win.
6. **301 /rooval-roofing/ → /about-us/** (thin 2024 post titled "Rooval Roofing - Rooval Roofing"
   competing for brand queries) + noindex /category/blog/ (placeholder-desc duplicate of /blog/). Effort S.
7. **Homepage fixes:** remove duplicate H1 ("Rooval Home" theme artifact — same on /roof-tune-up/),
   fix "-Trusted" typo, add wind mention, add H1 to /contact-us/. Effort S/M.
8. **Sitemap hygiene:** 3 July blog posts still missing from post-sitemap.xml (Rank Math cache);
   HTML /sitemap/ page omits all 6 service pages + blog. Effort S.
9. **City-page FAQ price ranges conflict with body copy on 9 of 12 pages** (e.g. Draper body
   $9–18k vs FAQ $9–22k) — pick one range per city. Effort M.
10. **Build 4 new city pages:** American Fork, Saratoga Springs, Eagle Mountain, Bluffdale —
    fast-growing, adjacent, zero coverage today. Effort L — next content sprint.

## What's already STRONG
- Zero broken internal links, zero dead buttons, all pages 200, proper canonicals & robots
- NAP perfectly consistent sitewide; phone tap-to-call in body/footer everywhere
- 12 city pages genuinely unique (~75–80% unique, real neighborhoods, 1,500+ words)
- 6 service pages with honest pricing, FAQ schema, CTA trio; 9 blog posts incl. 3 fresh long-forms
- CTAs above the fold + end-of-page on every page; Clarity + GTM analytics live
- No warranty-duration violations anywhere; insurance framing now compliant sitewide
