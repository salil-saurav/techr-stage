<?php
add_action('acf/init', 'add_directory_meta');

function add_directory_meta()
{
   acf_add_local_field_group([
      'key'      => 'group_cpt_directory',
      'title'    => 'Global Options',
      'fields'   => [
         // Media Tab
         [
            'key'   => 'tab_directory_media',
            'label' => 'Media',
            'type'  => 'tab',
         ],
         [
            'key'   => 'field_directory_logo',
            'label' => 'Logo',
            'name'  => 'directory_logo',
            'type'  => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
         ],
         [
            'key'   => 'field_directory_video_url',
            'label' => 'Video URL',
            'name'  => 'directory_video_url',
            'type'  => 'url',
            'placeholder' => 'https://youtube.com/watch?v=...',
         ],
         [
            'key'   => 'field_directory_screenshots',
            'label' => 'Screenshots',
            'name'  => 'directory_screenshots',
            'type'  => 'gallery',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'insert' => 'append',
            'library' => 'all',
         ],

         // Pricing Tab
         [
            'key'   => 'tab_directory_pricing',
            'label' => 'Pricing',
            'type'  => 'tab',
         ],
         [
            'key'   => 'field_directory_minimum_price',
            'label' => 'Minimum Price',
            'name'  => 'directory_minimum_price',
            'type'  => 'text',
         ],
         [
            'key'   => 'field_directory_pricing_details',
            'label' => 'Pricing Details',
            'name'  => 'directory_pricing_details',
            'type'  => 'wysiwyg',
            'tabs'  => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
         ],

         // Social Info Tab
         [
            'key'   => 'tab_directory_social_info',
            'label' => 'Social Info',
            'type'  => 'tab',
         ],
         [
            'key'   => 'field_directory_website',
            'label' => 'Website',
            'name'  => 'directory_website',
            'type'  => 'url',
            'placeholder' => 'https://example.com',
         ],
         [
            'key'          => 'field_directory_social_media',
            'label'        => 'Social Media Accounts',
            'name'         => 'directory_social_media',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Add Social Media',
            'sub_fields'   => [
               [
                  'key'     => 'field_directory_social_media_url',
                  'label'   => 'URL',
                  'name'    => 'url',
                  'type'    => 'url',
                  'placeholder' => 'https://',
               ],
            ],
         ],

         // Reviews Tab
         [
            'key'   => 'tab_directory_reviews',
            'label' => 'Reviews',
            'type'  => 'tab',
         ],
         [
            'key'   => 'field_directory_rating',
            'label' => 'Rating',
            'name'  => 'directory_rating',
            'type'  => 'number',
            'min'   => 0,
            'max'   => 5,
            'step'  => 0.1,
            'placeholder' => '4.5',
            'wrapper'     => ['width' => 33],
         ],
         [
            'key'   => 'field_directory_review_count',
            'label' => 'Review Count',
            'name'  => 'directory_review_count',
            'type'  => 'number',
            'min'   => 0,
            'step'  => 1,
            'placeholder' => '150',
            'wrapper'     => ['width' => 33],

         ],
         [
            'key'   => 'field_directory_rank',
            'label' => 'Rank',
            'name'  => 'directory_rank',
            'type'  => 'number',
            'min'   => 1,
            'step'  => 1,
            'wrapper'     => ['width' => 33],
         ],

         [
            'key'   => 'field_directory_reviews',
            'label' => 'Rank',
            'name'  => 'directory_reviews',
            'type'  => 'text',
            'wrapper'     => ['width' => 50],
         ],

         // Additional Info Tab
         [
            'key'   => 'tab_directory_additional_info',
            'label' => 'Additional Info',
            'type'  => 'tab',
         ],
         [
            'key'   => 'field_directory_used_by',
            'label' => 'Used By',
            'name'  => 'directory_used_by',
            'type'  => 'wysiwyg',
            'tabs'  => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'instructions' => 'Notable companies or statistics about usage',

         ],
         [
            'key'   => 'field_directory_overview',
            'label' => 'Overview',
            'name'  => 'directory_overview',
            'type'  => 'wysiwyg',
            'tabs'  => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
         ],
      ],
      'location' => [
         [
            [
               'param'    => 'post_type',
               'operator' => '==',
               'value'    => 'directory',
            ],
         ],
      ],
      'style'       => 'seamless',
      'active'      => true,
      'description' => 'Directory listing metadata fields',
   ]);
}
