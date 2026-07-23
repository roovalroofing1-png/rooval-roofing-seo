# 2026-07-23 — Sitewide header redesign (WTF-style: solid dark, centered logo)

Owner: "have our logo in the middle and make it darker as well" — modeled on Western Timber Frame's header (solid dark bar, centered logo). The old header was a **transparent** Blocksy header (no background) that let hero text/content bleed through, and the logo sat on the left.

## What changed (Blocksy Customizer theme_mods — DB, documented here for restore)

All changes are in the `header_placements` theme_mod (`sections[0]`) + core `custom_css[blocksy]`, applied via `wp.customize` in the Customizer and published.

### 1. Killed the transparent header (the bleed-through fix)
- `sections[0].settings.has_transparent_header`: **"yes" → "no"**. The header is now a solid, in-flow bar; page content flows cleanly **below** it (nothing hidden or bleeding through). This also un-hid content that the taller header would otherwise cover (e.g. the homepage H1 "Lehi & Utah County Roofing Contractor", which was sitting *under* the absolute-positioned transparent header).
- `sections[0].settings.headerBackground.backgroundColor.default.color`: unset (`CT_CSS_SKIP_RULEDEFAULT`) → **`#222a2f`** (dark charcoal, matches the FAQ hero). Also set `transparentHeaderBackground` + `stickyHeaderBackground` to `#222a2f` for consistency (sticky is off).

### 2. Centered the logo (two-row layout, WTF-style adapted for a wide nav)
Rooval's nav is too wide to sit beside a centered logo on one row (it would overlap), so — like WTF's premium variant — the logo goes on top, the full nav centered below:
- **Desktop `middle-row`**: was `start=[logo]`, `end=[menu,search,button]` → now `middle=[logo]`, `end=[search,button]` (logo dead-center, search + gold "Free Inspection" button top-right).
- **Desktop `bottom-row`**: was empty → now `middle=[menu]` (full nav centered below the logo).
- **Mobile** layout unchanged (logo-left + hamburger-right) — centering a logo next to a hamburger looks off; mobile just inherits the dark background.

### 3. Uniform dark rows + readable nav (custom CSS)
Blocksy's non-transparent skin renders `middle-row` black and `bottom-row` **white** (there's no "bottom-row" item to set a background on natively), which made the white nav text invisible. Fixed with a small block appended to `custom_css[blocksy]` (see `config/header-dark-centered-css.css`):
```css
/* Rooval solid dark header (2026-07-23) */
#header [data-row="middle"],#header [data-row="bottom"]{background-color:#222a2f !important}
#header [data-row="bottom"] .menu-item>a:hover,#header [data-row="bottom"] .menu-item>a:focus{color:#ffd200 !important}
/* end Rooval header */
```
Nav links were already `--theme-palette-color-7` (`#FDFDFD` near-white), search icon already white, and the button is gold (`#ffcd05`) with dark text — so no other color changes were needed; only the row backgrounds had to be unified.

## Verified live (logged-out, cache-busted)
- **Homepage** (default template) — desktop + **mobile**: dark header, logo centered (desktop) / left (mobile), nav readable, hero + previously-hidden H1 now fully visible below the header.
- **Lehi city page** (`/roofing-lehi-utah/`, Elementor): header correct, Elementor hero flows cleanly below.
- **FAQ page**: header correct; FAQ hero top-padding reduced back to normal (the transparent-header clearance hack is no longer needed).

## Rollback
In Customizer (or restore from a Hostinger/UpdraftPlus backup):
1. `header_placements` → `sections[0].settings.has_transparent_header` back to `"yes"`.
2. Restore `middle-row` to `start=[logo]`, `end=[menu,search,button]`; empty the `bottom-row`.
3. Remove the `/* Rooval solid dark header */ … /* end Rooval header */` block from Additional CSS.
Backups own the true DB restore; this file is the readable record.
