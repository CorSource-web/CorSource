
<?php
/**
 * Block Name: 2026 3 Card D
 *
 * Three-card section with a white panel, introductory text,
 * rounded cards, and one optional bottom CTA.
 */

$id = 'three-card-d-2026-' . $block['id'];

$title       = get_field('title');
$subtitle    = get_field('subtitle');
$description = get_field('description');
$cards       = get_field('cards');
$button      = get_field('button');

$classes = 'three-card-d-2026';

if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($classes); ?>"
>
    <div class="container">

        <div class="three-card-d-2026-inner">

            <?php if ($title || $subtitle || $description) : ?>
                <div class="three-card-d-2026-heading">

                    <?php if ($title) : ?>
                        <h2 class="three-card-d-2026-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <p class="three-card-d-2026-subtitle">
                            <?php echo nl2br(esc_html($subtitle)); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <p class="three-card-d-2026-description">
                            <?php echo nl2br(esc_html($description)); ?>
                        </p>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($cards) && is_array($cards)) : ?>
                <div class="three-card-d-2026-grid">

                    <?php foreach ($cards as $card) :

                        $image         = $card['image'] ?? null;
                        $card_title    = $card['title'] ?? '';
                        $card_subtitle = $card['subtitle'] ?? '';

                        $image_url = is_array($image)
                            ? ($image['url'] ?? '')
                            : '';

                        $image_alt = is_array($image)
                            ? ($image['alt'] ?: $card_title)
                            : $card_title;
                    ?>

                        <article class="three-card-d-2026-card">

                            <?php if ($image_url) : ?>
                                <div class="three-card-d-2026-card__image">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="three-card-d-2026-card__content">

                                <?php if ($card_title) : ?>
                                    <h3 class="three-card-d-2026-card__title">
                                        <?php echo esc_html($card_title); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($card_subtitle) : ?>
                                    <p class="three-card-d-2026-card__subtitle">
                                        <?php echo nl2br(esc_html($card_subtitle)); ?>
                                    </p>
                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

            <?php if (
                is_array($button) &&
                !empty($button['url']) &&
                !empty($button['title'])
            ) : ?>
                <div class="three-card-d-2026-bottom-button">
                    <a
                        href="<?php echo esc_url($button['url']); ?>"
                        class="btn_red"
                        target="<?php echo esc_attr($button['target'] ?: '_self'); ?>"
                        <?php echo (($button['target'] ?? '') === '_blank') ? 'rel="noopener noreferrer"' : ''; ?>
                    >
                        <?php echo esc_html($button['title']); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
