# 2026-07-15 — Corner search restyle + remove one inspection photo

## 1) Header search: full-screen dark modal → compact corner card
Owner feedback: the site-wide header search (added 2026-07-15) opened as a full-screen **dark** overlay.
They wanted it to "stay in the corner when you click on it and you can type stuff" — no dark dimming.

**What changed:** the Blocksy search element and its live "thumbs" results are unchanged — we only
restyled the panel it opens (`#search-modal`, a `.ct-panel[data-behaviour="modal"]` that is
`position:fixed; inset:0` with a `rgba(18,21,25,.98)` dark background). New look:
- pinned **top-right corner**, ~460px wide, auto height, white card with rounded corners + shadow
- **no dark backdrop** — the page stays fully visible behind it
- input made visible (dark text, bordered field) with the gold submit button inline
- live-result titles switched to dark text so they read on the white card
- closes via the **×** button, **Escape**, or re-clicking the header search icon

**Where it lives:** appended to **Customizer → Additional CSS** (`custom_css[blocksy]`), between the
markers `=== Rooval compact corner search ===` … `=== end Rooval corner search ===`.
Deployed via `wp.customize('custom_css[blocksy]').set(existing + css)` then `previewer.save()`.
Source-controlled copy: [`snippets/additional-css-corner-search.css`](snippets/additional-css-corner-search.css).
Verified live (inline in `<head>` for anon) on homepage + `/roof-repair-utah/`.

## 2) Removed one annotated photo from the Payson/Spanish Fork storm post
Post **2924** (`storm-damage-checklist-payson-spanish-fork`) had three "Real Rooval inspection photo"
figures. Owner asked to remove the middle one — the annotated "CertainTeed Black walnut new shingle"
street shot (`rooval-wind-repair-annotated-ground-scaled.jpg`, caption "Wind damage and its fix, seen
from the street — no ladder required."). Removed the whole `<figure>` (image + caption) via WP REST;
the other two inspection photos remain. Media file left in the library (not deleted).
Mirror updated: [`live-mirror/posts/storm-damage-checklist-payson-spanish-fork-2924.html`](live-mirror/posts/storm-damage-checklist-payson-spanish-fork-2924.html).
