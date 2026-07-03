# Conversion & correctness sweep — 2026-07-02

Goal: capture more of the traffic the SEO work is now bringing in, and fix broken/invalid elements.
All changes applied to the live site (Elementor `save_builder`, WP REST) and **live-verified**.
UpdraftPlus holds the full DB backup (rollback point).

## Click-to-call (phone was plain text, not tappable — critical for a mobile roofing business)

| Location | Source | Fix |
|---|---|---|
| **Footer phone** (sitewide) | Elementor footer template **2026**, text widget `7645ed3` | wrapped `+1 (385) 424-8810` in `<a href="tel:+13854248810">` |
| **"Get a quote" section phone** (homepage) | Elementor template **2229** | wrapped in `tel:` link |
| **Blog author-box phone** (all 8 posts) | post content (Mike Sorensen author box) | `(385) 424-8810` → `tel:` link |

Now tappable on every page (footer) + homepage + all blog posts. Note: the Chaty floating call
button already had a working `tel:` link, so mobile visitors had one tap-to-call path; now the
displayed numbers are tappable too.

**Still plain text (deferred — see below):** the Blocksy theme **header top-bar** phone
("Call us today for a free estimate. +1 (385) 424-8810"). It lives in Blocksy theme mods, not an
Elementor template, so it needs a Customizer edit (Header → the text element → wrap the number in
`<a href="tel:+13854248810">`). Low urgency given the footer/homepage/Chaty tap paths.

## Correctness fixes

- **"Contact Informations" typo** → "Contact Information" in Elementor templates **2229** and **275**
  (shown on homepage + contact page).
- **24 dead links on /our-services/** — a grid of service buttons ("Roof Installation", "Metal roof
  installation", etc.) were Elementor buttons with **no link set**, which Elementor renders as
  `href="#"`. Pointed all 24 to **/roof-quote/** (instant-quote funnel) → 24 dead links became 24
  conversion CTAs. Verified live: `href="#"` count 24 → 0.
- **Invalid FAQPage schema on homepage** — the nested-accordion had `faq_schema="yes"` but emits
  **empty answer text** (answers live in nested child elements the auto-schema can't read), producing
  5 blank `acceptedAnswer` fields. Disabled the broken auto-schema (set `faq_schema=""`). Verified:
  no FAQPage block on homepage now (invalid markup removed). *Optional enhancement:* add a valid
  homepage FAQPage schema with the real Q&As via a WPCode/HTML snippet (deferred).

## Deferred / needs owner input

- **Email routing (needs your decision):** site *displays* `info@rooval-roofing.com` on every page,
  but the `mailto:` links point to **two different Gmail addresses** (`roovalroofing@gmail.com` and
  `roovalroofing1@gmail.com`). Which inbox actually gets checked is a routing call only the owner can
  make — guessing wrong silently loses customer emails. NOT changed.
- **Blocksy header top-bar phone** (Customizer edit) — see above.
- **Valid homepage FAQ schema** (add real Q&As) — optional SEO enhancement.

## Verification

Live re-checks: homepage (FAQ removed, typo fixed, tel: present), /our-services/ (0 dead links, 27
/roof-quote/ links, typo fixed), /contact-us/ (typo fixed), 8 blog posts (author-box phone tappable),
sitewide footer tel: propagating.
