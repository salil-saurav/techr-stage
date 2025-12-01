<?php

if (!defined('ABSPATH')) exit;

class CPT_Registrar
{

    /** @var array */
    private $post_types;

    /** @var string */
    private $text_domain;

    /**
     * Constructor
     *
     * @param array  $post_types  Configuration array for post types.
     * @param string $text_domain Text domain for translations.
     */
    public function __construct(array $post_types, string $text_domain = 'text-domain')
    {
        $this->post_types = $post_types;
        $this->text_domain = $text_domain;
    }

    /**
     * Initialize the registration hooks
     */
    public function init(): void
    {
        add_action('init', [$this, 'register_all']);
    }

    /**
     * Callback for the init hook
     */
    public function register_all(): void
    {
        foreach ($this->post_types as $slug => $config) {
            $this->register_single_post_type($slug, $config);
        }
    }

    /**
     * Register a single post type and its taxonomies
     *
     * @param string $slug
     * @param array $config
     */
    private function register_single_post_type(string $slug, array $config): void
    {
        $slug = sanitize_key($slug);

        // 1. Determine Names (Singular/Plural)
        $singular = $config['singular'] ?? ucfirst($slug);
        $plural   = $config['plural'] ?? $singular . 's';

        // 2. Generate Labels
        $labels = $this->get_cpt_labels($singular, $plural);

        // 3. Merge Defaults
        $args = wp_parse_args($config['args'] ?? [], [
            'labels'          => $labels,
            'public'          => true,
            'has_archive'     => true,
            'menu_icon'       => 'dashicons-admin-post',
            'supports'        => ['title', 'editor', 'thumbnail'],
            'show_in_rest'    => true, // Gutenberg support
            'rewrite'         => ['slug' => str_replace('_', '-', $slug)],
            'capability_type' => 'post',
        ]);

        register_post_type($slug, $args);

        // 4. Register Associated Taxonomies
        if (!empty($config['taxonomies'])) {
            foreach ($config['taxonomies'] as $tax_slug => $tax_config) {
                $this->register_single_taxonomy($tax_slug, $slug, $tax_config);
            }
        }
    }

    /**
     * Register a taxonomy
     *
     * @param string $slug
     * @param string $post_type
     * @param array  $config
     */
    private function register_single_taxonomy(string $slug, string $post_type, array $config): void
    {
        $slug = sanitize_key($slug);

        // If taxonomy exists, just attach it to the object type and return
        if (taxonomy_exists($slug)) {
            register_taxonomy_for_object_type($slug, $post_type);
            return;
        }

        $singular = $config['singular'] ?? ucfirst($slug);
        $plural   = $config['plural'] ?? $singular . 's';

        $labels = $this->get_taxonomy_labels($singular, $plural);

        $args = wp_parse_args($config['args'] ?? [], [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => str_replace('_', '-', $slug)],
        ]);

        register_taxonomy($slug, $post_type, $args);
    }

    /**
     * Generate CPT Labels
     */
    private function get_cpt_labels(string $singular, string $plural): array
    {
        return [
            'name'                  => $plural,
            'singular_name'         => $singular,
            'menu_name'             => $plural,
            'add_new'               => __('Add New', $this->text_domain),
            'add_new_item'          => sprintf(__('Add New %s', $this->text_domain), $singular),
            'edit_item'             => sprintf(__('Edit %s', $this->text_domain), $singular),
            'new_item'              => sprintf(__('New %s', $this->text_domain), $singular),
            'view_item'             => sprintf(__('View %s', $this->text_domain), $singular),
            'view_items'            => sprintf(__('View %s', $this->text_domain), $plural),
            'search_items'          => sprintf(__('Search %s', $this->text_domain), $plural),
            'not_found'             => sprintf(__('No %s found', $this->text_domain), strtolower($plural)),
            'not_found_in_trash'    => sprintf(__('No %s found in Trash', $this->text_domain), strtolower($plural)),
            'all_items'             => sprintf(__('All %s', $this->text_domain), $plural),
            'archives'              => sprintf(__('%s Archives', $this->text_domain), $singular),
            'attributes'            => sprintf(__('%s Attributes', $this->text_domain), $singular),
            'insert_into_item'      => sprintf(__('Insert into %s', $this->text_domain), strtolower($singular)),
            'uploaded_to_this_item' => sprintf(__('Uploaded to this %s', $this->text_domain), strtolower($singular)),
            'featured_image'        => __('Featured Image', $this->text_domain),
            'set_featured_image'    => __('Set featured image', $this->text_domain),
            'remove_featured_image' => __('Remove featured image', $this->text_domain),
            'use_featured_image'    => __('Use as featured image', $this->text_domain),
        ];
    }

    /**
     * Generate Taxonomy Labels
     */
    private function get_taxonomy_labels(string $singular, string $plural): array
    {
        return [
            'name'              => $plural,
            'singular_name'     => $singular,
            'search_items'      => sprintf(__('Search %s', $this->text_domain), $plural),
            'all_items'         => sprintf(__('All %s', $this->text_domain), $plural),
            'parent_item'       => sprintf(__('Parent %s', $this->text_domain), $singular),
            'parent_item_colon' => sprintf(__('Parent %s:', $this->text_domain), $singular),
            'edit_item'         => sprintf(__('Edit %s', $this->text_domain), $singular),
            'update_item'       => sprintf(__('Update %s', $this->text_domain), $singular),
            'add_new_item'      => sprintf(__('Add New %s', $this->text_domain), $singular),
            'new_item_name'     => sprintf(__('New %s Name', $this->text_domain), $singular),
            'menu_name'         => $plural,
        ];
    }
}

$cpt_config = [
    'directory' => [
        'singular' => 'Directory Item',
        'plural'   => 'Directories',
        'args'     => [
            'menu_icon' => 'dashicons-portfolio',
            'supports'  => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
        ],
        'taxonomies' => [
            'software-category' => [
                'singular' => 'Software Category',
                'plural'   => 'Software Categories',
                'args'     => ['hierarchical' => true]
            ],
            'features' => [
                'singular' => 'Feature',
                'plural'   => 'Features',
                'args'     => ['hierarchical' => false]
            ],
            'deployment' => [
                'singular' => 'Deployment',
                'plural'   => 'Deployments',
                'args'     => ['hierarchical' => false]
            ],
            'market' => [
                'singular' => 'Market',
                'plural'   => 'Market',
                'args'     => ['hierarchical' => false]
            ],
            'license' => [
                'singular' => 'License',
                'plural'   => 'License',
                'args'     => ['hierarchical' => false]
            ],
            'pricing-model' => [
                'singular' => 'Pricing Model',
                'plural'   => 'Pricing Model',
                'args'     => ['hierarchical' => false]
            ]
        ]
    ],
    // You can easily add another CPT here
    'event' => [
        'singular' => 'Event',
        'plural'   => 'Events',
        'args'     => [
            'menu_icon' => 'dashicons-calendar-alt',
        ]
    ]
];

// Initialize the class
add_action('after_setup_theme', function () use ($cpt_config) {
    $registrar = new CPT_Registrar($cpt_config, 'techr');
    $registrar->init();
});
