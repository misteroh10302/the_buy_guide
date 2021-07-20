<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Buy_Guide
 */

?>

	<footer id="colophon" class="site-footer p-3">
		<div class="site-info">
			<div class="footer-top">
				<div class="footer-logo-wrapper">	
					<img src="http://localhost:8888/wp-content/uploads/2021/07/footer-logo.png" width="60" height="60" alt="The Buy Guide Logo" />
				</div>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'menu_id'        => 'footer-menu',
						)
					);
				?>
			</div>
			<div class="footer-middle">
				<div></div>
				<div class="footer-social-menu">
					social
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-newsletter-wrapper">
					<div>
						<?php get_template_part("template-parts/content", "newsletter"); ?>
					</div>
				</div>
				<ul>
					<li><a href="#">Terms & Conditions</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Made by Nice People</a></li>
				</ul>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php wp_footer(); ?>

<script>

const INIT_SWIPER_GALLERIES = () => {
	const $allSwipers = document.querySelectorAll('.swiper-container');
	
	$allSwipers.forEach((el,i) => {
		console.log(el)
		const swiper = new Swiper(el, {
			direction: 'horizontal',
			 // Default parameters
			slidesPerView: 'auto',
			spaceBetween: 10,
			centeredSlidesBounds: true,
			centeredSlides: true,
			shortSwipes: false,
			loopAdditionalSlides: true,
			scrollbar: {
				el: el.querySelector('.swiper-scrollbar'),
				draggable: true,
			},
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				// when window width is >= 480px
				480: {
					slidesPerView: 3,
					spaceBetween: 30
				},
				// when window width is >= 640px
				640: {
					slidesPerView: "auto",
					spaceBetween: 40
				}
			}
		})
	});
}

window.onload = () => {
	INIT_SWIPER_GALLERIES();
}
</script>
</body>
</html>
