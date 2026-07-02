# Full-Site Audit Punch-List (2026-07-02, 8-agent workflow)

First, remove every trace of insurance-claims positioning (About page, hail blog post, tune-up page, homepage FAQ) and replace it with the owner-approved 'we inspect and document, you decide whether to file' framing — it is a standing owner-directive violation with legal exposure, and nothing else should ship before it. Second, make the phone number actually work as a lead channel: tel: links on every visible instance, a call button in the hero, and a corrected mailto address — minutes of work that recovers the site's highest-intent leads. Third, fix the structured data (review count 17 to 31, one consolidated business entity, populated FAQ answers) so Google shows accurate 5.0-star snippets instead of underselling or dropping Rooval's strongest proof asset. Notably excluded as not agent-executable: the DOPL license number and team/job photos, which require the owner to supply real materials.

## Ranked items

### 1. Purge all insurance-claims positioning and replace with the approved 'inspect and document only' framing: rewrite the /about-us/ storm section (delete 'You Might Qualify for a Roof Replacement Through
- **Why:** Four separate auditors flagged live violations of a non-negotiable owner directive; this is legal exposure under Utah public-adjuster rules and matches Google's storm-chaser spam patterns. The honest-documenter framing still captures storm leads and differentiates Rooval from claim-chasers. Nothing else on the list ships before this.
- **Effort:** hours | **Pages:** /about-us/, /utah-hail-damage-roof-insurance-claim/, /roof-tune-up/, / (FAQ)

### 2. Fix the contact leaks: wrap every visible phone number in <a href="tel:+13854248810"> (header bar, hero, contact sections, footer, sticky mobile header), add a 'Call (385) 424-8810' button next to the
- **Why:** Calls are the highest-intent roofing channel and the number is currently not tappable anywhere on a mobile-heavy site — the cheapest lead recovery available. The mailto mismatch is a silent lead leak sending emails to a possibly unmonitored Gmail address. Pure find-and-replace work in WP admin.
- **Effort:** minutes | **Pages:** sitewide (header, hero, contact blocks, footer)

### 3. Truth-up the structured data: change aggregateRating reviewCount from 17 to 31 everywhere, consolidate the two competing RoofingContractor entities (give the NAP-complete custom block @id https://roov
- **Why:** The stale count undersells Rooval's strongest asset by nearly half, and duplicate entities plus empty FAQ answers risk Google dropping the star snippet and FAQ rich results entirely — a direct organic-CTR hit on every query. Small, technical, agent-executable today.
- **Effort:** minutes | **Pages:** sitewide JSON-LD, / (FAQ schema)

### 4. Rebuild the homepage hero: disable the Blocksy page title (kills the duplicate 'Rooval Home' H1), replace 'Utah's #1 Roofing Solutions' with 'Roof Repair & Replacement in Lehi, Utah County & Salt Lake
- **Why:** The hero currently fails the 5-second test (no city, no proof, no phone, hype H1 the owner forbids) and renders blank on slow mobile connections — exactly the storm-season visits most likely to become jobs. This one Elementor session fixes conversion, tone compliance, and the homepage's H1 ranking signal together.
- **Effort:** hours | **Pages:** /

### 5. Unify the quote funnel and sell it as instant: point every CTA sitewide to the clean /roof-quote/ URL (retire estimate.rooval-roofing.com links or canonical them to /roof-quote/), rename CTAs from 'Ge
- **Why:** The instant tool is the site's biggest differentiator and best converter, but it's marketed as a generic 'free estimate' and split across three destination URLs, fragmenting analytics so conversion can't even be measured. One canonical funnel plus 'instant' positioning pulls in researchers who won't book a sales visit.
- **Effort:** hours | **Pages:** /, /our-services/, /contact-us/, /roof-quote/, nav + floating CTA

### 6. Fix the 24 dead href="#" bullet links on /our-services/ (convert to plain checkmark list items for now) and route all metal-roofing entry points to the new /metal-roofing-utah/ page: the 8 metal sub-s
- **Why:** A buyer clicking 'Full roof replacement' and getting nothing reads it as a broken site and leaves — the most damaging single defect on the services hub. Routing metal traffic to the dedicated page launching today converts high-ticket interest better and gives the new page the internal links it needs to rank.
- **Effort:** minutes | **Pages:** /our-services/, / (metal card), footer

### 7. Add two homepage conversion sections: (a) a storm block above the reviews — 'Hail or canyon winds just came through?' with the free inspect-photograph-document offer, 'whether you file is entirely you
- **Why:** Storm events are the year's biggest demand spikes and the homepage currently says nothing to a homeowner 48 hours after a hailstorm; the post-FAQ band catches visitors at their moment of maximum trust. Both use the compliant documentation-only framing from item 1.
- **Effort:** hours | **Pages:** /

### 8. Fix the /roof-tune-up/ offer contradiction: pick one price anchor (align body copy to 'free checkup' matching the H1, or have the owner set a flat dollar figure — do not ship 'free' and 'low-cost' tog
- **Why:** This is the site's entry-level offer and price ambiguity is the top reason people hesitate to book a maintenance visit; a single clear anchor directly lifts bookings. The H1 and Utah-specific bullets are minutes of extra work in the same edit.
- **Effort:** minutes | **Pages:** /roof-tune-up/

### 9. Rewrite /our-services/ into a real hub: add H1 'Roofing & Gutter Services in Utah County and Salt Lake County', title tag 'Roof Repair, Replacement & Gutters in Lehi, UT | Rooval Roofing', replace the
- **Why:** The hub for everything Rooval sells has no H1, ~500 generic words, no repair or storm content, and no city links — it can't rank for the highest-value service keywords and gives comparison shoppers no reason to choose Rooval. One rewrite consolidates six separate audit findings.
- **Effort:** hours | **Pages:** /our-services/

### 10. De-orphan the blog: add a Blog link to the footer, repurpose the thin duplicate /rooval-roofing/ page as a proper blog index ('Utah Roofing Advice from Rooval Roofing') listing all 5 posts, add contex
- **Why:** Five Utah-specific posts exist but zero site pages link to them, so their topical authority passes nothing to the 12 city pages, and the thin /rooval-roofing/ page can outrank the homepage for brand searches by referred leads. All internal-linking work an agent can do in WP admin.
- **Effort:** hours | **Pages:** /rooval-roofing/, footer, /our-services/, /roof-tune-up/, /about-us/, blog posts

### 11. Add a simple 3-4 field contact form (name, phone, city, message) on /contact-us/ beside the quote embed with plainspoken copy ('Prefer to write instead? Tell us what's going on with your roof'), set t
- **Why:** The contact page has zero form elements — repair questions, storm-inspection requests, and after-hours browsers who won't call or complete the full quote flow currently have no way to reach out. A basic form plugin recovers those otherwise-lost leads.
- **Effort:** hours | **Pages:** /contact-us/, /about-us/

### 12. Build the four dedicated service pages in priority order: /roof-repair-utah/, /roof-replacement-utah/, /storm-damage-roof-inspection-utah/ (documentation-only framing), /gutters-utah/ — then re-link t
- **Why:** One catch-all page cannot rank for 'roof repair utah county' or 'roof replacement lehi'; dedicated pages are new ranking surfaces for service-plus-city searches across 12 cities — the biggest medium-term lead lever in the audit, ranked last only because it takes days rather than hours.
- **Effort:** days | **Pages:** /our-services/, footer, 12 city pages, 4 new URLs
