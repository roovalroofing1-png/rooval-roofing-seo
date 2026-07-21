# Chapter 1 — How Generative Search Actually Works: Diagnosis for rooval-roofing.com

**Date:** 2026-07-20 · **Book:** M. Jacobs, *Generative Engine Optimization (GEO): The SEO Practitioner's Playbook for Ranking in AI Search*, Ch. 1 · **Scope:** roofing site only.

This is a **diagnostic** chapter, not a build chapter. No live-site change was made producing it — this committed document is the only artifact. It measures the current state through Chapter 1's lens and hands a work-order to Chapters 2–6.

> Method note: all HTML/JSON-LD evidence gathered with raw `curl` (never a markdown fetcher — those strip `<script>` and have produced false "schema missing" findings here). Content matched with `python3 re` + `html.unescape`, not `grep`. Live citation snapshot run in Perplexity (the book's §1.2 recommended diagnostic instrument) in a fresh browser tab, deliberately **not** navigating to rooval-roofing.com in the analytics-authenticated session.

---

## 1. What Chapter 1 asks

The book frames an AI answer as a two-gate pipeline: a query is **fanned out** into sub-questions, each sub-question **retrieves** candidate passages from an index, and the engine **cites** the passages it trusts. So:

> **citation rate ≈ retrieval rate × extractability × trust**

- **Retrievable** = the engine's crawler can fetch the page and the answer text is in the served HTML (not injected later by JS).
- **Citable** = once retrieved, the passage is specific, self-contained, and comes from a source the engine treats as authoritative for that claim.

Chapter 1's job is to locate *which gate* is failing, because that decides everything downstream. Fixing retrieval when the problem is trust wastes the whole program.

---

## 2. Retrievability audit — 2026-07-20

### 2.1 Content is server-rendered (no JS-visibility problem)

Seven representative pages fetched with a plain browser UA (`?cb=` cache-bust; home fetched at the single-slash canonical — `//` 301s). Every page serves its real body copy in the initial HTML:

| Page | HTTP | Body words in raw HTML | H1 (decoded) | JSON-LD blocks | FAQPage |
|---|---|---|---|---|---|
| homepage | 200 | 1,608 | Lehi & Utah County Roofing Contractor | 3 | yes |
| /roofing-provo-utah/ | 200 | 1,898 | (city H1) | 3 | yes |
| /roof-repair-utah/ | 200 | 1,666 | (service H1) | 3 | yes |
| /roof-replacement-cost-utah/ | 200 | 1,628 | (cost H1) | 4 | yes |
| /hail-damage-repair-utah/ | 200 | 1,587 | (storm H1) | 3 | yes |
| metal-roof-vs-asphalt post | 200 | 2,503 | (post H1) | 3 | yes |

The cost page's headline passage — *"Most roof replacements on a typical Utah home run about $20,000 to $30,000 in 2026, installed and including tear-off"* — is present verbatim (after tag/whitespace normalization). **Flying Scripts** delays only *third-party* scripts into `data:` base64 URIs for anon visitors; the page **copy** is ordinary server HTML. **Verdict: retrievability of content is not a problem.**

### 2.2 AI crawler access matrix

One polite run (not repeated — the block is known and owner-escalated):

| Crawler | Status | Meaning |
|---|---|---|
| **GPTBot/1.1** (OpenAI train/index) | **429** | Blocked — Hostinger origin fleet rule |
| **meta-externalagent/1.1** (Meta AI) | **429** | Blocked — *same signature block, newly observed* |
| GPTBot/2.0 | 200 | reaches site |
| OAI-SearchBot (ChatGPT Search live-fetch) | 200 | **ChatGPT can still cite live** |
| ChatGPT-User | 200 | reaches site |
| PerplexityBot | 200 | reaches site |
| ClaudeBot / Claude-User | 200 | reaches site |
| Google-Extended | 200 | reaches site |
| Googlebot / Bingbot | 200 | reaches site |
| plain browser | 200 | reaches site |

**Characterization:** the only retrieval loss is **GPTBot's training/index crawl** and **Meta's AI crawler** — both caught by a version-specific signature block at Hostinger origin (hCDN inactive on roofing, so it is origin infra, not a CDN edge). The owner escalated this to Hostinger on 2026-07-17; they conceded the signature block but refused a per-site exception (fleet-wide rule). **It is not fixable site-side and no fix is attempted here.** Its GEO impact is bounded: OAI-SearchBot (ChatGPT Search's live fetcher) returns 200, so ChatGPT can still retrieve and cite Rooval in real time; what is lost is GPTBot's *offline index* and Meta AI training. robots.txt is generic (allows all). llms.txt is live (WPCode 3107) — see §6 on why that is inert, not a lever.

---

## 3. Citability baseline — live Perplexity snapshot, 2026-07-20

Perplexity used as the book's §1.2 diagnostic instrument. This is a **Ch1 diagnostic snapshot, not a new official baseline** — the monthly 13-prompt cadence (`geo-intel/config/roofing-prompts.yaml`) stays on its Aug-3 schedule (last: 0/13 on 07-13, 1/13 on 07-17 via web-search proxy).

| # | Query (matrix id) | Answer shape | Rooval cited? | Who/what was cited instead |
|---|---|---|---|---|
| P6 | "What does Rooval Roofing in Lehi Utah do?" (brand probe) | prose synthesis | **NO** | competitor *Lehi Elite Roofing*, Facebook, Birdeye reviews |
| P1 | "Utah hail damage roof repair who to call" (roof-04) | **Places/local-pack** | **NO** | The Roof Doctor, EZ Roofing, Nelson, Signature, S&S — all higher-review SLC-area |
| P5 | "metal roofing vs asphalt shingles Utah" (roof-12) | comparison synthesis | **NO** | *roofmonster*, *homerroofing* (competitor content pages giving concrete $ ranges) |

**Live result: 0/3 cited.** Each miss is diagnostic, and each maps to a *different* gate — which is the most useful thing Chapter 1 could surface:

- **P6 (brand) →** an engine asked about Rooval *by name* still would not treat rooval-roofing.com as the authority on Rooval; it synthesized from a competitor, Facebook, and a review aggregator, and introduced facts Rooval does not control (e.g. "financing options," "Payson to Salt Lake City"). This is an **entity-recognition** failure → **Chapter 4**.
- **P1 (who-to-call) →** resolved to a **Places widget** ranked by review count + proximity. Rooval (5.0, Lehi, fewer reviews than SLC incumbents) did not make the list. This gate is **GBP prominence / local-pack**, a local-SEO lever, *not* a content lever — important to name so later chapters don't try to fix it with copy.
- **P5 (comparison) →** the cited competitors won because they publish **specific dollar amounts**; Rooval's metal page gives only a relative multiple ("two to three times asphalt"). This is exactly gap **G1** below and the book's "claim density / specific numbers get cited" thesis, proven live → **Chapter 5**.

Contrast with retrievability: a plain web search for *"roof repair Lehi Utah cost emergency"* (run during research) **did** surface `/roof-repair-utah/` and quoted its repair-cost FAQ verbatim — proof the passage is both retrieved *and* extractable when the query shape favors an owned informational page. So Rooval **can** be cited; the misses are trust/specificity/prominence, not reach.

---

## 4. Query fan-out map (feeds Chapter 5)

Three head queries decomposed into the sub-questions an answer engine fans out to, each checked against live server HTML. **~24 of 30 sub-questions already have a self-contained, passage-extractable answer** — coverage is genuinely strong.

**Q1 "roofers near me" (Utah County):** (a) service area ✅ 16 city pages · (b) licensed/insured ⚠️ footer line only, no passage (G3) · (c) reviews ✅ Google 5.0 widget server-rendered · (d) cost ✅ cost-page $20–30k range · (e) free inspection ✅ dedicated page + FAQ · (f) emergency ✅ on /roof-repair-utah/ only · (g) how to choose a roofer ❌ (G2) · (h) warranty ❌ (G4)

**Q2 "roof repair {Lehi/Provo}":** (a) local presence ✅ · (b) repair cost ✅ · (c) repair-vs-replace ✅ · (d) emergency in-city ❌ (G5 — city pages have no same-day passage) · (e) storm+insurance ✅ (compliant: "no roofer can promise coverage… you file the claim") · (f) how fast ⚠️ inconsistent (G6) · (g) common local roof problems ✅ · (h) roof age ✅

**Q3 "metal roof cost Utah":** cost specificity ❌ (G1) · lifespan ✅ · climate fit ✅ · profiles ✅ · vs-asphalt ✅ · install/permit ✅ · financing ✅ · warranty ⚠️ (G4) · noise/myths ✅ · resale ✅

### The six gaps

| Gap | What's missing | Compliant fix (which chapter) |
|---|---|---|
| **G1** | No dollar **project range** for metal roofing anywhere (only "2–3× asphalt"). Competitors win comparison citations by giving concrete numbers. | Add a **total-project** metal range — **never** a per-unit rate. (Ch 5) |
| **G2** | No "how to choose / vet a roofer" passage — a core "near me" fan-out branch (license check, questions to ask, red flags). | New passage/FAQ. (Ch 5) |
| **G3** | DOPL license #13861046-5501 exists only as a sitewide footer line — no extractable passage/FAQ stating it with a "verify at DOPL" pointer. | Trust passage. (Ch 3) |
| **G4** | No dedicated **warranty** passage — only scattered "workmanship warranty" phrases. | Warranty passage. (Ch 3/5) |
| **G5** | Emergency/same-day availability lives only on /roof-repair-utah/; city pages have zero emergency passage. | Per-city emergency line. (Ch 5) |
| **G6** | Roof-timeline answers **conflict** across pages ("single day" city FAQ vs "1–2 days" cost vs "1–3 days" home) — an engine reconciling passages sees contradiction. | Reconcile to one honest range sitewide. (Ch 5) |

---

## 5. The Chapter 1 verdict

**Rooval Roofing is RETRIEVABLE-BUT-NOT-YET-CITED.** Retrieval is not the bottleneck: content is server-rendered, robots is open, and every live-answer crawler (OAI-SearchBot, PerplexityBot, ClaudeBot, Google-Extended, Bingbot) returns 200. The sole retrieval loss — GPTBot/1.x and Meta AI at Hostinger origin — is permanent, bounded (ChatGPT Search still fetches live), and not fixable site-side.

The citation shortfall (0/3 live today; 1/13 on the last proxy baseline) is driven by three *trust/prominence* gates, not reach:

1. **Ordinary Google ranking (~pos 20).** The project's own verified finding — and the book's — is that plain search rank is the #1 citation driver. Rooval ranks page-2 for most money terms; that alone suppresses citation. → the whole SEO program still matters.
2. **Specificity / claim density.** Where Rooval loses informational citations (metal vs asphalt), it's because competitors publish concrete numbers and Rooval publishes a relative multiple. → G1 and Chapter 5.
3. **Entity recognition + local prominence.** Rooval isn't yet a self-authoritative entity (brand query cites a competitor), and "who to call" queries resolve to a GBP-review-count local pack Rooval doesn't top. → Chapter 4 (entity) + ongoing GBP/review work (not a content lever).

**Implication for sequencing:** do **not** spend effort on retrieval/crawlability fixes (already solved, minus the unfixable GPTBot block). Spend it on being *cite-worthy* — specificity, entity authority, and the passage gaps — which is exactly what Chapters 2–6 cover.

---

## 6. Work-order into Chapters 2–6

- **Ch 2 (Technical GEO):** mostly a *confirm-clean* pass — verify schema validity/entity markup and Core-Web-Vitals for retrieval; **do not** add llms.txt work (already live via 3107, and this project's adversarial research **refuted** it as a lever — it stays deployed as inert/harmless, not a defect). Treat "FAQ schema = citation amplifier" as refuted too: keep schema because it's cheap, don't expect magic. Real Ch-2 item to log: the **two competing RoofingContractor entities** + `reviewCount` 17-vs-31 (needs owner's true count) — carry to Ch 4.
- **Ch 3 (E-E-A-T):** G3 (license passage w/ DOPL-verify pointer) + G4 (warranty passage); author = the real owner Matthew Thompson (never the scrubbed "Mike Sorensen" persona).
- **Ch 4 (Entity/Authority):** the brand-query miss is the headline — consolidate the duplicate business entities to one canonical `@id`, resolve the review-count, strengthen sameAs (GBP/social), and the off-site presence (Reddit/directories are the most-cited domains) that makes Rooval a recognized entity.
- **Ch 5 (Content/Production):** the citation engine room — G1 (metal project range, project-priced only), G2 (choose-a-roofer), G5 (per-city emergency), G6 (reconcile timelines); raise claim density on the money pages so informational queries cite Rooval instead of roofmonster/homerroofing.
- **Ch 6 (Measurement):** the 13-prompt monthly cadence already exists; add a GA4 AI-referral channel like the deck site's, and track the brand-probe citation as a leading entity-recognition indicator.

### Owner rules honored in this diagnosis
No per-unit pricing recommended (G1 fix is explicitly a **total-project** range). No insurance-claims language (storm coverage stays "inspect & document; you file"). No review **count** asserted in copy (17-vs-31 flagged as an open owner question, not resolved). Author is the real owner. Organic only. No live-site change.
