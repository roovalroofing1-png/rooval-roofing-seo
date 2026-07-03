# Email standardization → info@rooval-roofing.com — 2026-07-02

Owner decision (option A): all email links should use the displayed address
**info@rooval-roofing.com** (not the Gmail addresses that were wired into the links).

## Fixed (live-verified)
- **"Get a quote" contact section** (Elementor template **2229**, shown on home/about/contact/
  our-services) — the email link was `mailto:roovalroofing@gmail.com` (stored inside a link object).
  Changed to `info@rooval-roofing.com`. (Deep-walked the Elementor tree to reach the link object.)
- **Privacy page (2614)** and **Terms page (2615)** — content had `roovalroofing1@gmail.com`
  (mailto + visible text, 2 each). Changed to `info@rooval-roofing.com`.
- Verified: `roovalroofing1@gmail.com` now appears on **0 pages**; privacy/terms show info@ (4×).

## Still remaining — the Chaty floating "Email" button (needs a manual edit)
The floating "Contact us" widget (Chaty plugin, folder `cht-icons`) has an **Email channel** whose
address is `roovalroofing@gmail.com`. It renders on every page, so a gmail `mailto:` still shows
sitewide from that one source. Chaty stores this in its own per-widget config, edited through a React
admin SPA that did not render/save reliably via automation.

**15-second manual fix:** WP Admin → **Chaty** → open the widget → **Email** channel →
change `roovalroofing@gmail.com` to `info@rooval-roofing.com` → Save.
(Alternatively, ask Claude to retry the Chaty UI automation.)
