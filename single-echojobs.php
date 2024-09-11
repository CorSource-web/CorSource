<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	//
	$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
    $featured_image = $img[0];
?>
<?php get_header();?>
<div class="container">
  <div id="banner_section" class="bg-pattern vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-content-middle vc_row-flex">
    <div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
      <div class="wpb_wrapper title-wrapper">
        <h1 style="text-align: center; margin-bottom: 50px;">Open Positions</h1>

      </div>
    </div>
  </div></div></div></div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    $categories = get_the_category();
      $separator = ', ';
      $output = '';
      if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
          }
      }
  ?>
  <section id="single-post" class="vc_row copy-section">
    <div class="content-max content-center wpb_text_column">
      <?php the_content(); ?>
      <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </div>
  <?php //comments_template(); ?>
  </section>
</div>
<?php get_footer(); ?>