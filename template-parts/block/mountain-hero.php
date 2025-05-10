<?php
/**
 * Mountain Hero Component
 *
 * Displays a hero section with background image and centered content
 */

// Get ACF fields
$title = get_field('title');
$subtitle = get_field('subtitle');
$button = get_field('button');
$background_image_url = get_field('background_image');
?>

<section class="mountain-hero" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
    <div class="mountain-hero__overlay"></div>
    <div class="mountain-hero__content">
        <?php if ($title) : ?>
            <h1 class="mountain-hero__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
        
        <?php if ($subtitle) : ?>
            <p class="mountain-hero__subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
        
        <?php if ($button && $button['url'] && $button['text']) : ?>
            <a href="<?php echo esc_url($button['url']); ?>" class="btn_red">
                <?php echo esc_html($button['text']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>