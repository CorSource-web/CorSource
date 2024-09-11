<?php

/**
 * Block Name: Inline Hero
 *
 * This is the template that displays the Inline Hero block.
 */

// create id attribute for specific styling
$id = 'inline-hero-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/inline-hero.png' ?>" alt="">
<?php return; endif;
?>

<section id="<?php echo $id; ?>" class="inline-hero container">
  <?php if (get_field('image')) : ?>
    <div class="desktop-image parallax-wrapper">
      <img src="<?php the_field('image'); ?>" alt="">
    </div>
  <?php endif; ?>
  <div class="mobile-image parallax-wrapper">
    <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('image'); ?>" alt="">
  </div>
</section>