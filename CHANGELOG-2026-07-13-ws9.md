# WS9 — Technical & crawler hygiene (2026-07-13)

## Audited (all PASS — no change needed)
- robots.txt: AI crawlers (GPTBot, OAI-SearchBot, PerplexityBot, ClaudeBot, Google-Extended, Bingbot, etc.) are NOT blocked — they fall under `User-agent: *` which only disallows /wp-admin/. Allowed. (Verify, don't rebuild — done.)
- City-page FAQ content present in server-side HTML (SSR) — not JS-only. PASS.
- Storm-data page images all have alt text. PASS.
- Tap-to-call: footer + Chaty phone already tel:-linked (2 tel: links on homepage).

## Deployed live
- **Footer DOPL license** added to WPCode snippet 2618 (footer legal bar): "Utah GC Lic. #13861046-5501" — now shows sitewide (verified homepage + About). Covers the footer + About placement in one move.
- **"Howdy" removed** from wp-admin greeting via NEW WPCode PHP snippet id 3014 (see snippets/remove-howdy-admin-bar-3014.php). Greeting now reads just "Matthew Thompson". Cosmetic/admin-only; guarded + priority 99999. Site health verified 200 across homepage/city/storm pages after activation.

## Deferred (flagged, NOT done — needs careful inspection)
- **/roof-quote/ canonical tag**: this is a CUSTOM-built page (the instant-quote tool — no standard WP body classes or Rank Math head), so it can't take a simple Rank Math canonical. Editing it blindly risks the lead funnel. Needs a focused look at how the page is built before adding a canonical. Low priority (conversion tool, not a ranking page).
- **Blocksy header top-bar phone tap-to-call**: "Call us today (385) 424-8810" in the theme header is still plain text (theme-mod/Customizer edit). Footer + Chaty already tappable, so lower priority; could add via a small client-side JS linkify snippet later.
