
<?php
/**
 * Block Name: 2026 Blue Info Band
 *
 * Full-width blue information band with centered white text.
 */

$id = 'blue-info-band-2026-' . $block['id'];

// Gutenberg preview image
if (isset($block['data']['preview_image'])) : ?>
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/blue-info-band-2026.png'); ?>"
        alt="2026 Blue Info Band Preview"
    >
<?php
    return;
endif;

$text = get_field('info_text');
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="blue-info-band-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div class="blue-info-band-2026__inner container">

        <?php if ($text) : ?>
            <p class="blue-info-band-2026__text">
                <?php echo esc_html($text); ?>
            </p>
        <?php endif; ?>

    </div>
</section>
