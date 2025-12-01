<?php
add_action('acf/init', 'add_techr_global_options');

function add_techr_global_options()
{
    acf_add_local_field_group([
        'key'   => 'group_global_options',
        'title' => 'Global Options',
        'fields' => [
            // Branding Tab
            [
                'key'   => 'tab_branding',
                'label' => 'Branding',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_site_logo',
                'label'         => 'Site Logo',
                'name'          => 'site_logo',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'wrapper'       =>  ['width' => 50,],
            ],
            [
                'key'           => 'field_site_image_placeholder',
                'label'         => 'Site Logo Placeholder',
                'name'          => 'site_image_placeholder',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'wrapper'       =>  ['width' => 50,],
            ],
            [
                'key'           => 'field_site_favicon',
                'label'         => 'Favicon',
                'name'          => 'site_favicon',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'thumbnail',
            ],
            [
                'key'        => 'field_company_info',
                'label'      => 'Site Information',
                'name'       => 'company_info',
                'type'       => 'group',
                'layout'     => 'block',
                'sub_fields' => [
                    [
                        'key'   => 'field_company_name',
                        'label' => 'Name',
                        'name'  => 'company_name',
                        'type'  => 'text',
                    ],
                    [
                        'key'   => 'field_address',
                        'label' => 'Address',
                        'name'  => 'address',
                        'type'  => 'textarea',
                    ],
                    [
                        'key'     => 'field_email',
                        'label'   => 'Email',
                        'name'    => 'email',
                        'type'    => 'email',
                        'wrapper' =>  ['width' => 50,],
                    ],
                    [
                        'key'     => 'field_phone_number',
                        'label'   => 'Phone Number',
                        'name'    => 'phone_number',
                        'type'    => 'text',
                        'wrapper' =>  ['width' => 50,],
                    ],
                ],
            ],

            // Social Media Tab
            [
                'key'   => 'tab_social_media',
                'label' => 'Social Media',
                'type'  => 'tab',
            ],
            [
                'key'          => 'field_social_media_accounts',
                'label'        => 'Social Media Accounts',
                'name'         => 'social_media_accounts',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Social Media',
                'sub_fields'   => [
                    [
                        'key'           => 'field_social_platform',
                        'label'         => 'Platform Icon',
                        'name'          => 'platform_icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'wrapper'       =>  ['width' => 15,],
                    ],
                    [
                        'key'     => 'field_social_platform_name',
                        'label'   => 'Platform Name',
                        'name'    => 'platform_name',
                        'type'    => 'text',
                        'wrapper' =>  ['width' => 25,],
                    ],
                    [
                        'key'     => 'field_social_url',
                        'label'   => 'URL',
                        'name'    => 'url',
                        'type'    => 'url',
                        'wrapper' =>  ['width' => 60,],
                    ],
                ],
            ],

            // Header Tab
            [
                'key'   => 'tab_header',
                'label' => 'Header',
                'type'  => 'tab',
            ],


            // Footer Tab
            [
                'key'   => 'tab_footer',
                'label' => 'Footer',
                'type'  => 'tab',
            ],
            [
                'key'        => 'field_global_footer_code_group',
                'label'      => 'Footer',
                'name'       => 'global_footer_code',
                'type'       => 'group',
                'layout'     => 'block',
                'sub_fields' => [
                    [
                        'key'       => 'field_global_footer_html_code',
                        'label'     => 'HTML',
                        'name'      => 'global_header_html_code',
                        'type'      => 'textarea',
                        'data-mode' => 'text/html',
                    ],
                    [
                        'key'   => 'field_global_footer_css_code',
                        'label' => 'CSS',
                        'name'  => 'global_header_css_code',
                        'type'  => 'textarea',
                    ],
                    [
                        'key'   => 'field_global_footer_js_code',
                        'label' => 'JavaScript',
                        'name'  => 'global_header_js_code',
                        'type'  => 'textarea',
                    ],
                ],
            ],

            // breadcrumb
            [
                'key'   => 'tab_breadcrumb',
                'label' => 'Breadcrumb',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_breadcrumb_shortcode',
                'label'         => 'Breadcrumb Shortcode',
                'name'          => 'breadcrumb_shortcode',
                'type'          => 'text',
                'instructions'  => 'Enter your breadcrumb shortcode here (e.g., [breadcrumb])',
                'placeholder'   => '[your_breadcrumb_shortcode]',
                'default_value' => '[breadcrumb]',
            ],

        ],
        'location' => [
            [
                [
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'theme-general-options',
                ],
            ],
        ],
        'style'  => 'seamless',
        'active' => true,
    ]);
}
