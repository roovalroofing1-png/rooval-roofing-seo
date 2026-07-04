<?php
/**
 * Rooval Roofing - City page hero banner + local roofing photo + reading time + mid-content booking CTA.
 * WPCode PHP snippet (id 2880), Auto-Insert / Run Everywhere. Injects via the_content
 * (priority 15) so it works on both Elementor city pages and plain pages.
 * Data is keyed by page slug -> attachment IDs (uploaded to the Media Library),
 * so wp_get_attachment_image() resolves the correct responsive srcset server-side.
 * Adding a city = add one row here (and 2621 already handles its FAQ).
 * Safe: if an attachment is missing, the page is returned unchanged.
 * ASCII-ONLY on purpose (atob transfer mangles UTF-8); use entities, not raw glyphs.
 */
function _rrhero_data(){
    return array(
        'roofing-orem-utah'   => array('city'=>'Orem','hero'=>2874,'body'=>2877,'credit'=>'','tag'=>'Storm-ready roofs and honest repairs for Orem homes - from a local crew that actually answers the phone.','cap'=>'New architectural-shingle roofs in an Orem-area neighborhood.'),
        'roofing-provo-utah'  => array('city'=>'Provo','hero'=>2875,'body'=>2878,'credit'=>'Photo: Farragutful / CC BY-SA 4.0','tag'=>'Wind, hail and time take a toll on Provo roofs. We inspect, document and fix it right.','cap'=>'Stone-and-shingle craftsmanship, Provo style.'),
        'roofing-lehi-utah'   => array('city'=>'Lehi','hero'=>2873,'body'=>2872,'credit'=>'Photo: brewbooks / CC BY-SA 2.0','tag'=>'Your Lehi neighbors trust us for storm damage, replacements and repairs done right the first time.','cap'=>'Our crew installing impact-rated shingles on a Lehi home.'),
        'roofing-alpine-utah' => array('city'=>'Alpine','hero'=>2876,'body'=>2879,'credit'=>'','tag'=>'Big custom homes, mountain weather, high standards - roofing built for Alpine.','cap'=>"Durable, upscale roofing for Alpine's mountain homes."),
    );
}

function _rrhero_css(){
    return '<style id="rrhero-css">'
      .'.rrhero{position:relative;border-radius:16px;overflow:hidden;margin:0 0 18px;box-shadow:0 12px 34px rgba(0,0,0,.20);line-height:0}'
      .'.rrhero-img{width:100%!important;height:auto!important;display:block;max-height:440px;object-fit:cover}'
      .'.rrhero-scrim{position:absolute;inset:0;background:linear-gradient(180deg,rgba(10,10,12,.05) 28%,rgba(10,10,12,.74) 100%)}'
      .'.rrhero-body{position:absolute;left:0;right:0;bottom:0;padding:26px 30px;line-height:1.3}'
      .'.rrhero-kicker{display:block;font-size:12.5px;letter-spacing:2.5px;text-transform:uppercase;font-weight:800;color:#ffd23f;margin:0 0 8px}'
      .'.rrhero-head{display:block;color:#fff;font-size:clamp(20px,3.3vw,31px);font-weight:800;line-height:1.18;text-shadow:0 2px 16px rgba(0,0,0,.55);max-width:660px;margin:0 0 16px}'
      .'.rrhero-cta{display:flex;flex-wrap:wrap;gap:10px}'
      .'.rrhero-btn{display:inline-block;background:#cc0000;color:#fff!important;font-weight:700;padding:12px 22px;border-radius:8px;text-decoration:none!important;box-shadow:0 4px 14px rgba(204,0,0,.4)}'
      .'.rrhero-btn:hover{background:#a80000}'
      .'.rrhero-btn2{display:inline-block;background:rgba(255,255,255,.14);color:#fff!important;font-weight:700;padding:12px 20px;border-radius:8px;text-decoration:none!important;border:2px solid rgba(255,255,255,.78)}'
      .'.rrhero-btn2:hover{background:rgba(255,255,255,.24)}'
      .'.rrhero-credit{position:absolute;top:8px;right:10px;font-size:10px;color:rgba(255,255,255,.75);background:rgba(0,0,0,.30);padding:2px 7px;border-radius:4px;line-height:1.4;z-index:2}'
      .'.rrread{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:#7a7a7a;margin:0 0 22px}'
      .'.rrread b{color:#cc0000}'
      .'.rrbook{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:18px;background:linear-gradient(135deg,#141414,#242424);border:1px solid #333;border-left:5px solid #cc0000;border-radius:14px;padding:24px 26px;margin:34px 0}'
      .'.rrbook-h{color:#fff;font-size:19px;font-weight:800;margin:0 0 6px;line-height:1.25}'
      .'.rrbook-p{color:#bdbdbd;font-size:14.5px;line-height:1.6;max-width:520px;margin:0}'
      .'.rrbook-r{display:flex;flex-wrap:wrap;gap:10px}'
      .'.rrbook-b1{display:inline-block;background:#cc0000;color:#fff!important;font-weight:700;padding:13px 24px;border-radius:8px;text-decoration:none!important;box-shadow:0 4px 14px rgba(204,0,0,.4);white-space:nowrap}'
      .'.rrbook-b1:hover{background:#a80000}'
      .'.rrbook-b2{display:inline-block;background:transparent;color:#ffd23f!important;font-weight:700;padding:13px 20px;border-radius:8px;text-decoration:none!important;border:2px solid #ffd23f;white-space:nowrap}'
      .'.rrbook-b2:hover{background:rgba(255,210,63,.12)}'
      .'.rrfig{margin:32px 0;border-radius:14px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.14);line-height:0}'
      .'.rrfig img{width:100%!important;height:auto!important;display:block}'
      .'.rrfig figcaption{background:#0d0d0d;color:#c8a94e;font-size:13.5px;font-weight:600;padding:12px 18px;text-align:center;line-height:1.5}'
      .'@media(max-width:600px){.rrhero-body{padding:16px 16px}.rrhero-img{max-height:290px}.rrhero-credit{display:none}.rrbook{padding:20px}.rrbook-r{width:100%}.rrbook-b1,.rrbook-b2{flex:1 1 auto;text-align:center}}'
      .'</style>';
}

// Insert a block after the </h2> or </h3> closest to the middle of the content.
function _rrhero_insert_mid($content,$block){
    if(!$block) return $content;
    if(!preg_match_all('/<\/h[23]>/i',$content,$m,PREG_OFFSET_CAPTURE)) return $content.$block;
    $mid=strlen($content)/2; $best=null; $bestd=PHP_INT_MAX;
    foreach($m[0] as $hit){ $pos=$hit[1]+strlen($hit[0]); $d=abs($pos-$mid); if($d<$bestd){$bestd=$d;$best=$pos;} }
    if($best===null) return $content.$block;
    return substr($content,0,$best).$block.substr($content,$best);
}

add_filter('the_content','_rrhero_inject',15);
function _rrhero_inject($content){
    if(!is_main_query() || !in_the_loop() || !is_page()) return $content;
    $slug = get_post_field('post_name', get_the_ID());
    $all = _rrhero_data();
    if(!isset($all[$slug])) return $content;
    $d = $all[$slug];

    $heroimg = wp_get_attachment_image($d['hero'],'large',false,array('class'=>'rrhero-img','loading'=>'eager','decoding'=>'async'));
    if(!$heroimg) return $content; // no image -> leave page untouched

    $bodyimg = wp_get_attachment_image($d['body'],'large',false,array('loading'=>'lazy','decoding'=>'async'));
    $city   = esc_html($d['city']);
    $credit = $d['credit'] ? '<div class="rrhero-credit">'.esc_html($d['credit']).'</div>' : '';

    // reading time from the article body (before we add our own blocks)
    $words = str_word_count( wp_strip_all_tags($content) );
    $mins  = max(1, (int) round($words / 200));
    $read  = '<div class="rrread"><span>&#9201;</span> About a <b>'.$mins.'-minute</b> read &middot; free inspections in '.$city.'</div>';

    $hero  = '<div class="rrhero">'.$heroimg.'<div class="rrhero-scrim"></div>'.$credit
        .'<div class="rrhero-body">'
        .'<span class="rrhero-kicker">Rooval Roofing &middot; '.$city.', Utah</span>'
        .'<span class="rrhero-head">'.esc_html($d['tag']).'</span>'
        .'<span class="rrhero-cta">'
        .'<a class="rrhero-btn" href="/roof-quote/">Get My Free Quote &rarr;</a>'
        .'<a class="rrhero-btn2" href="tel:+13854248810">Call (385) 424-8810</a>'
        .'</span>'
        .'</div>'
        .'</div>';

    $book = '<div class="rrbook">'
        .'<div class="rrbook-l">'
        .'<div class="rrbook-h">Not sure how bad the damage is?</div>'
        .'<div class="rrbook-p">Get a free '.$city.' roof inspection. We document any wind or hail damage with dated photos and a written report you keep - no pressure, no obligation.</div>'
        .'</div>'
        .'<div class="rrbook-r">'
        .'<a class="rrbook-b1" href="https://rooval-crm-production.up.railway.app/quote">Book My Free Inspection &rarr;</a>'
        .'<a class="rrbook-b2" href="tel:+13854248810">Call (385) 424-8810</a>'
        .'</div>'
        .'</div>';

    $fig = $bodyimg ? '<figure class="rrfig">'.$bodyimg.'<figcaption>'.esc_html($d['cap']).'</figcaption></figure>' : '';

    static $css_done = false;
    $css = $css_done ? '' : _rrhero_css();
    $css_done = true;

    return $css.$hero.$read._rrhero_insert_mid($content,$book).$fig;
}
