
<?php

/**
 * Block Name: Animated Text
 *
 * This is the template that displays the animated text block.
 */

$id = 'animated-text-' . $block['id'];

// Optional background color from ACF.
// Defaults to white.
$background_color = sanitize_hex_color(
    trim((string) get_field('background_color'))
);

if (!$background_color) {
    $background_color = '#ffffff';
}

// Preserve additional Gutenberg classes.
$additional_class = isset($block['className'])
    ? $block['className']
    : '';

?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="animated-text <?php echo esc_attr($additional_class); ?>"
    style="background-color: <?php echo esc_attr($background_color); ?>;"
>
    <div class="container">
        <InnerBlocks />
    </div>
</section>
