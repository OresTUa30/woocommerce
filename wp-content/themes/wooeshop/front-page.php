    <?php get_header() ?>

    <main class="main">
    	<?php
		global $post;

		$slider = new WP_Query(['posts_per_page' => 5, 'post_type' => 'slider', 'order' => 'ASC']);
		?>

    	<?php if ($slider->have_posts()): ?>
    		<div id="carousel" class="carousel slide carousel-fade">
    			<div class="carousel-indicators">
    				<?php for ($num = 0; $num < count($slider->posts); $num++) : ?>
    					<button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $num ?>" class="<?php if ($num == 0) echo 'active' ?>"
    						aria-current="true" aria-label="Slide <?= $num + 1 ?>"></button>
    				<?php endfor; ?>
    			</div>

    			<?php $i = 0;
				while ($slider->have_posts()) : $slider->the_post(); ?>
    				<div class="carousel-inner">
    					<div class="carousel-item <?php if ($i == 0) echo 'active' ?>">
    						<img src="<?= get_the_post_thumbnail_url() ?>" class="d-block w-100" alt="...">
    						<div class="carousel-caption d-none d-md-block">
    							<h2><?php the_title() ?></h2>
    							<?php the_content('') ?>
    						</div>
    					</div>
    				</div>
    			<?php $i++;
				endwhile ?>
    			<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    				<span class="visually-hidden">Previous</span>
    			</button>
    			<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    				<span class="carousel-control-next-icon" aria-hidden="true"></span>
    				<span class="visually-hidden">Next</span>
    			</button>
    		</div>
    	<?php endif ?>

    	<section class="advantages">
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col-12">
    					<h2 class="section-title">
    						<span>Наши преимущества</span>
    					</h2>
    				</div>
    			</div>

    			<div class="row gy-3 items">
    				<div class="col-lg-3 col-sm-6">
    					<div class="item">
    						<p>
    							<i class="fas fa-shipping-fast"></i>
    						</p>
    						<p>Прямые поставки от производителей брендов</p>
    					</div>
    				</div>

    				<div class="col-lg-3 col-sm-6">
    					<div class="item">
    						<p>
    							<i class="fas fa-cubes"></i>
    						</p>
    						<p>Широкий ассортимент товаров. Более 10 тыс. наименований</p>
    					</div>
    				</div>

    				<div class="col-lg-3 col-sm-6">
    					<div class="item">
    						<p>
    							<i class="fas fa-hand-holding-usd"></i>
    						</p>
    						<p>Приятные и конкурентные цены</p>
    					</div>
    				</div>

    				<div class="col-lg-3 col-sm-6">
    					<div class="item">
    						<p>
    							<i class="fa-solid fa-user-graduate"></i>
    						</p>
    						<p>Консультации от профессионалов</p>
    					</div>
    				</div>
    			</div>

    		</div>
    	</section>

    	<!-- https://woo.com/document/woocommerce-shortcodes/#product-category -->
    	<!-- Вивод блока Категорий на фронте -->
    	<section class="home-categories">
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col-12">
    					<h2 class="section-title">
    						<span><?php _e('Categories', 'wooeshop') ?></span>
    					</h2>
    				</div>
    			</div>

				<?= do_shortcode('[product_categories number="0" parent="0", hide_empty="0"]') ?>

    		</div>
    	</section>

    	<section class="featured-products">
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col-12">
    					<h2 class="section-title">
    						<span><?php _e('Feature products', 'wooeshop') ?></span>
    					</h2>
    				</div>
    			</div>


    			<?= do_shortcode('[products limit="8" visibility="featured"]') ?>

    		</div>
    	</section>

    	<!-- Вывод товаров через query запрос -->

    	<!-- <section class="new-products">
    		<?php
			global $post;

			$query = new WC_Product_Query(['limit' => 10]);
			$products = $query->get_products();
			?>
    		<?php if (!empty($products)): ?>
    			<div class="container-fluid">
    				<div class="row mb-5">
    					<div class="col-12">
    						<h2 class="section-title">
    							<span>Новинки</span>
    						</h2>
    					</div>
    				</div>

    				<div class="owl-carousel owl-theme owl-carousel-full">
    					<?php foreach ($products as $product) : ?>
    						<div class="product-card">
    							<div class="product-card-offer">
    								<div class="offer-hit">Hit</div>
    								<div class="offer-new">New</div>
    							</div>
    							<div class="product-thumb">
    								<a href="<?= $product->get_permalink() ?>"><img src="<?= wp_get_attachment_image_url($product->get_image_id(), 'full') ?>" alt=""></a>
    							</div>
    							<div class="product-details">
    								<h4>
    									<a href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a>
    								</h4>
    								<p class="product-excerpt"><?= $product->get_description() ?></p>
    								<div class="product-bottom-details ">
    									<span class="price">
    										<?= $product->get_price_html() ?>
    									</span>
    									<div class="d-flex justify-content-center">
    										<?php do_action('woocommerce_after_shop_loop_item') ?>
    									</div>

    								</div>
    							</div>
    						</div>
    					<?php endforeach ?>
    				</div>
    			</div>
    		<?php endif ?>
    	</section> -->

    	<!-- Вывод товаров через query запрос -->

    	<!-- Вывод товаров через создание нового темплейта -->

    	<section class="new-products">
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col-12">
    					<h2 class="section-title">
    						<span><?php _e('New Products', 'wooeshop') ?></span>
    					</h2>
    				</div>
    			</div>

    			<div class="owl-carousel owl-theme owl-carousel-full">
    				<?= do_shortcode('[wooeshop_products_card]') ?>
    			</div>
    		</div>
    	</section>

    	<!-- Вывод товаров через создание нового темплейта -->


    	<section class="about-us" id="about">
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col-12">
    					<h2 class="section-title">
    						<span>About Us</span>
    					</h2>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-12">
    					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit velit illo, ex magni
    						odio rem ab a saepe nihil assumenda illum reiciendis quae nemo fuga porro omnis.
    						Nesciunt, nostrum at?</p>
    					<p>Laboriosam, esse dolore incidunt voluptas ea enim quasi laudantium quod ipsum asperiores,
    						labore, similique cum accusamus optio perspiciatis et cumque pariatur est sapiente
    						dolorem repudiandae libero nulla nesciunt rem! Magnam!</p>
    					<p>Voluptatem, maiores dicta? Quod enim temporibus sapiente quisquam optio sed fuga, facilis
    						iusto animi qui, vitae voluptate inventore eveniet nulla eius soluta et magnam eligendi
    						a veniam tenetur laborum saepe.</p>
    				</div>
    			</div>
    		</div>
    	</section>

    	<iframe id="map"
    		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2407.1070529675467!2d2.3478712780714384!3d48.85881153486507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1ee52239cb%3A0x2cacf4239af49ccb!2zMTggUnVlIFNhaW50LURlbmlzLCA3NTAwMSBQYXJpcywg0KTRgNCw0L3RhtC40Y8!5e0!3m2!1sru!2sua!4v1683972127217!5m2!1sru!2sua"
    		width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy"
    		referrerpolicy="no-referrer-when-downgrade"></iframe>

    </main>

    <?php get_footer() ?>