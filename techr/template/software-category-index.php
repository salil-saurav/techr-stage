<?php

/**
 *  Template Name: Software Category Index
 */

$search_term = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : '';

get_header(); ?>

<div class="body_container">
   <div class="inner_banner_sec">
      <span class="circle circle_1"></span>
      <span class="circle circle_2"></span>
      <div class="thr_breadcrumb">
         <div class="container">
            <ul>
               <li><a href="#">Home </a></li>
               <li class="current_item">Software categories</li>
            </ul>
         </div>
      </div>

      <div class="inner_banner_cnt">
         <div class="container">
            <h1>Techr Software Categories</h1>
            <p>The ultimate collection of marketing technologies,<br> Curated, dotted and linked for you</p>
         </div>
      </div>
   </div>
</div>

<div class="inpg_cat_wrap">
   <div class="cat_filter_wrap">

      <div class="filter_form">
         <form class="filter_cat" method="get">
            <span class="sicon"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input class="form-control" type="search" placeholder="Filter categories" aria-label="Filter categories" name="q" id="filter-category">
            <button class="sub_btn" type="submit"><span class="txt">Go</span> <span>&#10230;</span></button>
         </form>
      </div>

   </div>
   <div class="swcategory_list">
      <div class="container">
         <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6 col-6 pg_catcol">
               <div class="soft_cat_item recommend">
                  <div class="item_inner">
                     <h4>Want to recommend a Marketing Category?</h4>
                     <a href="#" class="cmn_btn" data-bs-toggle="modal" data-bs-target="#rcommendModal">Recommend</a>
                  </div>
               </div>
            </div>

            <?php


            $query = new WP_Term_Query([
               'taxonomy'   => 'software-category',
               'hide_empty' => false,
               'search'     => $search_term,
            ]);

            $software_categories = $query->terms;

            if (!is_wp_error($software_categories) && !empty($software_categories)):
               foreach ($software_categories as $category):
            ?>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-6 pg_catcol">
                     <div class="soft_cat_item">
                        <div class="item_inner">
                           <h4><?= esc_html($category->name) ?></h4>
                           <p>25 tools</p>
                           <a href="<?= get_term_link($category) ?>" class="btn_icon"><span>&#10230;</span></a>
                        </div>
                     </div>
                  </div>
            <?php
               endforeach;
            endif; ?>
         </div>
      </div>
   </div>
</div>

<div class="email_subscription_sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="sub_cnt">
               <h4>Stay ahead of the game</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat
                  purus eleifend vitae.</p>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="subs_form">
               <div class="search_box">
                  <form class="subscription_form">
                     <div class="mainsub_form d-flex">
                        <input class="form-control" type="email" placeholder="Your email" aria-label="Your email">
                        <button class="btn subs_btn" type="submit"><span class="txt">Subscribe</span> <i
                              class="fa-solid fa-arrow-right-long"></i></button>
                     </div>
                     <div class="ctcheckbox">
                        <label for="chk">
                           <input type="checkbox" id="chk"
                              name="Send me articles, content and offers from eLearning Industry and its affiliates. View all items."
                              value="Bike">
                           <span class="ltext">Send me articles, content and offers from eLearning Industry and its
                              affiliates. View all items.</span></label>
                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   function handleCategoryFilter(input) {
      const value = input.value.toLowerCase().trim();

   }
</script>

<?php get_footer();
