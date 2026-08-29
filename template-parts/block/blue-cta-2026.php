<?php

/**
 * Block Name: 2026 Blue CTA
 */

$id = 'blue-cta-2026-' . $block['id'];

$image    = get_field('image');
$title    = get_field('title');
$subtitle = get_field('subtitle');
$button   = get_field('button');

$button_text = $button['button_text'] ?? '';
$button_url  = $button['url'] ?? '';
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="blue-cta-2026"
>
    <div class="container">

        <div class="blue-cta-2026-inner">

            <?php if ($image) : ?>
                <div class="blue-cta-2026-image">
                    <img
                        src="<?php echo esc_url($image); ?>"
                        alt="<?php echo esc_attr($title ?: ''); ?>"
                    >
                </div>
            <?php endif; ?>

            <div class="blue-cta-2026-content">

                <?php if ($title) : ?>
                    <h2 class="blue-cta-2026-title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <div class="blue-cta-2026-subtitle">
                        <?php echo wpautop(wp_kses_post($subtitle)); ?>
                    </div>
                <?php endif; ?>

                <?php if ($button_text && $button_url) : ?>
                    <div class="blue-cta-2026-button-wrapper">
                        <a
                            href="<?php echo esc_url($button_url); ?>"
                            class="btn_red blue-cta-2026-button"
                        >
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</section>