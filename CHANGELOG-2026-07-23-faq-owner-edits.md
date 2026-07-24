# 2026-07-23 — FAQ page (3227) owner content edits + tap-to-call + hero-padding fix

Owner reviewed the launched `/faq/` and sent a specific list of wording/behavior changes. All applied to page 3227 and the FAQPage JSON-LD; page rebuilt via `scratchpad/faq_rebuild2.py`, mirrored to `live-mirror/pages/faq-3227.html`.

## Intro (summary before the questions)
- **Dropped the full street address** — "based at 2526 N Elm Dr in Lehi, Utah" → **"based in Lehi, Utah"** (owner: "I will put Lehi, Utah").
- **"book a free inspection" is now a link** → `/free-roof-inspection-utah/` (owner wanted it clickable).

## Cost & Financing
- **Do you offer financing or payment plans?** → shortened to owner's wording: "Yes — we work with a financing partner so you can pay over time instead of all at once." (dropped the interest/bank caveats).
- **Do you charge for an estimate or inspection?** → "No — the inspection is free. Once the inspection is completed, we'll share our findings with you."
- **Is a new roof worth it for resale value?** → owner said the old answer confused him; rewritten clearer: leads with "Yes," frames it as removing a home-inspection red flag / negotiating lever, backed by the workmanship warranty.

## Trust, Licensing & Warranty
- **Are you licensed and insured?** → now states **"we're licensed and insured"** (owner confirmed insured; old answer only covered the DOPL license). Keeps DOPL #13861046-5501 + the dopl.utah.gov self-verify line.
- **What warranty do you offer?** → owner's exact wording: "We back every installation with a workmanship warranty covering our labor, separate from the manufacturer's warranty on materials."
- **Are you reputable / do you have reviews?** → "Yes — check out our **Google reviews** and see what our customers say about Rooval Roofing." **"Google reviews" links to the live GBP reviews page** (`search.google.com/local/reviews?placeid=ChIJm2lG4ZNauooRzEF8fAFh9_U`). (No review count in copy — per owner rule.)
- **Are you a local Utah company?** → owner's rewrite: local, **family-owned**, located in Lehi, full 16-city service list, "if you don't see your city here… call or text us."
- **Do you really offer free inspections?** → **REMOVED** (owner: already answered by "Do you charge for an estimate or inspection?").

## Storm Damage & Documentation
- **Do you help with storm damage insurance claims?** → **removed the disclaimer sentence** "Anything about your insurance … is between you and your insurance company; we're roofers, not insurance experts" (owner: take it out). The answer now stays roof-side-only ("we document the damage and can help you put together what we found") without the self-deprecating "not insurance experts" line. The other storm Q ("Do you deal with my insurance adjuster?") still carries the light "that's between you and them" deflection, so insurance is still not advised on.

## Sitewide-in-FAQ
- **Every phone number is now tap-to-call** — `(385) 424-8810` → `<a href="tel:+13854248810">`. 6 tel links in the answers + the closing CTA. (A tel: link initiates a **call**; there's no single link that both calls and texts, so "call or text" copy stays as text with the number tapping to call.)
- **Hero top-padding reduced** from the transparent-header clearance value (`clamp(120px,17vw,168px)`) back to normal (`clamp(44px,6vw,74px)`) now that the header is a solid in-flow bar (see the header redesign changelog).

## Counts
- Q&As: **37 → 36** (removed the duplicate free-inspection Q). FAQPage JSON-LD regenerated to match (36 questions).

## Still open (owner to confirm — unchanged from before)
- Response-time window ("How soon can you come out?" still generic), and whether Rooval always pulls the permit. Crew-vs-subs answer stays in the safe "you'll know who's on your roof" form.

## Add (2026-07-23 evening) — Owens Corning shingles
Owner: "talk about the product that we use as well — Owens Corning shingle." Added a dedicated FAQ Q **"What brand of shingles do you install?"** as the first item in Materials & Options: we install **Owens Corning** shingles, architectural asphalt for most Utah homes, backed by the OC manufacturer warranty on materials (separate from our workmanship warranty). Included in the FAQPage JSON-LD (37 Q&As now) for GEO/rich-result citation. Did NOT claim any OC certification/Preferred-Contractor tier (owner to confirm before we position that).

## Consolidation (2026-07-24) — 38 → 24 questions
Owner: "there's just way too many FAQ questions on there, summarize them and optimize them." Merged redundant Q&As; **every owner-approved answer kept verbatim** (financing, inspection-charge, warranty, licensed+insured, reviews, local-company, Owens Corning, insurance-certification).

**Merges:**
- Cost: "why do quotes vary" + "what's included in a quote" folded into **How much does a new roof cost in Utah?**
- Storm: "what to do first after a storm" + "shingles blew off" + "is it an emergency" → **What should I do right after a storm?**
- Damage: "what does hail damage look like" + wind signs → **What does hail and wind damage look like?**
- Repair/replace: "cheaper to repair or replace" + "can my roof be repaired" + "signs my roof needs replacing" (3) → **Do I need a repair or a full replacement?**
- Insurance/storm: "help with storm damage claims" + "deal with my adjuster" → **Do you help with storm damage documentation?** (roof-side only, no policy talk)
- Trust: crew-vs-subs folded into **Are you licensed and insured?**
- Materials: "architectural vs 3-tab" + "does Utah heat damage shingles" folded into **What's the best roofing material for Utah?**
- Process: **"How long does a roof replacement take?" REMOVED as a standalone** (it was an exact duplicate of a question on all 12 city pages) → timeline + cleanup/landscaping folded into **What's the process from first call to finished roof?**
- "Do I need to be home?" folded into **What happens during a roof inspection?**
- "Do you serve my city?" dropped — the local-company answer already lists all 16 cities.

Result: 5 balanced categories (4/5/5/5/5). FAQPage JSON-LD regenerated (24 Qs). Verified live: 24 visible = 24 schema, 7 tap-to-call links, reviews link, no insurance-policy language.

## ⚠️ STILL OPEN — city-page insurance answer (WPCode snippet 2621, 12 pages)
The shared city FAQ answer still says: *"Most homeowner's insurance policies in Utah cover sudden storm damage… Age-related wear is not covered"* and *"documents… at no cost."* Owner 2026-07-24: insurance questions are fine to keep **as long as we're not talking about policy** — acts of God / wind / hail damage is OK. So the **policy-coverage sentence must be removed** and **"at no cost" dropped** (documentation is a paid service). Needs the WPCode editor (browser); not done yet.
