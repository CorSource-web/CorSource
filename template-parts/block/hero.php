<?php

/**
 * Block Name: Hero
 *
 * This is the template that displays the hero block.
 */

// create id attribute for specific styling
$id = 'hero-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/hero.png' ?>" alt="">
<?php return; endif;
?>


<section id="<?php echo $id; ?>" class="hero">
  <div class="hero-container">
    <div class="monitor-white-bars"></div>

    <div class="hero__top">
      <div class="hero__content ">
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
    </div>

    <div class="hero__bottom">
      <?php if (get_field('image')) : ?>
        <div class="desktop-image parallax-wrapper">
          <img src="<?php the_field('image'); ?>" alt="">
        </div>
      <?php endif; ?>

      <?php if (get_field('mobile_image')) { ?>
        <div class="mobile-image parallax-wrapper">
          <img src="<?php the_field('mobile_image'); ?>" alt="">
        </div>
      <?php } ?>

    </div>

  </div>
</section>