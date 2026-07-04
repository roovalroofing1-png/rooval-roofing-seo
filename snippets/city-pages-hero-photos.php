<?php
/**
 * Rooval Roofing - City page hero banner + local roofing photo.
 * WPCode PHP snippet, Auto-Insert / Run Everywhere. Injects via the_content
 * (priority 15) so it works on both Elementor city pages and plain pages.
 * Data is keyed by page slug -> attachment IDs (uploaded to the Media Library),
 * so wp_get_attachment_image() resolves the correct responsive srcset server-side.
 * Adding a city = add one row here (and 2621 already handles its FAQ).
 * Safe: if an attachment is missing, the page is returned unchanged.
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
      .'.rrhero{position:relative;border-radius:16px;overflow:hidden;margin:0 0 30px;box-shadow:0 12px 34px rgba(0,0,0,.20);line-height:0}'
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
      .'.rrfig{margin:32px 0;border-radius:14px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.14);line-height:0}'
      .'.rrfig img{width:100%!important;height:auto!important;display:block}'
      .'.rrfig figcaption{background:#0d0d0d;color:#c8a94e;font-size:13.5px;font-weight:600;padding:12px 18px;text-align:center;line-height:1.5}'
      .'@media(max-width:600px){.rrhero-body{padding:16px 16px}.rrhero-img{max-height:290px}.rrhero-credit{display:none}}'
      .'</style>';
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

    $fig = $bodyimg ? '<figure class="rrfig">'.$bodyimg.'<figcaption>'.esc_html($d['cap']).'</figcaption></figure>' : '';

    static $css_done = false;
    $css = $css_done ? '' : _rrhero_css();
    $css_done = true;

    return $css.$hero.$content.$fig;
}
