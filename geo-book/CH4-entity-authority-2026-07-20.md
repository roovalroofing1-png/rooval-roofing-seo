# Chapter 4 — Entity & Authority (rooval-roofing.com)

Applies Michael Jacobs' GEO book Chapter 4 to the roofing site. This is the direct response
to Ch1's #1 finding: **weak entity recognition** (a brand query surfaced a competitor, not
rooval-roofing.com). Ch2 merged the business entity under `@id #organization` + added the DOPL
credential and GBP sameAs; Ch3 added the visible license-verification passage. Chapter 4
**audits and measures** the entity — it does not rebuild schema. Ran the owner's 7-stage
pipeline. **Headline finding: the entity is CONSOLIDATED and NAP-consistent everywhere checked;
Ch4 is audit + measurement with no live-site fix required.**

## 1. Entity-consistency audit (NAP across every controlled property)

Method: raw curl + python3 `re`, `@id`-aware comparison (same-`@id` nodes semantically merge, so
an *absent* field in one node is a harmless subset — only a field **present in both with
conflicting values** is real drift).

| Property | name | address | phone | url | verdict |
|---|---|---|---|---|---|
| **Canonical** | Rooval Roofing | 2526 N Elm Dr, Lehi UT 84043 | +13854248810 / (385) 424-8810 | https://rooval-roofing.com | — |
| On-site JSON-LD (WPCode 2352) | ✓ | ✓ | ✓ +13854248810 | ✓ | full node, matches |
| On-site JSON-LD (Rank Math) | ✓ | absent (subset) | absent (subset) | ✓ | name+url stub, shares `@id`, **no conflict** |
| Visible footer (WPCode 2618) | ✓ | ✓ | ✓ (385) 424-8810 | ✓ | matches |
| Google Business Profile | ✓ | ✓ | ✓ | ✓ | CID 17723741517551256012, 5.0★ |
| Facebook (facebook.com/RoovalRoofing) | ✓ | ✓ | ✓ | ✓ | matches |
| Deck sister site (roovaldeckbuilders.com) | cross-ref | — | — | links to roofing | **bidirectional** ✓ |

**Result: 0 present-and-conflicting fields.** The two on-site emitters share `@id
https://rooval-roofing.com/#organization` (Rank Math emits a name+url stub; WPCode carries full
NAP) — consolidated, not fragmented. Off-site NAP (GBP, Facebook, deck) is byte-consistent. The
roofing→deck link is present in **both schema and visible footer**; the deck→roofing link is in
the deck's full `#organization` node — the entity graph is bidirectional. `reviewCount 33`
(schema-only, read-only this chapter) is unchanged.

## 2. sameAs completeness — no additions qualify today
Current sameAs (3): `facebook.com/RoovalRoofing`, `roovaldeckbuilders.com`,
`google.com/maps?cid=17723741517551256012`. Candidate scan:
- **Bing Places** — does **not** exist. The one genuine engine-level citation gap. Owner must
  create it (free) before it can become a sameAs.
- **Yelp** (`yelp.com/biz/rooval-roofing-lehi`) — exists, NAP matches in search snippets, but is
  403-blocked to read-only tools so claim status is unverifiable. Owner must confirm it's claimed
  in Yelp-for-Business before it enters sameAs.
- BBB / Angi / Houzz / Thumbtack / HomeAdvisor / Nextdoor — no listings found.

**Promotion rule:** a URL enters sameAs only when it (a) resolves 200, (b) is a genuine
Rooval-controlled/verified profile, and (c) shows NAP-consistent data. Nothing qualifies today —
"no additions" is the correct, valid outcome (never link unclaimed/auto-generated directory pages).

## 3. Topical-cluster strength map (analysis → feeds Ch5; builds nothing)
Built from live sitemap (37 pages + 18 posts — real blog inventory is **17 posts**, not ~9),
the repo's GSC export (798 queries), Ch1 gaps, and competitor sitemap sampling.

| Cluster | Strength | Notes |
|---|---|---|
| **Local / city** | STRONG breadth / THIN depth | 16 city pages carry nearly all impressions (Provo 4,331, Sandy 2,912, Highland 2,798) but rank page 2–3; G5 (emergency) + G6 (timelines) open; Payson/Spanish Fork/Mapleton are blog-only, no city pages |
| **Storm / hail / wind** | STRONG | 4 dedicated pages + 6 storm posts + the NOAA data page — matches the seed finding that dedicated per-storm-type pages are what AI engines cite |
| **Cost** | MODERATE | replacement-cost page ranks pos 3–6 (site's best positions); gaps: G1 metal $, repair-cost, flat/TPO-cost |
| **Materials** | THIN | metal page pos ~58 with no $ range; TPO pos ~36; **no asphalt-shingle page**; **tile + slate entirely missing** despite ~200 combined GSC impressions |
| **Repair-vs-replace / lifecycle** | MODERATE | repair/replacement/tune-up + 4 lifecycle posts; leak-repair queries rank 40–64 blog-only; no dedicated emergency page |
| **Trust / how-to-choose** | THIN (not missing) | a full how-to-choose-a-contractor post is **live** (corrects G2's framing) — the gap is a *passage on money/near-me pages*, plus warranty page (partly addressed Ch3) and no FAQ hub |
| **MISSING entirely (with proven GSC demand)** | — | commercial/industrial ('commercial roofers near me' pos 1.0, 65 impr, zero supply), tile, slate, new-construction, winter/ice-dam, ventilation |

Competitor proof: roofmonster.com (won the metal-vs-asphalt citation) fields commercial + asphalt
+ new-construction pages; vertexroofingslc.com (cross-query authority winner) fields ~50 pages /
132 posts incl. dedicated warranty, FAQ, emergency, ventilation, commercial, and an
entity-sitemap. **This map is the Ch5 build queue** — no pages built here.

## 4. Third-party citations — owner-actionable list (organic only, agent creates nothing)
Priority order:
1. **Create a Bing Places listing** (free, bingplaces.com; sign in with the existing
   roovaldeckbuilders@gmail.com Bing account; use canonical NAP exactly). The only engine-level
   citation gap found. Once live + NAP-verified it becomes a sameAs candidate. Feeds Bing/Copilot.
2. **Check/claim the Yelp listing** (biz.yelp.com, free; verify NAP once inside). Then it can
   enter sameAs.
3. **Optional organic (the book's Reddit/YouTube finding):** owner-authored *genuine*
   participation — answering real Utah-roofing questions on Reddit, a few real jobsite YouTube
   clips. Reddit is the single most-cited domain in AI answers and YouTube ranks high. **Never**
   spam, fake reviews, or link-blast — organic-only, owner-gated.

## 5. Entity-recognition monitoring (formalized)
- Appended **roof-14** ("What does Rooval Roofing in Lehi Utah do?") and **roof-15** ("Is Rooval
  Roofing in Lehi Utah legit and licensed?") to `geo-intel/config/roofing-prompts.yaml`, cluster
  `entity`. Amended `MEASUREMENT.md`: these are scored **on a separate line** (correct-description
  y/n, licensed-stated y/n) and **never folded into the X/13 citation denominator** — different
  metric.
- Today's pre-fix entity baseline (WebSearch proxy, 2026-07-21, proxy-not-live-engine caveat):
  both probes surface rooval-roofing.com with correct facts and no competitor substitution — a
  better result than Ch1's brand-query finding, consistent with the Ch2/Ch3 entity work landing.
- **Analytics complement (owner-action, ready):** replicate the deck site's GA4 "AI Assistants"
  custom channel group on the roofing property (measurement id G-7D5VK6JDVE): Admin → Data display
  → Channel groups → Create "Channels incl. AI Assistants", one channel "AI Assistants" at position
  1, Source *partially matches regex*
  `chatgpt\.com|chat\.openai\.com|perplexity\.ai|copilot\.microsoft\.com|gemini\.google\.com|claude\.ai|you\.com|poe\.com`.
  Deferred from live execution only because the shared-Chrome browser selection needs an owner
  pick; the deck build is the exact, proven template. Say the word and I'll do it in one pass.

## Carries to Ch5 / Ch6
- **Ch5 (Content):** the cluster map above IS the build queue — G1 (metal $ range), G2 (how-to-
  choose passage on money pages), G5 (emergency page/passage), G6 (timeline consistency), plus
  the missing high-demand clusters (commercial, tile, slate, asphalt-shingle page).
- **Ch6 (Measurement):** the X/13 scoreboard + the new entity probes + the GA4 AI-Assistants
  channel = the measurement stack; Ch6 formalizes reporting and the four-failure diagnostic.

## Live changes this chapter
Repo only: `roofing-prompts.yaml` (+roof-14/15), `MEASUREMENT.md` (scoring note), this doc, and
an entity-probe baseline. **No live-site edit** — the entity audit passed clean, so there was
nothing to fix (per the plan's rule: do not manufacture edits).
