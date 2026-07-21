# Rooval GEO Editorial Checklist

Run every new or edited page/passage through this before it ships. Derived from Michael Jacobs'
GEO book (Ch5) filtered through this project's owner rules and verified findings. The goal:
content an AI answer engine will *cite*, that stays honest and compliant.

## Passage extraction (the citation unit)
- [ ] Each section is **self-contained**: claim → reasoning → implication, all inside the section.
- [ ] No "as we saw above" / "as mentioned" cross-references — a section must stand alone if an
      engine lifts it out of context.
- [ ] A section that answers a real buyer question has a heading that *is* that question or its topic.

## Claim density (the peer-defense test)
- [ ] Every sentence contains a claim you'd defend to a roofing peer. If it's filler, cut it.
- [ ] No thin content — nothing that says only what any competitor page also says (the named
      anti-pattern). Specific numbers, local detail, and first-hand judgment beat generic advice.
- [ ] Voice is direct, plain-spoken, practitioner-confident (this = Rooval's warm owner voice;
      no tension between the two). Banned hedges: "some research suggests", "it may be the case",
      "experts often find", "many homeowners" as filler.

## Honesty (hard gates — a fail here blocks the ship)
- [ ] Only owner-confirmed facts and **services Rooval actually provides**. New capability
      (commercial/tile/slate/new-construction) requires owner confirmation — never inferred from
      search demand.
- [ ] No fabricated credentials, tenure, project counts, awards, or author personas (the
      "Mike Sorensen" persona was scrubbed — never reintroduce). DOPL license #13861046-5501 is real.
- [ ] Author/byline = the real owner, Matthew Thompson.

## Insurance-messaging rule (roofing-specific, paramount)
- [ ] Inspect + document only. NO "we handle your claim", NO deductible-waiving, NO "free roof".
- [ ] The owner-approved phrasing "we walk you through the claims process… you file the claim"
      (per CHANGELOG-2026-07-14) is allowed; do not extend it. No NEW claims-process language.

## Pricing
- [ ] Real project **ranges** + "we quote each job". Typical Utah roof $20,000–$30,000.
- [ ] NEVER per-square, per-sq-ft, or per-linear-foot — visible copy OR schema.
- [ ] No review COUNT in visible copy ("5-star rated" only); schema `reviewCount` is the sole exception.

## Technical / deploy safety (project-specific gotchas)
- [ ] External `<a href>` links inside post content get **stripped** here — state external URLs as
      plain text; only internal + template links survive.
- [ ] Never anchor a content insertion on a bare substring that can live inside an HTML attribute
      (e.g. `roof-quote` is inside a CTA href). Anchor on a full opening-tag string, assert count==1.
- [ ] After ANY content write, **diff the whole page** (not just "is my new content present + H1
      count") — a passing content check does not prove the CTA/surrounding markup survived.
- [ ] Single `<h1>` per page preserved.
- [ ] Elementor pages: `_elementor_data` REST write leaves a stale render — clear Elementor cache
      (delete `_elementor_css`/`_elementor_element_cache` + `files_manager->clear_cache()`) or the
      front-end won't update. WPCode snippet code must be ASCII-only.
- [ ] WPCode PHP FAQ snippet (2621) can white-screen the site — back up its source, edit minimally,
      verify a city page renders (not white) immediately after.
- [ ] Verify JSON-LD with raw curl only (WebFetch strips `<script>`). FAQPage `acceptedAnswer` must
      match the visible copy verbatim (schema drift is a real finding).

## What is NOT a citation lever (do not chase — refuted for this project)
- llms.txt (already deployed, inert — leave it, don't expand). "FAQ schema = 2.8x citations" /
  "FAQ schema amplifier" (Google retired FAQ rich results May 2026 — FAQPage kept only for
  AI-retrieval structure). The #1 real citation driver is ordinary Google ranking. Original data
  (the NOAA storm page) IS genuinely cited — leverage and distribute it.

## Final gate
- [ ] Whole-page diff clean, single H1, CTA intact, no corruption signatures.
- [ ] Ran the sitewide sweep for any claim this page now contradicts (e.g. timelines, prices).
- [ ] Mirrored to the repo + committed with a clean message.
