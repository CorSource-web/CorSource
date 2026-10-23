
<?php
/**
 * Block Name: 2026 Blue Info Band
 *
 * Full-width blue information band with optional
 * title, content, and CTA button.
 */

$id = 'blue-info-band-2026-' . $block['id'];

// Gutenberg preview image.
if (isset($block['data']['preview_image'])) : ?>
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/blue-info-band-2026.png'); ?>"
        alt="2026 Blue Info Band Preview"
    >
<?php
    return;
endif;

$title   = get_field('title');
$text    = get_field('info_text');
$content = get_field('content');
$button  = get_field('button');

// Optional content width override, in pixels.
// Empty field preserves the existing container layout.
$content_max_width = get_field('content_max_width');

$content_width_style = '';

if (
    is_numeric($content_max_width) &&
    (float) $content_max_width > 0
) {
    $content_width = min(1500, max(1, (float) $content_max_width));

    $content_width_style = 'max-width: ' . $content_width . 'px;';
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="blue-info-band-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div
        class="blue-info-band-2026__inner container"
        <?php if ($content_width_style) : ?>
            style="<?php echo esc_attr($content_width_style); ?>"
        <?php endif; ?>
    >

        <?php if ($title) : ?>
            <h2 class="blue-info-band-2026__title">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($content) : ?>
            <div class="blue-info-band-2026__text">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php elseif ($text) : ?>
            <p class="blue-info-band-2026__text">
                <?php echo esc_html($text); ?>
            </p>
        <?php endif; ?>

        <?php if (is_array($button) && !empty($button['url'])) : ?>
            <div class="blue-info-band-2026__button">
                <a
                    href="<?php echo esc_url($button['url']); ?>"
                    class="btn_red"
                    target="<?php echo esc_attr(!empty($button['target']) ? $button['target'] : '_self'); ?>"
                >
                    <?php echo esc_html(!empty($button['title']) ? $button['title'] : 'Learn More'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
