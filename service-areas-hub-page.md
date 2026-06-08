# Service Areas Hub Page — Rooval Roofing (Utah)

**Purpose:** central `/service-areas/` landing page that links to all 12 city pages and serves as the topical hub. Modeled on AYS's rich regional hub, Utah-localized.

**Deploy:** create a new WP page, slug `service-areas`, then repoint nav menu item **2336** (the "Service Areas" parent, currently href=Alpine placeholder) to `/service-areas/`. Main content goes in one Elementor text-editor widget per the established pattern. Add the FAQPage JSON-LD (bottom) via WPCode or Rank Math.

**Rank Math SEO title:** `Utah Roofing Service Areas | Utah County & Salt Lake County | Rooval Roofing`
**Meta description:** `Rooval Roofing serves Utah County and Salt Lake County from our Lehi base — Lehi, Provo, Orem, Sandy, Draper and more. Free inspections, financing, workmanship warranty. Call (385) 424-8810.`

---

## Page body (HTML, deploy-ready)

```html
<h1>Roofing Service Areas Across Utah</h1>
<p class="rv-trio"><strong>Workmanship Warranty</strong> &nbsp;•&nbsp; <strong>Local, Lehi-Based Utah Roofers</strong> &nbsp;•&nbsp; <strong>Free Inspection &amp; Estimate</strong></p>

<p>Rooval Roofing is a locally owned roofing contractor based in <strong>Lehi, Utah</strong>, serving homeowners and businesses throughout <strong>Utah County</strong> and <strong>Salt Lake County</strong>. From the high-UV summers along the Wasatch Front to heavy winter snow load, ice dams, and canyon windstorms, Utah roofs take a beating — and we build and repair them to handle it. Find your city below to see how we serve your neighborhood.</p>

<a class="rv-cta" href="/free-inspection/">Schedule Your Free Inspection</a>

<h2>Cities We Serve</h2>

<h3>Utah County</h3>
<ul>
  <li><a href="/roofing-lehi-utah/">Lehi, UT</a></li>
  <li><a href="/roofing-alpine-utah/">Alpine, UT</a></li>
  <li><a href="/roofing-highland-utah/">Highland, UT</a></li>
  <li><a href="/roofing-pleasant-grove-utah/">Pleasant Grove, UT</a></li>
  <li><a href="/roofing-lindon-utah/">Lindon, UT</a></li>
  <li><a href="/roofing-orem-utah/">Orem, UT</a></li>
  <li><a href="/roofing-provo-utah/">Provo, UT</a></li>
  <li><a href="/roofing-springville-utah/">Springville, UT</a></li>
</ul>

<h3>Salt Lake County</h3>
<ul>
  <li><a href="/roofing-salt-lake-city-utah/">Salt Lake City, UT</a></li>
  <li><a href="/roofing-murray-utah/">Murray, UT</a></li>
  <li><a href="/roofing-sandy-utah/">Sandy, UT</a></li>
  <li><a href="/roofing-draper-utah/">Draper, UT</a></li>
</ul>

<p><em>Don't see your city? We're growing across the Wasatch Front — call <a href="tel:+13854248810">(385) 424-8810</a> and we'll let you know if we cover your area.</em></p>

<h2>Roofing Services We Offer Across Utah</h2>
<ul>
  <li><strong>Roof Replacement</strong> — full tear-off and new roof systems built for Utah weather.</li>
  <li><strong>Roof Repair</strong> — leaks, storm and wind damage, missing or lifted shingles.</li>
  <li><strong>Roof Installation</strong> — new construction and additions.</li>
  <li><strong>Roof Inspections</strong> — free, no-pressure assessments with honest options.</li>
  <li><strong>Roof Maintenance</strong> — keep your roof and warranty in good standing.</li>
  <li><strong>Metal Roofing</strong> — durable, energy-efficient options ideal for Utah's sun and snow.</li>
  <li><strong>Gutters</strong> — protect your roof, foundation, and landscaping from runoff and ice.</li>
</ul>

<h2>Why Utah Homeowners Choose Rooval Roofing</h2>
<ul>
  <li><strong>Local &amp; accountable</strong> — based in Lehi, we know Wasatch Front weather and building codes.</li>
  <li><strong>Workmanship warranty</strong> — we stand behind every roof we install.</li>
  <li><strong>Financing available</strong> — "Use our money to build your roof." Flexible options so a new roof fits your budget.</li>
  <li><strong>5.0-star rated</strong> — 30+ five-star Google reviews from Utah homeowners.</li>
  <li><strong>Free inspections &amp; honest estimates</strong> — no pressure, no surprises.</li>
</ul>

<h2>Our Process</h2>
<ol>
  <li><strong>Free Inspection</strong> — we assess your roof and document its condition.</li>
  <li><strong>Estimate &amp; Options</strong> — clear, written pricing with good/better/best choices.</li>
  <li><strong>Schedule &amp; Materials</strong> — pick your materials and a date that works for you.</li>
  <li><strong>Professional Installation</strong> — our crews install to manufacturer spec.</li>
  <li><strong>Cleanup &amp; Warranty</strong> — full magnetic nail sweep and your workmanship warranty.</li>
</ol>

<h2>What Utah Homeowners Say</h2>
<p>Rooval Roofing is rated <strong>5.0 stars across 30+ Google reviews</strong>. <a href="/reviews/">Read our reviews →</a></p>

<h2>Frequently Asked Questions</h2>

<h3>How much does a new roof cost in Utah?</h3>
<p>Cost depends on roof size, pitch, material, and the condition of the decking underneath. Most Utah homeowners want a range before committing — we provide a free, no-obligation written estimate, and we offer financing so the project fits your budget.</p>

<h3>What are the signs my Utah roof needs to be replaced?</h3>
<p>Watch for ice-dam staining or leaks after winter, shingles lifted or missing after a windstorm, granules collecting in your gutters, curling or cracked shingles from years of high-altitude UV, and a roof that's simply reaching the end of its lifespan. If you see any of these, schedule a free inspection.</p>

<h3>What's the best roofing material for Utah's climate?</h3>
<p>Utah's mix of heavy snow, freeze-thaw cycles, intense summer UV, and canyon wind means durability matters. Quality architectural asphalt shingles are the most popular choice for value and performance; metal roofing is an excellent long-term, energy-efficient upgrade that sheds snow well. We'll walk you through the trade-offs during your inspection.</p>

<h3>Do you offer financing?</h3>
<p>Yes. Our "Use our money to build your roof" financing lets you get the roof you need now and pay over time. Ask about options during your free estimate.</p>

<h3>How long does a roof replacement take?</h3>
<p>Most residential roof replacements are completed in one to two days, depending on size, complexity, and weather. We'll give you a clear timeline with your estimate.</p>

<a class="rv-cta" href="/free-inspection/">Get Your Free Inspection — (385) 424-8810</a>
```

---

## FAQPage JSON-LD (deploy alongside the page)

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type":"Question","name":"How much does a new roof cost in Utah?","acceptedAnswer":{"@type":"Answer","text":"Cost depends on roof size, pitch, material, and the condition of the decking. Rooval Roofing provides a free, no-obligation written estimate and offers financing so the project fits your budget."}},
    {"@type":"Question","name":"What are the signs my Utah roof needs to be replaced?","acceptedAnswer":{"@type":"Answer","text":"Ice-dam staining or leaks after winter, shingles lifted or missing after a windstorm, granules in your gutters, curling or cracked shingles from high-altitude UV, and a roof reaching the end of its lifespan. Schedule a free inspection if you notice any of these."}},
    {"@type":"Question","name":"What is the best roofing material for Utah's climate?","acceptedAnswer":{"@type":"Answer","text":"Utah's heavy snow, freeze-thaw cycles, intense UV, and wind mean durability matters. Quality architectural asphalt shingles offer the best value; metal roofing is an excellent long-term, energy-efficient upgrade that sheds snow well."}},
    {"@type":"Question","name":"Does Rooval Roofing offer financing?","acceptedAnswer":{"@type":"Answer","text":"Yes. Our \"Use our money to build your roof\" financing lets you get the roof you need now and pay over time. Ask about options during your free estimate."}},
    {"@type":"Question","name":"How long does a roof replacement take?","acceptedAnswer":{"@type":"Answer","text":"Most residential roof replacements are completed in one to two days, depending on size, complexity, and weather."}}
  ]
}
</script>
```

## Notes
- The page references `/free-inspection/` and `/reviews/` — create those (or point CTAs to the existing quote/contact page) before/at deploy so there are no dead links.
- After deploy, repoint nav item 2336 to `/service-areas/` and add `/service-areas/` to the sitemap (Rank Math auto-includes published pages).
