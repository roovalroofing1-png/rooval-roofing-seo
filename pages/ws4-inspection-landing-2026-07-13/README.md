# WS4 — Free-Inspection Landing Page (LIVE 2026-07-13)

- **Live:** https://rooval-roofing.com/free-roof-inspection-utah/ (page id 3051)
- **Purpose:** single distraction-free page whose only job is booking a free inspection; feeds the EXISTING CRM booking form (leads land in CRM for fast follow-up). No new funnel/backend.
- **Built:** lean 10-agent pipeline (Opus/Sonnet, no Fable) — Research→Plan→Review→Revise→Implement→Adversarial(compliance+CRO+authenticity)→Revise. Agents designed; main loop deployed.
- **Features:** embedded CRM /quote booking form via iframe (verified framable, HTTP 200); slim logo+tap-to-call bar; blue "Book My Free Inspection" CTA x2; "what happens" 3-step; 2 REAL job photos (Wasatch roof 2992 + Murray inspection 2996, different jobs); credentials incl. DOPL #13861046-5501; inspect-and-document guardrail paragraph verbatim; nav + footer + theme-title + competing #rrq-tab hidden via page-scoped body:has(#rooval-lp) CSS.
- **No review COUNT** shown (owner rule) — "5-star rated" only.

## GOTCHAS fixed during deploy (reusable)
- **wpautop corrupts inline <style> in post_content**: WP auto-paragraph injects </p><p> at blank lines INSIDE a <style> block, breaking all CSS after the first blank line. FIX: minify the <style> to a single line (strip all newlines) before saving. This is why the button/figures/hero looked unstyled at first.
- **Double H1**: Blocksy renders its own `.hero-section > .entry-header > h1.page-title` page title; the content hero repeated that structure. FIX: hide the theme's native title with `body:has(#rooval-lp) .hero-section:not(#rooval-lp *){display:none!important}` — keeps the in-content marketing H1 as the single H1.
- Page-scoped distraction-strip via `body:has(#rooval-lp) <selector>{display:none}` — fails safe if :has() unsupported (theme chrome just reappears).

## Owner/manager follow-up (CRM backend — not deployable by me)
- Speed-to-lead automation (instant text-back, time-to-first-contact) lives on Railway (manager-controlled). Landing page + form wiring done; the automation is a spec for the manager (see [[rooval-crm]] Phase 4).
