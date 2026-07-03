# 4 dedicated service pages built & deployed — 2026-07-03

Closes the audit's biggest content gap: searches like "tpo roofing" (#1.3, 155 impr, 0 clicks),
"roof repair near me" (4.7), "roof replacement near me" (7.5) had no dedicated landing pages.

## Pages (all live, ~1,400 words each, drafted by a 4-writer + 4-compliance-verifier workflow)
- **/roof-repair-utah/** (2778) — emergency leaks, hail AND wind damage repair, honest costs, repair-vs-replace
- **/roof-replacement-utah/** (2779) — signs, materials, honest $8k–$16k Utah ranges, day-by-day process
- **/tpo-flat-roofing-utah/** (2780) — TPO explainer, TPO vs EPDM vs PVC, 45/60/80-mil, repair/re-cover/replace
- **/gutter-services-utah/** (2781) — seamless aluminum, 5" vs 6" for snow country, guards honesty, costs

Each: FAQPage JSON-LD, CTA band (instant quote → /roof-quote/, Schedule My Free Inspection → CRM
scheduling form, tel: link), 6–10 internal links (city pages, blogs, sibling services), custom Rank
Math titles + descriptions. Compliance verified (no warranty durations, inspect-and-document
insurance framing only). Owner-requested emphasis: **wind damage given equal billing with hail**
(canyon-wind creasing bullet on replacement, wind-lifted edge metal on TPO; repair page already had
a dedicated Hail AND Wind section).

## Photos (owner request; every image personally viewed before use)
10 Pexels photos (media 2788–2797), curated from ~60 candidates against strict criteria: clean
professional shots, Utah/Mountain-West-plausible, NO snow, service-relevant, no third-party brand
clutter. Rejected: European buildings, SE-Asia rooftops, rusty warehouses, B&W, terracotta, vintage,
anything with snow. 3 images on repair & replacement, 2 on TPO & gutters; descriptive alt text;
lazy-loaded, full-width rounded style. NOTE: authentic TPO-membrane close-ups don't exist on Pexels —
the TPO page uses honest adjacent imagery (white low-slope commercial roof + modern flat-roof home);
owner's real job photos would upgrade this page when available.

## Site integration
- Nav: 4 new items under Our Services dropdown (menu 6, parent 57)
- /our-services/: all 24 service buttons remapped from /roof-quote/ to their matching service pages
  (installation/replacement→replacement, metal→metal page, gutters→gutters, repair→repair,
  tune-up→tune-up); the 3 dedicated quote CTAs still → /roof-quote/
- SEO titles fixed via run-once PHP (Rank Math updateMetaBulk didn't persist titles on new pages;
  WP slashing ate the ★ character — fixed with json_decode + wp_slash)

All verified live: titles, schema, photos (HTTP 200), CTAs, wind copy, compliance scan clean.
