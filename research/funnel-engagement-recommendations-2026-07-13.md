The document is complete. Returning it below.

---

# Rooval Funnel — Engagement & Homepage Placement: Research-Backed Recommendations

*Directional-stat flag: most quiz/multi-step conversion figures below come from form-tool vendors (Heyflow, Typeform, Interact, Roofle, Ghostrep). Treat them as "this pattern reliably beats the alternative," not audited numbers to quote to anyone. The few independent citations (NN/g above-fold, goal-gradient behavioral research, Wisepops' 1B-impression exit dataset) are noted as such.*

## The big idea

Rooval's funnel becomes click-worthy the moment it *gives before it asks*. The single strongest, most consistent finding across every research thread is that people engage with a tool that hands them something useful — a real number, a satellite outline of their own roof — before it ever requests their name. That value-first, low-commitment reveal is what makes an instant-quote tool "fun" without a single gimmick: the fun comes from genuine usefulness and a small moment of discovery ("that's *my* roof"), not from spinning wheels, points, or fake countdowns. So the whole strategy is one honest idea: put a genuinely fast, genuinely helpful interactive estimate front-and-center on the homepage, let it warm the visitor up, then hand them off to a human (the free inspection) as the natural next step — neighborly, not slick.

## Funnel format recommendation

**Recommendation: a combined, sequential funnel — instant-quote tool as the top-of-funnel hook, book-an-inspection as the close — not an either/or choice, and not the booking flow alone as primary.**

The three options carry a real tradeoff:

- **Instant-quote tool as primary** wins on *engagement*. It captures intent at the moment of address entry (roofing sites with a real estimator report 6–10% conversion vs. a 2–5% baseline; Roofle claims 8–10%, vendor-sourced). It's the "fun," low-commitment entry point. Its weakness: a satellite estimate is a ballpark, and over-trusting it risks the honesty problem of quoting a number you can't stand behind.
- **Book-an-inspection as primary** wins on *lead quality and honesty*. A booked inspection is a warmer, human-verified lead, and "we confirm it in person" is the most honest promise Rooval can make. Its weakness: it's a bigger ask cold, so fewer visitors start it.
- **Combined/sequential** captures both. Lead with the quote tool to pull people in and pre-qualify them, then end the result screen with "Want us to double-check this in person? Book your free inspection" → `/free-roof-inspection-utah/`. The instant tool warms hesitant visitors; the inspection closes them and produces the quality lead.

The honesty tradeoff actually resolves *in favor* of the combined approach, and it's the reason to prefer it over quote-tool-only: the estimate is explicitly framed as a ballpark that the free inspection confirms, so the tool's one weakness (accuracy) becomes the bridge to the next step instead of a broken promise. This also fits the insurance guardrail cleanly — the inspection is framed strictly as *confirming and documenting*, never as adjuster-facing or "free roof" language. Make the CRM booking record the single source of truth for the lead.

## Homepage entry point — placement, copy, design

**Above the fold, hero, mobile-first.** Users spend ~57% of viewing time above the fold (NN/g-sourced), and one clear primary CTA beats several competing ones — some studies show conversion dropping sharply when multiple CTAs fight for attention. So the hero commits to **one dominant primary CTA plus one lighter secondary**, never three.

**Hero layout (top to bottom, single column on mobile):**

1. **Headline** using the trades formula *who + service + benefit*: e.g. "Honest roof estimates for Lehi homeowners — see yours in under 2 minutes." Avoid generic "Welcome to Rooval."
2. **Subhead** bridging to the tool: "Get a real ballpark from satellite data, then we confirm it in person — free."
3. **Primary CTA (dominant):** "Get My Instant Estimate" → `/roof-quote/`.
4. **Secondary CTA (lighter, e.g. text/outline button):** "Or book a free inspection" → `/free-roof-inspection-utah/`.
5. **Trust strip directly beneath the CTAs, visible without scrolling:** Google star rating + review count, "Licensed & insured," "Family-owned in Lehi." Trust badges next to the CTA (not buried lower) are one of the fastest high-impact roofing-homepage changes.

**Design direction:** warm and neighborly, not slick/AI-looking. Full-width single-column tool embed (Roofle's own guidance — never squeezed into a two-column layout, which breaks mobile). Primary CTA button 56–72px tall (above the 44px floor), 12–16px spacing between buttons, 4.5:1 contrast (WCAG AA). One gentle micro-animation accent on the primary CTA (a soft pulse) — accents only, not on every element.

**Sticky + repeat:**
- A **sticky bottom bar on mobile** with two buttons — "Instant Estimate" and "Tap to Call" (real `tel:` link, 48px+ tap height). The sticky mobile call bar is repeatedly cited as the highest-leverage, lowest-effort mobile addition (25–40% call-volume lift, vendor-sourced but consistent). Ensure it doesn't collide with any chat widget.
- **Repeat the same two-CTA module once more** further down (after reviews/before-after) for scroll-past visitors — same two actions, no new third CTA type.

Interactive teaser idea (optional, honest): show a small animated roof-outline/satellite-zoom placeholder in the hero that invites the address entry — the visual feedback loop is what makes the tool feel fun.

## Engagement mechanics to ADD (ranked)

1. **Sequential quote → inspection handoff.** The result screen ends with a warm "confirm this in person" booking button. Highest-value change; ties the two assets together and lifts lead quality. (Best-practice reasoning, not a proven stat.)
2. **Conversational, one-question-at-a-time quote flow** rather than a long single-page form. Typeform's 2.6M-form dataset shows ~47% completion vs. ~21% traditional; conversational forms run 15–40% higher. Matches the Roofle pattern.
3. **Step-labeled progress indicator — starting at step 2, not step 1.** Progress bars cut multi-step abandonment ~20–30% (goal-gradient effect), but a bar on step 1 can backfire (one study: removing it from step 1 lifted conversion 133%). So: address entry = no bar; once roof data pulls, show "Address → Roof Details → Your Estimate." Cap at 4–6 steps.
4. **Instant animated result reveal** — a simple roof outline with sq-ft/estimate. The "that's my roof" moment is the core fun mechanic and requires no gimmicks.
5. **Before/after drag slider** using real Rooval job photos, placed between the tool and testimonials. Repeatedly called out as a standout engaging feature; cheap plain HTML/CSS/JS, Elementor-embeddable, and zero insurance-claim risk (pure craftsmanship proof).
6. **Trust + privacy line beside both funnels.** A one-line "Your info is private — never sold or shared" next to the submit button, plus a real named/neighborhood testimonial adjacent to the CTA. The submit moment is the highest-friction point; this is cheap and on-brand.
7. **Minimal-field booking form.** Name, phone, address, one qualifying question max. Conversion falls off a cliff past 5–7 fields (~23% at 3 fields → ~11% at 7). Push roof age / damage details to the call or inspection.
8. **Warm final-step microcopy** ("Almost there — just your name and best time to reach you") and discovery-framed labels ("Curious what your roof would cost?") — neighborly, not salesy.
9. **Gentle CTA micro-interaction** (Elementor/Essential Addons hover effects) on the primary button only — 1–2 accents total.

## What NOT to do

- **No fake urgency.** No generic countdown timers or decrementing scarcity counters. Users run the "refresh test," and the FTC has cracked down on deceptive timers. If Rooval wants urgency, use something *true and checkable* pulled from the actual CRM calendar ("Next available inspection: Thursday") — never a gimmick.
- **No over-gamification.** No points, badges, streaks, locked "achievements," or spin-to-win discount wheels. Research shows manipulative gamification lifts short-term metrics but erodes trust — a direct clash with the warm/honest brand and the insurance-honesty positioning. Keep "fun" coming from real usefulness (instant number, roof visual, slider), not game mechanics.
- **No dark patterns.** No fake progress bars, hidden gates, forced sharing, or a manipulative "WAIT! Don't leave!" exit popup. If an exit-intent is used at all, make it a soft, specific, honest offer (e.g., a free storm-damage checklist download), never the inspection booking itself — and keep it 1–3 fields. Exit popups average only ~4% recovery (Wisepops, 1B impressions); the sticky bar is the better bet, so treat exit-intent as low priority.
- **No "free roof," deductible, or adjuster language anywhere** in funnel copy — house rule. Stick to "estimate," "inspection," "confirm," and "document." The satellite estimate must be framed as a ballpark, never a firm price.
- **No heavy/slow tool.** A 3-second load delay can cost ~20% of conversions before engagement; 83% of users expect ≤3s mobile loads. Given the site's Blocksy/Elementor Lighthouse sensitivity, lazy-load the widget and audit its mobile load time specifically.
- **No too-many-fields form** and no split two-column mobile layout — both kill completion.
- **No third competing CTA** in the hero or the repeated module.

## Concrete build checklist for Rooval (WordPress/Blocksy/Elementor)

Prioritized, tied to existing assets (`/roof-quote/`, `/free-roof-inspection-utah/`, homepage).

**P0 — highest leverage, do first**
1. **Wire CRM instant-notify (speed-to-lead).** The research is unanimous that response speed outweighs funnel polish; do this alongside (ties to the CRM Phase 4 plan already in memory). Manager controls Railway — coordinate.
2. **Rebuild the homepage hero** with the two-CTA module above the fold: primary "Get My Instant Estimate" → `/roof-quote/`, secondary "Book a free inspection" → `/free-roof-inspection-utah/`, trust strip directly beneath.
3. **Add the sticky mobile bottom bar** (Instant Estimate + tap-to-call `tel:` link, 48px+ targets), site-wide; confirm no chat-widget collision.

**P1 — funnel mechanics**
4. **Add the sequential handoff:** quote result screen ends with "Confirm this in person → Book your free inspection" linking to `/free-roof-inspection-utah/`.
5. **Add step-labeled progress to `/roof-quote/`** starting at step 2 (not step 1), capped at 4–6 steps; conversational one-question-at-a-time flow if not already.
6. **Add the ballpark/accuracy bridge line** under the tool: "A solid ballpark from satellite data — our free inspection confirms the details in person."
7. **Audit `/free-roof-inspection-utah/` form** down to name/phone/address + one qualifying question; verify the CRM embed is fully thumb-friendly, no horizontal scroll. Keep it a dedicated distraction-free page (validated — don't port the calendar onto the homepage).

**P2 — trust & polish**
8. **Add a before/after drag slider** from real job photos (plain HTML/CSS/JS Elementor embed) between the tool and testimonials.
9. **Add privacy line + named local testimonial** beside both the quote tool and the booking form.
10. **Repeat the two-CTA module** lower on the homepage after the reviews section.
11. **Add one gentle micro-interaction** on the primary CTA (Essential Addons hover, if already installed).

**P3 — performance & guardrails**
12. **Lazy-load the quote widget** and run a mobile Lighthouse pass; keep load ≤3s.
13. **Copy audit pass:** confirm no "free roof"/deductible/adjuster language, no fake urgency/countdowns anywhere. If any capacity/urgency cue is used, wire it to real CRM calendar availability only.
14. **Skip** exit-intent, spin-wheels, points/badges. If exit-intent is later wanted, soft checklist download only (1–3 fields).

**If the tools ever need replacing** (not now): Fluent Forms (Elementor integration, built-in progress/step indicators) or Gravity Forms (most capable paged forms) are the standard WordPress multi-step choices.