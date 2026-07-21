# Chapter 3 — E-E-A-T for GEO (rooval-roofing.com)

Applies Michael Jacobs' GEO book Chapter 3 to the roofing site. Diagnostic chapters 1–2
are done (retrievable-not-yet-cited; entity merged + DOPL credential in schema). Chapter 3
is the **trust/authority content layer** — the visible, passage-extractable E-E-A-T signals
an AI engine can lift, plus the author-entity cleanup. Ran through the owner's 7-stage
pipeline (research → plan → plan-review → revise → implement → adversarial panel → revise).

## What shipped (live-verified 2026-07-21, anonymous cache-busted curl)

### 1. Author-entity leak fixed (honesty)
The 2026-07-13 persona scrub changed WP user 1's **display name** to Matthew Thompson but
left the **bio/description** field reading *"Mike Sorensen writes for Rooval Roofing…"* — a
fabricated persona still live on `/author/rooval/` and exposed in the public
`/wp-json/wp/v2/users` endpoint. The pipeline's research caught it (a plain-page copy scan
had missed it). Overwrote user 1's description via REST with a whitelist-facts bio:

> Matthew Thompson is the owner of Rooval Roofing, a licensed Utah roofing contractor based
> in Lehi and serving Utah County and the Salt Lake Valley. He holds a Utah DOPL General
> Building Contractor license (#13861046-5501). Rooval Roofing installs, replaces, and
> repairs roofs and documents storm damage for homeowners across the Wasatch Front.

Verified: zero "Sorensen" on `/author/rooval/` and in the REST users endpoint; author name
= Matthew Thompson. No fabricated tenure, project counts, certifications, or awards.

### 2. G3 — license-verification trust passage (fixes Ch1 gap G3)
Before: the DOPL license number existed only as a footer legal-bar line and in JSON-LD — no
self-contained visible passage telling a homeowner they can verify it. Added a
passage-extractable trust block to `/roof-replacement-utah/` (a plain, REST-writable money
page — see "why not about-us" below): H2 *"Licensed With the State of Utah — and You Can
Check It Yourself"* stating the DOPL GBC license #13861046-5501, why licensing matters
(unlicensed = no recourse), and how to verify it — search license number 13861046-5501 at
Utah's public **License Lookup Verification** tool, secure.utah.gov/llv.

- DOPL lookup URL curl-verified live: `https://secure.utah.gov/llv/search/index.html` → 200,
  title "Search | License Lookup Verification". (`dopl.utah.gov` 403s to automated fetches —
  the secure.utah.gov URL is the correct public tool.)
- **Link-stripping gotcha discovered:** external `<a href>` links inside post content are
  stripped by a `the_content` filter on this site (footer/template external links survive;
  internal links survive; external content links do not). The URL is therefore stated as
  **plain text**, which survives and is fully extractable for an AI engine (the citable value
  is the claim + license # + "verifiable at DOPL", not clickability). Documented for future
  chapters — do not attempt clickable external links in body content here.

### 3. G4 — workmanship-warranty passage (fixes Ch1 gap G4)
Before: "workmanship warranty" appeared only as scattered one-line phrases; no heading or
explanatory passage anywhere. Added H2 *"Our Workmanship Warranty, in Plain Terms"* to
`/roof-replacement-utah/`: the roofs we install/replace are backed by the workmanship
warranty (coverage of installation quality, distinct from the manufacturer's material
warranty), why that distinction matters (most leaks are installation-driven, which material
warranties don't cover), and the buyer-education implication (ask any roofer for their
workmanship warranty in writing). **No duration stated** (hard owner rule — never "15-year").
Constrained to owner-confirmed substance only; scope/remedy extensions are in OWNER-CONFIRM.

### 4. Original data distributed as a citation magnet (Ch 3.2)
The site's original-data-as-primary-source — the NOAA/NCEI Utah storm-history page
(`/storm-damage-roof-history-utah/`, page 2991) — was **orphaned**: zero inbound links from
the homepage, about, or any service/city page (only the 3 storm-cluster pages linked it).
Added a source-named cross-link sentence to the three non-linking money pages
(`/roof-repair-utah/`, `/roof-replacement-utah/`, `/metal-roofing-utah/`) pointing to the
storm report and naming NOAA/NCEI as the source. This is the book's "distribute your original
data for citation reach" move — leveraging existing published data, **no new data collection**
(owner deferred that; "site first").

## Deliberately NOT done / deviations
- **about-us (page 40) was the plan's primary home for G3/G4, but it is an Elementor page and
  the plan's assumed anchor string ('Hire a Licensed Contractor') does not exist** — the
  hardened str_replace guard would have safely aborted. Rather than force a fiddly, flaky
  Elementor `_elementor_data` edit in autonomous mode, the passages went to the plain,
  REST-writable `/roof-replacement-utah/` money page — equally prominent, arguably more
  contextually relevant to license-trust and warranty questions, and reliably deployed. The
  about-us thin mission-copy remains flagged for Chapter 5. Adding a compact trust callout to
  about-us via the Elementor mechanism is an available follow-up if the owner wants it there too.
- No schema/entity changes (Ch2 complete) — verified `hasCredential` "Utah DOPL Contractor
  License #13861046-5501" still live and unchanged.
- No new first-person "we specifically do X" operational claims beyond the owner-confirmed
  G3/G4 substance.
- Insurance guardrail: the previously-flagged "we walk you through the claims process… you
  file the claim" phrase on the cost page is **owner-approved** per
  CHANGELOG-2026-07-14-insurance-messaging-reversal.md (verified present) — NOT a violation,
  left untouched. The only hard line remains deductible-waiving / "free roof".

## OWNER-CONFIRM list
1. **One-time DOPL lookup confirmation** (nice-to-have, not blocking): the license is real,
   published in the footer and schema, and appears as a verifiable claim on the page. When
   convenient, search 13861046 / 5501 at secure.utah.gov/llv (it has a reCAPTCHA an agent
   can't solve) to confirm the public record displays as active. If it shows anything
   unexpected, tell me and I'll adjust the passage.
2. **G4 warranty scope/remedy** — the live passage is constrained to what's confirmed. If you
   want to add (a) that the warranty also covers repair jobs, and/or (b) a remedy line ("if a
   problem traces back to our work, we come back and make it right"), confirm and I'll add it.
3. Optional: put the G3/G4 passages (or a compact version) on **about-us** too, via the
   Elementor edit mechanism.

## Carries to Ch4 / Ch5
- **Ch4 (Entity/Authority):** entity recognition remains the #1 citability gap (Ch1 brand
  query cited a competitor). The merged #organization node + DOPL credential + GBP sameAs
  (Ch2) and the license-verification passage (Ch3) all strengthen the entity — Ch4 measures
  topical authority and third-party citations.
- **Ch5 (Content Strategy):** G1 (metal-roof $ project range), G2 (how-to-choose-a-roofer
  passage), G5 (emergency availability on city pages), G6 (inconsistent timelines across
  pages), plus the thin about-us mission copy — all Chapter 5.

## Rollback
- Author bio: `geo-book/backups/ch3/` has no bio file, but the before-value is recorded in
  scratchpad `ch3-baselines/user1-bio-before.txt`; restore via REST POST to users/1.
- Page content (2778/2779/2654): pre-edit raw in `geo-book/backups/ch3/page-*.raw.html`;
  restore via REST POST {content}.
- All changes additive and reversible; zero schema/template changes.
