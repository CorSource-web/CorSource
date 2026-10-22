
<?php
/**
 * Block Name: 2026 Image Two Column
 *
 * Wide image with angled bottom-right corner,
 * followed by two columns with optional blue titles
 * and independent WYSIWYG content.
 */

$id = 'image-two-column-2026-' . $block['id'];

// Gutenberg preview image.
if (isset($block['data']['preview_image'])) : ?>
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/image-two-column-2026.png'); ?>"
        alt="2026 Image Two Column Preview"
    >
<?php
    return;
endif;

// ACF fields.
$image         = get_field('image');
$left_title    = get_field('left_title');
$left_content  = get_field('left_content');
$right_title   = get_field('right_title');
$right_content = get_field('right_content');

// Image array.
$image_url = is_array($image) ? ($image['url'] ?? '') : '';
$image_alt = is_array($image) ? ($image['alt'] ?? '') : '';

// Do not render an entirely empty block.
if (
    !$image_url &&
    !$left_title &&
    !$left_content &&
    !$right_title &&
    !$right_content
) {
    return;
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="image-two-column-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div class="image-two-column-2026__inner container">

        <?php if ($image_url) : ?>
            <div class="image-two-column-2026__image">
                <img
                    src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>"
                    loading="lazy"
                >
            </div>
        <?php endif; ?>

        <?php if ($left_title || $left_content || $right_title || $right_content) : ?>
            <div class="image-two-column-2026__columns">

                <!-- Left Column -->
                <div class="image-two-column-2026__column">

                    <?php if ($left_title) : ?>
                        <h3 class="image-two-column-2026__title">
                            <?php echo esc_html($left_title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($left_content) : ?>
                        <div class="image-two-column-2026__content">
                            <?php echo wp_kses_post($left_content); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Right Column -->
                <div class="image-two-column-2026__column">

                    <?php if ($right_title) : ?>
                        <h3 class="image-two-column-2026__title">
                            <?php echo esc_html($right_title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($right_content) : ?>
                        <div class="image-two-column-2026__content">
                            <?php echo wp_kses_post($right_content); ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        <?php endif; ?>

    </div>
</section>
