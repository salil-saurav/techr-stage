<?php

if (!defined('ABSPATH')) exit;

/**
 * Template Name: Homepage
 */

get_header();

?>

<header id="main_header">
   <div class="custom_header">
      <div class="container">
         <div class="row">
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
               <div class="logo_search_wrap d-flex">
                  <div class="desk-top-trigger d-block d-lg-none">
                     <a class="hamburger menu" href="javascript:void(0);" data-dt-event-category="menuBlog" data-dt-event-label="Main Menu">
                        <div></div>
                        <div></div>
                        <div></div>
                     </a>
                  </div>
                  <div class="logo">
                     <a href="#">
                        <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/logo-new.png" alt="Tech HR" class="img-fluid" />
                     </a>
                  </div>
                  <div class="search_box">
                     <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search for Marketing Software" aria-label="Search for Marketing Software">
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 d-none d-lg-block">
               <div class="menu_btn_wrap d-flex justify-content-end">
                  <div class="menu_wrap">
                     <nav class="navbar navbar-expand-md">
                        <div class="collapse navbar-collapse">
                           <ul class="main_header_menu navbar-nav">
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Software categories
                                 </a>
                                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Sub Menu</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Menu</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Menu</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Menu</a></li>
                                 </ul>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Articles</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Write a review</a>
                              </li>
                           </ul>
                           <div class="vendor_login">
                              <a href="#" class="login_btn">Vendor login <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                           </div>
                        </div>
                     </nav>
                  </div>
                  <div class="profile_link">
                     <ul class="prlist">
                        <li>
                           <a href="#">
                              <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/profile.jpg" height="32" width="32" alt="Profile" class="img-fluid" />
                              <span class="pname">Pdimitriadis</span>
                              <i class="fa-solid fa-angle-down"></i>
                           </a>
                           <ul class="subpf_menu">
                              <li><a href="#">Profile</a></li>
                              <li><a href="#">Logout</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="thr_mobile_menu">
         <div class="mob_menu_inner">
            <div class="logo_close_wrap">
               <div class="logo">
                  <a href="#">
                     <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/logo-new.png" alt="Tech HR" class="img-fluid" />
                  </a>
               </div>
               <span class="mobclose_icon">
                  <span></span>
                  <span></span>
               </span>
            </div>
            <div class="search_box">
               <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search for Marketing Software" aria-label="Search for Marketing Software">
                  <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
               </form>
            </div>
            <div class="mobile_main_menu">
               <ul class="main_mobheader_menu">
                  <li class="has_children">
                     <a href="#">
                        Software categories
                        <span class="mt_icon"><i class="fa-solid fa-angle-down"></i></span>
                     </a>
                     <ul class="ctdropdown_menu">
                        <li><a class="dropdown_item" href="#">Marketing Automation</a></li>
                        <li><a class="dropdown_item" href="#">Email Marketing</a></li>
                        <li><a class="dropdown_item" href="#">Surveys</a></li>
                        <li><a class="dropdown_item" href="#">Social Media Marketing</a></li>
                        <li><a class="dropdown_item" href="#">Project Management</a></li>
                        <li><a class="dropdown_item" href="#">Ticketing Systems</a></li>
                        <li><a class="dropdown_item" href="#">Get listed <i class="fa-solid fa-arrow-right-long"></i></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="#">Articles</a>
                  </li>
                  <li>
                     <a href="#">Write a review</a>
                  </li>
               </ul>
               <div class="vendor_login">
                  <a href="#" class="login_btn">Vendor login <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
               </div>
            </div>
         </div>
      </div>

   </div>
</header>

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

<footer id="main_footer">
   <div class="footer_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 foo_col">
               <div class="foo_widget">
                  <div class="foo_logo">
                     <a href="#">
                        <img src="<?= get_stylesheet_directory_uri() . "/assets/"  ?>images/logo-new.png" alt="Tech HR" class="img-fluid" />
                     </a>
                  </div>
                  <div class="social_icons">
                     <ul class="social_list">
                        <li><a href="" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="" target="_blank" rel="nofollow"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="" target="_blank" rel="nofollow"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="" target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 foo_col">
               <div class="foo_widget foo_menu_wrap">
                  <div class="foo_title">
                     <h4>Dottely</h4>
                     <span class="fm_toggle"><i class="fa-solid fa-angle-down"></i></span>
                  </div>
                  <div class="menu_wrap">
                     <ul>
                        <li><a href="#">The Dottely way</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Μaintenance</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 foo_col">
               <div class="foo_widget foo_menu_wrap">
                  <div class="foo_title">
                     <h4>For Buyers</h4>
                     <span class="fm_toggle"><i class="fa-solid fa-angle-down"></i></span>
                  </div>
                  <div class="menu_wrap">
                     <ul>
                        <li><a href="#">Software categories</a></li>
                        <li><a href="#">Write a review</a></li>
                        <li><a href="#">Marketing resources</a></li>
                        <li><a href="#">Stacks</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 foo_col">
               <div class="foo_widget foo_menu_wrap">
                  <div class="foo_title">
                     <h4>For Vendors</h4>
                     <span class="fm_toggle"><i class="fa-solid fa-angle-down"></i></span>
                  </div>
                  <div class="menu_wrap">
                     <ul>
                        <li><a href="#">Why feature on Dottely</a></li>
                        <li><a href="#">Vendor listing options</a></li>
                        <li><a href="#">Claim your listing</a></li>
                        <li><a href="#">Vendor knowledge center</a></li>
                     </ul>
                  </div>
                  <div class="foo_cta">
                     <a href="#" class="cmn_btn foo_venlogin">Vendor login <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer_bottom">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="other_menu">
                  <ul>
                     <li><a href="#">Terms of use</a></li>
                     <li><a href="#">Privacy Policy</a></li>
                     <li><a href="#">Cookies</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="copyright">
                  <p>Dottely 2022</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>

<?php get_footer();
