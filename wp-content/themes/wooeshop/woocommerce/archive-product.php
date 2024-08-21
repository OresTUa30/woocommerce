<?php
defined('ABSPATH') || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');


?>
<div class="container">
	<div class="row">
		<?php if(!is_search()):?>
		<div class="col-lg-3 col-md-4">
			<?php
			/*
			* @hooked woocommerce_get_sidebar - 10
			*/
			do_action('woocommerce_sidebar'); ?>
		</div>
		<?php endif?>
		<div class="<?= (!is_search()) ? 'col-lg-9 col-md-8' : 'col-12'?>">
			<div class="row mb-3">
				<div class="col-12">
					<?php /**
					 * Hook: woocommerce_shop_loop_header.
					 *
					 * @since 8.6.0
					 *
					 * @hooked woocommerce_product_taxonomy_archive_header - 10
					 */
					do_action('woocommerce_shop_loop_header');
					?>
				</div>
				<?php if (wooeshop_category_image()): ?>
					<div class="col-4 col-sm-2">
						<a href="product.html"><?= wooeshop_category_image() ?></a>
					</div>
				<?php endif; ?>
				<div class="col-8 col-sm-10">
					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @since 1.6.2.
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action('woocommerce_archive_description'); ?>
				</div>

			</div>
			<?php if (is_product_category()): ?>
				<hr>
			<?php endif; ?>

			<?php

			if (woocommerce_product_loop()) {
			?>
				<div class="d-flex justifi-content-center">
					<?php
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */

					do_action('woocommerce_before_shop_loop');

					?>
				</div>
			<?php

				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			} ?>
		</div>
	</div>
</div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer();
