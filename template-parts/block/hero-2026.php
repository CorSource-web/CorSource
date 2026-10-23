<?php

/**
 * Block Name: 2026 Hero
 */

$id = 'hero-2026-' . $block['id'];

$background_image = get_field('background_image');

// Hero height in rem. Defaults to 54.
$hero_height = get_field('hero_height');

if ($hero_height === '' || $hero_height === null || $hero_height === false) {
    $hero_height = 54;
}

$hero_height = max(20, min(100, (float) $hero_height));

$title_line_1       = get_field('title_line_1');
$title_line_2       = get_field('title_line_2');

$subtitle           = get_field('subtitle');
$highlight_subtitle = get_field('highlight_subtitle');

$button             = get_field('button');

$button_text = $button['button_text'] ?? '';
$button_url  = $button['url'] ?? '';

?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="hero-2026"
    style="
        --hero-height: <?php echo esc_attr($hero_height); ?>rem;
        <?php if ($background_image) : ?>
            background-image: url('<?php echo esc_url($background_image); ?>');
        <?php endif; ?>
    "
>

    <div class="hero-2026-overlay">

        <div class="container">

            <div class="hero-2026-content">

                <?php if ($title_line_1 || $title_line_2) : ?>
                    <h1 class="hero-2026-title">

                        <?php if ($title_line_1) : ?>
                            <span class="hero-2026-title__line">
                                <?php echo esc_html($title_line_1); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($title_line_2) : ?>
                            <span class="hero-2026-title__line">
                                <?php echo esc_html($title_line_2); ?>
                            </span>
                        <?php endif; ?>

                    </h1>
                <?php endif; ?>


                <?php if ($subtitle || $highlight_subtitle) : ?>
                    <p class="hero-2026-subtitle">
                        <?php if ($subtitle) : ?><span class="hero-2026-subtitle__main"><?php echo esc_html($subtitle); ?></span><?php endif; ?><?php if ($highlight_subtitle) : ?> <span class="hero-2026-subtitle__highlight"><?php echo esc_html($highlight_subtitle); ?></span><?php endif; ?>
                    </p>
                <?php endif; ?>


                <?php if ($button_text && $button_url) : ?>
                    <div class="hero-2026-button-wrapper">

                        <a
                            href="<?php echo esc_url($button_url); ?>"
                            class="btn hero-2026-button"
                        >
                            <?php echo esc_html($button_text); ?>
                        </a>

                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>