add_action('admin_footer', function () {
    if (!current_user_can('manage_options')) { return; }
    $done = get_option('rooval_runonce_coherence_20260716');
    if ($done) {
        echo "\n<!-- ROOVAL_RUNONCE_COHERENCE: DONE@" . esc_html($done) . " | " . esc_html(get_option('rooval_runonce_coherence_20260716_report', 'NO_REPORT_SAVED')) . " -->\n";
        return;
    }
    $map = array(
        2298 => array('so they land toward the higher end of Utah County pricing.', 'so they take more labor and staging than a simpler roof.'),
        2296 => array('usually run higher than a standard valley home', 'usually take more time and staging than a simpler roof'),
    );
    $report = array();
    foreach ($map as $id => $pair) {
        try {
            $old = $pair[0]; $new = $pair[1];
            $data = get_post_meta($id, '_elementor_data', true);
            if (!is_string($data) || $data === '') { $report[] = $id . ':NO_DATA'; continue; }
            $hits = substr_count($data, $old);
            if ($hits === 1) {
                update_option('rooval_bak2_elementor_' . $id, $data, false);
                update_post_meta($id, '_elementor_data', wp_slash(str_replace($old, $new, $data)));
                $report[] = $id . ':REPLACED_1';
            } else {
                $report[] = $id . ':HITS_' . $hits;
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
    update_option('rooval_runonce_coherence_20260716_report', $report_str, false);
    update_option('rooval_runonce_coherence_20260716', current_time('mysql'), false);
    echo "\n<!-- ROOVAL_RUNONCE_COHERENCE: " . esc_html($report_str) . " -->\n";
});
