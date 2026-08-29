<?php

/**
 * Block Name: 2026 Center Image CTA
 */

$id = 'center-image-cta-2026-' . $block['id'];

$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('image');
$button   = get_field('button');

$button_text = $button['button_text'] ?? '';
$button_url  = $button['url'] ?? '';
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="center-image-cta-2026"
>
    <div class="container">

        <div class="center-image-cta-2026-inner">

            <?php if ($title) : ?>
                <h2 class="center-image-cta-2026-title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($subtitle) : ?>
                <div class="center-image-cta-2026-subtitle">
                    <?php echo wpautop(wp_kses_post($subtitle)); ?>
                </div>
            <?php endif; ?>

            <?php if ($image) : ?>
                <div class="center-image-cta-2026-image">
                    <img
                        src="<?php echo esc_url($image); ?>"
                        alt="<?php echo esc_attr($title ?: ''); ?>"
                    >
                </div>
            <?php endif; ?>

            <?php if ($button_text && $button_url) : ?>
                <div class="center-image-cta-2026-button-wrapper">
                    <a
                        href="<?php echo esc_url($button_url); ?>"
                        class="btn_red center-image-cta-2026-button"
                    >
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>