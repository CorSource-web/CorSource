<?php
/**
 * Block Name: 2026 Industry Focus
 */

if (!defined('ABSPATH')) {
    exit;
}

$id = 'industry-focus-2026-' . $block['id'];

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$classes = 'industry-focus-2026';

if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

// ACF fields.
$title         = get_field('title');
$intro         = get_field('intro');
$image         = get_field('image');
$left_content  = get_field('left_content');
$right_content = get_field('right_content');

// Adjustable width of the two-column content area.
// Defaults to 100% to preserve existing block layouts.
$content_width = get_field('content_width');

$content_width = is_numeric($content_width)
    ? max(60, min(100, (float) $content_width))
    : 100;

// Image handling.
$image_url = '';
$image_alt = '';

if (is_array($image)) {
    $image_url = $image['url'] ?? '';
    $image_alt = $image['alt'] ?? '';
} elseif (is_numeric($image)) {
    $image_url = wp_get_attachment_image_url((int) $image, 'full');
    $image_alt = get_post_meta((int) $image, '_wp_attachment_image_alt', true);
} elseif (is_string($image)) {
    $image_url = $image;
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($classes); ?>"
>
    <div class="industry-focus-2026__inner container">

        <?php if ($title || $intro) : ?>
            <div class="industry-focus-2026__heading">

                <?php if ($title) : ?>
                    <h2 class="industry-focus-2026__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($intro) : ?>
                    <div class="industry-focus-2026__intro">
                        <?php echo wp_kses_post($intro); ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div
            class="industry-focus-2026__columns"
            style="--industry-content-width: <?php echo esc_attr($content_width); ?>%;"
        >

            <div class="industry-focus-2026__left">

                <?php if ($image_url) : ?>
                    <div class="industry-focus-2026__image">
                        <img
                            src="<?php echo esc_url($image_url); ?>"
                            alt="<?php echo esc_attr($image_alt); ?>"
                            loading="lazy"
                        >
                    </div>
                <?php endif; ?>

                <?php if ($left_content) : ?>
                    <div class="industry-focus-2026__left-content">
                        <?php echo wp_kses_post($left_content); ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ($right_content) : ?>
                <div class="industry-focus-2026__right">
                    <div class="industry-focus-2026__right-content">
                        <?php echo wp_kses_post($right_content); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>