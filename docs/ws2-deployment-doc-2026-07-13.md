# WS2 Deployment Document — Rooval Roofing Rank Push (v3 Final)

All replacement-cost strings below are quoted **byte-for-byte from WPCode snippet 2621** (the FAQ-schema source of truth). **WARNING: the live page BODIES were never synced to 2621** — every rewritten page's body currently carries a stale price figure (live values listed per page) that must be **overwritten** with the 2621 string as part of that page's edit. Re-verify against 2621 and the live FAQ at edit time before pasting anything.

**Post-ID table (required for Elementor `save_builder` / Rank Math updates):**

| Page | Post ID |
|---|---|
| Homepage `/` | 1723 |
| /roofing-sandy-utah/ | 2304 |
| /roofing-highland-utah/ | 2298 |
| /roofing-provo-utah/ | 2310 |
| /roofing-orem-utah/ | 2306 |
| /roofing-lehi-utah/ | 2391 |
| /roofing-murray-utah/ | 2303 |
| /roofing-draper-utah/ | 2308 |
| /roofing-pleasant-grove-utah/ | 2300 |
| /roofing-alpine-utah/ | 2296 |

(/roof-repair-utah/ and /roof-replacement-utah/ receive links only — never opened in an editor, no IDs needed.)

---

### /roofing-sandy-utah/
**Target queries:** roof repair sandy ut (1,000 impr @15.2), roofer sandy ut, roof repair sandy, "which roofing companies in sandy ut…"
**New opening (replaces current opening paragraph — question lead):**
```html
<p>Need roof repair in Sandy, UT? Rooval Roofing repairs hail, wind, and leak damage — and replaces aging roofs — from Sandy's east benches to the valley floor. Free inspections, a 5.0★ Google rating from 33 reviews, and a workmanship warranty on every job. Call <a href="tel:+13854248810">(385) 424-8810</a> or get an <a href="/roof-quote/">instant quote</a> online.</p>
```
(50 words. Current first paragraph moves to second position — not deleted. **Body price line: the live body currently reads "$9,000 and $20,000" — stale. REPLACE it with the 2621 string, byte-for-byte:** "Sandy homeowners typically invest $8,500 to $19,000 in a full roof replacement.")
**Current opening being replaced (first ~40 words, verbatim):** "Sandy sits on the southeast edge of Salt Lake County, where the valley floor tips up into the benchland below the Wasatch and the mouth of Little Cottonwood Canyon. Drive past Dimple Dell Regional Park on a February morning…"
**Title:** KEEP "Sandy UT Roof Repair & Roofing | 5.0★ Rated | Rooval Roofing" (confirm at Step 0)
**Meta description:** Roof repair in Sandy, UT from a 5.0★ Google-rated local crew. Hail, wind & leak repair plus full replacement. Free inspections — call (385) 424-8810. (149 chars)
**Inbound links to add:**
- Homepage -> "roof repair in Sandy, Utah" -> the single homepage services-section sentence (see homepage section): "Homeowners across the valley trust us for [roof repair in Sandy, Utah] and [Provo roof repair and replacement]."
- /roofing-draper-utah/ -> "our Sandy roof repair crew" -> add after Draper's opening: "Just over the city line, [our Sandy roof repair crew] handles the same bench weather on the Salt Lake side." *(Draper already links Sandy from its Nearby Cities list — this deploys as a second, in-body contextual link; does not count toward the 50+ target.)*
- /roofing-murray-utah/ -> "roofing services in Sandy" -> add to Murray's service-area paragraph: "We also provide [roofing services in Sandy] and across the southeast valley." *(Second link — Murray already links Sandy in its Nearby list; not counted.)*

---

### /roofing-highland-utah/
**Target queries:** highland roofing, highland roof repair (page-level cluster)
**New opening:** N/A — **no copy edits of ANY kind.** Links-only nudge; Highland also emits zero new outbound links this cycle. Deploys first, measured tightest.
**Current opening being replaced:** N/A (untouched).
**Title:** KEEP "Highland UT Roof Repair & Roofing | 5.0★ Rated | Rooval Roofing" (confirm at Step 0)
**Meta description:** Highland, UT roof repair & replacement from a 5.0★ Google-rated crew. Built for big homes, steep pitches & mountain weather. Free inspections. (142 chars — Rank Math field only; no page content touched)
**Inbound links to add (SOURCES CHANGED — Alpine, Lehi, and Pleasant Grove already link Highland from their "Nearby Cities We Serve" lists, so the original sources added zero new equity to the flagship links-only page; the three sources below have no existing Highland link):**
- /roofing-orem-utah/ -> "roof repair in Highland" -> add to Orem body: "We also cover [roof repair in Highland] and the north-county bench."
- /roofing-sandy-utah/ -> "roofing in Highland" -> add to Sandy's service-area paragraph: "Across the county line, [roofing in Highland] is part of our service area too."
- /roofing-provo-utah/ -> "Highland roof replacement" -> add to Provo body: "At the county's north end, homeowners call us for [Highland roof replacement] too."

---

### /roofing-provo-utah/
**Target queries:** provo roof repair, provo roof replacement, new roof provo, roof installation provo, provo roofing contractor, "which roofing companies in provo…"
**New opening (statement lead — pairs "repair and replacement" for the conversational query; closer restructured so no two pages share their final 10+ words):**
```html
<p>Rooval Roofing provides roof repair and replacement — plus new-roof installation — across Provo, from brick bungalows in Joaquin to the Edgemont bench and the Riverbottoms. Free inspections, a 5.0★ Google rating (33 reviews), and a workmanship warranty behind the work. Financing available — get an <a href="/roof-quote/">instant quote</a> in minutes or call <a href="tel:+13854248810">(385) 424-8810</a>.</p>
```
(51 words. Hero documentation paragraph stays — live wording is "inspect the roof, photograph anything we find, and hand you the documentation"; do not grep for "inspect, document and fix", that phrase is not on the page. Current first paragraph moves to second position. **Replacement section: the live body currently reads "$10,000 and $18,000" — stale. REPLACE with the 2621 string, byte-for-byte:** "Provo roof replacements typically range from $7,500 to $16,000.")
**Current opening being replaced (first ~40 words, verbatim):** "Provo is the heart of Utah County, and it is not a one-roof town. A brick bungalow in Joaquin, a split-level on the Edgemont bench below Rock Canyon, and a newer build out in the Riverbottoms all age differently…"
**Title:** KEEP — but confirm at Step 0: the July deployment record suggests the live tag may be the "<City> UT Roof Repair & Roofing | 5.0★ Rated | Rooval Roofing" pattern, not the "Provo Roof Repair & Replacement | 5.0★ Rated | Rooval Roofing" string listed here. **KEEP means keep whatever is verified live — do not paste a title over a live value that differs from this doc.**
**Meta description:** Roof repair & replacement in Provo, UT. 5.0★ Google rating, free inspections, financing available. Metal roofing too. Call (385) 424-8810. (138 chars)
**Inbound links to add:**
- Homepage -> "Provo roof repair and replacement" -> same single homepage services-section sentence quoted under Sandy above.
- /roofing-orem-utah/ -> "roof replacement in Provo" -> add to Orem body: "Our crews also handle [roof replacement in Provo], just down State Street." *(Orem already links Provo from its Nearby list — second link, not counted.)*
- /roofing-sandy-utah/ -> "our Provo team" -> add to Sandy's service-area paragraph: "Farther south, [our Provo team] covers Utah County's biggest city."

---

### /roofing-orem-utah/
**Target queries:** roof repair orem, roof replacement orem, roof installation orem, orem roofing company (73 impr @17.6)
**New opening (credential lead — warranty folded into sentence 1, distinct closer):**
```html
<p>Homeowners across Orem — from the lakeside flats to the east bench — call Rooval Roofing, a 5.0★ Google-rated (33 reviews) roofing company, for roof repair, replacement, and new installation, all backed by our workmanship warranty. Financing is available on larger projects. Schedule a free inspection at <a href="tel:+13854248810">(385) 424-8810</a> or start with an <a href="/roof-quote/">instant quote</a>.</p>
```
(53 words. Bench/flats paragraph moves to second position. **Price line: the live body currently reads "$9,000 and $16,000" — stale. REPLACE with the 2621 string, byte-for-byte:** "In Orem, a typical residential roof replacement costs between $7,500 and $17,000.")
**Current opening being replaced (first ~40 words, verbatim):** "Orem stretches across the middle of Utah County, from the shoreline flats near Utah Lake up to the east bench below Mount Timpanogos — and the roofs at either end of town live very different lives. Rooval Roofing repairs, replaces…"
**Title:** **RECONCILE AT STEP 0 — the deployment record and this doc's earlier draft conflict.** The record says the July pattern title "Orem UT Roof Repair & Roofing | 5.0★ Rated | Rooval Roofing" (59 chars) already deployed on Orem; the earlier draft claimed the live tag is still the old "Orem Roof Repair, Inspections & Estimates". Curl the live `<title>` before touching anything.
- If the pattern title is live -> **KEEP.** No edit, no isolated step, no second title change in two weeks.
- If the old title is somehow live -> deploy the pattern title exactly as above (the proven deployed structure). Do **not** use the previously proposed "Orem Roof Repair & Roofing Company | 5.0★ Rated | Rooval" variant — it diverges from the pattern three ways (drops "UT", inserts "Company", trims the brand). Isolated step, timestamped; revert if the 14-day check regresses repair queries.
**Meta description:** Orem roof repair & replacement from a 5.0★ Google-rated roofing company. Free inspections, financing & a workmanship warranty. Call (385) 424-8810. (≤155 chars)
**Inbound links to add:**
- /roofing-pleasant-grove-utah/ -> "Orem roofing company" -> add a **NEW sentence** to PG's body (PG's existing Orem mention is an already-linked "Nearby Cities We Serve" list item — there is no prose sentence to wrap): "Next door, homeowners also count on us as an [Orem roofing company]." *(PG already links Orem from its Nearby list — second link, not counted.)*
- /roofing-draper-utah/ -> "roof installation in Orem" -> add to Draper body: "South of the Point, we also handle [roof installation in Orem]."
- /roofing-murray-utah/ -> "see our Orem page" -> add to Murray body: "Down in Utah County? [See our Orem page]."

---

### /roofing-lehi-utah/
**Target queries:** roof inspection lehi (103 @10.0 — quick win), roof estimate lehi (66 @13.3)
**New opening (PREPEND — do not gut the existing opening; it stays intact directly below. First words reworked so two consecutive paragraphs don't both open with the brand name):**
```html
<p>Get a free roof inspection and written estimate in Lehi from Rooval Roofing. Every inspection covers shingles, flashing, vents, and decking, with photo documentation of what we find — and if a storm hits, we inspect and document the damage so you can file with your insurer. Schedule online anytime or get an <a href="/roof-quote/">instant quote</a>.</p>
```
(54 words. No turnaround promises — "schedule online anytime" only. Insurance phrase is the locked one, verbatim, nothing more. The retained paragraph below still opens "Rooval Roofing works out of Lehi…" — the prepend deliberately does not.)
**Current opening being replaced (first ~40 words, verbatim — retained below the prepend, NOT replaced):** "Rooval Roofing works out of Lehi, right in the middle of Utah County, so the roofs we care for are the ones we drive past every day. From the newer streets climbing Traverse Mountain to the older blocks near the historic Lehi Roller Mills…"
**Title:** KEEP "Lehi Roofing Contractor | Roof Repair & Inspections | Rooval" (confirm at Step 0)
**Meta description:** KEEP current (already has 5.0★): "Lehi's hometown 5.0★ Google-rated roofing contractor. Roof repair, inspections & free estimates from your neighbors. Call (385) 424-8810 today."
**Inbound links to add:**
- Homepage -> "free roof inspections in Lehi" -> placed in a **separate homepage section, NOT the services paragraph** (see homepage section): "And because Lehi is home, we offer [free roof inspections in Lehi] to every neighbor who asks."
- /roofing-draper-utah/ -> "Lehi roofing contractor" -> add to Draper body: "We're based minutes away as a [Lehi roofing contractor], so Draper is close to home base." *(Draper already links Lehi from its Nearby list — second link, not counted.)*
- /roofing-orem-utah/ -> "inspections and estimates in Lehi" -> add to Orem body: "We also offer [inspections and estimates in Lehi], ten minutes up I-15."

---

### / (homepage)
**Target queries:** brand, lehi roofing contractor, utah county roofing contractor
**New opening:** N/A — **no copy change.** Meta-description-first CTR play (this is the only page with clicks; protect it).
**Current opening being replaced:** N/A.
**Title:** KEEP "Lehi & Utah County Roofing Contractor | Rooval Roofing" (confirm at Step 0)
**Meta description:** 5.0★-rated Lehi roofing contractor serving Utah County & the Salt Lake Valley. Roof repair, replacement & metal roofing. Free inspections & instant quote. (154 chars)
**Outbound edits (post 1723 — NOTE: the homepage is an Elementor icon-box layout, NOT the city-page under-hero Text Editor pattern; there is no single "services paragraph." Locate each target widget in the Elementor navigator and record its element ID in the deploy log before editing. Spread the three insertions across three DIFFERENT sections — never more than 2 links in any one paragraph on this page):**
1. Services section — the text/description widget under the "Expert Roofing & Gutter Solutions in Utah" H2, inside the "✧ Roofing Services" sub-block: add ONE sentence (2 links max, and that's the cap for this section): "Homeowners across the valley trust us for [roof repair in Sandy, Utah] and [Provo roof repair and replacement]."
2. A different section (why-choose/about text block): "And because Lehi is home, we offer [free roof inspections in Lehi] to every neighbor who asks."
3. A third, separate section (service-area or closing text block): one sentence containing [roof repair services across Utah] -> /roof-repair-utah/.
**Inbound links to add:** none — homepage is a source-only node this cycle.

---

### /roofing-murray-utah/
**Target queries:** murray roofing, murray ut roofing company (433 impr, 0 clicks @10.5)
**New opening (light tighten — inspection-first lead; "roofing company" added to match the page's actual query class; distinct closer):**
```html
<p>Free roof inspections, honest repairs, and full replacements — that's what Rooval Roofing brings to Murray, UT. We're a 5.0★ Google-rated roofing company handling everything from leak and storm-damage repair to complete roof replacement and metal roofing, backed by a workmanship warranty. Book a free inspection at <a href="tel:+13854248810">(385) 424-8810</a> or price your roof with our <a href="/roof-quote/">instant quote</a> tool.</p>
```
(57 words. Historic-homes color paragraph stays, second position. **Price line: the live body currently reads "$8,000 and $16,000" — stale. REPLACE with the 2621 string, byte-for-byte:** "Murray roof replacements typically run $7,000 to $15,000.")
**Current opening being replaced (first ~40 words, verbatim):** "Murray sits near the center of Salt Lake County, where the ground slopes gently west from the Wasatch foothills down toward the Jordan River. It is an old smelter town that grew into a settled valley-floor community…"
**Title:** CHANGE TO "Murray Roofing Company & Roof Repair | 5.0★ Rated | Rooval" (58 chars — leads with the noun class Murray actually ranks for; the page has zero repair-query impressions, so "Roof Repair"-first would retitle a pos-10.5 page toward demand it doesn't have). **Deployer note: isolated Rank Math step (Jul 15), timestamped; revert if the 14-day check regresses "murray roofing" / "murray ut roofing company".**
**Meta description:** Murray, UT roof repair & replacement by a 5.0★ Google-rated crew. Free inspections, honest estimates & a workmanship warranty. Call (385) 424-8810. (≤155 chars)
**Inbound links to add:**
- /roofing-lehi-utah/ -> "roof repair in Murray" -> add to Lehi's service-area paragraph: "Our crews head north for [roof repair in Murray] most weeks."
- /roofing-draper-utah/ -> "Murray roofing services" -> add to Draper body: "Head up I-15 and you'll find our [Murray roofing services] too." *(Draper already links Murray from its Nearby list — second link, not counted.)*

---

### /roofing-draper-utah/
**Target queries:** draper roofing, draper roofing company (424 impr @10.8)
**New opening (light tighten — service-noun lead, distinct closer):**
```html
<p>Roof replacement, roof repair, and metal roofing in Draper, UT — done by a local, 5.0★ Google-rated crew backed by a workmanship warranty. Rooval Roofing serves the whole city, from the Draper Bench to Suncrest and Corner Canyon. Free inspections citywide — call <a href="tel:+13854248810">(385) 424-8810</a> or <a href="/roof-quote/">price it online</a> in minutes.</p>
```
(49 words. Local-color paragraph stays, second position. **Price line: the live body currently reads "$9,000 to $18,000" — stale. REPLACE with the 2621 string, byte-for-byte:** "Draper roof replacements generally run $9,000 to $22,000.")
**Current opening being replaced (first ~40 words, verbatim):** "Draper sits in the far southeast corner of Salt Lake County, tucked against the Wasatch front where the valley climbs toward Corner Canyon and the Point of the Mountain. It is a beautiful place to own a home and a demanding place to own a roof."
**Title:** CHANGE TO "Draper Roofing Company & Roof Repair | 5.0★ Rated | Rooval" (58 chars — matches the page's "draper roofing company" demand; zero repair-query impressions here). **Deployer note: isolated Rank Math step (Jul 15), timestamped; revert if the 14-day check regresses "draper roofing" / "draper roofing company".**
**Meta description:** Draper roof replacement, repair & metal roofing — 5.0★ Google-rated. Free inspections from the Draper Bench to Suncrest. Call (385) 424-8810. (141 chars)
**Inbound links to add:**
- /roofing-alpine-utah/ -> "Draper roof replacement" -> **Alpine's body has NO existing Draper mention (verified against the live mirror — its Nearby list is Highland/Lehi/PG only), so there is nothing to wrap. Add a NEW sentence to Alpine's body under its service-area H2:** "Just over Traverse Mountain, [Draper roof replacement] is part of our regular route."
- /roofing-provo-utah/ -> "roofing help in Draper" -> add to Provo body: "North of the Point of the Mountain, we provide [roofing help in Draper] as well."

---

### /roofing-pleasant-grove-utah/
**Target queries:** pleasant grove roofing (304 impr @14.0)
**New opening:** N/A — **no copy rewrites.** Title + links only; the outbound Orem anchor goes in as a NEW sentence (see Orem section — PG's existing city mentions are Nearby-list items, already links, not wrappable prose).
**Current opening being replaced:** N/A.
**Title:** CHANGE TO "Pleasant Grove Roofing & Roof Repair | 5.0★ Rated | Rooval" (58 chars — leads with the page's actual query, "pleasant grove roofing"). **Deployer note: isolated Rank Math step (Jul 15), timestamped; revert if the 14-day check regresses "pleasant grove roofing".**
**Meta description:** Pleasant Grove roof repair, replacement & metal roofing from a 5.0★ Google-rated local crew. Free estimates. Trusted Utah County contractor. (140 chars)
**Inbound links to add:**
- /roofing-murray-utah/ -> "roof repair in Pleasant Grove" -> add to Murray body: "In Utah County we handle [roof repair in Pleasant Grove] as well."
- /roofing-sandy-utah/ -> "Pleasant Grove roofing" -> add to Sandy's service-area paragraph: "We also run [Pleasant Grove roofing] jobs on the Utah County side."

---

### /roofing-alpine-utah/
**Target queries:** alpine roofing, alpine ut roofing company (213 impr @11.2)
**New opening:** N/A — no copy rewrites; one NEW-sentence anchor only (the Draper link above — Alpine's Highland link was dropped because Alpine already links Highland from its Nearby list).
**Current opening being replaced:** N/A.
**Title:** KEEP "Alpine, UT Roofing Company | Free Estimates | Rooval Roofing" (confirm at Step 0)
**Meta description (MANDATORY fix — kills the lowercase "workmanship warranty." fragment):** Alpine, UT roofing by Rooval Roofing — roof repair, replacement, gutters & metal roofing, backed by a workmanship warranty. Free estimate. (138 chars)
**Inbound links to add:**
- /roofing-lehi-utah/ -> "Alpine roof replacement" -> add to Lehi body: "Up the bench, we take on [Alpine roof replacement] projects year-round." *(Lehi already links Alpine from its Nearby list — second link, not counted.)*
- /roofing-sandy-utah/ -> "our crew in Alpine" -> add to Sandy body: "Across the mountain's shoulder, [our crew in Alpine] works the same steep pitches."

---

## Linking-map summary table (count check vs 50+ target)

| Target page | Links placed (net-new pairs) | Sources (* = already linked from that source's "Nearby Cities We Serve" list → deploys as a second, in-body contextual link; NOT counted) |
|---|---|---|
| Sandy | 3 (1 net-new) | Homepage, Draper*, Murray* |
| Provo | 3 (2 net-new) | Homepage, Orem*, Sandy |
| Highland | 3 (3 net-new) | Orem, Sandy, Provo |
| Orem | 3 (2 net-new) | Pleasant Grove*, Draper, Murray |
| Lehi | 3 (2 net-new) | Homepage, Draper*, Orem |
| Murray | 2 (1 net-new) | Lehi, Draper* |
| Draper | 2 (2 net-new) | Alpine, Provo |
| Pleasant Grove | 2 (2 net-new) | Murray, Sandy |
| Alpine | 2 (1 net-new) | Lehi*, Sandy |
| **Contextual subtotal** | **23 placed / 16 net-new** | Zero reciprocal A↔B pairs (re-verified after the Highland re-source); Highland, Springville, Lindon emit zero |
| /roof-repair-utah/ | 8 placed / 1 net-new | **8 UNIQUE anchors — never repeat an anchor string to this URL:** Homepage → "roof repair services across Utah"; Lehi → "our Utah roof repair page"; Sandy → "storm-damage roof repair"; Draper → "roof leak repair"; Provo → "roof repair statewide"; Murray → "Utah-wide roof repair"; Orem → "learn more about our roof repair services"; PG → "hail and wind damage repair". Each added as a **NEW sentence** in the page's existing repair-topic section (do not wrap Nearby-list or services-list items — those are already links). Every city page already links this URL from its services/Nearby blocks, so only Homepage is a net-new pair. |
| /roof-replacement-utah/ | 4 placed / 0 net-new | Sandy → "full roof replacement"; Provo → "roof replacement services"; Orem → "learn about roof replacement in Utah"; Draper → "roof replacement across Utah" — inserted in each page's cost section as second, in-body links (all four sources already link this URL). |
| **Total** | **35 placed / 17 net-new unique pairs** | **Dedupe every anchor against nav/footer AND each source page's "Nearby Cities We Serve" list AND its existing /roof-repair-utah/ + /roof-replacement-utah/ links before counting.** Baseline 35 + 17 net-new = **52 vs 50+ target** — thin margin, no room for further dedupe losses; verify each "net-new" pair is genuinely absent from the source page at edit time. |

Untouchable: /roofing-lindon-utah/ (zero edits either direction); /roof-repair-utah/ and /roof-replacement-utah/ receive links only, never edited. Springville: not a source this cycle (body never fetched).

---

## Deployment checklist

**Order of operations (title changes isolated):**
0. **Jul 13 — Step 0, before anything else:** `curl -s` the live `<title>` of all 10 pages and reconcile against every KEEP/CHANGE label above. The July deployment record and this doc disagree in places (Orem explicitly; Provo possibly) — **treat the live HTML as truth.** Any page whose live title differs from its KEEP string is reclassified: either update the doc's KEEP string to the live value, or treat it as a deliberate CHANGE with its own isolated step. Never paste a Rank Math title over a live value that doesn't match what this doc says it is.
1. **Jul 13 — Highland (first, links-only page):** Rank Math meta refresh only. Zero content edits.
2. **Jul 13 — Alpine:** Rank Math meta fix (mandatory) + 1 NEW-sentence anchor insertion (Draper).
3. **Jul 14 — Sandy:** opening swap + price-string replacement + meta + its outbound insertions (Provo, PG, Alpine, Highland, repair, replacement anchors).
4. **Jul 14 — Orem title reconciliation ONLY** (per the Orem section: no-op if the pattern title is live; isolated, timestamped change if the old title is live).
5. **Jul 15 — Provo** (opening + price replacement + meta + outbound: Draper, Highland, repair, replacement anchors); **Lehi** (prepend block + outbound: Murray, Alpine, repair anchors).
6. **Jul 15 — Murray, Draper, PG titles ONLY:** three separate, individually timestamped Rank Math updates. 14-day revert checks on "murray roofing / murray ut roofing company", "draper roofing / draper roofing company", "pleasant grove roofing".
7. **Jul 16 — Orem opening + price replacement + meta + outbound insertions** (kept ≥2 days clear of the Orem title step so any title-driven movement stays attributable).
8. **Jul 17 — Murray, Draper:** openings + price replacements + metas + outbound insertions; **PG:** meta + link insertions (Orem sentence, repair anchor).
9. **Jul 17 — Homepage last:** Rank Math meta description + the three insertions in three separate sections (see homepage section — max 2 links in any one paragraph).

**Per-page publish procedure:**
1. **Pre-publish guardrail grep** on the draft: `grep -Ei 'deductible|free roof|claim|adjuster|15-year|same-week'` — the only permitted hits are "free roof inspection(s)" and the locked phrase "so you can file with your insurer" (Lehi only). Anything else: stop.
2. **Price check:** re-read WPCode snippet 2621 AND the page FAQ. The live bodies are stale on all five priced pages — **overwrite the body's existing cost string with the 2621 string** (find/replace values in each page's section above: Sandy $9,000 and $20,000 → $8,500 to $19,000 · Provo $10,000 and $18,000 → $7,500 to $16,000 · Orem $9,000 and $16,000 → $7,500 and $17,000 · Murray $8,000 and $16,000 → $7,000 to $15,000 · Draper $9,000 to $18,000 → $9,000 to $22,000). After the edit, every cost string on the page must match 2621 byte-for-byte. New openings contain NO prices. Never leave a body-vs-FAQ mismatch behind.
3. **Elementor edit:** open the page by post ID (table at top) → edit the **Text Editor widget under the hero** only → paste the new `<p>` as the first block inside that widget, directly below the H2 hero subhead (Lehi: prepend above the widget's existing first `<p>`; the existing copy stays) → plain `<p>`/`<a>` HTML → Update (confirm the `save_builder` AJAX call returns success before leaving the editor). Any new subhead is H2 — never a second H1. **Homepage is the exception:** it has no under-hero Text Editor widget — follow its own section's widget-location instructions.
4. **Rank Math:** page editor → Rank Math snippet → paste title/description → character-count (titles ≤60, metas ≤155 as written above) → Update.
5. **Flush:** regenerate Elementor CSS + purge page cache.

**Post-deploy curl verification (each page, after cache purge):**
```
curl -s URL | grep -c '<h1'                          # must be exactly 1
curl -s URL | grep -o 'name="description" content="[^"]*"'   # matches this doc, ≤155 chars
curl -s URL | grep -o '<title>[^<]*</title>'          # matches the Step-0-reconciled KEEP/CHANGE value
curl -s URL | grep -F "$OPENING_STRING"               # per-page string from the table below
curl -s URL | grep -o 'article:modified_time[^/]*'    # equals today's deploy date
curl -s URL | grep -F "$NEW_ANCHOR_TEXT"              # grep the SPECIFIC new anchor text (e.g. 'storm-damage roof repair'), never the bare slug — every page already contains 'roof-repair-utah', so counting the slug proves nothing
```
**$OPENING_STRING per page:** Sandy `Need roof repair in Sandy, UT?` · Provo `Rooval Roofing provides roof repair and replacement` · Orem `Homeowners across Orem` · Lehi `Get a free roof inspection and written estimate in Lehi` · Murray `Free roof inspections, honest repairs, and full replacements` · Draper `Roof replacement, roof repair, and metal roofing in Draper`

Then: annotate the deploy date in GSC. Check "roof repair sandy ut" and "roof inspection lehi" at 14/28 days; Orem repair queries at 14 days (revert title only if a title change actually shipped at Step 4 and regressed); "murray roofing / murray ut roofing company", "draper roofing company", and "pleasant grove roofing" at 14 days from the Jul 15 title timestamps (revert individually if regressed). Success = Highland + Sandy cluster crossing pos 10 and first non-homepage clicks.

---
CHANGELOG:
1. (Cold-open #1) Preamble + all five priced pages + checklist step 2: replaced "body price line stays verbatim per 2621" with explicit REPLACE instructions — live stale body figures listed per page ($9,000/$20,000 etc.) with the 2621 string to overwrite them; removed the deadlock between "don't touch" and "must match 2621."
2. (Cold-open #2 + #4) Highland re-sourced to Orem, Sandy, Provo (Alpine/Lehi/PG already link Highland from Nearby lists — no-op links dropped); all "wrap the existing mention / insert into existing sentence" instructions replaced with NEW-sentence insertions (PG→Orem, repair/replacement rows), with a note that Nearby-list mentions are already-anchored list items.
3. (Cold-open #3) Alpine→Draper changed from "wrap existing sentence" (no Draper mention exists on Alpine) to an explicit new sentence under Alpine's service-area H2.
4. (Cold-open #5) Linking table recounted honestly: 35 placed but only ~17 net-new unique pairs after deduping against Nearby-lists and existing service-page links; dedupe instruction extended beyond nav/footer; "70 vs 50+" replaced with "52 vs 50+, thin margin."
5. (Cold-open #6) Added slug→post-ID table (homepage 1723, Sandy 2304, Highland 2298, Provo 2310, Orem 2306, Lehi 2391, Murray 2303, Draper 2308, PG 2300, Alpine 2296).
6. (Cold-open #7) Curl block fixed: placeholder replaced with a per-page $OPENING_STRING list; anchor check now greps the specific new anchor text instead of the always-present 'roof-repair-utah' slug.
7. (Cold-open #8) Homepage section rewritten: noted it's an icon-box layout with no under-hero Text Editor widget or single "services paragraph"; named the target widgets/sections and required logging element IDs; added homepage exception to publish step 3.
8. (Cold-open #9) Orem opening/meta moved to Jul 16, ≥2 days clear of the Jul 14 title step, so the title experiment stays attributable.
9. (SEO #1) Broke the shared closer skeleton on Provo, Orem, Murray, Draper (new closers: "Financing available — get an instant quote in minutes or call…", "Schedule a free inspection… or start with an instant quote", "Book a free inspection… or price your roof with our instant quote tool", "Free inspections citywide — call… or price it online in minutes"); no two pages now share their final 10+ words; word counts updated.
10. (SEO #2) Murray/Draper/PG titles changed to noun-matched "…Roofing Company & Roof Repair…" / "Pleasant Grove Roofing & Roof Repair…" patterns (58 chars each); each given an isolated, timestamped deploy step (Jul 15) with 14-day revert triggers; "roofing company" added to the Murray opening (replacing "crew").
11. (SEO #3 + Compliance #1) Added Step 0: curl live titles of all 10 pages and reconcile every KEEP/CHANGE label before pasting anything. Orem title converted from unconditional CHANGE to a Step-0 reconciliation: KEEP if the deployed July pattern title is live; only deploy the exact pattern title (not the divergent "Company"/no-"UT"/trimmed-brand variant) if the old title is actually live. Provo KEEP flagged for the same verification.
12. (SEO #4 + Compliance #2) /roof-repair-utah/ anchor set rebuilt: 8 unique anchors, no duplicated strings, near-duplicate "across Utah" pair eliminated, and "emergency leak repair" dropped (unverified service implication) in favor of neutral anchors ("roof leak repair", "storm-damage roof repair", etc.).
13. (SEO #5) Homepage link load cut from 4 links in one paragraph to max 2 (Sandy + Provo sentence); Lehi sentence and the /roof-repair-utah/ anchor moved to two different homepage sections; Sandy/Provo/Lehi inbound entries updated to match.
14. (SEO #6) Lehi prepend reworded to open "Get a free roof inspection and written estimate in Lehi from Rooval Roofing…" — no longer stacks two consecutive brand-name-first paragraphs; deliberately not "Free roof inspections…" to avoid cloning Murray's lead.
15. (Minor, from cold-open verified observations) Publish step 3 now states exact placement of the new `<p>` relative to the H2 hero subhead (and Lehi's prepend position); Provo's annotation corrected — the live hero wording is "inspect the roof, photograph anything we find, and hand you the documentation," not "inspect, document and fix."
16. Consequential updates: reciprocal-pair check re-verified after the Highland re-source (still zero A↔B); checklist outbound lists, Alpine's step (now 1 insertion), and the GSC monitoring line (added Murray/Draper/PG title checks) all synced to the changes above.