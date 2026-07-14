<?php
/**
 * WPCode snippet id 3014 — "Remove 'Howdy' from admin bar"
 * Type: PHP, Auto Insert / Run Everywhere, Active. Admin-only effect (cosmetic).
 * Priority 99999 required on this WP version so the my-account node exists when we edit it.
 * Guarded (if $node && strpos...) so it is a safe no-op if the node is absent — never white-screens.
 */
add_filter('admin_bar_menu', function($bar){
    $node = $bar->get_node('my-account');
    if ($node && strpos($node->title, 'Howdy,') !== false) {
        $bar->add_node(array('id'=>'my-account','title'=>str_replace('Howdy, ', '', $node->title)));
    }
}, 99999);
