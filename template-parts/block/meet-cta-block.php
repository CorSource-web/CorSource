<?php

/**
 * Block Name: Meet Cta Block
 *
 * This is the template that displays the career cta block.
 */

// create id attribute for specific styling
$id = 'meet-cta-block-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/meet-cta.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="meet-cta-block container">
    <div class="meet-cta-block__left">
        <?php if (get_field('image')) : ?>
            <div class="desktop-image parallax-wrapper">
                <img src="<?php the_field('image'); ?>" alt="">
            </div>
        <?php endif; ?>

        <div class="mobile-image">
            <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('image'); ?>" alt="">
        </div>

    </div>
    <div class="meet-cta-block__right">
        <h3><?php the_field('title'); ?></h3>
        <p><?php the_field('content'); ?></p>

        <?php
        $button = get_field('button');
        if ($button) : ?>
            <div class="button-wrapper">
                <a class="btn_red" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['text']); ?></a>
            </div>
        <?php endif; ?>
    </div>


</section>