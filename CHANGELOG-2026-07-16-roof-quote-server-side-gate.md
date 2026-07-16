# 2026-07-16 — /roof-quote/ business-setup panel gated server-side

## Why
The quote tool's page source publicly exposed the internal admin panel: Google API key field, Base-$/square pricing tiers, markup/APR/term, the CRM lead-webhook URL field, Place ID, and staff-mode toggle — "hidden" only by CSS behind a guessable client-side `?admin=1` gate, readable by anyone via view-source. Owner asked for a server-side fix (2026-07-16).

## What changed
`public_html/roof-quote/` on Hostinger (file manager deploy, owner-approved):
- **index.html → index.php** with a PHP gate at the top: `$RQ_ADMIN = isset($_GET['admin']) && hash_equals('<TOKEN>', $_GET['admin'])`. The token is 32 hex chars, stored in `~/.rooval/secrets.env` (`ROOF_QUOTE_ADMIN_TOKEN`) — NOT in this repo.
- **Public visitors:** the entire setup panel is server-side replaced with inert hidden stubs (same element IDs, so the tool's JS wiring is untouched — verified zero console errors). `const adminMode` is now server-rendered `false`; the old `?admin=1`/`?setup=1` doors are dead. The "$1,300 steep / effective $/sq" explanatory comments and "append ?admin=1" hints are scrubbed.
- **Admin (owner):** `/roof-quote/?admin=<token>` renders the real panel (`adminMode=true`, `Cache-Control: no-store, private`).
- Old file kept as `index.html.off-2026-07-16` — **instant rollback = rename it back to index.html and delete index.php.**

## What did NOT change
Calculator math, embedded (referrer-restricted) Maps/Solar key, Place ID, lead webhook, booking flow — all identical. Note: the pricing *constants* still ship in the JS (any client-side calculator requires that); what's gone is the labeled admin dashboard and the pricing-model commentary.

## Verified live (2026-07-16)
- Public source: 0 hits for Business setup / Base $/square / Lead webhook / admin=1 / pricing comments; stub present; no `<?php` leakage.
- Wrong token → public variant. Correct token → panel renders.
- Functional: address → geocode → satellite roof detection (10 planes, auto pitch 6.5/12, 2 stories) → Confirm Your Roof → lead-capture step, zero console errors. (Stopped before CAPTCHA/lead submit — would have fired the live CRM webhook.)

## Follow-ups for owner
- Verify the embedded Google API key is HTTP-referrer-restricted to rooval-roofing.com (Google Cloud Console → Credentials).
- The `roof-quote-deploy/`, `index(1).html`, `.bak`, `.bak2` files in that folder are pre-existing clutter; delete when confident.
