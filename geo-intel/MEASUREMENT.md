# GEO Measurement — how to track if Rooval is getting cited by AI

The point of WS8: a **repeatable scoreboard** so we can watch Rooval climb into AI answers over the coming months. Three layers, cheapest first.

## Layer 1 — Monthly citation scoreboard ($0, do this every month)
The core habit. Same questions, every month, compared over time.

1. **Fixed prompt set:** `geo-intel/config/roofing-prompts.yaml` (13 prompts, 5 clusters). Do NOT change the list — consistency is what makes the trend meaningful. (Deck has its own: `deck-prompts.yaml`.)
2. **Run them** (pick one, be consistent):
   - **Proxy (what we did at launch, $0, fast):** run each prompt through web search and record who's named/cited. Directional, not the live engines — but repeatable and free.
   - **True engines (most accurate, manual, $0 but ~1 hr):** paste each prompt by hand into ChatGPT, Perplexity, Gemini, and Grok; record whether Rooval is named, which competitors are named, which URLs are cited, and whether any engine describes Rooval WRONG (e.g., as handling insurance claims — a compliance flag to fix same-week). This is the honest gold standard until the API layer exists.
3. **Log it:** save a dated file `geo-intel/data/geo-baseline-YYYY-MM-DD.md` (copy the launch-day file's format), commit + push. Compare to prior months: any cluster moving `none → weak → present` is real progress.
4. **Cadence:** first Monday of each month.

**Launch-day baseline (2026-07-13): 0/13 — clean zero.** Expected on day 0. Watch the **storm** cluster first (dedicated pages, no directory moat). local-pick/cost move slowest (directory-gated → need WS7).

## Layer 2 — GA4 AI-referral tracking (FREE, real traffic — set up once)
Layer 1 measures *citations*; this measures *actual clicks* from AI engines to the site.
- In GA4 → Explore → build a Free-form exploration filtered to session source / referrer containing: `chatgpt.com`, `perplexity.ai`, `gemini.google.com`, `copilot.microsoft`, `grok` / `x.ai`.
- Tie it to the `generate_lead` / form-start events to see if AI visitors actually book inspections.
- **Caveat:** this UNDERCOUNTS — a lot of AI traffic arrives as "direct" (no referrer). Treat it as directional, floor-not-ceiling.
- Status: NOT set up yet — offered as the next real-measurement step (browser work in GA4, property G-7D5VK6JDVE).

## Layer 3 — Automated API tracker (PAID, true engine citations — when owner opts in)
The real, automated version. Blueprint already exists (the GEO Intelligence System doc).
- Create 5 API keys: OpenAI, Google (Gemini), xAI (Grok), Perplexity, DataForSEO (AI Overviews).
- Realistic cost: **~$10–30/month** for the 13 roofing + 12 deck prompts across engines.
- Then: prompt matrix → per-engine adapters (extract each engine's native citation field) → SQLite → monthly scorecard, auto-committed here.
- Status: NOT built — owner has not created keys and chose not to spend. Build when ready.

---
**Owner's standing rule:** organic only, no paid ads. This measurement stack is all $0 except Layer 3 (opt-in). Keep every re-run's prompt list identical to `roofing-prompts.yaml`.
