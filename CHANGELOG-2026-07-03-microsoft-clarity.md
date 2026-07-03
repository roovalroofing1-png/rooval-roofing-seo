# Microsoft Clarity analytics installed — 2026-07-03

Owner set up a free Microsoft Clarity project (heatmaps + session recordings) to measure the
conversion work. Claude guided the account/project creation (owner-side, can't create accounts),
retrieved the tracking code, and installed it.

- **Clarity project:** "Rooval roofing", industry B2C Services, project ID **xgs2383107**
  (dashboard: clarity.microsoft.com/projects/view/xgs2383107)
- **Install:** WPCode snippet **2775** ("Microsoft Clarity Analytics"), type=html,
  location=site_wide_header, active — injects the standard `clarity.ms/tag/xgs2383107` loader
  into `<head>` site-wide.
- **Verified:** the script renders on every fresh page render (confirmed via logged-in fetch).

## Caching note (important)
The site is on **Hostinger LiteSpeed server cache** (no LiteSpeed WP plugin, no mu-plugin, no
Hostinger purge function — `X-LSCACHE:y`). Anonymous visitors are served cached HTML; that cache
only purges a URL when that page's **content** changes, so a global `<head>` injection isn't picked
up by already-cached pages. Programmatic full-purge is restricted on Hostinger shared hosting
(`do_action('litespeed_purge_all')` has no listener; `X-LiteSpeed-Purge` header from PHP was
ignored). So Clarity goes live for anonymous visitors as the cache cycles (LiteSpeed TTL, typically
≤1h) or instantly via a **Hostinger hPanel → Clear cache**. Clarity needs up to 2h to show data
regardless, so data collection starts today either way.

Experiment snippet 2774 (used for the purge tests + the earlier Chaty email fix) left in WPCode,
**deactivated**.
