<?php

/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

if (! wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
	return;
}

?>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
	<a class="btn btn-link px-0 btn-coupon" data-bs-toggle="collapse" data-bs-target="#collapseCoupon">
	<?php _e('Have a Coupon?', 'wooeshop')?>
	</a>
	<div class="coupon input-group collapse mb-2 col-6 form-row form-row-first" id="collapseCoupon">
		<input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
		<button type="submit" class="button btn btn-warning btn-sm<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply', 'woocommerce'); ?></button>
	</div>

	<div class="clear"></div>
</form>