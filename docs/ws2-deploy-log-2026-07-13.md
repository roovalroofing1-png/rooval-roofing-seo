# WS2 Deployment Log — 2026-07-13 (session)

Deployed via REST (Rank Math meta) + Elementor `save_builder` AJAX pipeline, each change curl-verified live. Model: Opus. Deploy account: Rooval WP admin (display "Mike Sorensen").

## ✅ DEPLOYED & VERIFIED LIVE

### Rank Math titles (CHANGE) — 4 pages
- Orem (2306): → "Orem UT Roof Repair & Roofing | 5.0★ Rated | Rooval Roofing" (old generic title was still live — July pattern had never actually deployed)
- Murray (2303): → "Murray Roofing Company & Roof Repair | 5.0★ Rated | Rooval"
- Draper (2308): → "Draper Roofing Company & Roof Repair | 5.0★ Rated | Rooval"
- Pleasant Grove (2300): → "Pleasant Grove Roofing & Roof Repair | 5.0★ Rated | Rooval"
- KEEP (verified live, unchanged): Homepage, Sandy, Highland, Provo, Lehi titles all already matched the doc.

### Rank Math meta descriptions — 9 pages
Homepage*, Sandy, Highland, Provo, Orem, Murray, Draper, PG, Alpine all refreshed to the doc's new descriptions. Lehi kept (already had the good 5.0★ description). Alpine's broken "…metal roofing. workmanship warranty." fragment fixed.
- *Homepage EXCEPTION: the per-page description write returned success but does NOT render — the homepage is the static front page, so Rank Math serves its **global Homepage description** (Titles & Meta → Homepage), a separate setting. STILL TODO: set homepage description there.

### Answer-first body openings — 6 pages (Elementor text-editor widget, prepended; original copy preserved below)
- Sandy (2304): "Need roof repair in Sandy, UT? …" — the 1,000-impression prize query
- Provo (2310): "Rooval Roofing provides roof repair and replacement — plus new-roof installation — across Provo…"
- Orem (2306): "Homeowners across Orem — from the lakeside flats to the east bench…"
- Lehi (2391): PREPEND "Get a free roof inspection and written estimate in Lehi…" (contains the one permitted insurance phrase "so you can file with your insurer")
- Murray (2303): "Free roof inspections, honest repairs, and full replacements…"
- Draper (2308): "Roof replacement, roof repair, and metal roofing in Draper, UT…"
- All verified: exactly 1 H1 each, opening live, compliance clean ("Free Roof Estimate" sitewide CTA is a false-positive — free *estimate*, not a giveaway).

## ⚠️ PRICE ISSUE FOUND — NO NET CHANGE MADE (needs owner decision)

The doc's price research read the **repo** copy of WPCode snippet 2621 (which has NEWER prices) and assumed those were live. They are not. **The LIVE 2621 FAQ snippet is stale — it still shows the OLD prices for all 5 priced cities; the repo has new ones that were never deployed to the live snippet.** Original page bodies matched the live FAQ. My edits briefly synced bodies to the repo (new) prices, creating a body-vs-FAQ conflict, so I **reverted all 5 body prices** to match the live FAQ. Net: pricing display unchanged from pre-session state, fully consistent.

| City | Live FAQ (snippet 2621, current) | Repo 2621 (newer, undeployed) |
|---|---|---|
| Sandy | $9,000–$20,000 | $8,500 to $19,000 |
| Provo | $10,000–$18,000 | $7,500 to $16,000 |
| Orem | $9,000–$16,000 | $7,500 and $17,000 |
| Murray | $8,000–$16,000 | $7,000 to $15,000 |
| Draper | $9,000–$18,000 | $9,000 to $22,000 |

**DECISION NEEDED:** which prices are current? If the repo (new) ones, sync the LIVE 2621 snippet to them (careful edit — 2621 is the one PHP snippet that can white-screen the site; back up first). If the live (old) ones are right, update the repo 2621 to match and everything's already consistent.

## ⏭️ NOT YET DONE (next chunk of WS2)
- **Internal-link insertions** (~17 net-new contextual links + the /roof-repair-utah/ & /roof-replacement-utah/ anchor sentences) — the doc's linking map. Higher error-risk (precise sentence placement); deferred to a focused follow-up.
- **Homepage global meta description** (Rank Math → Titles & Meta → Homepage).
- **Homepage body link insertions** (3 sentences across 3 sections).
- 14/28-day GSC checks on the prize queries + the 4 retitled pages (revert triggers per the deployment doc).
