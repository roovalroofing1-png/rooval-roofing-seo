# Rooval Roofing — Monthly GEO Report (fill-in template)

Copy this file to `geo-intel/data/geo-report-YYYY-MM.md` each month, fill the blanks, commit.
Plain English on purpose — every number has a one-line "what this means." Run it the **first Monday
of each month** (next: **Aug 3, 2026**), using the same 13 questions in
`geo-intel/config/roofing-prompts.yaml`. **Do not** add questions to the core 13, and **do not**
re-run early (it corrupts the month-over-month trend).

**Standing note (never edited per month):** Rooval *inspects and documents* storm damage; the
homeowner files their own claim. This report never mirrors "handles your claim / free roof /
deductible" language, and never reproduces a competitor's insurance-claims marketing word-for-word —
competitor insurance positioning is recorded neutrally only (e.g. "markets around insurance-claims
assistance").

---

## 1. Headline
> **AI engines cited us on ___ / 13 test questions this month** (last month: ___ / 13).

*What this means:* how often the AI answer engines named or linked Rooval when asked the 13 standard
roofing questions. It moves slowly — citations lag new content by weeks to months — so watch the
trend across months, not any single reading.

One-sentence trend: __________________________________________________________

---

## 2. Where we're getting cited (by cluster) + who else shows up
| Cluster | Us this month | Last month | Competitor domains cited (for share-of-citation) |
|---|---|---|---|
| local-pick (roof-01/02/03) | ___ / 3 | ___ / 3 | |
| storm (roof-04/05/06) | ___ / 3 | ___ / 3 | |
| cost (roof-07/08) | ___ / 2 | ___ / 2 | |
| howto-trust (roof-09/10/11) | ___ / 3 | ___ / 3 | |
| materials (roof-12/13) | ___ / 2 | ___ / 2 | |
| **TOTAL** | **___ / 13** | **___ / 13** | |

*What this means:* which topics AI engines trust us on, and which competitors keep winning the same
questions (that's the "share of citation" — if a rival's domain shows up every month for cost
queries, that's where to strengthen our cost pages). Record competitor insurance positioning
neutrally; never quote their claims-handling marketing.

Known competitors to watch (from prior research): roofmonster.com (metal-vs-asphalt), 
vertexroofingslc.com (broad authority), Lehi Elite Roofing (brand-query substitute).

---

## 3. Entity check — does AI know who we are? (scored SEPARATELY — never added to the /13)
| Probe | Correct description? | Says we're licensed? | Named a competitor instead? |
|---|---|---|---|
| roof-14 ("What does Rooval Roofing do?") | Y / N | n/a | Y / N |
| roof-15 ("Is Rooval legit and licensed?") | Y / N | Y / N | Y / N |

*What this means:* whether an engine describes Rooval accurately and knows we're licensed. This is a
different question from citation rate, so it lives on its own line and is **never** folded into the
/13. **Compliance flag:** if any engine describes Rooval as an insurance-claims *handler*, fix the
messaging that week.

---

## 4. Real visitors from AI (GA4)
> **AI-referred sessions this month: ___** (last month: ___).

*How to read it:* GA4 → Reports → Acquisition → **Traffic acquisition** → switch the channel-group
selector to **"Channels incl. AI Assistants"** → read the **"AI Assistants"** row's sessions.
*What this means:* actual clicks that arrived from ChatGPT / Perplexity / Copilot / Gemini / Claude
/ etc. **This is a floor, not a ceiling** — a lot of AI traffic shows up as "direct" with no
referrer, so the true number is higher. Zero is not a failure early on.

---

## 5. Four-failure status (traffic-light — one sentence each)
| Category | Status | One-line note |
|---|---|---|
| **Access** (can AI fetch us?) | 🟢 Green | Server-rendered; all live-answer crawlers 200. Known exception: GPTBot/1.x + Meta AI 429 at host — permanent, bounded, not fixable site-side. |
| **Structure** (is the answer liftable?) | 🟢 Green | Passages fixed in Ch5; ~9 FAQPage @id items still open (low priority). |
| **Authority** (are we a trusted entity?) | 🟢 Green | @id consolidated, DOPL license + GBP linked. Open owner items: Bing Places, Yelp claim, schema-vs-GBP hours. |
| **Coverage** (do we have a page for it?) | 🟡 Yellow | Missing pages with demand: commercial / tile / slate / asphalt-shingle / new-construction. *(This 5-page list is per owner, confirmed out-of-band after Ch5 — an owner verbal, not a documented chapter finding.)* |

*What this means:* the health check behind the score. If the /13 stalls, this table says which of the
four levers to work next — and it's almost always Coverage (build the missing pages) or plain SEO
ranking.

---

## 6. What changed since last month / plan for next month
- Content or fixes shipped: __________________________________________________
- Movement seen in the scoreboard: ___________________________________________
- Next month's focus: ________________________________________________________

---

## 7. Standing expectations (fixed — do not rewrite each month)
- **Citations lag content by weeks-to-months.** No "page 1 in 30 days." Watch the trend.
- **Google ranking drives citations**, so ordinary SEO work *is* GEO work — the two move together.
- **Storm cluster moves first** (dedicated pages, no directory moat). **local-pick / cost move
  slowest** (gated by directories/aggregators — needs off-site work, months not weeks).
- The measurement stack is **$0** (manual scoreboard + free GA4). No paid tools, no ads.

---

## Worked example — July 2026 interim check (example only; real recorded data)
- Headline: **AI engines cited us on 1 / 13 test questions** (previous: 0 / 13 on 2026-07-13).
- Cluster: **storm 1/3** (roof-04 "Utah hail damage roof repair who to call" →
  `rooval-roofing.com/roof-repair-utah/` named + linked, SERP position ~8); all other clusters 0.
- Entity check: roof-14 correct-description Y, competitor-substitution N; roof-15 licensed Y.
- AI sessions (GA4): channel group created 2026-07-21 — first real read is the Aug 3 run.
- Four-failure: Access 🟢, Structure 🟢, Authority 🟢, Coverage 🟡.
- Trend: storm moved `none → weak` exactly as predicted; the Aug 3 run tells us if it stuck.

*(Marked "example — July interim check." The official monthly cadence is the first Monday; the
2026-07-17 reading was an early owner-requested spot-check.)*
