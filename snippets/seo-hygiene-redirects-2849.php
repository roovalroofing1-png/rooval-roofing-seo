<?php
/* WPCode snippet 2849 "SEO hygiene: rooval-roofing 301 + category noindex".
 * 2026-07-21: appended a prefix template_redirect fallback for the retired instant-quote tool. */
add_action('template_redirect', function () {
    $uri = isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '';
    if (strpos($uri, '/roof-quote') === 0) {
        wp_redirect('https://rooval-roofing.com/free-roof-inspection-utah/', 301);
        exit;
    }
});
/* (the pre-existing /rooval-roofing/ -> /about-us/ 301 + category noindex remain above this in the live snippet) */
