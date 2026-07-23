# 2026-07-23 (evening) — About founder story, free-inspection header, real job photo

## About page (Elementor page 40) — owner's founder/family story + storm cleanup
Owner wanted a Bartlett-style founder story (family-owned, his "why", slogan) and to drop the "15 years" claim + trim insurance verbiage. Deployed 4 widget edits via `save_builder`:
- **774937a** (origin narrative) → new family story: family-owned Lehi, **Owner Matthew Thompson**, his why ("help homeowners protect their homes so they can have peace of mind"), slogan **"we protect homeowners' dreams,"** honest / no-hard-sell voice. Removed the "15 years" line (owner: don't say it).
- **4667b7e** (section heading) → "Family-Owned and Committed to Protecting Utah Homes" (removed "Over 15 Years of Roofing Expertise").
- **586d067** (storm section) → keeps "we document storm damage" but drops the insurance verbiage; owner's framing: "we come out, inspect, document, and give you an honest opinion — repair or full replacement." (See [[insurance-messaging-rule]] — owner also had the "we're roofers, not insurance experts" line removed sitewide.)
- **c138bdf** → removed the other "over 15 years of experience" mention.
All verified live (anon).

## Free roof inspection page (page 3051, /free-roof-inspection-utah/) — restored standard header
Owner: "on here there's no header … we need the company header above just like every other page." The page is a custom landing page (`#rooval-lp`) whose inline CSS hid the theme chrome — `body:has(#rooval-lp) #header, …footer{display:none!important}` — and drew its own slim `.rv-callbar` (logo + Call). Fix: **removed that hide-rule** (standard dark centered-logo header + footer now render) and **deleted the `.rv-callbar` mini-header** so there's no duplicate. Content otherwise unchanged (hero, steps, booking CTA). Pre-edit content saved; new content mirrored to `live-mirror/pages/free-inspection-3051.html`. Verified live.

## Real job photo added (CompanyCam → media 3242)
Owner: use a finished photo from the **Dan** project (578 S Eagle Dr, Mapleton UT) — "make sure it doesn't show the dumpster." Pulled the finished aerial (asset 2357196317: new charcoal architectural-shingle roof, Wasatch backdrop, blue sky, no dumpster) from CompanyCam's public CDN, uploaded to WP media as **id 3242** (`rooval-completed-roof-mapleton-utah.jpg`, 1440×1920) with descriptive alt/title. **Placement still pending** — the in-progress tear-off photo it should replace was not found on About/homepage/free-inspection; awaiting owner to confirm which page/section. (Real, un-reused photo per the no-photo-reuse rule.)
