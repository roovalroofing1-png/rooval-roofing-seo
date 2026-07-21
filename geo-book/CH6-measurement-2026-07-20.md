# Chapter 6 — Measuring GEO Performance (rooval-roofing.com)

Applies Michael Jacobs' GEO book Chapter 6 to the roofing site. This is the **final** chapter of
the chapter-by-chapter application, and it is deliberately a *measurement + documentation* chapter,
not a content-build one: it formalizes the measurement stack already assembled across Ch1–Ch5,
turns the book's four-failure diagnostic into a repeatable checklist, ships one live GA4 config
change, and closes the program with an honest "what's done / what recurs / what's still owner-gated"
summary. Ran the owner's 7-stage pipeline (research → plan → plan-review → revise → implement →
adversarial panel → revise). **No live-site content changed.** Every self-citation below was
verified against the source file before writing (the plan flagged two known drift risks — the
"24/30" figure and the "#1-driver" line reference — both checked in CH1 directly).

---

## 6.1 The measurement stack (why standard SEO metrics under-measure GEO)

Standard SEO metrics — rankings and clicks — **under-measure GEO** because an AI engine can *cite*
Rooval without ever sending a click. Chapter 1 framed the whole program as a formula:

> **citation rate ≈ retrieval rate × extractability × trust** (CH1 §1)

Rankings measure only one input to that formula, and clicks measure a *different* outcome entirely.
The project already saw the gap live: at the 2026-07-17 re-check, `/roof-repair-utah/` was **named
and linked** in an AI-style answer for a hail-repair query (roof-04) at SERP position ~8 — a
citation, not necessarily a click. GA4's own referral tracking will always **UNDERCOUNT** this:
per `geo-intel/MEASUREMENT.md` (Layer 2), *"a lot of AI traffic arrives as 'direct' (no referrer).
Treat it as directional, floor-not-ceiling."* So GEO needs its own scoreboard on top of GSC.

The stack has three layers (all $0 except the opt-in Layer 3):

**Layer 1 — the X/13 monthly citation scoreboard.** The fixed 13-prompt set lives in
`geo-intel/config/roofing-prompts.yaml` (`roof-01`…`roof-13`), across five clusters:
- **local-pick** — roof-01/02/03 (best roofer Lehi / new roof Utah County / top-rated near me)
- **storm** — roof-04/05/06 (hail / wind / emergency storm)
- **cost** — roof-07/08 (replacement cost / repair cost)
- **howto-trust** — roof-09/10/11 (spot hail damage / document storm damage / choose a contractor)
- **materials** — roof-12/13 (metal vs asphalt / TPO cost)

Method (per MEASUREMENT.md): run the same list each month, record who is named/cited. Baselines so
far: **0/13** on 2026-07-13 (clean day-0 zero) → **1/13** on 2026-07-17 (storm moved `none → weak`,
roof-04). The **denominator stays X/13 forever**; do not add prompts to the core set. Cadence is the
**first Monday of each month**; the next scheduled run is **Aug 3, 2026**. Do not re-run early — an
ad-hoc run corrupts the month-over-month time series.

**Layer 1b — entity-recognition probes (scored SEPARATELY).** `roof-14` ("What does Rooval Roofing
in Lehi Utah do?") and `roof-15` ("Is Rooval Roofing in Lehi Utah legit and licensed?") were added
in Ch4 (cluster `entity`). They measure *description* quality, not citation rate — scored on their
own line as correct-description (y/n), licensed-stated (y/n), competitor-substitution (y/n) — and are
**never folded into the /13 denominator** (hard rule, per the yaml comment block + MEASUREMENT.md).
Baseline 2026-07-21: both probes surface rooval-roofing.com with a correct description and no
competitor substitution; roof-15 surfaced the DOPL license. **Caveat (carry every time):** this is a
*WebSearch proxy, not a live ChatGPT/Perplexity session* — directional only.

**Layer 2 — GA4 AI-referral tracking (LIVE as of 2026-07-21).** This chapter's one live action:
created a GA4 custom channel group **"Channels incl. AI Assistants"** on the roofing property
(confirmed by Measurement ID **G-7D5VK6JDVE** on the data stream — not a hardcoded property id),
with a single channel **"AI Assistants" at position 1** (first-match-wins) whose condition is
`Source` **partially matches regex**
`chatgpt\.com|chat\.openai\.com|perplexity\.ai|copilot\.microsoft\.com|gemini\.google\.com|claude\.ai|you\.com|poe\.com`.
Read it monthly at **Reports → Acquisition → Traffic acquisition**, switch the channel-group
selector to "Channels incl. AI Assistants", read the "AI Assistants" row's sessions. Zero sessions
is not a failure — it's the expected floor early, and it undercounts (direct-attributed AI traffic
is invisible). The deck sister-site's identical group was the proven template. *Negative-scope note:
no data stream, tag, retention setting, or the default channel group was modified; the deck property
(545257820) was never opened.*

**Layer 3 — automated API tracker (NOT built, owner opt-in).** Paid engine APIs (~$10–30/mo) for
true per-engine citations. Owner chose not to spend; stays a future upgrade. **The book's "Byline
GEO Analyzer" is the author's own paid product — explicitly SKIPPED.** The $0 manual scoreboard +
free GA4 layer replace it.

---

## 6.2 The four-failure diagnostic (a repeatable checklist)

The book's Chapter 6.2 diagnostic sorts any "why aren't we cited?" question into **four failure
categories**. Run these four rows *in order* — a lower row rarely matters if a higher one is failing.
Populated from the Ch1–Ch5 findings:

### ACCESS — can the engine fetch the page and see the answer? → **PASS**
- Re-verified live 2026-07-21: all six live-answer crawler UAs return **200**
  (OAI-SearchBot, PerplexityBot, ClaudeBot, Google-Extended, Googlebot, Bingbot); content is
  server-rendered (answer copy in the raw HTML); robots.txt open.
- The **only** loss: `GPTBot/1.1` (OpenAI's training/index crawl) and `meta-externalagent` (Meta AI)
  return **429** at the Hostinger origin — a fleet-wide signature block the owner escalated 2026-07-17
  and Hostinger declined to exempt. **Permanent, bounded, not fixable site-side** (OAI-SearchBot,
  ChatGPT Search's *live* fetcher, still gets 200, so ChatGPT can still cite in real time).
- **Re-check command:** the 8 `curl -A <UA>` probes from Ch1 §2.2 (cited, not re-run this chapter —
  do not re-probe GPTBot, per method rule).

### STRUCTURE — once fetched, is the answer extractable as a self-contained passage? → **STRONG**
- CH1's query fan-out found **~24 of 30** sub-questions already had a self-contained,
  passage-extractable answer.¹
- Ch5 closed the open passage gaps: **G1** (metal-roof dollar grounding), **G2** (how-to-choose
  internal links on 11 money/near-me pages), **G5** (per-city emergency block on 11 Elementor city
  pages — Highland excepted, its intro already covered same-day), **G6** (sitewide timeline
  reconciliation to "1–2 days"). The G6 fix also **synced schema to visible copy**: WPCode snippet
  2621 drives *both* the visible FAQ accordion and the FAQPage JSON-LD for the city pages from one
  shared `$aT` variable, so one edit kept both in step.
- **Still open (scoped precisely):** CH2 logged ~9 FAQPage blocks with inconsistent/missing `@id`
  — that is a *separate* structural item and was **not** closed by the G6 timeline sync. Left as-is
  (snippet 2621 is white-screen-risk PHP; touch only for a real drift/compliance issue).
- **Re-check:** re-run the fan-out map from CH1 §4 against the live HTML for any new head query.

### AUTHORITY — is Rooval a trusted entity/source for the claim? → **CONSOLIDATED (3 owner items open)**
- One business entity: both on-site JSON-LD emitters share `@id https://rooval-roofing.com/#organization`
  (Ch2); Ch4's NAP audit across 6 controlled properties found **0 present-and-conflicting fields**.
- `hasCredential` = the DOPL GBC license #13861046-5501 (Ch2); a visible license-verify passage +
  workmanship-warranty passage on `/roof-replacement-utah/` (Ch3); the persona leak ("Mike Sorensen")
  scrubbed from the author bio (Ch3).
- `sameAs` (3): Facebook, the deck sister-site, and the verified GBP Maps URL — bidirectional with
  the deck. Entity probes (roof-14/15) now describe Rooval correctly (proxy caveat attached).
- Where reviews come up, this doc refers only to **the `reviewCount` schema field** — no numeric
  count in prose (the live schema and a stale repo asset disagree on the number, and the number adds
  no diagnostic value; restating either unverified would violate the honesty rule).
- **Open owner items (flagged, not chapter findings):** Bing Places listing does not exist yet
  (the one genuine engine-level sameAs gap); Yelp listing exists but claim-status is unverifiable to
  read-only tools; and an unresolved **hours contradiction** — schema (Rank Math Local SEO) emits
  Mon–Sun 09:00–17:00 while GBP publicly shows "Open 24 hours" (CH2 §3). An entity resolver can
  notice two published hours for one business; owner picks the right one, then schema is aligned.

### COVERAGE — is there a page at all for the query's topic? → **THE GAP (yellow)**
- Ch4's cluster map: **local/city** strong-breadth / thin-depth; **storm** strong; **cost** moderate;
  **materials** thin (metal has a $ grounding now, TPO exists, but **no asphalt-shingle page; tile and
  slate entirely missing** despite ~200 combined GSC impressions).
- **Missing-with-demand:** commercial/industrial ("commercial roofers near me" ranked pos 1.0 with
  real impressions and zero supply), tile, slate, asphalt-shingle (own page), new-construction.
  **Sourcing note:** the owner confirmed capability for **commercial / tile / slate / asphalt-shingle
  / new-construction** *out-of-band, after Ch5* (Ch1–Ch5 leave this as an open OWNER-CONFIRM gate,
  so it is recorded here as an owner verbal, **not** a documented chapter finding). Building the pages
  is owner-gated content work, listed in the closing summary — not done here.

**How to use it:** any future "why aren't we cited for X?" runs ACCESS → STRUCTURE → AUTHORITY →
COVERAGE, top to bottom, and stops at the first failing row.

---

## 6.3 Reporting & realistic expectations

**Reporting framework.** The monthly owner-readable report is `geo-book/GEO-MONTHLY-REPORT-TEMPLATE.md`
— plain business language, every metric with a one-line "what this means." It combines the X/13
scoreboard, the entity-probe line, GA4 "AI Assistants" sessions, and the four-failure status.

**Realistic expectations (reuse these; do not soften or inflate).**
- **Citations lag content by weeks-to-months.** Zero early is the correct reading — crawl + index
  lag is real. Any move off `none` is attributable signal because the baseline was a clean zero.
- **The #1 citation driver is ordinary Google ranking**, not schema and not llms.txt: *"plain search
  rank is the #1 citation driver. Rooval ranks page-2 for most money terms; that alone suppresses
  citation"* (CH1 §5). So **the SEO program IS the GEO program** — GEO progress tracks SEO progress.
  Recent GSC (2026-07-17 sweep): ~19.7K impressions / 28d, avg position ~17.5, 34 pages indexed.
- **The storm cluster moves first** (dedicated pages, no directory moat) — predicted on 2026-07-13,
  confirmed 2026-07-17 (roof-04, none→weak). **local-pick and cost move slowest** — directory/
  aggregator-gated (Angi, Yelp, BBB, GAF, HomeAdvisor), which owned pages alone won't dislodge.
- **Current standing, stated plainly: 1/13.** This is a lagging, monthly-tracked outcome — not an
  achieved win, and not a "page 1 in 30 days" promise.

**Competitive benchmarking (light, built into the same runs).** The X/13 prompts already record
*which domains* are cited per prompt, so month-over-month you get a share-of-citation view. Named
competitors from prior research: **roofmonster.com** (won the metal-vs-asphalt citation, P5),
**vertexroofingslc.com** (cross-query authority winner, ~50 pages / 132 posts incl. dedicated
warranty/FAQ/emergency/commercial), and **Lehi Elite Roofing** (the entity a brand probe cited
instead of Rooval, P6). Where a competitor markets around insurance-claims assistance, that is
recorded **neutrally** ("competitor markets around insurance-claims assistance") — Rooval never
mirrors claims-handling language and this doc never reproduces a competitor's claims-marketing
verbatim (insurance-messaging rule).

**Refutations carried forward (do not chase):** llms.txt is refuted as a lever (deployed via WPCode
3107, inert — leave it, don't tout it); "FAQ schema = 2.8× / citation amplifier" is refuted (Google
retired FAQ rich results for most sites May 2026 — FAQPage kept only for AI-retrieval structure);
Reddit (most-cited domain in AI answers) and YouTube are relevant to coverage but **owner-gated,
genuine-participation only** — never spam or fake reviews. The single biggest risk to avoid: mass
thin AI-generated content.

---

## Closing summary — the GEO program, Ch1–Ch6

| Ch | Focus | Headline outcome |
|---|---|---|
| **1** | Diagnosis | Verdict **RETRIEVABLE-BUT-NOT-YET-CITED**; established gaps G1–G6 + the fan-out map; first live snapshot 0/3 in Perplexity. Diagnostic only — no live change. |
| **2** | Technical / schema | Found the @id merge + reviewCount already resolved (stale premise); shipped 2 live schema enrichments (DOPL `hasCredential`, GBP `sameAs`). |
| **3** | E-E-A-T content | Scrubbed a persona leak in the author bio; added visible license-verify + workmanship-warranty passages; cross-linked the orphaned NOAA storm-data page. |
| **4** | Entity & authority | Audit chapter, no fix needed — 0 conflicting NAP fields across 6 properties; produced the cluster map (the Ch5 build queue); added the roof-14/15 entity probes. |
| **5** | Content build | Fixed G1/G2/G6 and G5 (per-city emergency); the timeline reconciliation was the highest-value fix. |
| **6** | Measurement | This chapter — formalized the stack, built the four-failure checklist, shipped the GA4 AI-Assistants channel, set honest expectations. |

**What recurs monthly (first Monday; next run Aug 3, 2026):**
1. Run the X/13 scoreboard, log a dated `geo-intel/data/geo-baseline-YYYY-MM-DD.md`, commit.
2. Score the roof-14/15 entity probes on their separate line.
3. Read GA4 "AI Assistants" channel-group sessions (floor, not ceiling).
4. Re-scan the four-failure checklist if the score stalls.
5. Fill `GEO-MONTHLY-REPORT-TEMPLATE.md` for the owner.

**What remains owner-gated (not agent work):** build the owner-confirmed commercial / tile / slate /
asphalt-shingle / new-construction pages (with real, non-reused photos); publish the metal-roof
project range; create a Bing Places listing and confirm the Yelp claim (then they become sameAs
candidates); resolve the schema-vs-GBP hours contradiction.

**Bottom line:** the GEO program's real wins across Ch1–Ch6 are correctness, structure, authority,
and a measurement *habit* — not an instant ranking jump. Results are a lagging, monthly-tracked
outcome, currently **1/13**, expected to climb as ordinary Google rankings improve.

---
¹ CH1 §4 states the headline figure as "~24 of 30." Its own itemized fan-out lists **26**
sub-questions (Q1 = 8, Q2 = 8, Q3 = 10); the "24/30" is CH1's stated headline and is quoted as such
rather than re-derived to a different number.
