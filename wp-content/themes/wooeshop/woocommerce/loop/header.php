<?php

/**
 * Product taxonomy archive header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

if (! defined('ABSPATH')) {
	exit;
}

?>

<?php
/**
 * Hook: woocommerce_show_page_title.
 *
 * Allow developers to remove the product taxonomy archive page title.
 *
 * @since 2.0.6.
 */
if (apply_filters('woocommerce_show_page_title', true)) :
?>
	<h1 class="section-title h3 woocommerce-products-header__title page-title"><span><?php woocommerce_page_title(); ?></span></h1>
<?php endif; ?>