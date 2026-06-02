<?php
/**
 * WPCode Snippet: Set Rank Math Meta Descriptions - Run Once
 * Location: Admin Only
 * Applied: 2026-05-29
 *
 * Sets Rank Math SEO meta descriptions for all 15 pages via update_post_meta.
 * To revert: run update_post_meta( $post_id, 'rank_math_description', '' ) for each ID.
 */

$descriptions = [
  1723 => "Rooval Roofing is Utah's trusted roofing contractor. We offer roof repair, replacement, metal roofing, and gutter services. Free inspections — workmanship warranty.",
  40   => "Meet the Rooval Roofing team. Family-owned, licensed, and insured with 15+ years of Utah roofing experience. We treat every home like our own. Call (385) 424-8810.",
  51   => "Rooval Roofing offers full roofing services across Utah — roof installation, repair, replacement, metal roofing, gutters, and storm damage help. Free estimate available.",
  42   => "Contact Rooval Roofing for a free roof inspection or estimate. Serving Lehi, Provo, Orem, Salt Lake City, and all of Utah County. Call (385) 424-8810 today.",
  2310 => "Need a roofer in Provo, UT? Rooval Roofing offers roof repair, replacement, and metal roofing in Provo. Free inspections, workmanship warranty. Call (385) 424-8810.",
  2306 => "Rooval Roofing serves Orem, UT with expert roof repair, replacement, gutter services, and metal roofing. Licensed & insured. Get your free estimate today.",
  2302 => "Top-rated roofing contractor in Salt Lake City, UT. Rooval Roofing handles roof repair, replacement, metal roofing, and storm damage. Free inspection available.",
  2304 => "Looking for a roofer in Sandy, UT? Rooval Roofing provides roof installation, repair, and gutter services in Sandy. Free estimate — call (385) 424-8810.",
  2303 => "Rooval Roofing offers professional roof repair and replacement in Murray, UT. Storm damage experts. Licensed, insured, and trusted across Salt Lake County.",
  2308 => "Trusted roofing contractor in Draper, UT. Rooval Roofing specializes in roof replacement, metal roofing, and gutter services. Call for a free inspection today.",
  2296 => "Expert roofing services in Alpine, UT from Rooval Roofing. Roof repair, replacement, gutters, and metal roofing. workmanship warranty. Free estimate.",
  2298 => "Rooval Roofing provides roof installation, repair, and storm damage help in Highland, UT. Licensed Utah roofing contractor. Call (385) 424-8810 for a free quote.",
  2299 => "Need roofing in Lindon, UT? Rooval Roofing handles roof repairs, full replacements, and gutter services. Free inspections available — call (385) 424-8810.",
  2300 => "Rooval Roofing serves Pleasant Grove, UT with roof repair, replacement, gutter installation, and metal roofing. Free estimate. Trusted local contractor.",
  2301 => "Top roofing contractor in Springville, UT. Rooval Roofing offers roof repair, replacement, metal roofing, and gutter services. Free inspection — call today.",
];

foreach ( $descriptions as $post_id => $desc ) {
  update_post_meta( $post_id, 'rank_math_description', $desc );
}
