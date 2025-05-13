<?php
/**
 * Block Name: Banner
 *
 * This is the template that displays the banner block.
 */

// create id attribute for specific styling
$id = 'banner-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/banner.png'; ?>" alt="">
<?php 
    return;
endif;

$button_on_left = get_field('button_on_left');
$bg_color = get_field('background_color');
?>

<section id="<?php echo esc_attr($id); ?>" class="banner-wrapper">
    <div class="container">
        <?php if (get_field('has_image')) : ?>
            <div class="has-image-banner" style="background-color:<?php echo esc_attr($bg_color); ?>">
                <div class="left">
                    <?php if (get_field('image_mobile')) : ?>
                        <img class="mobile" src="<?php the_field('image_mobile'); ?>" />
                        <img class="desktop" src="<?php the_field('image'); ?>" />
                    <?php else : ?>
                        <img class="desktop-only" src="<?php the_field('image'); ?>" />
                    <?php endif; ?>
                </div>
                <div class="right" style="color:<?php echo ($bg_color === '#D64936') ? '#FFF' : '#1D0800'; ?>">
                    <p class="quote"><?php the_field('quote'); ?></p>
                    <p class="quoter italic"><?php the_field('quoter'); ?></p>
                </div>
            </div>
        <?php else : ?>
            <div class="banner <?php echo (isset($button_on_left) && $button_on_left) ? 'button-on-left' : ''; ?>" style="background-color:<?php echo esc_attr($bg_color); ?>">

                <?php if ($button_on_left) : ?>
                    <!-- Button on left version -->
                    <div class="left">
                        <?php if ($button = get_field('button')) : ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url($button['url']); ?>" class="<?php echo ($bg_color === '#D64936') ? 'btn_white' : 'btn_red'; ?>">
                                    <?php echo esc_html($button['text']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <div style="color:<?php echo ($bg_color === '#D64936') ? '#FFF' : '#1D0800'; ?>" class="quote">
                            <?php the_field('title'); ?>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Default version (button on right) -->
                    <div class="left">
                        <div style="color:<?php echo ($bg_color === '#D64936') ? '#FFF' : '#1D0800'; ?>" class="quote">
                            <?php the_field('title'); ?>
                        </div>
                    </div>
                    <div class="right">
                        <?php if ($button = get_field('button')) : ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url($button['url']); ?>" class="<?php echo ($bg_color === '#D64936') ? 'btn_white' : 'btn_red'; ?>">
                                    <?php echo esc_html($button['text']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>