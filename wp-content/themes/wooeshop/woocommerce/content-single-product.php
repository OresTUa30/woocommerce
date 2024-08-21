<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$images_ids = $product->get_gallery_image_ids();
if ($product->get_image_id())  array_unshift($images_ids, $product->get_image_id());

?>
<div class="col-12">
	<?php
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action('woocommerce_before_single_product');
	?>
</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('product-content-wrapper', $product); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-lg-4 mb-3">
				<div class="bg-white h-100">
					<?php if (!empty($images_ids)): ?>
						<div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade">
							<div class="carousel-inner">
								<?php foreach ($images_ids as $key => $id): ?>
									<div class="carousel-item <?php if ($key == 0) echo 'active' ?>">
										<img  data-fancybox="product-gallery" src="<?= wp_get_attachment_url($id) ?>" class="d-block w-100 cursor-pointer" alt="...">
									</div>
								<?php endforeach; ?>
							</div>
							<?php if (count($images_ids) > 1): ?>
								<button class="carousel-control-prev" type="button"
									data-bs-target="#carouselExampleFade" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button"
									data-bs-target="#carouselExampleFade" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							<?php endif; ?>
						</div>
					<?php else: ?>
						<img src="<?= wc_placeholder_img_src() ?>" class="d-block w-100 " alt="...">
					<?php endif; ?>
				</div>
			</div>
			<div class="summary entry-summary col-md-7 col-lg-8 mb-3">
				<div class="bg-white product-content p-3 h-100">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action('woocommerce_single_product_summary');
					?>
					<div class="row mt-3">
						<div class="col-lg-4 mb-2">
							<div class="card h-100">
								<div class="card-body">
									<h5 class="card-title"><i class="fa-solid fa-shield-halved"></i> Гарантия
									</h5>
									<ul class="list-unstyled">
										<li>Гарантия 1 год</li>
										<li>Возвращение товара в течение 14 дней</li>
										<li>Гарантия качества</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 mb-2">
							<div class="card h-100">
								<div class="card-body">
									<h5 class="card-title"><i class="fa-solid fa-truck-fast"></i> Доставка</h5>
									<ul class="list-unstyled">
										<li>Доставка по всей стране</li>
										<li>Доставка почтой</li>
										<li>Самовывоз</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 mb-2">
							<div class="card h-100">
								<div class="card-body">
									<h5 class="card-title"><i class="fa-regular fa-credit-card"></i> Оплата</h5>
									<ul class="list-unstyled">
										<li>Наличный рассчет</li>
										<li>Безналичный рассчет</li>
										<li>VISA/MasterCard</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action('woocommerce_after_single_product_summary');
			?>
		</div>

		<?php do_action('woocommerce_after_single_product'); ?>
	</div>
</div>