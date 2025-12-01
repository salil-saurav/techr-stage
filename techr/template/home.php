<?php

if (!defined('ABSPATH')) exit;

/**
 * Template Name: Homepage
 */

get_header();
?>

<div class="body_container">

   <div class="slider_banner_wrap">
      <div class="banner_sec">
         <span class="circle circle_1"></span>
         <span class="circle circle_2"></span>
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-5 col-md-5 col-sm-12">
                  <div class="banner_cnt">
                     <h1>Find the best marketing tools, the Dottely way</h1>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="banner_img">
                     <div class="inn_img">
                        <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/banner-image.jpg" alt="Tech HR Banner" class="img-fluid" />

                        <div class="bann_circle_txt">
                           <svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">

                              <!-- CIRCLE PATH -->
                              <defs>
                                 <path id="circlePath"
                                    d="
											  M150,150
											  m0,-120
											  a120,120 0 1,1 0,240
											  a120,120 0 1,1 0,-240
											" />
                              </defs>

                              <!-- CENTER DOT -->
                              <circle cx="150" cy="150" r="40" class="center-dot" />

                              <!-- ROTATING TEXT -->
                              <g class="rotator">
                                 <text class="circle-text">
                                    <textPath href="#circlePath" startOffset="0%">
                                       Go dottely. Go doit. Go dottely. Go doit.
                                    </textPath>
                                 </text>
                              </g>

                           </svg>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="software_category_slider">

         <div class="container">

            <div class="top_title">
               <h2>Trending marketing software categories</h2>
            </div>

            <div class="software_slider">
               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Marketing Automation</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Email Marketing</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Social Media Management</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Surveys</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Marketing Automation</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Email Marketing</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Social Media Management</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

               <div class="soft_cat_item">
                  <div class="item_inner">
                     <h4>Surveys</h4>
                     <p>25 tools</p>
                     <a href="#" class="btn_icon"><span>&#10230;</span></a>
                  </div>
               </div>

            </div>

            <div class="btn_wrapper">
               <a href="#" class="cmn_btn cmn_btn_blue">View All Categories</a>
            </div>


         </div>
      </div>

   </div>


   <div class="thr_ftools_sec">
      <div class="top_title">
         <div class="container">
            <h3>Featured tools</h3>
         </div>
      </div>
      <div class="tools_slider">

         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>
         <div class="tslider_item">
            <div class="tslider_inner">
               <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/hubspot.png" alt="Hubspot" class="img-fluid" />
            </div>
         </div>

      </div>
   </div>

   <div class="thr_about_sec">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="thr_abimg">
                  <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/logo-new.png" alt="Tech HR" class="img-fluid" />
               </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="thr_abcnt">
                  <h2>Dottely is the ultimate gallery of all marketing software tools, curated, dotted and linked for you.</h2>
                  <div class="btn_wrapper">
                     <a href="#" class="cmn_btn">Find out more</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="thr_txt_slider_section">
      <div class="txt_slider">
         <div class="ts_item">
            <div class="cnt">
               Dot It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Compare It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Buy It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Dot It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Compare It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Buy It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Dot It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Compare It <span>&#10230;</span>
            </div>
         </div>
         <div class="ts_item">
            <div class="cnt">
               Buy It <span>&#10230;</span>
            </div>
         </div>
      </div>
   </div>

   <div class="thr_review_sec">
      <div class="container">
         <div class="thr_review_slider">

            <div class="rev_slider_item">
               <div class="rev_inner_item d-flex align-items-center">
                  <div class="client_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/client.jpg" alt="Client" class="img-fluid" />
                  </div>
                  <div class="client_cnt">
                     <div class="quote"><i>"</i></div>
                     <div class="cnt_inner">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                        <h5>— Carl Jones, Marketing Manager</h5>
                     </div>
                  </div>
               </div>
            </div>

            <div class="rev_slider_item">
               <div class="rev_inner_item d-flex align-items-center">
                  <div class="client_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/client.jpg" alt="Client" class="img-fluid" />
                  </div>
                  <div class="client_cnt">
                     <div class="quote"><i>"</i></div>
                     <div class="cnt_inner">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                        <h5>— Carl Jones, Marketing Manager</h5>
                     </div>
                  </div>
               </div>
            </div>

            <div class="rev_slider_item">
               <div class="rev_inner_item d-flex align-items-center">
                  <div class="client_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/client.jpg" alt="Client" class="img-fluid" />
                  </div>
                  <div class="client_cnt">
                     <div class="quote"><i>"</i></div>
                     <div class="cnt_inner">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                        <h5>— Carl Jones, Marketing Manager</h5>
                     </div>
                  </div>
               </div>
            </div>

            <div class="rev_slider_item">
               <div class="rev_inner_item d-flex align-items-center">
                  <div class="client_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/client.jpg" alt="Client" class="img-fluid" />
                  </div>
                  <div class="client_cnt">
                     <div class="quote"><i>"</i></div>
                     <div class="cnt_inner">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                        <h5>— Carl Jones, Marketing Manager</h5>
                     </div>
                  </div>
               </div>
            </div>

            <div class="rev_slider_item">
               <div class="rev_inner_item d-flex align-items-center">
                  <div class="client_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/client.jpg" alt="Client" class="img-fluid" />
                  </div>
                  <div class="client_cnt">
                     <div class="quote"><i>"</i></div>
                     <div class="cnt_inner">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                        <h5>— Carl Jones, Marketing Manager</h5>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <div class="thr_software_sec">
      <div class="software_item">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-7 col-md-7 col-sm-12 sw_col sw_col_cnt">
                  <div class="sw_cnt">
                     <h4>Using software?</h4>
                     <h2>Write a review.</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                     <div class="btn_wrapper">
                        <a href="#" class="cmn_btn">Write a review</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5 col-md-5 col-sm-12 sw_col sw_col_img">
                  <div class="sw_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/software.jpg" alt="Software Image" class="img-fluid" />
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="software_item">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-5 col-md-5 col-sm-12 sw_col sw_col_img">
                  <div class="sw_img">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/software.jpg" alt="Software Image" class="img-fluid" />
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12 sw_col sw_col_cnt">
                  <div class="sw_cnt">
                     <h4>Selling software?</h4>
                     <h2>Reach more buyers.</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae. Suspendisse aliquet turpis vel mauris faucibus, at eleifend eros suscipit.</p>
                     <div class="btn_wrapper">
                        <a href="#" class="cmn_btn">Vendor options</a>
                     </div>
                  </div>
               </div>

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
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar sem tellus, in consequat purus eleifend vitae.</p>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="subs_form">
                  <div class="search_box">
                     <form class="subscription_form">
                        <div class="mainsub_form d-flex">
                           <input class="form-control" type="email" placeholder="Your email" aria-label="Your email">
                           <button class="btn subs_btn" type="submit"><span class="txt">Subscribe</span> <i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                        <div class="ctcheckbox">
                           <label for="chk">
                              <input type="checkbox" id="chk" name="Send me articles, content and offers from eLearning Industry and its affiliates. View all items." value="Bike">
                              <span class="ltext">Send me articles, content and offers from eLearning Industry and its affiliates. View all items.</span></label>
                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer();
