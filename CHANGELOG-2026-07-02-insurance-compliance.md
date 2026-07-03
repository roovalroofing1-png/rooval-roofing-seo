# Insurance-claims compliance purge — 2026-07-02

**Owner directive enforced:** Rooval Roofing is NOT a claims expert. No "free roof / qualify through
insurance" promises, no deductible talk, no adjuster meetings, no "we handle/help with your claim."
Rooval only **inspects and documents** storm damage; the homeowner keeps the records and decides
whether to file. See memory `insurance-messaging-rule`.

An earlier spawned session was supposed to handle this but never landed — the copy was still live.
All edits below were applied to the live site via WP REST / Elementor `save_builder` / WPCode form
save, and **verified against the live public HTML**. Full DB (incl. WPCode snippets) is backed up in
UpdraftPlus (2026-07-02 restore point) — that is the rollback source of truth.

## Visible copy (customer-facing)

| Page | Was | Now |
|---|---|---|
| **/about-us/** (Elementor pg 40, heading) | "Inspect for Storm Damage – You Might Qualify for a Roof Replacement Through Your Insurance!" | "Inspect & Document Any Storm Damage" |
| **/about-us/** (text block 1) | "we'll guide you through the process of filing a claim with your insurance provider… ensuring all necessary paperwork is completed… identify any other covered damage" | "we thoroughly document it with detailed photos and a clear written assessment… You keep that documentation… whether you file anything with your insurer is entirely your decision… flags any other storm-related damage" |
| **/about-us/** (team bio) | "From assessing storm damage to working with insurance companies…" | "From assessing storm damage to providing clear, honest documentation…" |
| **/roof-tune-up/** (pg 2626 content) | "document everything for your insurance claim — at no added cost" | "document any storm damage we find — at no added cost" |
| **/** homepage (Elementor pg 1723, FAQ item 3) | Q: "Need help with a roof insurance claim?" / A: "We can provide inspection details and estimates your insurer may request." | Q: "Do you inspect for storm and hail damage?" / A: "Yes… we'll inspect and document any storm or hail damage… You keep that documentation… We're roofers, not a claims service, so we don't handle or negotiate the claim itself…" |

## Structured data (JSON-LD schema)

- **WPCode snippet 2352** (sitewide RoofingContractor schema, injected in `<head>` on every page):
  removed the `{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Insurance Claim
  Assistance" } }` service from `hasOfferCatalog`. All other services (Roof Installation, Repair,
  Replacement, Metal Roofing, etc.), NAP, geo, areaServed, and AggregateRating left intact. Snippet
  kept active. Note: "licensed and insured Utah roofing contractor" in the description is legitimate
  (Rooval's own coverage) and was kept.
- **WPCode snippet 2621** (City-Pages FAQ FAQPage schema): Pleasant Grove FAQ answer changed from
  "…reach out for a free inspection and we will help with the insurance claim if needed." to
  "…reach out for a free inspection and we will document any storm damage we find for your records."
  (Only city page that carried claims-assistance language.)

## SEO meta

- **Post 2359** (`/utah-hail-damage-roof-insurance-claim/`) — the post body was already rewritten
  compliant (educates homeowners about roofing-scam red flags: "free roofs", handling claims,
  waiving deductibles = illegal), but the Rank Math **meta was stale**: title/description still said
  "how to file a hail damage roof insurance claim… Rooval Roofing assists homeowners."
  New title: "Utah Hail Damage Roofs: Honest Inspection & Documentation".
  New description: inspect-and-document framing, homeowner decides. (Slug unchanged to avoid redirects.)

## Verification

Full sitemap sweep (30 public URLs) after fixes: **0 violations** for insurance-claim positioning,
warranty-duration, deductible, adjuster, "qualify for a free roof", or "we handle your claim".
Legitimate phrasing preserved: "free inspection/estimate", "licensed and insured", roof-lifespan
years, and the scam-warning/educational content on post 2359.

## Known remaining schema items (NOT insurance-compliance — deferred, need owner input)

From the 2026-07-01 audit: schema `reviewCount` (shows 17; owner said ~31 — needs the verified count);
two competing RoofingContractor entities (Rank Math's + snippet 2352's) could be consolidated;
some empty FAQPage `acceptedAnswer` fields. None of these are directive violations.
