# City Page CTA + Internal-Link Blocks — Rooval Roofing (Utah)

Append these two blocks to the bottom of each of the 12 city pages (inside the single Elementor text-editor widget per the established pattern). Standardizes a strong call-to-action on every city page and builds the geo-clustered internal-link mesh.

`{{ESTIMATE_URL}}` = the live free-estimate/contact destination — resolve to the actual page at deploy (e.g. `/contact/`, `/free-inspection/`, or the homepage quote form). Phone `tel:` always valid.

---

## 1. Standardized CTA band (every city page) — `{{CITY}}` token

```html
<div class="rv-cta-band">
  <h2>Get Your Free Roof Inspection in {{CITY}}, UT</h2>
  <p>Local, licensed Utah roofers • Workmanship warranty • Financing available — use our money to build your roof. No pressure, no surprises.</p>
  <p class="rv-cta-buttons">
    <a class="rv-btn rv-btn-primary" href="{{ESTIMATE_URL}}">Schedule My Free Inspection</a>
    <a class="rv-btn rv-btn-call" href="tel:+13854248810">Call (385) 424-8810</a>
  </p>
</div>
```

## 2. CSS for the CTA band (add once via Customizer → Additional CSS, `custom_css[blocksy]`)

```css
.rv-cta-band{background:#1a1a1a;color:#fff;padding:32px 24px;border-radius:10px;text-align:center;margin:32px 0}
.rv-cta-band h2{color:#fff;margin:0 0 8px}
.rv-cta-band p{color:#eee;margin:0 0 16px}
.rv-cta-buttons{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
.rv-btn{display:inline-block;padding:14px 26px;border-radius:8px;font-weight:700;text-decoration:none}
.rv-btn-primary{background:#cc0000;color:#fff}
.rv-btn-primary:hover{background:#b30000}
.rv-btn-call{background:#fff;color:#1a1a1a;border:2px solid #fff}
.rv-btn-call:hover{background:#f0f0f0}
.rv-nearby ul{columns:2;max-width:420px;margin:8px auto;list-style:none;padding:0}
.rv-nearby li{margin:4px 0}
```

---

## 3. Per-city "Nearby Cities We Serve" blocks (geo-clustered)

### Lehi → /roofing-lehi-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-alpine-utah/">Roofing in Alpine</a></li>
<li><a href="/roofing-highland-utah/">Roofing in Highland</a></li>
<li><a href="/roofing-pleasant-grove-utah/">Roofing in Pleasant Grove</a></li>
<li><a href="/roofing-lindon-utah/">Roofing in Lindon</a></li>
<li><a href="/roofing-draper-utah/">Roofing in Draper</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Alpine → /roofing-alpine-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-highland-utah/">Roofing in Highland</a></li>
<li><a href="/roofing-lehi-utah/">Roofing in Lehi</a></li>
<li><a href="/roofing-pleasant-grove-utah/">Roofing in Pleasant Grove</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Highland → /roofing-highland-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-alpine-utah/">Roofing in Alpine</a></li>
<li><a href="/roofing-lehi-utah/">Roofing in Lehi</a></li>
<li><a href="/roofing-pleasant-grove-utah/">Roofing in Pleasant Grove</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Pleasant Grove → /roofing-pleasant-grove-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-highland-utah/">Roofing in Highland</a></li>
<li><a href="/roofing-lindon-utah/">Roofing in Lindon</a></li>
<li><a href="/roofing-lehi-utah/">Roofing in Lehi</a></li>
<li><a href="/roofing-orem-utah/">Roofing in Orem</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Lindon → /roofing-lindon-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-orem-utah/">Roofing in Orem</a></li>
<li><a href="/roofing-pleasant-grove-utah/">Roofing in Pleasant Grove</a></li>
<li><a href="/roofing-provo-utah/">Roofing in Provo</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Orem → /roofing-orem-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-provo-utah/">Roofing in Provo</a></li>
<li><a href="/roofing-lindon-utah/">Roofing in Lindon</a></li>
<li><a href="/roofing-pleasant-grove-utah/">Roofing in Pleasant Grove</a></li>
<li><a href="/roofing-springville-utah/">Roofing in Springville</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Provo → /roofing-provo-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-orem-utah/">Roofing in Orem</a></li>
<li><a href="/roofing-springville-utah/">Roofing in Springville</a></li>
<li><a href="/roofing-lindon-utah/">Roofing in Lindon</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Springville → /roofing-springville-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-provo-utah/">Roofing in Provo</a></li>
<li><a href="/roofing-orem-utah/">Roofing in Orem</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Draper → /roofing-draper-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-sandy-utah/">Roofing in Sandy</a></li>
<li><a href="/roofing-lehi-utah/">Roofing in Lehi</a></li>
<li><a href="/roofing-murray-utah/">Roofing in Murray</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Sandy → /roofing-sandy-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-murray-utah/">Roofing in Murray</a></li>
<li><a href="/roofing-draper-utah/">Roofing in Draper</a></li>
<li><a href="/roofing-salt-lake-city-utah/">Roofing in Salt Lake City</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Murray → /roofing-murray-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-salt-lake-city-utah/">Roofing in Salt Lake City</a></li>
<li><a href="/roofing-sandy-utah/">Roofing in Sandy</a></li>
<li><a href="/roofing-draper-utah/">Roofing in Draper</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

### Salt Lake City → /roofing-salt-lake-city-utah/
```html
<div class="rv-nearby"><h2>Nearby Cities We Serve</h2>
<ul>
<li><a href="/roofing-murray-utah/">Roofing in Murray</a></li>
<li><a href="/roofing-sandy-utah/">Roofing in Sandy</a></li>
<li><a href="/roofing-draper-utah/">Roofing in Draper</a></li>
</ul>
<p><a href="/service-areas/">See all our Utah service areas →</a></p></div>
```

---

## Deploy checklist
1. Add the CTA CSS (block 2) once via Customizer Additional CSS.
2. Resolve `{{ESTIMATE_URL}}` to the real contact/estimate page.
3. For each of the 12 pages: append CTA band (with city name) + its Nearby Cities block to the page's text-editor widget; Update.
4. QA each page's city name + that all links resolve (no 404s, no self-links).
