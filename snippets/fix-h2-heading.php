<?php
/**
 * WPCode Snippet: Fix H2 Heading - You click We climb
 * Location: Admin Only
 * Applied: 2026-05-29
 *
 * Replaces the weak H2 "You click. We climb. Deal?" on the homepage
 * with an SEO-friendly heading in the Elementor page data.
 *
 * To revert: swap the find/replace strings below and re-run.
 */

$post_id = 1723;
$data = get_post_meta( $post_id, '_elementor_data', true );
if ( $data ) {
  $data = str_replace(
    'You click. We climb. Deal?',
    'Get a Free Roof Inspection — No Strings Attached',
    $data
  );
  update_post_meta( $post_id, '_elementor_data', wp_slash( $data ) );
  delete_post_meta( $post_id, '_elementor_css' );
}
