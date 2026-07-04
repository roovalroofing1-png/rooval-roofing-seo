# Punch-list sprint 2: prices, homepage, headings, sitemap (2026-07-03)

## #5 — City FAQ price ranges synced to body copy (all 9 conflicts resolved)
FAQ ranges (rendered + FAQPage schema via WPCode snippet 2621) now match each city's body copy:
Provo $10k–$18k, Draper $9k–$18k, Sandy $9k–$20k, Murray $8k–$16k, Lindon $9k–$18k,
Lehi $9k–$20k, Orem $9k–$16k, Springville $10k–$18k, SLC "$8,000 for a modest bungalow to $22,000
or more". (Alpine/Highland/PG were already consistent.) Note: snippet uses two phrasings —
"$X to $Y" and "between $X and $Y" — both patterns fixed.

## #4 — Homepage cleanup
- WP page title renamed "Rooval Home" → **"Lehi & Utah County Roofing Contractor"** (the theme
  renders this as the first H1 — now keyword-bearing instead of junk)
- Demoted the Elementor hero "Utah's #1 Roofing Solutions" from H1 → H2 ⇒ homepage now has
  **exactly one H1**
- Fixed "-Trusted" typo → "— Trusted"
- Wind damage added: FAQ now "Do you inspect for storm, wind, and hail damage?" with wind in the answer
- "Commitment" card fragment fixed → "Every job is backed by our workmanship warranty — plus
  manufacturer protection you can count on."

## Heading hygiene elsewhere
- /roof-tune-up/: in-content duplicate H1 demoted → exactly one H1
- /contact-us/: exactly one H1 ("Contact Us", theme) + section heading upgraded to
  "Contact Rooval Roofing"

## Sitemap cache FINALLY purged
Ran RankMath\Sitemap\Cache::invalidate_storage() via run-once PHP — post-sitemap.xml now lists
**9/9 posts** including the three July long-forms that had been missing since publication.

All changes live-verified (single H1s confirmed on home/tune-up/contact; old price ranges absent,
new present, on spot-checked cities; sitemap contains all 3 July slugs).
