# 2026-07-16 — Live pricing truth-up: city Elementor pages to $20K–$30K; per-unit rates stripped (TPO, gutters); SLC FAQ triple-fix

## Why
Owner rule: **never show per-unit pricing** (per square / per sq ft / per linear foot) — roofs are quoted as whole projects, and the real range for a typical Utah full replacement is **$20,000–$30,000** (owner, 2026-07-15: "The average roof in Utah is anywhere from $20–$30,000"). A prior sweep fixed `post_content` on the 12 older city pages, but those pages are **Elementor** pages — they render from `meta._elementor_data`, so the fixes never went live. This session fixed the render source itself, plus the two remaining per-unit-rate pages and the Salt Lake City FAQ.

## What changed (all live-verified)

### 1. Twelve Elementor city pages — old ranges → $20,000–$30,000 (render source fixed)
Mechanism: run-once WPCode PHP snippet **3092** ("RUN-ONCE 2026-07-16 city Elementor price fix", Admin Only, now **DEACTIVATED**; code mirrored at `snippets/run-once-city-elementor-price-fix-2026-07-16.php`). It string-replaced inside `meta._elementor_data`, dropped `_elementor_element_cache`/`_elementor_css`, cleared Elementor file cache, and purged LiteSpeed/Autoptimize/object caches. Run report: **all 12 pages `REPLACED_1`**, zero errors, ran 2026-07-16 14:31:49.

| ID | slug | old | new |
|---|---|---|---|
| 2391 | roofing-lehi-utah | between $9,000 and $20,000 | between $20,000 and $30,000 |
| 2310 | roofing-provo-utah | between roughly $10,000 and $18,000 | between roughly $20,000 and $30,000 |
| 2306 | roofing-orem-utah | between $9,000 and $16,000 | between $20,000 and $30,000 |
| 2302 | roofing-salt-lake-city-utah | between about $8,000 … and $22,000 or more | between about $20,000 … and $30,000 or more |
| 2296 | roofing-alpine-utah | about $11,000 to $26,000 | about $20,000 to $30,000 or more |
| 2298 | roofing-highland-utah | between $10,000 and $24,000 | between $20,000 and $30,000 |
| 2299 | roofing-lindon-utah | between $9,000 and $18,000 | between $20,000 and $30,000 |
| 2300 | roofing-pleasant-grove-utah | between $7,500 and $16,500 | between $20,000 and $30,000 |
| 2301 | roofing-springville-utah | between $10,000 and $18,000 | between $20,000 and $30,000 |
| 2303 | roofing-murray-utah | between $8,000 and $16,000 | between $20,000 and $30,000 |
| 2304 | roofing-sandy-utah | between $9,000 and $20,000 | between $20,000 and $30,000 |
| 2308 | roofing-draper-utah | about $9,000 to $18,000 | about $20,000 to $30,000 |

**Intentional copy nuance:** SLC and Alpine read "$20,000 to $30,000 **or more**" — SLC's sentence continues "…for a large or steep historic house" (removing "or more" breaks it), and Alpine's copy asserts its roofs run higher than a standard valley home. The other 10 use the flat range. This is deliberate, not drift.

### 2. TPO page 2780 (/tpo-flat-roofing-utah/) — per-sq-ft rate removed
- OLD: "installed TPO lands in the mid-to-high single digits per square foot — commonly around $5.50 to $9.50 —…"
- NEW: whole-project quote-each-job framing ("We quote TPO the way we quote every roof — as one complete project, not off a rate sheet…"), no dollar figure (no defensible flat-roof project range exists; owner rule ⇒ quote-each-job only). Cost section verified to read coherently (cost drivers + written-quote promise, no implied withheld rate). Excerpt was empty; head metas already clean.

### 3. Gutter page 2781 (/gutter-services-utah/) — per-linear-foot menu removed
- Removed: $12–$16/lin-ft base rate, per-foot 6-inch upcharge, $6–$12/ft guard rate, and the 150–200-linear-feet derivation.
- Kept (allowed): the **$1,800–$3,200 whole-project** anchor and the $150–$600 repair example. Excerpt empty; head metas clean.

### 4. SLC FAQ triple-fix
The Salt Lake City page's old $8,000–$22,000 figures lived in **3 places**: (a) the Elementor body (fixed via the run-once snippet, row 2302 above), and (b)+(c) the visible FAQ answer + FAQPage JSON-LD, which share one source string in WPCode snippet **2621** ("City Pages FAQ + FAQPage Schema"). Edited that one answer in the WPCode editor:
- NEW: "Most Salt Lake City roof replacements land between $20,000 and $30,000, with larger homes in the Avenues or East Bench running higher. Historic homes may have unique requirements. We provide detailed, transparent estimates at no charge."
- Pre/post captures diffed: **exactly one line changed** (no collateral edits). Live-verified: answer appears **verbatim** in the FAQPage JSON-LD, mainEntity count unchanged (6), visible FAQ shows the new text.
- `snippets/city-pages-faq-faqpage-schema-2621.php` was **stale vs live** before this session; it is now a full recapture from the live editor (includes both the earlier 11-city bulk range fix and today's SLC line).

## Verification (hard gate before this commit)
Anon, cache-busted sweep of 16 URLs (12 city + TPO + gutters + /roof-replacement-cost-utah/ + storm-checklist post): **ALL CLEAN** —
- zero hits for: $5.50, $9.50, per square foot, per linear foot, per-foot (word-boundary — "Steeper foothill" is a benign substring), $7,500…$26,000 old figures, wind-repair-annotated
- all 12 city pages contain $20,000 + $30,000
- every JSON-LD block parses (entity-tolerant), SLC FAQPage asserted verbatim + count-stable

## Rollback
- **Per city page (structural):** options `rooval_bak_elementor_2391 … 2308` hold the pre-write `_elementor_data` blobs (autoload=false, ~1–2MB total; deletable after a stability window). Restore one-liner:
  `update_post_meta($ID,'_elementor_data', wp_slash(get_option('rooval_bak_elementor_'.$ID))); delete_post_meta($ID,'_elementor_element_cache'); delete_post_meta($ID,'_elementor_css'); \Elementor\Plugin::instance()->files_manager->clear_cache(); do_action('litespeed_purge_all');`
- **Full-site net:** UpdraftPlus backup (database + files) completed **Jul 16 14:24:24**, marked keep-manually.
- **TPO/gutters:** pre-edit `content.raw` archived in session scratchpad (`2780-before.html`, `2781-before.html`) and recoverable from this repo's git history (previous live-mirror commit).
- **Snippet 2621:** pre-edit code archived in session scratchpad (`snippet-2621-before.php`) and in this repo's git history.
- ⚠️ **Limitation:** this repo does **not** mirror `_elementor_data` and cannot restore render state for the 12 city pages — the backup options + site backup above are the only structural rollback.

## Open owner item (not actionable via WP REST)
`/roof-quote/` page source publicly exposes the internal **$/square pricing model** (admin config panel gated only client-side via `?admin=1` + CSS hide). Owner should locate the file on Hostinger and gate it server-side. Customer-facing output is compliant; this is a source-exposure issue, not visible copy.

## Also verified this session (done earlier in commit c69dffd, not redone)
- CertainTeed annotated photo removed from post 2924 (zero references sitewide).
- Header search restyled to compact corner card (CSS serving live).

## Addendum — adversarial-panel revise pass (same day)
A 5-agent adversarial panel (sweep / coherence / schema / regression / synthesis) re-verified everything above: **zero rule violations survived**. Four secondary findings were fixed and live-verified:
1. **Cost page 2950**: FAQPage JSON-LD answers synced word-for-word to the visible FAQ copy (3 of 5 were paraphrases) — 5/5 now verbatim, JSON-LD valid.
2. **TPO 2780**: intro "what it costs in Utah" → "what drives the price in Utah"; H2 "What TPO Roofing Costs in Utah" → "What Drives TPO Roofing Cost in Utah" (the section intentionally quotes no number; the promise now matches the delivery).
3. **Highland 2298**: "land toward the higher end of Utah County pricing" → "take more labor and staging than a simpler roof" (cross-city comparison no longer held once all cities show the same range). Via run-once WPCode PHP #2 (Admin Only, now DEACTIVATED; mirrored at snippets/run-once-coherence-fix-2026-07-16.php; backups in options rooval_bak2_elementor_{2298,2296}). Report: 2298:REPLACED_1|PC_SYNCED, 2296:REPLACED_1|PC_SYNCED.
4. **Alpine 2296**: "usually run higher than a standard valley home" → "usually take more time and staging than a simpler roof" (same mechanism).
Panel false-positives documented as non-issues: TPO "$9.50" survivor is SVG path data; "Steeper foothill" contains "per foot" as a benign substring.
