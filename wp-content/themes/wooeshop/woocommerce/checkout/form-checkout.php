<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (! defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_main_content');

?>
<div class="container">

	<?php
	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if (! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in()): ?>
		<?php echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'))); ?>

	<?php else: ?>


		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
			<div class="ajax-loader" id="ajaxLoader">
				<img src="assets/img/ripple.svg" alt="">
			</div>
			<div class="row">
				<?php if ($checkout->get_checkout_fields()) : ?>
					<div class="col-lg-8 mb-3">
						<div class="checkout p-3 h-100 bg-white">


							<?php do_action('woocommerce_checkout_before_customer_details'); ?>

							<div class="col2-set" id="customer_details">

								<?php do_action('woocommerce_checkout_billing'); ?>


								<?php do_action('woocommerce_checkout_shipping'); ?>

							</div>

							<?php do_action('woocommerce_checkout_after_customer_details'); ?>


						</div>
					</div>
				<?php endif; ?>
				<div class="col-lg-4 mb-3">
					<div class="cart-summary p-3 sidebar h-100">
						<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

						<h5 class="section-title" id="order_review_heading"><span><?php esc_html_e('Your order', 'woocommerce'); ?></span></h5>

						<?php do_action('woocommerce_before_checkout_form', $checkout); ?>

						<?php do_action('woocommerce_checkout_before_order_review'); ?>

						<div id="order_review" class="woocommerce-checkout-review-order table-responsive">
							<?php do_action('woocommerce_checkout_order_review'); ?>
						</div>

						<?php do_action('woocommerce_checkout_after_order_review'); ?>
					</div>
				</div>
			</div>


		</form>

		<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

	<?php endif ?>
</div>
</div>
<?php do_action('woocommerce_after_main_content'); ?>