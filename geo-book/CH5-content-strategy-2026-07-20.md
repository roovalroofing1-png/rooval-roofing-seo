# Chapter 5 — GEO Content Strategy & Production (rooval-roofing.com)

Applies Michael Jacobs' GEO book Chapter 5 to the roofing site. This is the content-build
chapter — it fixes the Ch1 fan-out gaps and the Ch4 topical-cluster map on the live site,
every edit shaped by the book's passage-extraction + claim-density method (codified in
`GEO-EDITORIAL-CHECKLIST.md`). Ran the owner's 7-stage pipeline. Prefer fixing existing pages
over building new ones (new pages = thin-content risk + capability claims).

## Shipped (live-verified 2026-07-21, anonymous cache-busted curl, whole-page diffs)

### G1 — metal-roof dollar anchor  ✅
`/metal-roofing-utah/` stated only "two to three times the upfront cost of asphalt" with no
dollar figure. Added a paragraph grounding that in the site's own confirmed numbers: asphalt is
$20,000–$30,000 installed on a typical Utah home, metal is commonly two to three times that,
"we measure your roof and put the exact number in writing." **No per-unit rate, no invented
metal figure** — the derived $40k floor / $90k literal-math ceiling are both withheld to
OWNER-CONFIRM (the honest move: a wide 2–3× band is a relationship, not a quote).

### G2 — surface the how-to-choose guide  ✅
The "how to choose a roofing contractor in Utah" post is live but wasn't linked from money/near-me
pages. Added one contextual internal link (license verification / questions to ask / red flags)
to 11 plain service/cost pages. Internal links survive the content filter.

### G6 — sitewide timeline reconciliation  ✅ (the highest-value fix)
Roof-replacement timeline **contradicted itself three ways**: city FAQs said "single day," the
homepage said "1–3 days," the cost page said "1–2 days." An AI reconciling passages saw a
conflict. Reconciled everything to the cost page's honest answer — **1–2 days, longer for
larger/steeper/complex roofs**:
- WPCode snippet 2621 (feeds all 16 city pages' visible FAQ *and* their FAQPage JSON-LD from one
  `$aT` variable — so one edit synced both): "single day" → "1–2 days…". White-screen guard
  passed; all city pages render.
- Homepage 1723 `_elementor_data`: "within 1–3 days" → "in 1–2 days" (REST meta write + a
  now-deactivated run-once Elementor cache-clear snippet).
- Cost page 2950 (1–2 days) was the untouched truth anchor.
- Sitewide sweep confirms zero surviving contradictions.

### Repo artifacts  ✅
- `GEO-EDITORIAL-CHECKLIST.md` — reusable quality gate for all future content.
- This doc; snippet 2621 mirror + homepage backup committed.

## Staged (the one remaining Ch5 gap)

### G5 — emergency availability on city pages  ✅ DONE (2026-07-21)
Added a passage-extractable "Emergency Roof Repair in {City}" block to all 12 Elementor city
pages (Alpine, Highland, Lindon, Pleasant Grove, Springville, Salt Lake City, Murray, Sandy,
Orem, Draper, Provo, Lehi), built from the roof-repair page's owner-approved wording: active
leaks -> call (385) 424-8810 (tap-to-call), same-day/next-day, tarp/temporary-seal first, then
permanent repair. Asserts nothing new (emergency is an existing service). Mechanism: REST
`_elementor_data` string insert before the `<h2>Nearby Cities We Serve</h2>` full-tag anchor
(idempotency-guarded, JSON-validated) + a run-once Elementor cache-clear snippet (deactivated
after firing). Verified live: 12/12 render the block, single H1, tap-to-call present, no fatal
error, anchor preserved. Rollback: pre-edit `_elementor_data` per page in scratchpad
`g5-backups/elementor-{id}.json` (full blobs not committed per repo policy).

--- superseded staged note below ---
### G5 (superseded staged note)  ⏳ was NOT YET DONE
The emergency/same-day passage lives on `/roof-repair-utah/` ("usually same day or next day…
we tarp or temporarily seal first"), and all 16 city pages already **link** to it — so the
capability is stated and reachable, nothing new is asserted. The gap is a self-contained,
passage-extractable emergency block **on the 11 Elementor city pages themselves** (the 4 July
plain city pages + Highland already carry bespoke same-day prose), so an AI answering "emergency
roof repair {city}" finds the answer on the city page, not one hop away. Deferred as the last,
highest-risk step (11 Elementor `_elementor_data` edits) — to be done via the same REST +
cache-clear mechanism just proven on the homepage, with per-page whole-page-diff verification.
Low urgency (content exists + is linked); it's a passage-placement optimization.

## 5.1 GEO content audit — FIX / KEEP / BUILD

| Cluster | Pages | Verdict |
|---|---|---|
| Cost | replacement-cost (ranks pos 3–6, best on site), + G1 metal $ | KEEP + FIXED (G1) |
| Storm | 4 storm pages + NOAA data + posts | KEEP (strong; matches AI-citation pattern) |
| Local/city | 16 city pages | FIXED (G6 timeline; G5 emergency staged); depth still thin (pos 8–23) |
| Trust/how-to-choose | how-to-choose post + license/warranty passages (Ch3) | FIXED (G2 surfacing) |
| Materials | metal (+G1), TPO | THIN — no asphalt-shingle page |
| **Commercial / tile / slate / asphalt-shingle / new-construction** | none | **BUILD — but OWNER-GATED** (see below) |

## Content-types by GEO citation probability (roofing, grounded in project findings)
1. **Cost / "quick answer" pages** — highest (2950 ranks 3–6; the "Quick answer:" pattern is
   directly liftable).
2. **Comparison & how-to-choose guides** — high (decision content AI engines quote).
3. **Service pages with extractable passages** (license, warranty, emergency, timeline).
4. **City pages** — mid (local intent, but thin depth).
5. Thin material stubs — lowest.
(Refuted levers per the hype filter: FAQ-schema-as-amplifier, llms.txt, "schema = 2.8×".)

## OWNER-CONFIRM — capability & pricing gates
1. **New cluster pages need a capability yes/no**: does Rooval do **commercial/industrial**
   roofing? **tile**? **slate**? **new-construction**? **asphalt-shingle** as its own page? Each
   has proven GSC demand (Ch4) — but building a page asserts you perform that work. Confirm which,
   and I'll build them (highest demand: commercial — "commercial roofers near me" ranks pos 1.0
   with real impressions and zero supply).
2. **Metal dollar figure**: OK to publish a metal *project range* (e.g. off the $20–30k asphalt
   base × 2–3×)? If yes, give the range you're comfortable quoting and it ships; today the page
   states only the relationship.
3. **G5 placement**: proceed with the emergency block on the 11 Elementor city pages? (Staged.)

## Carries to Ch6 (Measurement)
The X/13 citation scoreboard + roof-14/15 entity probes (Ch4) + the GA4 AI-Assistants channel
(ready) are the measurement stack. Ch6 formalizes reporting, the freshness/update workflow, and
the four-failure diagnostic — and will track whether these Ch5 content fixes move the citation
needle at the next monthly run.
