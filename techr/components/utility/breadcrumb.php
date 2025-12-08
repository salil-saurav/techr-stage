<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom Breadcrumb Shortcode
 * Generates a breadcrumb navigation trail based on current page context
 *
 * @return string HTML breadcrumb markup
 */
function custom_breadcrumb_shortcode($atts = [])
{
    // Parse shortcode attributes with defaults
    $atts = shortcode_atts([
        'separator' => '/',
        'show_home' => true,
        'home_text' => 'Home',
        'schema' => true
    ], $atts, 'breadcrumb');

    $breadcrumb_items = get_breadcrumb_items($atts);

    if (empty($breadcrumb_items)) {
        return '';
    }

    return build_breadcrumb_html($breadcrumb_items, $atts);
}

/**
 * Get breadcrumb items based on current page context
 *
 * @param array $atts Shortcode attributes
 * @return array Array of breadcrumb items
 */
function get_breadcrumb_items($atts)
{
    $items = [];

    // Add home breadcrumb if enabled
    if ($atts['show_home']) {
        $items[] = [
            'title' => sanitize_text_field($atts['home_text']),
            'url' => home_url('/'),
            'position' => 1
        ];
    }

    // Front page - return only home
    if (is_front_page()) {
        return $items;
    }

    $position = count($items) + 1;

    // Single post
    if (is_single()) {
        $items = array_merge($items, get_single_post_breadcrumbs($position));
    }
    // Page
    elseif (is_page()) {
        $items = array_merge($items, get_page_breadcrumbs($position));
    }
    // Category archive
    elseif (is_category()) {
        $items = array_merge($items, get_category_breadcrumbs($position));
    }
    // Tag archive
    elseif (is_tag()) {
        $items = array_merge($items, get_tag_breadcrumbs($position));
    }
    // Author archive
    elseif (is_author()) {
        $items = array_merge($items, get_author_breadcrumbs($position));
    }
    // Date archive
    elseif (is_date()) {
        $items = array_merge($items, get_date_breadcrumbs($position));
    }
    // Search results
    elseif (is_search()) {
        $items[] = [
            'title' => sprintf(__('Search Results for: %s', 'text-domain'), get_search_query()),
            'position' => $position
        ];
    }
    // 404
    elseif (is_404()) {
        $items[] = [
            'title' => __('404 Not Found', 'text-domain'),
            'position' => $position
        ];
    }
    // Custom post types
    elseif (is_singular()) {
        $items = array_merge($items, get_custom_post_type_breadcrumbs($position));
    }

    return apply_filters('custom_breadcrumb_items', $items);
}

/**
 * Get breadcrumbs for single posts
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_single_post_breadcrumbs($start_position)
{
    $items = [];
    $categories = get_the_category();

    if (!empty($categories) && !is_wp_error($categories)) {
        $main_category = $categories[0];

        // Get category hierarchy
        $category_ancestors = get_ancestors($main_category->term_id, 'category');
        $category_ancestors = array_reverse($category_ancestors);

        foreach ($category_ancestors as $ancestor_id) {
            $ancestor = get_category($ancestor_id);
            if ($ancestor && !is_wp_error($ancestor)) {
                $items[] = [
                    'title' => $ancestor->name,
                    'url' => get_category_link($ancestor_id),
                    'position' => $start_position++
                ];
            }
        }

        $items[] = [
            'title' => $main_category->name,
            'url' => get_category_link($main_category->term_id),
            'position' => $start_position++
        ];
    }

    $items[] = [
        'title' => get_the_title(),
        'position' => $start_position
    ];

    return $items;
}

/**
 * Get breadcrumbs for pages
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_page_breadcrumbs($start_position)
{
    global $post;
    $items = [];

    if (!$post) {
        return $items;
    }

    // Get page ancestors
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));

        foreach ($ancestors as $ancestor_id) {
            $items[] = [
                'title' => get_the_title($ancestor_id),
                'url' => get_permalink($ancestor_id),
                'position' => $start_position++
            ];
        }
    }

    $items[] = [
        'title' => get_the_title(),
        'position' => $start_position
    ];

    return $items;
}

/**
 * Get breadcrumbs for category archives
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_category_breadcrumbs($start_position)
{
    $items = [];
    $category = get_queried_object();

    if (!$category || is_wp_error($category)) {
        return $items;
    }

    // Get category ancestors
    if ($category->parent) {
        $ancestors = array_reverse(get_ancestors($category->term_id, 'category'));

        foreach ($ancestors as $ancestor_id) {
            $ancestor = get_category($ancestor_id);
            if ($ancestor && !is_wp_error($ancestor)) {
                $items[] = [
                    'title' => $ancestor->name,
                    'url' => get_category_link($ancestor_id),
                    'position' => $start_position++
                ];
            }
        }
    }

    $items[] = [
        'title' => $category->name,
        'position' => $start_position
    ];

    return $items;
}

/**
 * Get breadcrumbs for tag archives
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_tag_breadcrumbs($start_position)
{
    $tag = get_queried_object();

    if (!$tag || is_wp_error($tag)) {
        return [];
    }

    return [[
        'title' => sprintf(__('Tag: %s', 'text-domain'), $tag->name),
        'position' => $start_position
    ]];
}

/**
 * Get breadcrumbs for author archives
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_author_breadcrumbs($start_position)
{
    $author = get_queried_object();

    if (!$author) {
        return [];
    }

    return [[
        'title' => sprintf(__('Author: %s', 'text-domain'), $author->display_name),
        'position' => $start_position
    ]];
}

/**
 * Get breadcrumbs for date archives
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_date_breadcrumbs($start_position)
{
    $items = [];

    if (is_year()) {
        $items[] = [
            'title' => get_the_date('Y'),
            'position' => $start_position
        ];
    } elseif (is_month()) {
        $items[] = [
            'title' => get_the_date('Y'),
            'url' => get_year_link(get_the_date('Y')),
            'position' => $start_position++
        ];
        $items[] = [
            'title' => get_the_date('F'),
            'position' => $start_position
        ];
    } elseif (is_day()) {
        $items[] = [
            'title' => get_the_date('Y'),
            'url' => get_year_link(get_the_date('Y')),
            'position' => $start_position++
        ];
        $items[] = [
            'title' => get_the_date('F'),
            'url' => get_month_link(get_the_date('Y'), get_the_date('m')),
            'position' => $start_position++
        ];
        $items[] = [
            'title' => get_the_date('d'),
            'position' => $start_position
        ];
    }

    return $items;
}

/**
 * Get breadcrumbs for custom post types
 *
 * @param int $start_position Starting position for schema
 * @return array Breadcrumb items
 */
function get_custom_post_type_breadcrumbs($start_position)
{
    $items = [];
    $post_type = get_post_type();
    $post_type_object = get_post_type_object($post_type);

    if ($post_type_object && $post_type_object->has_archive) {
        $items[] = [
            'title' => $post_type_object->labels->name,
            'url' => get_post_type_archive_link($post_type),
            'position' => $start_position++
        ];
    }

    $items[] = [
        'title' => get_the_title(),
        'position' => $start_position
    ];

    return $items;
}

/**
 * Build breadcrumb HTML markup
 *
 * @param array $items Breadcrumb items
 * @param array $atts Shortcode attributes
 * @return string HTML markup
 */
function build_breadcrumb_html($items, $atts)
{
    if (empty($items)) {
        return '';
    }

    $separator = !empty($atts['separator']) ? ' ' . esc_html($atts['separator']) . ' ' : ' / ';
    $total_items = count($items);

    $output = '<nav class="breadcrumb" aria-label="' . esc_attr__('Breadcrumb', 'text-domain') . '">';

    // Add Schema.org structured data if enabled
    if ($atts['schema']) {
        $output .= '<ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">';
    } else {
        $output .= '<ol class="breadcrumb-list">';
    }

    foreach ($items as $index => $item) {
        $is_last = ($index === $total_items - 1);

        if ($atts['schema']) {
            $output .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        } else {
            $output .= '<li class="breadcrumb-item">';
        }

        if (!empty($item['url'])) {
            if ($atts['schema']) {
                $output .= '<a href="' . esc_url($item['url']) . '" itemprop="item">';
                $output .= '<span itemprop="name">' . esc_html($item['title']) . '</span>';
                $output .= '</a>';
                $output .= '<meta itemprop="position" content="' . esc_attr($item['position']) . '" />';
            } else {
                $output .= '<a href="' . esc_url($item['url']) . '">' . esc_html($item['title']) . '</a>';
            }
        } else {
            if ($atts['schema']) {
                $output .= '<span itemprop="name">' . esc_html($item['title']) . '</span>';
                $output .= '<meta itemprop="position" content="' . esc_attr($item['position']) . '" />';
            } else {
                $output .= '<span>' . esc_html($item['title']) . '</span>';
            }
        }

        // Add separator except for last item
        if (!$is_last) {
            $output .= '<span class="breadcrumb-separator" aria-hidden="true">' . $separator . '</span>';
        }

        $output .= '</li>';
    }

    $output .= '</ol></nav>';

    return $output;
}

add_shortcode('breadcrumb', 'custom_breadcrumb_shortcode');
