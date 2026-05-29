<?php
/**
 * WPCode Snippet: Set Blog Post Meta Descriptions - Run Once
 * Location: Admin Only
 * Applied: 2026-05-29
 *
 * Sets Rank Math SEO meta descriptions for the 5 published SEO blog posts.
 * To revert: run update_post_meta( $post_id, 'rank_math_description', '' ) for each ID.
 */

$blog_descriptions = [
  2358 => "6 warning signs your Utah roof needs replacing — from curling shingles to hail damage. Rooval Roofing offers free inspections across Utah County. Call (801) 471-4062.",
  2359 => "Learn how to file a hail damage roof insurance claim in Utah. Rooval Roofing assists homeowners through the full process. Free storm damage inspection available.",
  2360 => "Is metal roofing worth the cost in Utah? We break down lifespan, energy savings, and cost vs. asphalt. Get a free estimate from Rooval Roofing today.",
  2361 => "5 reasons Utah homeowners should clean and inspect gutters before winter. Rooval Roofing offers gutter cleaning, repair, and gutter guard installation.",
  2362 => "How to choose a trustworthy roofing contractor in Utah. 7 tips to avoid storm chasers and unlicensed crews. Rooval Roofing — licensed, insured, local.",
];

foreach ( $blog_descriptions as $post_id => $desc ) {
  update_post_meta( $post_id, 'rank_math_description', $desc );
}
