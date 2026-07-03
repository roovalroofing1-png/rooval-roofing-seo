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

## CORRECTION — Clarity was live for anonymous visitors all along ✅
The initial "stale LiteSpeed cache" theory was wrong. The **Flying Scripts** plugin rewrites
scripts for anonymous visitors into `data:text/javascript;base64,...` URIs, delay-loaded on user
interaction (with a timeout fallback) — same treatment as the site's GTM. A plain-text search for
the script therefore false-negatives on anon HTML. Decoding the base64 blobs confirmed the Clarity
loader (project xgs2383107) **live on all pages** for anonymous visitors. Performance-friendly and
consistent with existing analytics; sub-second bounces may not fire Clarity (acceptable).
Testing tip: send a `wordpress_logged_in_x=1` cookie to bypass page cache and render fresh as-anon;
decode `data:text/javascript;base64,` blobs before concluding a script is missing.

Experiment snippet 2774 (used for the purge tests + the earlier Chaty email fix) left in WPCode,
**deactivated**.
