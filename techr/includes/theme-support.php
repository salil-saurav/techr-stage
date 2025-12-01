<?php

function add_theme_support_to_techr()
{
   // 1. Core Basics
   add_theme_support('title-tag');
   add_theme_support('post-thumbnails');
   add_theme_support('automatic-feed-links');
   add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
   add_theme_support('comments');

   // 2. Branding
   add_theme_support('custom-logo', [
      'height'      => 80,
      'width'       => 200,
      'flex-height' => true,
      'flex-width'  => true,
   ]);

   // 3. Block Editor
   add_theme_support('align-wide');
   add_theme_support('responsive-embeds');
   add_theme_support('editor-styles');
   add_editor_style();

   // 4. Modern Design Controls
   add_theme_support('appearance-tools');
}

add_action('after_setup_theme', 'add_theme_support_to_techr');

function add_file_types_to_uploads($file_types)
{
   $new_filetypes = array();
   $new_filetypes['svg'] = 'image/svg+xml';
   $file_types = array_merge($file_types, $new_filetypes);
   return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
