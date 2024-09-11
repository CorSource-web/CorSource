<?php

/**
 * Block Name: Banner
 *
 * This is the template that displays the banner block.
 */

// create id attribute for specific styling
$id = 'banner-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/banner.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="banner-wrapper">

    <div class="container">
            <?php
            if (get_field('has_image')) {
            ?>
                <div class="has-image-banner" style="background-color:<?php the_field('background_color'); ?>">
                    <div class="left">
                        <?php if (get_field('image_mobile')) : ?>
                            <img class="mobile" src="<?php the_field('image_mobile'); ?>" />
                            <img class="desktop" src="<?php the_field('image'); ?>" />
                        <?php else : ?>
                            <img class="desktop-only" src="<?php the_field('image'); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="right" style="color:<?php echo (get_field('background_color') === '#D64936') ? "#FFF" : "#1D0800"; ?>">
                        <p class="quote"><?php the_field('quote') ?></p>
                        <p class="quoter italic"><?php the_field('quoter') ?></p>
                    </div>
                </div>
            <?php
            } else { ?>
                <div class="banner" style="background-color:<?php the_field('background_color'); ?>">
                    <div class="left">
                        <div style="color:<?php echo (get_field('background_color') === '#D64936') ? "#FFF" : "#1D0800"; ?>" class="quote"><?php the_field('title') ?></div>
                    </div>
                    <div class="right">
                        <?php
                        $button = get_field('button');
                        if ($button) : ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url($button['url']); ?>" class="<?php echo (get_field('background_color') === '#D64936') ? "btn_white" : "btn_red"; ?>"><?php echo $button['text'] ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


            <?php } ?>
    </div>
</section>