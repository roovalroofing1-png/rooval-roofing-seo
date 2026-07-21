# GEO Measurement — how to track if Rooval is getting cited by AI

The point of WS8: a **repeatable scoreboard** so we can watch Rooval climb into AI answers over the coming months. Three layers, cheapest first.

## Layer 1 — Monthly citation scoreboard ($0, do this every month)
The core habit. Same questions, every month, compared over time.

1. **Fixed prompt set:** `geo-intel/config/roofing-prompts.yaml` (13 citation prompts, 5 clusters). Do NOT change the core 13 — consistency is what makes the trend meaningful. (Deck has its own: `deck-prompts.yaml`.) **Entity-recognition probes** `roof-14`/`roof-15` (cluster `entity`, added 2026-07-21 per geo-book Ch4) are scored **on a SEPARATE line** — they measure whether an engine describes Rooval correctly (correct-description y/n) and states it's licensed (licensed-stated y/n), NOT citation rate. The citation scoreboard denominator stays **X/13** forever; never fold the entity probes into it.
2. **Run them** (pick one, be consistent):
   - **Proxy (what we did at launch, $0, fast):** run each prompt through web search and record who's named/cited. Directional, not the live engines — but repeatable and free.
   - **True engines (most accurate, manual, $0 but ~1 hr):** paste each prompt by hand into ChatGPT, Perplexity, Gemini, and Grok; record whether Rooval is named, which competitors are named, which URLs are cited, and whether any engine describes Rooval WRONG (e.g., as handling insurance claims — a compliance flag to fix same-week). This is the honest gold standard until the API layer exists.
3. **Log it:** save a dated file `geo-intel/data/geo-baseline-YYYY-MM-DD.md` (copy the launch-day file's format), commit + push. Compare to prior months: any cluster moving `none → weak → present` is real progress.
4. **Cadence:** first Monday of each month.

**Launch-day baseline (2026-07-13): 0/13 — clean zero.** Expected on day 0. Watch the **storm** cluster first (dedicated pages, no directory moat). local-pick/cost move slowest (directory-gated → need WS7).

## Layer 2 — GA4 AI-referral tracking (FREE, real traffic — set up once)
Layer 1 measures *citations*; this measures *actual clicks* from AI engines to the site.
- Quick ad-hoc look (illustrative): GA4 → Explore → Free-form exploration filtered to session source / referrer containing e.g. `chatgpt.com`, `perplexity.ai`, `gemini.google.com`, `copilot.microsoft`. **The authoritative live definition is the channel group in the Status line below** — use its exact 8-domain regex, not this example list, so both stay in sync.
- Tie it to the `generate_lead` / form-start events to see if AI visitors actually book inspections.
- **Caveat:** this UNDERCOUNTS — a lot of AI traffic arrives as "direct" (no referrer). Treat it as directional, floor-not-ceiling.
- Status: **LIVE as of 2026-07-21** (geo-book Ch6) — custom channel group **"Channels incl. AI Assistants"** on the roofing property (confirmed by Measurement ID **G-7D5VK6JDVE** on the data stream, not a hardcoded property id), one channel **"AI Assistants" at position 1**, condition `Source` **partially matches regex** `chatgpt\.com|chat\.openai\.com|perplexity\.ai|copilot\.microsoft\.com|gemini\.google\.com|claude\.ai|you\.com|poe\.com`. Read monthly at **Reports → Acquisition → Traffic acquisition** (switch the channel-group selector to "Channels incl. AI Assistants", read the "AI Assistants" sessions row). Still undercounts — direct-attributed AI traffic is invisible; floor-not-ceiling.

## Layer 3 — Automated API tracker (PAID, true engine citations — when owner opts in)
The real, automated version. Blueprint already exists (the GEO Intelligence System doc).
- Create 5 API keys: OpenAI, Google (Gemini), xAI (Grok), Perplexity, DataForSEO (AI Overviews).
- Realistic cost: **~$10–30/month** for the 13 roofing + 12 deck prompts across engines.
- Then: prompt matrix → per-engine adapters (extract each engine's native citation field) → SQLite → monthly scorecard, auto-committed here.
- Status: NOT built — owner has not created keys and chose not to spend. Build when ready.

## Diagnostic + reporting (added Ch6, 2026-07-21)
The monthly run now also: (a) fills the owner-readable **`geo-book/GEO-MONTHLY-REPORT-TEMPLATE.md`** (headline X/13, cluster + share-of-citation table, entity-probe line, GA4 AI-Assistants sessions, four-failure status); and (b) **re-scans the four-failure diagnostic** in `geo-book/CH6-measurement-2026-07-20.md` §6.2 (Access / Structure / Authority / Coverage, in that order) whenever the score stalls, to decide which lever to work next. Cadence unchanged — **first Monday monthly; next run Aug 3, 2026.** The roof-14/15 entity probes stay on their SEPARATE scored line (never in the /13), as above.

---
**Owner's standing rule:** organic only, no paid ads. This measurement stack is all $0 except Layer 3 (opt-in). Keep every re-run's prompt list identical to `roofing-prompts.yaml`.
