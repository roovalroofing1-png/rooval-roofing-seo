# City-page "Schedule My Free Inspection" → CRM scheduling — 2026-07-02

Owner request: on all 12 city/service pages, the CTA-band **"Schedule My Free Inspection"** button
should route leads into the **CRM's scheduling flow** (so they book an inspection that lands in the
CRM), NOT the /roof-quote/ instant-estimate page.

**Destination:** `https://rooval-crm-production.up.railway.app/quote` — the CRM's public `/quote`
page (verified: captures name/address/phone/email, homeowner picks a day + time slot for a free
inspection, submits to `/api/quote` → creates a CRM lead → confirmation email). This is the
`src/app/quote/QuoteForm.tsx` route in the rooval-crm repo; no auth guard, live (HTTP 200).

**What changed:** on each of the 12 pages the "Schedule My Free Inspection" link was an
`<a href="/roof-quote/">` inside a text-editor widget. Changed ONLY that anchor's href to the CRM
URL (targeted regex — each page had 2+ /roof-quote/ links; the instant-quote CTAs were left intact).
Applied via Elementor save_builder, 1 change per page, all saved. Pages (IDs): alpine 2296, provo
2310, orem 2306, highland 2298, springville 2301, lehi 2391, lindon 2299, pleasant-grove 2300,
salt-lake-city 2302, murray 2303, sandy 2304, draper 2308.

**Verified live:** all 12 "Schedule My Free Inspection" buttons now → CRM /quote; 5–7 instant-quote
`/roof-quote/` links per page preserved.

Note: the button points to the raw Railway subdomain. If a custom domain is later pointed at the CRM
(e.g. schedule.rooval-roofing.com), swap the URL. The "Call (385) 424-8810" button (tel:) unchanged.
