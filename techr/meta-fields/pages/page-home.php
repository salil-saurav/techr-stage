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
            'key'     => 'field_banner_title',
            'label'   => 'Banner Title',
            'name'    => 'banner_title',
            'type'    => 'text',
            'wrapper' =>  ['width' => 50,],
         ],
         [
            'key'           => 'field_banner_img',
            'label'         => 'Banner Image',
            'name'          => 'banner_img',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
            'wrapper'       =>  ['width' => 50,],
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
