
<?php

/**
 * Block Name: 2026 Horizontal Cards
 *
 * Repeater-based horizontal cards with an image,
 * title, subtitle, WYSIWYG content, and button.
 *
 * Background color is controlled through ACF.
 */

$id = 'horizontal-cards-2026-' . $block['id'];

$cards = get_field('cards');

// Background color from ACF.
// Defaults to white to preserve existing appearance.
$background_color = sanitize_hex_color(
    trim((string) get_field('background_color'))
);

if (!$background_color) {
    $background_color = '#FFFFFF';
}

$additional_class = isset($block['className'])
    ? $block['className']
    : '';

?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="horizontal-cards-2026 <?php echo esc_attr($additional_class); ?>"
    style="--horizontal-cards-background: <?php echo esc_attr($background_color); ?>;"
>
    <div class="container">

        <div class="horizontal-cards-2026-inner">

            <?php if ($cards) : ?>

                <?php foreach ($cards as $card) :

                    $image    = $card['image'] ?? null;
                    $title    = $card['title'] ?? '';
                    $subtitle = $card['subtitle'] ?? '';
                    $content  = $card['content'] ?? '';
                    $button   = $card['button'] ?? null;

                    $image_url = is_array($image)
                        ? ($image['url'] ?? '')
                        : '';

                    $image_alt = is_array($image)
                        ? ($image['alt'] ?? '')
                        : '';

                    if (!$image_alt) {
                        $image_alt = $title;
                    }

                    $button_url = is_array($button)
                        ? ($button['url'] ?? '')
                        : '';

                    $button_title = is_array($button)
                        ? ($button['title'] ?? '')
                        : '';

                    $button_target = is_array($button)
                        ? ($button['target'] ?? '_self')
                        : '_self';

                ?>

                    <article class="horizontal-cards-2026-card">

                        <?php if ($image_url) : ?>

                            <div class="horizontal-cards-2026-card__image">

                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_alt); ?>"
                                    loading="lazy"
                                >

                            </div>

                        <?php endif; ?>

                        <div class="horizontal-cards-2026-card__content">

                            <?php if ($title) : ?>

                                <h2 class="horizontal-cards-2026-card__title">
                                    <?php echo esc_html($title); ?>
                                </h2>

                            <?php endif; ?>

                            <?php if ($subtitle) : ?>

                                <p class="horizontal-cards-2026-card__subtitle">
                                    <?php echo esc_html($subtitle); ?>
                                </p>

                            <?php endif; ?>

                            <?php if ($content) : ?>

                                <div class="horizontal-cards-2026-card__body">
                                    <?php echo wp_kses_post($content); ?>
                                </div>

                            <?php endif; ?>

                            <?php if ($button_url && $button_title) : ?>

                                <div class="horizontal-cards-2026-card__button-wrapper">

                                    <a
                                        href="<?php echo esc_url($button_url); ?>"
                                        target="<?php echo esc_attr($button_target); ?>"
                                        <?php if ($button_target === '_blank') : ?>
                                            rel="noopener noreferrer"
                                        <?php endif; ?>
                                        class="btn_red horizontal-cards-2026-card__button"
                                    >
                                        <?php echo esc_html($button_title); ?>
                                    </a>

                                </div>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>
</section>
