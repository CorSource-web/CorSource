<?php

/**
 * Block Name: Info Cards
 *
 * This is the template that displays the hero block.
 */

// create id attribute for specific styling
$id = 'info-cards-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/info-cards.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="info-cards container <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>">

  <?php if (have_rows('cards')) : ?>
    <div class="info-cards__cards">
      <?php while (have_rows('cards')) : the_row(); ?>
        <div class="info-cards__card <?php echo get_sub_field('add_quote') ? 'info-cards__card--quote' : ''; ?>" style="background-color: <?php the_field('card_color'); ?>">
          <div class="info-cards__content">
            <img src="<?php the_sub_field('icon'); ?>" alt="">
            <h5><?php the_sub_field('title'); ?></h5>
            <p class="minor"><?php the_sub_field('copy') ?></p>
          </div>

          <?php if (get_sub_field('add_cta_button') || get_sub_field('add_quote')) : ?>
            <?php if (get_sub_field('add_quote')) : ?>
              <hr>
            <?php endif; ?>
            <div class="info-cards__cta-wrapper">
              <?php $cta_data = get_sub_field('cta'); ?>
              <?php if (get_sub_field('add_quote')) : ?>
                <p class="minor quote"><strong>
                    <?php echo esc_html($cta_data['quote']); ?>
                  </strong></p>
                <p class="minor italic">
                  <?php echo esc_html($cta_data['name']); ?>
                </p>
              <?php endif; ?>
              <?php if (get_sub_field('add_cta_button')) : ?>
                <a href="<?php echo esc_url($cta_data['button_url']); ?>" class="btn_red"><?php echo esc_html($cta_data['button_text']); ?></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>
