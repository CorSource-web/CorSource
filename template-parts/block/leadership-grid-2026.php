
<?php
/**
 * Block Name: 2026 Leadership Grid
 *
 * Centered heading and six portrait images in a
 * three-column grid inside a white panel.
 */

$id = 'leadership-grid-2026-' . $block['id'];

$title = get_field('title');
$people = get_field('people');

$classes = 'leadership-grid-2026';

if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($classes); ?>"
>
    <div class="container">
        <div class="leadership-grid-2026-inner">

            <?php if ($title) : ?>
                <h2 class="leadership-grid-2026-title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($people) && is_array($people)) : ?>
                <div class="leadership-grid-2026-grid">

                    <?php foreach ($people as $person) :
                        $image = $person['image'] ?? null;

                        if (!is_array($image) || empty($image['url'])) {
                            continue;
                        }

                        $image_url = $image['url'];
                        $image_alt = $image['alt'] ?? '';
                    ?>
                        <div class="leadership-grid-2026-person">
                            <img
                                src="<?php echo esc_url($image_url); ?>"
                                alt="<?php echo esc_attr($image_alt); ?>"
                                loading="lazy"
                            >
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
