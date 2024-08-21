<?php
require_once get_template_directory() . "/incs/cpt.php";
require_once get_template_directory() . "/incs/woocomerce-hooks.php";
require_once get_template_directory() . "/incs/class-wooeshop-header-menu.php";
require_once get_template_directory() . "/incs/customizer.php";

add_action('after_setup_theme', function () {
    //подключаем мультиязычность
    load_theme_textdomain('wooeshop', get_template_directory() . '/languages');
    //подключаем woocomerce
    add_theme_support('woocommerce');
    //включаем отображение тайтлов
    add_theme_support('title-tag');
    //3 метода отображения и просмотра картинок продукта (стандартный хук)
    // add_theme_support('wc-product-gallery-zoom');
    // add_theme_support('wc-product-gallery-lightbox');
    // add_theme_support('wc-product-gallery-slider');

    register_nav_menus(['header_menu' => __('Header menu', 'wooeshop')]);
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style("wooeshop-google-fonts", "https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");
    wp_enqueue_style("wooeshop-bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css");
    wp_enqueue_style("wooeshop-fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
    wp_enqueue_style("wooeshop-owlcarousel", get_template_directory_uri() . "/assets/owlcarousel/owl.carousel.min.css");
    wp_enqueue_style("wooeshop-owlcarousel-theme", get_template_directory_uri() . "/assets/owlcarousel/owl.theme.default.min.css");
    wp_enqueue_style("wooeshop-fancybox", "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css");
    wp_enqueue_style("wooeshop-main", get_template_directory_uri() . "/assets/css/main.css");

    wp_enqueue_script('jquery');
    wp_enqueue_script('wooeshop-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('wooeshop-owlcarousel-js', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script("wooeshop-fancybox", "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js", array(), false, true);
    wp_enqueue_script('wooeshop-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
});

// добавляем иджет для сайдбара

add_action('widgets_init', function () {
    register_sidebar([
        'name' => __('Sidebar', 'wooeshop'),
        'id'   => 'sidebar-product',
        'description'   => __('Displayed as a sidebar only on the home page of the site.', 'wooeshop'),
        'before_widget' => '<section id="%1$s" class="homepage-widget-block %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
});


function wooeshop_dump($data)
{
    echo "<pre>" . print_r($data, true) . "</pre>";
}

// убираем стандартный блок woocommerce и делаем свой
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// add_action('woocommerce_before_main_content', function(){
//     echo "<div class = 'content-area test-content'>";
// }, 10);

// add_action('woocommerce_after_main_content', function(){
//     echo "</div>";
// }, 10)
