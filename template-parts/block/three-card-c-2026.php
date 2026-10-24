
<?php

/**
 * Block Name: 2026-3-Card-C
 *
 * Three-card section with optional main heading,
 * blue/black subtitle, images, descriptions, buttons,
 * and customizable background color.
 */

$id = 'three-card-c-2026-' . $block['id'];

$title    = get_field('title');
$subtitle = get_field('subtitle');
$cards    = get_field('cards');

// Subtitle color: blue (default) or black.
$subtitle_color = get_field('subtitle_color');

if (!in_array($subtitle_color, ['blue', 'black'], true)) {
    $subtitle_color = 'blue';
}

// Custom background hex color.
// If empty or invalid, the SCSS default linen is used.
$background_color = sanitize_hex_color(
    trim((string) get_field('background_color'))
);

$additional_class = isset($block['className'])
    ? $block['className']
    : '';

?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="three-card-c-2026 <?php echo esc_attr($additional_class); ?>"
    <?php if ($background_color) : ?>
        style="background-color: <?php echo esc_attr($background_color); ?>;"
    <?php endif; ?>
>
    <div class="container">

        <div class="three-card-c-2026-inner">

            <?php if ($title || $subtitle) : ?>
                <div class="three-card-c-2026-heading">

                    <?php if ($title) : ?>
                        <h2 class="three-card-c-2026-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <p class="three-card-c-2026-subtitle three-card-c-2026-subtitle--<?php echo esc_attr($subtitle_color); ?>">
                            <?php echo nl2br(esc_html($subtitle)); ?>
                        </p>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if ($cards) : ?>
                <div class="three-card-c-2026-grid">

                    <?php foreach ($cards as $card) :

                        $image         = $card['image'] ?? null;
                        $card_title    = $card['title'] ?? '';
                        $card_subtitle = $card['subtitle'] ?? '';
                        $button_text   = $card['button_text'] ?? '';
                        $button_url    = $card['button_url'] ?? '';

                        $image_url = is_array($image)
                            ? ($image['url'] ?? '')
                            : '';

                        $image_alt = is_array($image)
                            ? ($image['alt'] ?? $card_title)
                            : $card_title;
                    ?>

                        <article class="three-card-c-2026-card">

                            <?php if ($image_url) : ?>
                                <div class="three-card-c-2026-card__image">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="three-card-c-2026-card__content">

                                <?php if ($card_title) : ?>
                                    <h3 class="three-card-c-2026-card__title">
                                        <?php echo esc_html($card_title); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($card_subtitle) : ?>
                                    <p class="three-card-c-2026-card__subtitle">
                                        <?php echo esc_html($card_subtitle); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($button_text && $button_url) : ?>
                                    <div class="three-card-c-2026-card__button-wrapper">
                                        <a
                                            href="<?php echo esc_url($button_url); ?>"
                                            class="btn_red three-card-c-2026-card__button"
                                        >
                                            <?php echo esc_html($button_text); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
