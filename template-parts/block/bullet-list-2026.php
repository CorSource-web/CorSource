<?php
/**
 * Block Name: 2026 Bullet List
 *
 * Repeating rows with a circular label,
 * heading, and WYSIWYG content.
 */

$id = 'bullet-list-2026-' . $block['id'];

// Gutenberg preview image.
if (isset($block['data']['preview_image'])) : ?>
    <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/bullet-list-2026.png'); ?>"
        alt="2026 Bullet List Preview"
    >
<?php
    return;
endif;

$items = get_field('items');

if (empty($items) || !is_array($items)) {
    return;
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="bullet-list-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div class="bullet-list-2026__inner container">

        <div class="bullet-list-2026__items">

            <?php foreach ($items as $item) :

                $circle_label = $item['circle_label'] ?? '';
                $heading      = $item['heading'] ?? '';
                $content      = $item['content'] ?? '';

                if (!$circle_label && !$heading && !$content) {
                    continue;
                }
            ?>

                <div class="bullet-list-2026__item">

                    <div class="bullet-list-2026__marker">
                        <?php if ($circle_label) : ?>
                            <span class="bullet-list-2026__marker-text">
                                <?php echo esc_html($circle_label); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="bullet-list-2026__content">

                        <?php if ($heading) : ?>
                            <h3 class="bullet-list-2026__heading">
                                <?php echo esc_html($heading); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($content) : ?>
                            <div class="bullet-list-2026__body">
                                <?php echo wp_kses_post($content); ?>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>