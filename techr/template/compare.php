<?php

/**
 * Template Name: Compare Directories
 */

require_once get_stylesheet_directory() . "/helper/techr-theme-helpers.php";

$helper = new ThrHelper();

$slugs = array_filter(
   array_map('sanitize_title', explode('-vs-', get_query_var('compare_items', '')))
);

$referer = wp_get_referer();

if (empty($slugs)) {
   get_header();
   echo '<main><div class="container"><p>No items to compare.</p></div></main>';
   get_footer();
   return;
}

// Fetch all posts once
$posts = array_map(function ($slug) {
   return get_page_by_path($slug, OBJECT, 'directory');
}, $slugs);

get_header();
?>

<style>
   table a {
      display: block;
   }

   table img {
      width: 132px;
      height: 132px;
      object-fit: cover;
   }
</style>

<main>
   <div class="container">
      <div class="table-responsive">

         <table class="table table-striped text-center">
            <thead>
               <tr>
                  <?php foreach ($slugs as $slug): ?>
                     <th><?php echo esc_html(ucwords(str_replace('-', ' ', $slug))); ?></th>
                  <?php endforeach; ?>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <?php foreach ($posts as $post):
                     $icon = get_field('directory_logo', $post->ID);
                  ?>
                     <td>
                        <a data-slug="<?= esc_attr($post->post_name) ?>" href="<?= $helper->build_remove_href($slugs, $post->post_name) ?>"> <span class="dashicons dashicons-dismiss"></span> Remove product</a>
                        <a href="<?php echo esc_url(get_permalink($post)); ?>">
                           <?php if ($icon): ?>
                              <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                           <?php endif; ?>
                        </a>
                     </td>
                  <?php endforeach; ?>
               </tr>
               <tr>
                  <?php foreach ($posts as $post): ?>
                     <td>


                     </td>
                  <?php endforeach; ?>
               </tr>
               <tr>

               </tr>
            </tbody>
         </table>
      </div>
   </div>
</main>

<?php get_footer();
