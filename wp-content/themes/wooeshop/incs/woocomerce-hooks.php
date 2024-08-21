<?php
add_filter('woocommerce_enqueue_styles', '__return_false');

/*карточка товара*/

//отключение хуков с общей ссылкой на карточке товара

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//открепляем от хука функцию и пишим к нему свою
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_shop_loop_item_title', function () {
    global $product;

    echo '<h4><a href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h4>';
});



//открепляем хук и меняем отображение рейтинга через фильтр
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_filter('woocommerce_product_get_rating_html', 'custom_rating', 10, 3);

function custom_rating($html, $rating, $count)
{
    $label = sprintf(__('Rated %s out of 5', 'woocommerce'), $rating);
    $html  = '<div class="star-rating" role="img" aria-label="' . esc_attr($label) . '">' . wc_get_star_rating_html($rating, $count) . '</div>';

    return $html;
}

//открепляем хук и меняем тайтл категорий в выводе блока на главной странице

remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action('woocommerce_shop_loop_subcategory_title', function ($category) {

    $cnt = apply_filters('woocommerce_subcategory_count_html', '(' . esc_html($category->count) . ')', $category);
    echo '<h5 class="woocommerce-loop-category__title mt-3">' . esc_html($category->name) . ' ' . $cnt . '</h5>';
}, 10);

// добавляем шорткод для изминения шаблона продукта

add_shortcode('wooeshop_products_card', 'wooeshop_products_card');
function wooeshop_products_card($atts)
{

    extract(shortcode_atts(array(
        'limit'      => '8',
        'order'         => 'desc'
    ), $atts));

    // Get products on sale

    $args = array(
        'post_status'   => 'publish',
        'post_type'     => 'product',
        'posts_per_page' => $limit,
        'orderby'       => $orderby,
        'order'         => $order,
    );

    ob_start();

    $products = new WP_Query($args);

    if ($products->have_posts()) : ?>

       

            <?php while ($products->have_posts()) : $products->the_post(); ?>

                <?php wc_get_template_part('content', 'product-card'); ?>

            <?php endwhile; // end of the loop. 
            ?>



    <?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}

// обновление количества товара в корзине
// https://woocommerce.com/document/show-cart-contents-total/

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $fragments['span.cart-badge'] = '<span class="badge text-bg-warning cart-badge bg-warning rounded-circle">' .  count(WC()->cart->get_cart()) . '</span>';
    return $fragments;
});

//кастомизация breadcrumb
// https://woo.com/document/customise-the-woocommerce-breadcrumb/

add_filter('woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs');
function jk_woocommerce_breadcrumbs()
{
    return array(
        'delimiter'   => '',
        'wrap_before' => '<div class="col-12">
                            <nav class="breadcrumbs">
                                <div class = "container">
                                    <ul>',
        'wrap_after'  => '</ul></div></nav></div>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => __('Home', 'wooeshop'),
    );
}

// вывод картинки категории
// https://woo.com/document/woocommerce-display-category-image-on-category-archive/


function wooeshop_category_image()
{
    $img = '';
    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        if ($image) {
            $img = '<img class="img-thumbnail" src="' . $image . '" alt="' . $cat->name . '" />';
        }
    }

    return $img;
}
 
// удаление и редактирование формы checkout 
// https://developer.woocommerce.com/docs/customizing-checkout-fields-using-actions-and-filters/

add_filter( 'woocommerce_default_address_fields' , function ( $fields ) {
	unset( $fields['company'], $fields['address_2'], $fields['postcode'] );
	return $fields;
} );
