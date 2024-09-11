<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package cb_neat
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<section class="error-404 not-found" >
			<div class="error-404-wrapper container">
				<h1>404</h1>
				<h3>Oops! Looks like the page you’re looking for isn’t here. </h3>
				<p>Redirecting you in [<span class="count">10</span>] seconds.</p>
			</div>
			<div class="error-404__img-wrapper">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/error/error.jpg" />
			</div>
		</section><!-- .error-404 -->

	</div><!-- #primary -->

<?php get_footer(); ?>
