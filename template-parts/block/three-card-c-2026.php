
<?php

/**
 * Block Name: 2026-3-Card-C
 */

$id = 'three-card-c-2026-' . $block['id'];

$title = get_field('title');
$cards = get_field('cards');
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="three-card-c-2026 <?php echo isset($block['className']) ? esc_attr($block['className']) : ''; ?>"
>
    <div class="container">

        <div class="three-card-c-2026-inner">

            <?php if ($title) : ?>
                <div class="three-card-c-2026-heading">
                    <h2 class="three-card-c-2026-title">
                        <?php echo esc_html($title); ?>
                    </h2>
                </div>
            <?php endif; ?>

            <?php if ($cards) : ?>
                <div class="three-card-c-2026-grid">

                    <?php foreach ($cards as $card) :

                        $image       = $card['image'] ?? null;
                        $card_title  = $card['title'] ?? '';
                        $subtitle    = $card['subtitle'] ?? '';
                        $button_text = $card['button_text'] ?? '';
                        $button_url  = $card['button_url'] ?? '';

                        $image_url = is_array($image) ? ($image['url'] ?? '') : '';
                        $image_alt = is_array($image) ? ($image['alt'] ?? $card_title) : $card_title;
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

                                <?php if ($subtitle) : ?>
                                    <p class="three-card-c-2026-card__subtitle">
                                        <?php echo esc_html($subtitle); ?>
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
