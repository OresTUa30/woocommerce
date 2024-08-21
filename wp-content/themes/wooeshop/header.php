<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <div class="wrapper">

        <header class="header">
            <div class="header-top py-1">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div class="header-top-phone d-flex align-items-center h-100">
                                <?php if ($phone = get_theme_mod('wooeshop_phone')): ?>
                                    <i class="fa-solid fa-mobile-screen"></i>
                                    <a href="tel:+<?= str_replace([' ', '-', '+'], '', $phone) ?>" class="ms-2"><?= $phone ?></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 d-none d-sm-block">
                            <ul class="social-icons d-flex justify-content-center">
                                <?php if ($youtube = get_theme_mod('wooeshop_youtube')): ?>
                                    <li>
                                        <a href="<?= $youtube ?>">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($facebook = get_theme_mod('wooeshop_facebook')): ?>
                                    <li>
                                        <a href="<?= $facebook ?>">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($instagram = get_theme_mod('wooeshop_instagram')): ?>
                                    <li>
                                        <a href="<?= $instagram ?>">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-4">
                            <div class="header-top-account d-flex justify-content-end">
                                <div class="btn-group me-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Account
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">Sign In</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Sign Up</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            EN
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">RU</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">DE</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ./header-top-account -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./header-top -->

            <div class="header-middle bg-white py-4">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-sm-6">
                            <a href="<?= home_url('/') ?>" class="header-logo h1"><?php bloginfo('name') ?></a>
                        </div>

                        <div class="col-sm-6 mt-2 mt-md-0">
                            <?php aws_get_search_form(true); ?>
                            <!-- <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Searching..."
                                        aria-label="Searching..." aria-describedby="button-search">
                                    <button class="btn btn-outline-warning" type="submit" id="button-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form> -->
                        </div>

                    </div>
                </div>

            </div>
            <!-- ./header-middle -->
        </header>

        <div class="header-bottom sticky-top" id="header-nav">
            <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" id="offcanvasNavbar" tabindex="-1"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Catalog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <?php wp_nav_menu([
                                'theme_location' => 'header_menu',
                                'container'       => false,
                                'menu_class'      => 'navbar-nav',
                                'menu_id'         => false,
                                'echo'            => true,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'walker'          => new Wooeshop_Header_Menu(),
                            ]) ?>
                        </div>
                    </div>

                    <div>
                        <!-- <a href="#" class="btn p-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">3</span>
                        </a> -->
                        <?php if (!is_cart()) : ?>
                            <button class="btn p-1" id="cart-open" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="badge text-bg-warning cart-badge bg-warning rounded-circle"><?= count(WC()->cart->get_cart()); ?></span>
                            </button>
                        <?php endif ?>
                    </div>

                </div>
            </nav>
        </div>
        <!-- ./header-bottom -->


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php woocommerce_mini_cart() ?>
            </div>
        </div>

        <?php wp_body_open() ?>