# 2026-07-23 — Rebuild /faq/ to match Western Timber Frame's FAQ layout

Owner: "Take some screenshots of Western timber frame's FAQ page and I want it to be the same layout."

Studied westerntimberframe.com/faq and rebuilt page **3227** (`/faq/`) content to the same structure. Same 37 Q&As and the same FAQPage JSON-LD as the prior single-column build — only the layout/markup changed.

## What changed (layout → WTF style)
- **Dark hero band** (`#222a2f`) with a big serif ALL-CAPS title "ROOFING FAQ CENTER" + one-line subhead (replaces the plain intro heading). Georgia/serif display face.
- **Two-column category masonry** (`.rv-cats{columns:2}`, collapses to 1 col ≤820px). Each category = emoji icon + big **serif ALL-CAPS heading** (COST & FINANCING, LEAKS/HAIL & WIND, STORM DAMAGE & DOCUMENTATION, TRUST/LICENSING & WARRANTY, MATERIALS & OPTIONS, PROCESS/TIMELINE & SERVICE AREA).
- **Filled, rounded accordion bars** (warm stone `#d3ccc0`, `border-radius:9px`) replacing the old thin-border rows — bold dark question text, **red `+` / `–` toggle** (`#cc0000`), collapsed by default (native `<details>`).
- **"Keep Reading" resources grid** — 3-col image cards linking to 4 blog posts (metal-vs-asphalt, roof-lifespan, signs-you-need-replacing, storm-chaser), matching WTF's RESOURCES section. Featured images pulled live via REST.
- **Dark CTA band** "Still have questions about your roof?" + tap-to-call (385) 424-8810.

## Fixes made during the build
- **wpautop mangling of the resources cards:** WordPress injected `<p></p>`, `<br>`, and empty duplicate `<a>` tags because the inline card anchors were newline-separated with a block `<div>` inside each. Fixed by (a) building the content with **no stray newlines** between inline elements and (b) making the card title a `<span>` (inline), not a `<div>`. Verified: 4 clean cards, 0 empty, 0 stray tags.
- **Duplicate H1 / title strip:** Blocksy renders its own "Hero Section" page-title (`<h1 class="page-title">Roofing FAQ</h1>`) above the content, which collided with the new dark hero *and* bled through the transparent site header. Hid it with page-scoped CSS (`.hero-section{display:none}` — the `<style>` only loads on `/faq/`) and gave `.rv-hero` top padding (`clamp(120px,17vw,168px)`) so the title clears the transparent header. Net effect: single title, and the white logo/nav now sit over the dark hero and read cleanly — the same effect WTF gets. (Sitewide header redesign — solid bg + centered logo — is still a separate, owner-requested task.)

## Verified live (anon + DOM, cache-busted)
- 2 columns at desktop, 1 on mobile; filled stone bars; red +/– toggle flips on open; answers show; correct "$20,000+" pricing preserved.
- All 4 resource images load (1200–1880px naturals).
- FAQPage JSON-LD present and valid — `@type` FAQPage, **37** Q&As (unchanged).
- Dark CTA renders with phone.

## Content guardrails preserved
- Tightened **insurance** stance intact (2 roof-side Q&As only; no deductible/coverage/"free roof").
- De-"free" copy intact (free = the inspection only, used sparingly).

Mirror: `live-mirror/pages/faq-3227.html` (40,957 bytes).

## Rollback
Prior `content.raw` in this repo's git history of `live-mirror/pages/faq-3227.html` (previous commit). Re-POST via `wp/v2/pages/3227`.
