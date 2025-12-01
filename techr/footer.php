<?php

/**
 * The template for displaying the footer
 *
 * @package WordPress
 */
?>

<?php wp_footer() ?>

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
                  <p>Techr <?= date('Y') ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
</body>

</html>
