<?php
add_action('acf/init', 'add_homepage_fields');

function add_homepage_fields()
{
   acf_add_local_field_group([
      'key'   => 'group_homepage_fields',
      'title' => 'Home',
      'fields' => [
         // Branding Tab
         [
            'key'   => 'tab',
            'label' => 'Banner',
            'type'  => 'tab',
         ],
         [
            'key'           => 'field_banner_img',
            'label'         => 'Banner Image',
            'name'          => 'banner_img',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
            'wrapper'       =>  ['width' => 33,],
         ],
         [
            'key'     => 'field_banner_title',
            'label'   => 'Banner Title',
            'name'    => 'banner_title',
            'type'    => 'text',
            'wrapper' =>  ['width' => 33,],
         ],
         [
            'key'           => 'field_banner_subtitle',
            'label'         => 'Banner Subtitle',
            'name'          => 'banner_subtitle',
            'type'          => 'text',
            'wrapper'       =>  ['width' => 33,],
         ],
         [
            'key'   => 'market_tab',
            'label' => 'Trending Marketing Posts',
            'type'  => 'tab',
         ],
         [
            'key'           => 'field_trending_taxonomy',
            'label'         => 'Select Categories',
            'name'          => 'trending_categories',
            'type'          => 'taxonomy',
            'taxonomy'      => 'software-category',
            'field_type'    => 'multi_select',       // select | multi_select | checkbox | radio
            'allow_null'    => 1,
            'add_term'      => 0,              // disables "Add new term"
            'load_terms'    => 0,
            'save_terms'    => 0,
            'return_format' => 'id',           // id | object
         ],

      ],
      'location' => [
         [
            [
               'param'    => 'page_type',
               'operator' => '==',
               'value'    => 'front_page'
            ],
         ],
      ],
      'style'  => 'seamless',
      'active' => true,
   ]);
}
