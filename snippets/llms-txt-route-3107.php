<?php
/**
 * WPCode snippet 3107 — "llms.txt route (GEO)" — PHP, Auto Insert, Run Everywhere, ACTIVE.
 * Serves /llms.txt as text/plain for AI crawlers (GEO initiative WS-followup, 2026-07-17).
 * GOTCHA: WP marks unknown URLs 404 BEFORE template_redirect — must reset is_404 + status_header(200)
 * or the file serves with HTTP 404 and crawlers discard it.
 * NOTE: Hostinger's edge returns 429 to any UA containing "GPTBot" site-wide (verified 2026-07-17;
 * .htaccess is clean — standard WP rewrites only). OpenAI's crawler cannot fetch this or any page
 * until Hostinger allowlists GPTBot. ClaudeBot / PerplexityBot / OAI-SearchBot / Googlebot all get 200.
 */
add_action('template_redirect', function () {
    $uri = isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '';
    if ($uri !== '/llms.txt') { return; }
    global $wp_query;
    if ($wp_query) { $wp_query->is_404 = false; }
    status_header(200);
    header('Content-Type: text/plain; charset=utf-8');
    // (llms.txt body lives in the snippet on the live site; see live-mirror or fetch /llms.txt)
    exit;
});
