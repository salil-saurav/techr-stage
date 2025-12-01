<?php

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'menu_slug' => 'theme-general-options',
            'capability' => 'manage_options',
            'redirect' => false,
            'position' => '85', // Position below the ACF menu
            'icon_url' => 'dashicons-admin-site-alt2', // Dashicon for the menu
        ));
    }
});
