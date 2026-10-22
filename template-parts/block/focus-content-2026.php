
<?php
/**
 * Block Name: 2026 Focus Content
 */

$id = 'focus-content-2026-' . $block['id'];

$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('image');

$left_title_1   = get_field('left_title_1');
$left_content_1 = get_field('left_content_1');

$left_title_2   = get_field('left_title_2');
$left_content_2 = get_field('left_content_2');

$right_title    = get_field('right_title');
$right_subtitle = get_field('right_subtitle');
$right_content  = get_field('right_content');

$image_url = '';
$image_alt = '';

if (is_array($image)) {
    $image_url = $image['url'] ?? '';
    $image_alt = $image['alt'] ?? '';
}
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="focus-content-2026"
>
    <div class="container">

        <div class="focus-content-2026-heading">

            <?php if ($title) : ?>
                <h2 class="focus-content-2026-title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($subtitle) : ?>
                <div class="focus-content-2026-subtitle">
                    <?php echo esc_html($subtitle); ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if ($image_url) : ?>
            <div class="focus-content-2026-image">
                <img
                    src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>"
                    loading="lazy"
                >
            </div>
        <?php endif; ?>

        <div class="focus-content-2026-columns">

            <div class="focus-content-2026-left">

                <?php if ($left_title_1 || $left_content_1) : ?>
                    <div class="focus-content-2026-left__section">

                        <?php if ($left_title_1) : ?>
                            <h3 class="focus-content-2026-left__title">
                                <?php echo esc_html($left_title_1); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($left_content_1) : ?>
                            <div class="focus-content-2026-left__content">
                                <?php echo wp_kses_post($left_content_1); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                <?php if ($left_title_2 || $left_content_2) : ?>
                    <div class="focus-content-2026-left__section">

                        <?php if ($left_title_2) : ?>
                            <h3 class="focus-content-2026-left__title">
                                <?php echo esc_html($left_title_2); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($left_content_2) : ?>
                            <div class="focus-content-2026-left__content">
                                <?php echo wp_kses_post($left_content_2); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

            </div>

            <div class="focus-content-2026-right">

                <?php if ($right_title) : ?>
                    <h3 class="focus-content-2026-right__title">
                        <?php echo esc_html($right_title); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($right_subtitle) : ?>
                    <h4 class="focus-content-2026-right__subtitle">
                        <?php echo esc_html($right_subtitle); ?>
                    </h4>
                <?php endif; ?>

                <?php if ($right_content) : ?>
                    <div class="focus-content-2026-right__content">
                        <?php echo wp_kses_post($right_content); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</section>
