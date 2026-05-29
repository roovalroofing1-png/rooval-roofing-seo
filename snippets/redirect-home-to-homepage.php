<?php
/**
 * WPCode Snippet: Redirect /home/ to Homepage
 * Location: Run Everywhere
 * snippet_id: 2369
 * Applied: 2026-05-29
 *
 * Fixes 404 error flagged in Google Search Console.
 * Google crawled /home/ which doesn't exist — this redirects it to / with a 301.
 */

if ( isset( $_SERVER['REQUEST_URI'] ) && $_SERVER['REQUEST_URI'] === '/home/' ) {
    wp_redirect( home_url( '/' ), 301 );
    exit;
}
