<?php

/**
 * The header for our theme
 *
 * @package WordPress
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body>
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
                                <a href="/">
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

                                            <?php
                                            $software_categories = get_terms([
                                                'taxonomy' => 'software-category',
                                                'hide_empty' => false
                                            ]);

                                            $soft_cat_taxonomy = get_taxonomy('software-category');

                                            if (!is_wp_error($software_categories) && !empty($software_categories)):
                                            ?>

                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <?= esc_html($soft_cat_taxonomy->label)  ?>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <?php
                                                        foreach ($software_categories as $category) : ?>
                                                            <li><a class="dropdown-item" href="<?= esc_url(get_term_link($category)) ?>"><?= esc_html($category->name) ?></a></li>
                                                        <?php endforeach;  ?>
                                                    </ul>
                                                </li>
                                            <?php endif; ?>
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
