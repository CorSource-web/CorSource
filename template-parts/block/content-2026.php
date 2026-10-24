
<?php

/**
 * Block Name: 2026 Content
 */

$id = 'content-2026-' . $block['id'];

$content = get_field('content');

// Content width in pixels. Defaults to 900.
$content_width = get_field('content_width');

if (
    $content_width === '' ||
    $content_width === null ||
    $content_width === false ||
    !is_numeric($content_width)
) {
    $content_width = 900;
}

$content_width = max(400, min(1500, (int) $content_width));

// Background color from ACF.
// Defaults to white if the field is empty or invalid.
$background_color = sanitize_hex_color(
    trim((string) get_field('background_color'))
);

if (!$background_color) {
    $background_color = '#ffffff';
}

// Additional Gutenberg CSS classes.
$additional_class = isset($block['className'])
    ? $block['className']
    : '';

?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="content-2026 <?php echo esc_attr($additional_class); ?>"
    style="background-color: <?php echo esc_attr($background_color); ?>;"
>
    <div class="container">

        <div
            class="content-2026-inner"
            style="--content-width: <?php echo esc_attr($content_width); ?>px;"
        >

            <?php if ($content) : ?>

                <div class="content-2026-body">
                    <?php echo wp_kses_post($content); ?>
                </div>

            <?php endif; ?>

        </div>

    </div>
</section>
