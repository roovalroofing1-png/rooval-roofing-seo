/**
 * RUN-ONCE 2026-07-16 — city Elementor price fix (WPCode snippet 3092, now DEACTIVATED)
 *
 * Ran ONCE on 2026-07-16 14:31:49 (flag option: rooval_runonce_city_prices_20260716).
 * Replaced old roof-replacement dollar ranges with the owner's real $20,000-$30,000
 * project range inside meta._elementor_data on 12 Elementor city pages (the render
 * source — earlier post_content edits never showed live). Result: all 12 REPLACED_1.
 *
 * Safety: pre-write per-page backups stored in options rooval_bak_elementor_{id}
 * (autoload=false). Rollback one-liner per page:
 *   update_post_meta($ID,'_elementor_data', wp_slash(get_option('rooval_bak_elementor_'.$ID)));
 *   delete_post_meta($ID,'_elementor_element_cache'); delete_post_meta($ID,'_elementor_css');
 *   \Elementor\Plugin::instance()->files_manager->clear_cache(); do_action('litespeed_purge_all');
 * Full-site net: UpdraftPlus backup completed Jul 16 14:24:24 (kept manually).
 */
add_action('admin_footer', function () {
    if (!current_user_can('manage_options')) { return; }
    $done = get_option('rooval_runonce_city_prices_20260716');
    if ($done) {
        echo "\n<!-- ROOVAL_RUNONCE_CITY_PRICES: DONE@" . esc_html($done) . " | " . esc_html(get_option('rooval_runonce_city_prices_20260716_report', 'NO_REPORT_SAVED')) . " -->\n";
        return;
    }
    $map = array(
        2391 => array('between $9,000 and $20,000', 'between $20,000 and $30,000'),
        2310 => array('between roughly $10,000 and $18,000', 'between roughly $20,000 and $30,000'),
        2306 => array('between $9,000 and $16,000', 'between $20,000 and $30,000'),
        2302 => array('between about $8,000 for a smaller single-story home and $22,000 or more', 'between about $20,000 for a smaller single-story home and $30,000 or more'),
        2296 => array('about $11,000 to $26,000', 'about $20,000 to $30,000 or more'),
        2298 => array('between $10,000 and $24,000', 'between $20,000 and $30,000'),
        2299 => array('between $9,000 and $18,000', 'between $20,000 and $30,000'),
        2300 => array('between $7,500 and $16,500', 'between $20,000 and $30,000'),
        2301 => array('between $10,000 and $18,000', 'between $20,000 and $30,000'),
        2303 => array('between $8,000 and $16,000', 'between $20,000 and $30,000'),
        2304 => array('between $9,000 and $20,000', 'between $20,000 and $30,000'),
        2308 => array('about $9,000 to $18,000', 'about $20,000 to $30,000'),
    );
    $report = array();
    foreach ($map as $id => $pair) {
        try {
            $old = $pair[0]; $new = $pair[1];
            $data = get_post_meta($id, '_elementor_data', true);
            if (!is_string($data) || $data === '') { $report[] = $id . ':NO_DATA'; continue; }
            $hits = substr_count($data, $old);
            if ($hits > 0) {
                update_option('rooval_bak_elementor_' . $id, $data, false);
                update_post_meta($id, '_elementor_data', wp_slash(str_replace($old, $new, $data)));
                $report[] = $id . ':REPLACED_' . $hits;
            } else {
                $report[] = $id . ':NOT_FOUND';
            }
            $p = get_post($id);
            if ($p && strpos($p->post_content, $old) !== false) {
                wp_update_post(wp_slash(array('ID' => $id, 'post_content' => str_replace($old, $new, $p->post_content))));
                $report[] = $id . ':PC_SYNCED';
            }
            delete_post_meta($id, '_elementor_element_cache');
            delete_post_meta($id, '_elementor_css');
        } catch (\Throwable $e) {
            $report[] = $id . ':ERROR_' . substr(preg_replace('/[^A-Za-z0-9 _.-]/', '', $e->getMessage()), 0, 80);
        }
    }
    try {
        if (class_exists('\\Elementor\\Plugin')) {
            \Elementor\Plugin::instance()->files_manager->clear_cache();
        }
    } catch (\Throwable $e) { $report[] = 'ELEMENTOR_CLEAR_ERROR'; }
    do_action('litespeed_purge_all');
    if (class_exists('autoptimizeCache')) { try { autoptimizeCache::clearall(); } catch (\Throwable $e) {} }
    wp_cache_flush();
    $report_str = implode(' | ', $report);
    update_option('rooval_runonce_city_prices_20260716_report', $report_str, false);
    update_option('rooval_runonce_city_prices_20260716', current_time('mysql'), false);
    echo "\n<!-- ROOVAL_RUNONCE_CITY_PRICES: " . esc_html($report_str) . " -->\n";
});
