# Rooval Roofing — AI Visibility Re-check (Day 4, early ad-hoc run)
**Date:** 2026-07-17 · **Prompts:** geo-intel/config/roofing-prompts.yaml (13 across 5 clusters, unchanged) · **Method:** web-search proxy ($0), same as launch baseline. Official monthly cadence continues **Aug 3**; this is an early owner-requested check.

## Scoreboard — is Rooval cited today?

**Bottom line: Rooval is cited in 1 of 13 queries (named AND linked, own domain) — the first movement off the 7/13 zero line, in exactly the cluster (storm) the baseline predicted would move first.**

| Cluster | Queries run | Rooval named? | Rooval domain linked? | Owner (M. Thompson) named? | Verdict |
|---|---|---|---|---|---|
| **local-pick** | 3 | No | No | No | **none** |
| **storm** | 3 | **Yes (1/3)** | **Yes (1/3)** | No | **weak** ⬆ |
| **cost** | 2 | No | No | No | **none** |
| **howto-trust** | 3 | No | No | No | **none** |
| **materials** | 2 | No | No | No | **none** |
| **TOTAL** | **13** | **1/13** | **1/13** | **0/13** | **1/5 clusters moved (storm: none→weak)** |

## The citation (roof-04: "Utah hail damage roof repair who to call")
- `rooval-roofing.com/roof-repair-utah/` surfaced directly in results (position ~8 of 10), title "Utah Roof Repair | Fast, Honest Fixes | 5.0★ Rooval Roofing".
- The AI-style answer summary wrote a full paragraph **naming Rooval Roofing** — "fast, honest roof repair across Utah County & Salt Lake Valley," phone number, free-inspection invite.
- **Compliance clean:** the citation says "free inspection" — no insurance-claims-handler language anywhere. (A competitor, Disaster Professionals, is described as "handling all insurance claims" — not attributed to Rooval.)

## What didn't move (expected at day 4)
- storm roof-05 (wind) + roof-06 (emergency): zero, despite dedicated pages live since 7/13 — recrawl lag.
- cost: new /roof-replacement-cost-utah/ (shipped 7/16, 1 day old) not surfacing; SERP owned by established cost guides (Dynamite Utah, This Old House, USA Superior).
- local-pick: still fully directory-gated (Angi, Yelp, BBB, GAF) — needs WS7 off-site work, months not weeks.
- howto-trust: insurer/national domination unchanged (Travelers, Allstate, Progressive, GAF).
- materials: supplier/blog SERPs unchanged.

## Caveats (same as baseline)
Web-search proxy, directional only — not live ChatGPT/Perplexity citation logs. One reading at day 4 could be index noise; the Aug 3 run tells us whether it stuck. Do not change the prompt list.

## Companion signals from the same-day SEO sweep (2026-07-17)
- GSC 28d: 23 clicks / 19.7K impressions / avg pos 17.5 / 876 queries / **34 pages indexed** (vs 15 / 12.3K / 20.6 / 606 / 18 on 7/03).
- SERP spot-check: /roofing-lindon-utah/ visible at ~#2 live; Lehi/Highland/new pages not yet visible unauthenticated.
- GEO gaps found to fix: **llms.txt missing** (soft-404), and 3 pages orphaned from nav/interlinks (/roof-replacement-cost-utah/, /free-roof-inspection-utah/, /storm-damage-roof-history-utah/); robots.txt correctly allows all AI crawlers.
