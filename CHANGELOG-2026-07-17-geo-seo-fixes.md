# 2026-07-17 — GEO/SEO fix pass: de-orphan 3 pages, llms.txt, H1 + meta fixes

Ran through the owner's orchestration pipeline (research came from the same-day SEO/GEO checkup; adversarial panel = 3 reviewers + merged verdict; findings revised same session).

## What shipped
1. **De-orphaned 3 pages** that were sitemap-only (no nav/internal links):
   - Nav (menu 6, under "Our Services" parent 57): item **3104** "Free Inspection" → /free-roof-inspection-utah/, item **3105** "Roof Cost Guide" → /roof-replacement-cost-utah/.
   - "Helpful next steps" h2+ul link blocks on **2979 / 2980 / 2981** (→ free-inspection, storm-history, cost guide) and **2991** (→ hail, documentation, free-inspection). After panel review, blocks were **moved above each page's final CTA h2** (were below = tacked-on).
   - Cost page **2950**: added "Book a free inspection" link in the closing paragraph.
   - **3051 deliberately gets NO outbound blocks** — it is a distraction-free conversion landing page; inbound-only by design.
2. **llms.txt** now live at /llms.txt via **WPCode PHP snippet 3107** (Auto Insert / Run Everywhere). Serves text/plain, 2,371 bytes: company facts, $20K–$30K whole-project pricing line, compliant insurance framing (homeowner files), services/pages list, 16 service-area cities. **Gotcha fixed:** WP pre-marks the URL 404 before template_redirect — snippet forces `is_404=false` + `status_header(200)` (first version served content with HTTP 404).
3. **/free-roof-inspection-utah/ (3051) single-H1 fix:** in-content h1 demoted to h2 (classes kept), WP title → "Free Roof Inspection in Utah" (theme H1). Panel flagged lost CTR modifier → Rank Math SEO title set to "Free Roof Inspection in Utah | Licensed Local Crew" (updateMetaBulk title DID persist this time; verified live).
4. **/storm-damage-roof-history-utah/ (2991) meta description** was truncated mid-sentence → replaced (complete 151-char sentence) via updateMetaBulk all-alias-keys.

## Panel findings → revisions applied
- **HIGH (shipped defect, fixed):** 2991's stored post_content contained legacy theme wrapper junk (`</div><!-- /.entry-content --></article>` + stray `<p><br/>`) → live page had 2 `</article>` closes. Stripped; live now 1/1, div balance 3/3, JSON-LD all valid.
- **LOW (fixed):** block placement moved above final CTAs on all 4 pages.
- **LOW (fixed):** 3051 Rank Math title restored the "Licensed Local Crew" modifier.
- **PASS:** compliance clean everywhere (whole-project pricing only, no review counts, homeowner-files insurance framing; panel recommends KEEPING the llms.txt deductible/free-roof legal line — fences AI engines away from hallucinating a free-roof pitch).

## ⚠️ OPEN — owner/hosting escalation required
**Hostinger's edge returns HTTP 429 to any User-Agent containing "GPTBot", site-wide** (3/3 repro on / and /llms.txt; ClaudeBot, PerplexityBot, OAI-SearchBot, Googlebot all get 200). NOT robots.txt (no GPTBot rule) and NOT .htaccess (verified via run-once read: 903 bytes, standard WP rewrites only — snippet deactivated after). This silently blocks OpenAI/ChatGPT from ever crawling the site or llms.txt — directly against the GEO initiative. **Action: ask Hostinger support (or hPanel security/bot settings) to allowlist GPTBot**, then re-verify with `curl -A "GPTBot/1.0" -o /dev/null -w "%{http_code}" https://rooval-roofing.com/llms.txt` (want 200).

## Rollback
- Nav: delete menu items 3104/3105.
- Blocks/sentence: prior page content in git history of live-mirror/pages/ (pre-this-commit).
- llms.txt: deactivate WPCode snippet 3107.
- 3051 title: clear rank_math_title; WP title back to "Free Roof Inspection in Utah | Local Licensed Crew" if ever wanted.

Mirrors updated: live-mirror/pages/{6 pages}, live-mirror/llms.txt, snippets/llms-txt-route-3107.php.
