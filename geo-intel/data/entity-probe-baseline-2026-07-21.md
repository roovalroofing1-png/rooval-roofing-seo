# Entity-recognition probe baseline — 2026-07-21

Scored SEPARATELY from the X/13 citation scoreboard (per geo-book Ch4 + MEASUREMENT.md).
Method: WebSearch proxy (NOT live engines — directional caveat applies, same as the citation
proxy). Metrics: correct-description (y/n), licensed-stated (y/n), competitor-substitution (y/n).

| id | prompt | surfaces rooval-roofing.com | correct description | licensed stated | competitor substitution |
|----|--------|-----------------------------|---------------------|-----------------|-------------------------|
| roof-14 | What does Rooval Roofing in Lehi Utah do? | yes | yes (roofing: repair/replacement/storm, Lehi/Utah County) | n/a | no |
| roof-15 | Is Rooval Roofing in Lehi Utah legit and licensed? | yes | yes | yes (DOPL GC license surfaced) | no |

Note: this is a better result than Ch1's brand-query finding (which surfaced a competitor),
consistent with the Ch2 entity consolidation + Ch3 license passage landing. Re-run at the
monthly cadence (first Monday) alongside the X/13 scoreboard; watch for any engine describing
Rooval as an insurance-claims handler (compliance flag) or substituting a competitor.
