<?php

/**
 * Main functions file
 * Auto-loads all PHP files from inc and components/utility directories
 */

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


use TechrOption\Simple_XLSX_Reader;
use TechrOption\Techer_Helper;

add_action('admin_post_upload_xlsx', 'handle_xlsx_upload');
add_action('admin_post_nopriv_upload_xlsx', 'handle_xlsx_upload_unauthorized');

/**
 * Handle unauthorized access
 */
function handle_xlsx_upload_unauthorized()
{
    wp_die(
        __('You do not have permission to upload files.', 'techr'),
        __('Unauthorized', 'techr'),
        ['response' => 403]
    );
}

/**
 * Read and parse uploaded XLSX file
 *
 * @param string $file_path Path to the uploaded file
 * @return array|WP_Error Array of data or WP_Error on failure
 */
function read_uploaded_xlsx($file_path)
{
    if (!file_exists($file_path)) {
        return new WP_Error('file_not_found', __('File not found.', 'techr'));
    }

    $reader = new Simple_XLSX_Reader($file_path);
    $data = $reader->get_data();

    if (is_wp_error($data)) {
        return $data;
    }

    if (empty($data)) {
        return new WP_Error('empty_file', __('The uploaded file is empty.', 'techr'));
    }

    // First row as headers
    $headers = array_shift($data);

    if (empty($headers)) {
        return new WP_Error('no_headers', __('No headers found in the file.', 'techr'));
    }

    // Convert rows to associative arrays
    $result = [];
    foreach ($data as $row_index => $row) {
        $row_assoc = [];
        foreach ($headers as $i => $header) {
            $row_assoc[trim($header)] = isset($row[$i]) ? trim($row[$i]) : '';
        }

        // Skip empty rows
        if (array_filter($row_assoc)) {
            $result[] = $row_assoc;
        }
    }

    return $result;
}

/**
 * Map XLSX data to ACF fields and create/update directory posts
 *
 * @param array $data Array of post data from XLSX
 * @return array Results with success/error counts
 */
function map_acf_fields_with_xlsx($data)
{
    $fields_mapping = [
        'field_directory_video_url'      => 'video',
        'field_directory_minimum_price'  => 'minimumPrice',
        'field_directory_pricing_details' => 'pricingDetails',
        'field_directory_website'        => 'website',
        'field_directory_rating'         => 'rating',
        'field_directory_review_count'   => 'reviewCount',
        'field_directory_rank'           => 'rank',
        'field_directory_used_by'        => 'usedBy',
        'field_directory_overview'       => 'overview',
    ];

    $results = [
        'success' => 0,
        'failed'  => 0,
        'errors'  => [],
    ];

    foreach ($data as $index => $post_data) {

        // Validate required fields
        if (empty($post_data['title'])) {
            $results['failed']++;
            $results['errors'][] = sprintf(
                __('Row %d: Missing required field "title"', 'techr'),
                $index + 2 // +2 because we start at row 2 (after header)
            );
            continue;
        }

        // Prepare post data
        $post_args = [
            'post_title'   => sanitize_text_field($post_data['title']),
            'post_type'    => 'directory',
            'post_status'  => 'draft', // Start as draft for review
            'post_content' => isset($post_data['extendedDescription'])
                ? wp_kses_post($post_data['extendedDescription'])
                : '',
            'post_excerpt' => isset($post_data['summary'])
                ? sanitize_textarea_field($post_data['summary'])
                : '',
        ];

        // Add slug if provided
        if (!empty($post_data['slug'])) {
            $post_args['post_name'] = sanitize_title($post_data['slug']);
        }

        // Insert post
        $post_id = wp_insert_post($post_args, true);

        if (is_wp_error($post_id)) {
            $results['failed']++;
            $results['errors'][] = sprintf(
                __('Row %d (%s): %s', 'techr'),
                $index + 2,
                $post_data['title'],
                $post_id->get_error_message()
            );
            continue;
        }

        // Update ACF fields
        $field_update_success = true;
        foreach ($fields_mapping as $field_key => $data_key) {
            if (isset($post_data[$data_key]) && $post_data[$data_key] !== '') {
                $field_value = $post_data[$data_key];

                // Sanitize based on field type
                if (in_array($data_key, ['rating', 'reviewCount', 'rank', 'minimumPrice'])) {
                    $field_value = floatval($field_value);
                } elseif (in_array($data_key, ['video', 'website'])) {
                    $field_value = esc_url_raw($field_value);
                } else {
                    $field_value = sanitize_textarea_field($field_value);
                }

                $updated = update_field($field_key, $field_value, $post_id);

                if (!$updated) {
                    $field_update_success = false;
                }
            }
        }

        if ($field_update_success) {
            $results['success']++;
        } else {
            $results['failed']++;
            $results['errors'][] = sprintf(
                __('Row %d (%s): Post created but some fields failed to update', 'techr'),
                $index + 2,
                $post_data['title']
            );
        }
    }

    return $results;
}

/**
 * Handle XLSX file upload
 */
function handle_xlsx_upload()
{
    // Security checks
    if (!current_user_can('edit_posts')) {
        wp_die(
            __('You do not have permission to upload files.', 'techr'),
            __('Unauthorized', 'techr'),
            ['response' => 403]
        );
    }

    // // Verify nonce (you should add this to your form)
    // if (!isset($_POST['xlsx_upload_nonce']) ||
    //     !wp_verify_nonce($_POST['xlsx_upload_nonce'], 'upload_xlsx_file')) {
    //     wp_die(
    //         __('Security check failed.', 'techr'),
    //         __('Security Error', 'techr'),
    //         ['response' => 403]
    //     );
    // }

    // Check if file was uploaded
    if (!isset($_FILES['xlsx_file']) || $_FILES['xlsx_file']['error'] !== UPLOAD_ERR_OK) {
        $error_message = isset($_FILES['xlsx_file'])
            ? __('File upload error: ', 'techr') . $_FILES['xlsx_file']['error']
            : __('No file uploaded', 'techr');

        wp_die($error_message);
    }

    $file = $_FILES['xlsx_file'];

    // Validate file type
    $file_type = wp_check_filetype($file['name']);
    $allowed_types = ['xlsx', 'xls'];

    if (!in_array($file_type['ext'], $allowed_types)) {
        wp_die(
            __('Please upload a valid Excel file (.xlsx or .xls)', 'techr'),
            __('Invalid File Type', 'techr'),
            ['back_link' => true]
        );
    }

    // Validate file size (max 5MB)
    $max_size = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $max_size) {
        wp_die(
            __('File size exceeds maximum allowed size of 5MB.', 'techr'),
            __('File Too Large', 'techr'),
            ['back_link' => true]
        );
    }

    // Read the file
    $data = read_uploaded_xlsx($file['tmp_name']);

    if (is_wp_error($data)) {
        wp_die(
            $data->get_error_message(),
            __('File Processing Error', 'techr'),
            ['back_link' => true]
        );
    }

    // Process the data
    // $results = map_acf_fields_with_xlsx($data);

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    handle_taxonomy_creation($data);

    // // Redirect with success/error message
    // $redirect_url = add_query_arg([
    //     'page'    => 'techr-import', // Adjust to your admin page slug
    //     'success' => $results['success'],
    //     'failed'  => $results['failed'],
    //     'message' => 'import_complete',
    // ], admin_url('admin.php'));

    // // Store errors in transient for display
    // if (!empty($results['errors'])) {
    //     set_transient('xlsx_import_errors', $results['errors'], 60);
    // }

    // wp_safe_redirect($redirect_url);
    // exit;
}


function handle_taxonomy_creation(array $items): void
{
    foreach ($items as $item) {

        // Skip invalid entries early
        if (
            empty($item['group']) ||
            empty($item['slug'])  ||
            empty($item['name'])
        ) {
            continue;
        }

        $taxonomy = $item['group'];
        $slug     = sanitize_title($item['slug']);
        $name     = sanitize_text_field($item['name']);

        // Validate taxonomy existence
        if (!taxonomy_exists($taxonomy)) {
            error_log("handle_taxonomy_creation: Taxonomy '{$taxonomy}' does not exist.");
            continue;
        }

        // Check if term already exists
        $existing = get_term_by('slug', $slug, $taxonomy);
        if ($existing instanceof WP_Term) {
            continue;
        }

        // Insert term
        $result = wp_insert_term($name, $taxonomy, [
            'slug' => $slug,
        ]);

        // Log WP_Error if needed
        if (is_wp_error($result)) {
            error_log(
                sprintf(
                    "handle_taxonomy_creation: Failed inserting '%s' into '%s' — %s",
                    $name,
                    $taxonomy,
                    $result->get_error_message()
                )
            );
        }
    }
}


/**
 * Display import results admin notice
 */
add_action('admin_notices', 'display_xlsx_import_results');

function display_xlsx_import_results()
{
    if (!isset($_GET['message']) || $_GET['message'] !== 'import_complete') {
        return;
    }

    $success = isset($_GET['success']) ? intval($_GET['success']) : 0;
    $failed = isset($_GET['failed']) ? intval($_GET['failed']) : 0;

    $class = $failed > 0 ? 'notice-warning' : 'notice-success';

    printf(
        '<div class="notice %s is-dismissible"><p>%s</p></div>',
        esc_attr($class),
        sprintf(
            __('Import completed: %d succeeded, %d failed.', 'techr'),
            $success,
            $failed
        )
    );

    // Display errors if any
    $errors = get_transient('xlsx_import_errors');
    if ($errors && is_array($errors)) {
        echo '<div class="notice notice-error"><ul>';
        foreach ($errors as $error) {
            echo '<li>' . esc_html($error) . '</li>';
        }
        echo '</ul></div>';
        delete_transient('xlsx_import_errors');
    }
}
