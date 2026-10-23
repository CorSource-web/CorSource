
<?php
/**
 * Block Name: 2026 Our Team
 *
 * Centered heading and subtitle with three image/content rows.
 */

$id = 'our-team-2026-' . $block['id'];

$title    = get_field('title');
$subtitle = get_field('subtitle');
$rows     = get_field('rows');

$classes = 'our-team-2026';

if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($classes); ?>"
>
    <div class="container">
        <div class="our-team-2026-inner">

            <?php if ($title || $subtitle) : ?>
                <div class="our-team-2026-heading">

                    <?php if ($title) : ?>
                        <h2 class="our-team-2026-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <p class="our-team-2026-subtitle">
                            <?php echo nl2br(esc_html($subtitle)); ?>
                        </p>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($rows) && is_array($rows)) : ?>
                <div class="our-team-2026-rows">

                    <?php foreach ($rows as $row) :

                        $image       = $row['image'] ?? null;
                        $row_title   = $row['title'] ?? '';
                        $description = $row['description'] ?? '';

                        $image_url = is_array($image)
                            ? ($image['url'] ?? '')
                            : '';

                        $image_alt = is_array($image)
                            ? ($image['alt'] ?: $row_title)
                            : $row_title;
                    ?>

                        <article class="our-team-2026-row">

                            <?php if ($image_url) : ?>
                                <div class="our-team-2026-row__image">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="our-team-2026-row__content">

                                <?php if ($row_title) : ?>
                                    <h3 class="our-team-2026-row__title">
                                        <?php echo esc_html($row_title); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($description) : ?>
                                    <p class="our-team-2026-row__description">
                                        <?php echo nl2br(esc_html($description)); ?>
                                    </p>
                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
