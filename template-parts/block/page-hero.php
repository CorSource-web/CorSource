<?php

/**
 * Block Name: Page Hero
 *
 * This is the template that displays the page hero block.
 */

// create id attribute for specific styling
$id = 'page-hero-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/page-hero.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="page-hero">
  <div class="container">
    <div class="monitor-linen-bars"></div>
    <div class="page-hero-wrapper">
      <div class="page-hero-wrapper__left">
        <h1><?php the_field('title'); ?></h1>
        <p><?php the_field('subtitle'); ?></p>
        <?php
        $button = get_field('button');
        if ($button) : ?>
          <div class="btn-wrapper">
            <a href="<?php echo esc_url($button['url']); ?>" class="btn_red"><?php echo $button['text'] ?></a>
          </div>
        <?php endif; ?>
      </div>

      <div class="page-hero-wrapper__right">
        <?php if (get_field('image')) : ?>
          <div class="desktop-image parallax-wrapper">
            <img src="<?php the_field('image'); ?>" alt="">
          </div>
        <?php endif; ?>
        <div class="mobile-image parallax-wrapper">
          <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('image'); ?>" alt="">
        </div>
      </div>
    </div>

  </div>
</section>