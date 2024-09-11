<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package cb_neat
 */

get_header(); ?>


<section id="primary" class="search-page container section-pad">

		<div class="upper">
			<h5>search results for:</h5>
			<h1 class="h2"><?php echo get_search_query(); ?></h1>
		</div>

		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<div class="lower">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="search-tile">
				  <div class="left">
				    <?php if (has_post_thumbnail()): ?>
				      <?php the_post_thumbnail(); ?>
				    <?php endif; ?>
				  </div>
				  <div class="right">

				    <h2 class="h3 light"><?php the_title(); ?></h2>

				    <a href="<?php the_permalink(); ?>" class="btn_1">
				      <span>read more</span>
				    </a>
				  </div>
				</article>

			<?php endwhile; ?>
		</div>

		<?php else : ?>
		<div class="section-pad">
			<h3>Whoops! We couldn't find and results for your search.</h3>
		</div>

		<?php endif; ?>

	</section><!-- #primary -->

<?php get_footer(); ?>
