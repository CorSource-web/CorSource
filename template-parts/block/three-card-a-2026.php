<?php

/**
 * Block Name: 2026-3-Card-A
 */

$id = 'three-card-a-2026-' . $block['id'];

$title         = get_field('title');
$blue_subtitle = get_field('blue_subtitle');
$cards         = get_field('cards');
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="three-card-a-2026"
>
    <div class="container">

        <div class="three-card-a-2026-inner">

            <?php if ($title || $blue_subtitle) : ?>
                <div class="three-card-a-2026-heading">

                    <?php if ($title) : ?>
                        <h2 class="three-card-a-2026-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($blue_subtitle) : ?>
                        <div class="three-card-a-2026-blue-title">
                            <?php echo esc_html($blue_subtitle); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if ($cards) : ?>
                <div class="three-card-a-2026-grid">

                    <?php foreach ($cards as $card) :

                        $icon       = $card['icon'] ?? null;
                        $card_title = $card['title'] ?? '';
                        $subtitle   = $card['subtitle'] ?? '';

                        $icon_url = $icon['url'] ?? '';
                        $icon_alt = $icon['alt'] ?? $card_title;
                    ?>

                        <article class="three-card-a-2026-card">

                            <?php if ($icon_url) : ?>
                                <div class="three-card-a-2026-card__icon">
                                    <img
                                        src="<?php echo esc_url($icon_url); ?>"
                                        alt="<?php echo esc_attr($icon_alt); ?>"
                                    >
                                </div>
                            <?php endif; ?>

                            <?php if ($card_title) : ?>
                                <h3 class="three-card-a-2026-card__title">
                                    <?php echo esc_html($card_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($subtitle) : ?>
                                <p class="three-card-a-2026-card__subtitle">
                                    <?php echo esc_html($subtitle); ?>
                                </p>
                            <?php endif; ?>

                        </article>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>
</section>