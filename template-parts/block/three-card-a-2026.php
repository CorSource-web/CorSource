
<?php

/**
 * Block Name: 2026-3-Card-A
 */

$id = 'three-card-a-2026-' . $block['id'];

$title         = get_field('title');
$blue_subtitle = get_field('blue_subtitle');
$cards         = get_field('cards');

// Optional footer fields.
$footer_content = get_field('footer_content');
$footer_button  = get_field('footer_button');
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

            <?php if ($footer_content || !empty($footer_button['url'])) : ?>
                <div class="three-card-a-2026-footer">

                    <?php if ($footer_content) : ?>
                        <div class="three-card-a-2026-footer__content">
                            <?php echo wp_kses_post($footer_content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($footer_button['url'])) : ?>
                        <div class="three-card-a-2026-footer__button">
                            <a
                                href="<?php echo esc_url($footer_button['url']); ?>"
                                target="<?php echo esc_attr($footer_button['target'] ?: '_self'); ?>"
                                class="btn_red"
                                <?php echo ($footer_button['target'] ?? '') === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            >
                                <?php echo esc_html($footer_button['title'] ?: 'Learn More'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
