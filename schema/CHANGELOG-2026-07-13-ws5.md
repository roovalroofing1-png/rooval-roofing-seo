# WS5 — Author persona + schema debt fix (DEPLOYED LIVE 2026-07-13)

Fake "Mike Sorensen" pen-name (set 2026-07-02) fully removed. Owner chose his REAL name.

## Deployed (all verified live)
- WP user id 1 (slug rooval) display_name: "Mike Sorensen" -> **"Matthew Thompson"** (real owner). Also fixes wp-admin greeting + auto-fixes the Rank Math schema Person node (now emits "Matthew Thompson").
- Author box replaced in all 8 blog posts (2657,2658,2659,2358,2359,2360,2361,2362) — new real-owner bio, honest facts only (owner, Lehi, Utah County, licensed+insured, services, 5.0), NO fabricated credentials/tenure/license#. "Mike Sorensen" now 0 occurrences sitewide.
- WPCode snippet 2352 (LocalBusiness Schema Markup, HTML type): reviewCount 31 -> **33** (verified true count on GBP); added "@id":"https://rooval-roofing.com/#organization" to MERGE the WPCode RoofingContractor with Rank Math's #organization node (dedup the two competing business entities). JSON validated (adversarial JSON attacker: Clean).

## Owner follow-ups (flagged, not done)
- Run Google Rich Results Test on one URL to confirm the two script blocks consolidate to ONE entity via shared @id. If not, fall back to standalone-no-@id (revert the @id line). Structurally the shared @id is in place and both blocks + JSON validate.
- Optional stronger E-E-A-T: add real credentials to the author box (years roofing, DOPL license #, headshot) — owner-supplied only.
- Optional SEO architecture: switch Rank Math author schema Person->Organization (not required; rename already resolves it).

Built via lean 8-agent pipeline (Opus/Sonnet, no Fable — all-models pool; usage-credit pool maxed). Agents designed+attacked; main loop deployed.
