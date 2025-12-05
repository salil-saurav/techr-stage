<?php

/**
 * Main functions file
 * Auto-loads all PHP files from inc and components/utility directories
 */

use TechrOption\Techr_Helpers;

if (!defined('ABSPATH')) exit;

/**
 * Require inc files
 */

foreach (glob(__DIR__ . '/includes/*.php') as $file) {
    require_once $file;
}

/**
 * Require components utility files
 */

foreach (glob(__DIR__ . '/components/utility/*.php') as $utility_files) {
    require_once $utility_files;
}

/**
 * Require Meta fields
 */

require_once __DIR__ . '/meta-fields/theme-option.php';
require_once __DIR__ . '/meta-fields/meta-index.php';

require_once TECHR_OPTIONS_PATH . 'helper/techr-helpers.php';

add_action('admin_post_upload_xlsx', function () {
    (new \TechrOption\Techr_Helpers())->handle_xlsx_upload();
});


// add_action('init', function () {

//     if (!is_admin()) return;

//     $taxonomies = get_taxonomies([], 'names');

//     foreach ($taxonomies as $tax) {

//         $terms = get_terms([
//             'taxonomy'   => $tax,
//             'hide_empty' => false,
//             'number'     => 0,
//         ]);

//         if (empty($terms) || is_wp_error($terms)) {
//             continue;
//         }

//         foreach ($terms as $term) {

//             // delete ONLY numeric-name terms (ex: "724192")
//             if (preg_match('/^[0-9]+$/', $term->name)) {

//                 // You can also check numeric slug instead:
//                 // if (preg_match('/^[0-9]+$/', $term->slug))

//                 wp_delete_term($term->term_id, $tax);
//             }
//         }
//     }
// });
