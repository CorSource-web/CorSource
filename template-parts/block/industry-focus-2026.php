<?php
/**
 * Block Name: 2026 Industry Focus
 *
 * Centered heading and introduction with a two-column
 * layout featuring an image, content, and white information panel.
 */

$id = 'industry-focus-2026-' . $block['id'];

if (isset($block['data']['preview_image'])) : ?>
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/industry-focus-2026.png'); ?>"
        alt="2026 Industry Focus Preview"
    >
<?php
    return;
endif;

$title         = get_field('title');
$intro_content = get_field('intro_content');
$left_image    = get_field('left_image');
$left_content  = get_field('left_content');
$right_content = get_field('right_content');

$image_url = is_array($left_image)
    ? ($left_image['sizes']['large'] ?? $left_image['url'] ?? '')
    : '';

$image_alt = is_array($left_image)
    ? ($left_image['alt'] ?? '')
    : '';
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="industry-focus-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div class="industry-focus-2026__inner container">

        <?php if ($title || $intro_content) : ?>
            <div class="industry-focus-2026__heading">

                <?php if ($title) : ?>
                    <h2 class="industry-focus-2026__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($intro_content) : ?>
                    <div class="industry-focus-2026__intro">
                        <?php echo wp_kses_post($intro_content); ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="industry-focus-2026__columns">

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