<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
   die('Please do not load this page directly. Thanks!');

if (post_password_required()) { ?>
   <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
   return;
}
?>

<div id="comments" class="comments-area">
   <?php if (have_comments()) : ?>
      <h2 class="comments-title">
         <?php
         printf(
            _nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title'),
            number_format_i18n(get_comments_number()),
            get_the_title()
         );
         ?>
      </h2>

      <ol class="comment-list">
         <?php
         wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 74,
         ));
         ?>
      </ol>

      <?php
      // Are there comments to navigate through?
      if (get_comment_pages_count() > 1 && get_option('page_comments')) :
      ?>
         <nav class="navigation comment-navigation">
            <h1 class="screen-reader-text"><?php _e('Comment navigation'); ?></h1>
            <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;')); ?></div>
         </nav>
      <?php endif; ?>

      <?php if (!comments_open() && get_comments_number()) : ?>
         <p class="no-comments"><?php _e('Comments are closed.'); ?></p>
      <?php endif; ?>

   <?php endif; ?>

   <?php comment_form(); ?>
</div>
