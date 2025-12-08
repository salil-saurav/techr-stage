<?php get_header();

/**
 * Software category page
 */

$term             = get_queried_object();
$term_title       = $term->name;
$post_count       = $term->count;
$term_desctiption = $term->description;

const TAX_CONFIG = [
   'post_type'     => 'directory',
   'default_terms' => 10,
   'default_posts' => 10,
];

$directory_args = [
   'post_type' => TAX_CONFIG['post_type'],
   'posts_per_page' => -1,
   'orderby' => 'date',
   'order' => 'DESC'
];

$directories = new WP_Query($directory_args);

function render_taxonomy_and_terms($post_type)
{
   $taxonomies = array_values(
      array_diff(get_object_taxonomies($post_type), ['software-category'])
   );

   foreach ($taxonomies as $taxonomy) {

      $taxonomy_title = get_taxonomy($taxonomy);

?>
      <div class="cat_items_wrap">
         <div class="cat_title">
            <h5> <?= esc_html($taxonomy_title->label) ?> </h5>
         </div>
         <div class="sidecat_listing">
            <?php

            $terms = get_terms([
               'taxonomy'   => $taxonomy,
               'hide_empty' => false
            ]);

            if (!is_wp_error($terms) && !empty($terms)):
               foreach ($terms as $term):
            ?>
                  <span class="chip" data-filter-type="<?= esc_attr($term->name) ?>" data-filter-val="<?= esc_attr($term->slug) ?>"><i class="fa-solid fa-xmark"></i> <?= esc_html($term->name); ?> </span>
            <?php
               endforeach;
            endif; ?>
         </div>
         <div class="more_less_link"></div>
      </div>
<?php
   }
}

?>

<div class="body_container">

   <div class="inner_banner_sec inner_banner_sec_other">
      <span class="circle circle_1"></span>
      <span class="circle circle_2"></span>
      <div class="thr_breadcrumb">
         <?= do_shortcode('[breadcrumb]'); ?>
      </div>

      <div class="inner_banner_cnt">
         <div class="container">
            <h1><?= esc_html($term_title) ?></h1>
            <p><?= esc_html($term_desctiption) ?></p>
         </div>
      </div>
   </div>

   <div class="inpg_marketing_auto_wrap">

      <div class="tabber_lis_wrapt">
         <div class="container">
            <ul class="tabber_list" id="topTabs">
               <li><a class="tab-link active" data-tab="all">All <span class="mhide">Software</span> <span class="text-muted"> (<?= $post_count ?>) </span></a></li>
               <li><a class="tab-link" data-tab="shortlist">Shortlist</a></li>
               <li><a class="tab-link" data-tab="buyers">Buyer's Guide</a></li>
            </ul>
         </div>
      </div>

      <div class="malistig_wrap">
         <div class="container">
            <div class="row">
               <div class="col-md-3 col-sm-12 ma_col ma_col_left mhide">
                  <div class="thr_catfilters">

                     <div class="d-flex align-items-center filter_main_title">
                        <div class="filter-title">Filters</div>
                        <a href="#" id="clearAll" class="filter_clear">Clear</a>
                     </div>

                     <div class="selcat_items">
                        <div class="active-filters" id="activeFilters">
                        </div>
                     </div>

                     <?php render_taxonomy_and_terms(TAX_CONFIG['post_type']); ?>
                  </div>
               </div>

               <div class="col-md-9 col-sm-12 ma_col ma_col_right">

                  <div class="top_catmeta_wrap d-flex justify-content-between align-items-center">
                     <div class="post_count">
                        <span><?= $post_count ?> listings</span>
                     </div>
                     <div class="post_view">
                        <ul>
                           <li id="btnList" class="gview" title="Grid"><i class="fa-solid fa-list"></i><span class="">List</span></li>
                           <li id="btnGrid" class="gview active" title="Grid"><i class="fa-solid fa-table-cells-large"></i><span class="">Grid</span></li>
                        </ul>
                     </div>
                     <div class="order_box d-flex">
                        <span>Sort by:</span>
                        <select name="orderby" class="orderby" aria-label="Shop order">
                           <option value="menu_order">Default sorting</option>
                           <option value="Featured" selected="selected">Featured</option>
                           <option value="rating">Sort by average rating</option>
                           <option value="date">Sort by latest</option>
                        </select>
                     </div>
                  </div>

                  <?php

                  if ($directories->have_posts()):

                  ?>

                     <div id="listingArea" class="grid">
                        <div class="row" id="itemsRow">

                           <?php while ($directories->have_posts()) :
                              $directories->the_post();
                           ?>
                              <!-- Item Starts Here -->
                              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-card">
                                 <div class="sw_post_item" data-tags='{"licence":"trial","feature":["automation"],"industry":["engagement"]}'>
                                    <div class="item_inner">
                                       <div class="tag_com_wrap d-flex justify-content-between align-items-center">
                                          <div class="taglist">
                                             <a href="#" class="tagitem">FREE TRIAL</a>
                                          </div>
                                          <div class="compare_box">
                                             <span class="comcheckbox">
                                                <input type="checkbox" name="directory_<?= get_the_ID() ?>" value="<?= get_the_ID() ?>" data-slug="<?= get_post_field('post_name', get_the_ID()) ?>">
                                                <span class="ctchk"><i class="ct_bchk fa-solid fa-check"></i></span>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="item_logo">
                                          <img src="<?= get_field('directory_logo')['url'] ?>" alt="hubspot" class="img-fluid" />
                                       </div>
                                       <div class="ptitle_ratrev_wrap">
                                          <div class="post_title">
                                             <h6><?= get_the_title() ?></h6>
                                          </div>
                                          <div class="rating_rev_box d-flex justify-content-between align-items-center">
                                             <div class="rating_box">
                                                <span class="rating"><?= get_field('directory_rating') ?> / 5</span>
                                                <span class="star">
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                </span>
                                             </div>
                                             <div class="reviews_box">
                                                <ul>
                                                   <li class="rev_droplist">
                                                      <a href="#"><?= get_field('directory_review_count') ?> <span class="revtxt">reviews <i class="fa-solid fa-angle-down"></i></span></a>
                                                      <ul class="rev_dropdown">
                                                         <li>
                                                            <span class="it_one">5 <i class="fa-solid fa-star"></i></span>
                                                            <span class="it_two">
                                                               <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                  <span class="progress-bar" style="width: 80%"></span>
                                                               </span>
                                                            </span>
                                                            <span class="it_three"><a href="#">30</a></span>
                                                         </li>
                                                         <li>
                                                            <span class="it_one">4 <i class="fa-solid fa-star"></i></span>
                                                            <span class="it_two">
                                                               <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                  <span class="progress-bar" style="width: 50%"></span>
                                                               </span>
                                                            </span>
                                                            <span class="it_three"><a href="#">30</a></span>
                                                         </li>
                                                         <li>
                                                            <span class="it_one">3 <i class="fa-solid fa-star"></i></span>
                                                            <span class="it_two">
                                                               <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                  <span class="progress-bar" style="width: 30%"></span>
                                                               </span>
                                                            </span>
                                                            <span class="it_three"><a href="#">30</a></span>
                                                         </li>
                                                         <li>
                                                            <span class="it_one">2 <i class="fa-solid fa-star"></i></span>
                                                            <span class="it_two">
                                                               <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                  <span class="progress-bar" style="width: 20%"></span>
                                                               </span>
                                                            </span>
                                                            <span class="it_three"><a href="#">30</a></span>
                                                         </li>
                                                         <li>
                                                            <span class="it_one">1 <i class="fa-solid fa-star"></i></span>
                                                            <span class="it_two">
                                                               <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                  <span class="progress-bar" style="width: 10%"></span>
                                                               </span>
                                                            </span>
                                                            <span class="it_three"><a href="#">30</a></span>
                                                         </li>
                                                         <li>
                                                            <a href="#" class="cmn_btn">Write a review</a>
                                                         </li>
                                                      </ul>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="post_cnt">
                                          <p><?= get_the_excerpt()  ?></p>
                                          <a href="<?= get_the_permalink() ?>" class="more_link">Read more</a>
                                       </div>

                                       <div class="other_cat d-flex justify-content-between align-items-center">
                                          <div class="sys_icon">
                                             <span class="sicon"><i class="fa-solid fa-display"></i></span>
                                             <span class="sicon"><i class="fa-solid fa-mobile-screen"></i></span>
                                          </div>
                                          <div class="sys_size">
                                             <span class="ssize active">F</span>
                                             <span class="ssize">S/M</span>
                                             <span class="ssize">L</span>
                                          </div>
                                       </div>
                                       <div class="view_webbtn_wrap">
                                          <a href="#" class="cmn_btn">Visit website <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Item Ends Here -->
                           <?php endwhile; ?>
                        </div>
                     </div>
                  <?php endif; ?>

                  <div class="load_more_items">

                     <div class="item_probar">
                        <p>You’ve viewed 8 out of 574 listing</p>
                        <span class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                           <span class="progress-bar" style="width: 10%"></span>
                        </span>
                     </div>

                     <div class="more_items_btn text-center">
                        <a href="#" class="cmn_btn cmn_btn_black">Load more listings</a>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="container">
   <div class="btn_container"><a href="/compare" id="compare_btn" class="cmn_btn cmn_btn_black">Compare</a></div>
</div>

<?php get_footer();
