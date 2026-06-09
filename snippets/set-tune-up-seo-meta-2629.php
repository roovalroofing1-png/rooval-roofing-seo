// One-time: set Rank Math SEO title/description for the Roof Tune-Up page (2626).
// Activate to run, then DEACTIVATE. Idempotent.
add_action('init', function(){
    if(get_option('_rrtu_seo_done')) return;
    update_post_meta(2626, 'rank_math_title', 'Roof Tune-Up & Repair in Lehi, UT | Rooval Roofing');
    update_post_meta(2626, 'rank_math_description', 'Not sure you need a new roof? Get an affordable roof tune-up or repair in Lehi & Utah County from Rooval Roofing. Honest inspections, fast leak fixes. Free quote.');
    update_post_meta(2626, 'rank_math_focus_keyword', 'roof tune-up');
    update_option('_rrtu_seo_done', 1);
});
