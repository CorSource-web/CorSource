<?php

/**
 * Block Name: 2026-3-Card-B
 */

$id = 'three-card-b-2026-' . $block['id'];

$title      = get_field('title');
$blue_title = get_field('blue_title');
$subtitle   = get_field('subtitle');
$cards      = get_field('cards');
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="three-card-b-2026"
>
    <div class="container">

        <div class="three-card-b-2026-inner">

            <?php if ($title || $blue_title || $subtitle) : ?>
                <div class="three-card-b-2026-heading">

                    <?php if ($title) : ?>
                        <h2 class="three-card-b-2026-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($blue_title) : ?>
                        <div class="three-card-b-2026-blue-title">
                            <?php echo esc_html($blue_title); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <p class="three-card-b-2026-subtitle">
                            <?php echo esc_html($subtitle); ?>
                        </p>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if ($cards) : ?>
                <div class="three-card-b-2026-grid">

                    <?php foreach ($cards as $card) :

                        $image             = $card['image'] ?? null;
                        $card_title        = $card['title'] ?? '';
                        $card_title_bottom = $card['title_bottom'] ?? '';
                        $card_subtitle     = $card['subtitle'] ?? '';
                        $button            = $card['button'] ?? array();

                        $button_text = $button['button_text'] ?? '';
                        $button_url  = $button['url'] ?? '';

                        $image_url = $image['url'] ?? '';
                        $image_alt = $image['alt'] ?? $card_title;
                    ?>

                        <article class="three-card-b-2026-card">

                            <?php if ($image_url) : ?>
                                <div class="three-card-b-2026-card__image">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="three-card-b-2026-card__content">

                                <?php if ($card_title || $card_title_bottom) : ?>
                                    <h3 class="three-card-b-2026-card__title">

                                        <span class="three-card-b-2026-card__title-top">
                                            <?php echo esc_html($card_title); ?>
                                        </span>

                                        <span class="three-card-b-2026-card__title-bottom">
                                            <?php echo $card_title_bottom
                                                ? esc_html($card_title_bottom)
                                                : '&nbsp;';
                                            ?>
                                        </span>

                                    </h3>
                                <?php endif; ?>

                                <?php if ($card_subtitle) : ?>
                                    <p class="three-card-b-2026-card__subtitle">
                                        <?php echo esc_html($card_subtitle); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($button_text && $button_url) : ?>
                                    <div class="three-card-b-2026-card__button-wrapper">
                                        <a
                                            href="<?php echo esc_url($button_url); ?>"
                                            class="btn_red three-card-b-2026-card__button"
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