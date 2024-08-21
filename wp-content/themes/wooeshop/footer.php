<?php wp_footer() ?>
<footer class="footer" id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-6">
				<h4>Information</h4>
				<ul class="list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Payment</a></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">Contacts</a></li>
				</ul>
			</div>

			<div class="col-md-3 col-6">
				<h4>Working hours</h4>
				<ul class="list-unstyled">
					<li>Paris, str. Bretan</li>
					<li>mon-fri: 9:00 - 18:00</li>
				</ul>
			</div>
			<?php if ($phone = get_theme_mod('wooeshop_phone')): ?>
				<div class="col-md-3 col-6">
					<h4>Contacts</h4>
					<ul class="list-unstyled">
						<li><a href="tel:+<?= str_replace([' ', '-', '+'], '', $phone) ?>" class="ms-2"><?= $phone ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

			<div class="col-md-3 col-6">
				<h4>Follow us</h4>
				<ul class="footer-icons">
					<?php if ($youtube = get_theme_mod('wooeshop_youtube')): ?><li><a href="<?= $youtube ?>"><i class="fa-brands fa-youtube"></i></a></li><?php endif ?>
					<?php if ($facebook = get_theme_mod('wooeshop_facebook')): ?><li><a href="<?= $facebook ?>"><i class="fa-brands fa-facebook-f"></i></a></li><?php endif ?>
					<?php if ($instagram = get_theme_mod('wooeshop_instagram')): ?><li><a href="<?= $instagram ?>"><i class="fa-brands fa-instagram"></i></a></li><?php endif ?>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>

<button id="top">
	<i class="fa-solid fa-angles-up"></i>
</button>
</body>

</html>