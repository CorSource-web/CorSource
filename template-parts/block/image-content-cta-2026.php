
<?php
/**
 * Block Name: 2026 Image Content CTA
 */

$id = 'image-content-cta-2026-' . ($block['id'] ?? uniqid());

$title          = get_field('title');
$image          = get_field('image');
$content        = get_field('content');
$button         = get_field('button');
$image_position = get_field('image_position') ?: 'left';

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

$button_url    = $button['url'] ?? '';
$button_title  = $button['title'] ?? '';
$button_target = $button['target'] ?? '_self';

if (!$button_title && !empty($button['text'])) {
    $button_title = $button['text'];
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="image-content-cta-2026 image-content-cta-2026--<?php echo esc_attr($image_position); ?>"
>
    <div class="container">

        <div class="image-content-cta-2026__panel">

            <?php if ($image_url) : ?>
                <div class="image-content-cta-2026__image">
                    <img
                        src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr($image_alt); ?>"
                        loading="lazy"
                    >
                </div>
            <?php endif; ?>

            <div class="image-content-cta-2026__content">

                <?php if ($title) : ?>
                    <h2 class="image-content-cta-2026__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($content) : ?>
                    <div class="image-content-cta-2026__body">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>

                <?php if ($button_url && $button_title) : ?>
                    <div class="image-content-cta-2026__button">
                        <a
                            href="<?php echo esc_url($button_url); ?>"
                            target="<?php echo esc_attr($button_target); ?>"
                            <?php echo $button_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            class="btn_red"
                        >
                            <?php echo esc_html($button_title); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</section>
