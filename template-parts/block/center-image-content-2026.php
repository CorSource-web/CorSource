
<?php
/**
 * 2026 Center Image Content
 */

if (!defined('ABSPATH')) {
    exit;
}

$title    = get_field('title');
$subtitle = get_field('subtitle');
$image    = get_field('image');

$left_title   = get_field('left_title');
$left_content = get_field('left_content');
$left_button  = get_field('left_button');

$right_title   = get_field('right_title');
$right_content = get_field('right_content');
$right_button  = get_field('right_button');

$block_id = !empty($block['anchor'])
    ? $block['anchor']
    : 'center-image-content-2026-' . ($block['id'] ?? uniqid());

$classes = 'center-image-content-2026';

if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
?>

<section
    id="<?php echo esc_attr($block_id); ?>"
    class="<?php echo esc_attr($classes); ?>"
>
    <div class="container">
        <div class="center-image-content-2026__inner">

            <?php if ($title || $subtitle) : ?>
                <div class="center-image-content-2026__heading">

                    <?php if ($title) : ?>
                        <h2 class="center-image-content-2026__title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <div class="center-image-content-2026__subtitle">
                            <?php echo wp_kses_post($subtitle); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($image)) : ?>
                <div class="center-image-content-2026__image">
                    <?php
                    if (!empty($image['ID'])) {
                        echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            [
                                'loading' => 'lazy',
                                'class' => 'center-image-content-2026__img',
                            ]
                        );
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="center-image-content-2026__columns">

                <div class="center-image-content-2026__column">

                    <?php if ($left_title) : ?>
                        <h3 class="center-image-content-2026__column-title">
                            <?php echo esc_html($left_title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($left_content) : ?>
                        <div class="center-image-content-2026__content">
                            <?php echo wp_kses_post($left_content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($left_button['url'])) : ?>
                        <div class="center-image-content-2026__button">
                            <a
                                class="btn_red"
                                href="<?php echo esc_url($left_button['url']); ?>"
                                target="<?php echo esc_attr($left_button['target'] ?: '_self'); ?>"
                                <?php echo ($left_button['target'] ?? '') === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            >
                                <?php echo esc_html($left_button['title'] ?: 'Learn More'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="center-image-content-2026__column">

                    <?php if ($right_title) : ?>
                        <h3 class="center-image-content-2026__column-title">
                            <?php echo esc_html($right_title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($right_content) : ?>
                        <div class="center-image-content-2026__content">
                            <?php echo wp_kses_post($right_content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($right_button['url'])) : ?>
                        <div class="center-image-content-2026__button">
                            <a
                                class="btn_red"
                                href="<?php echo esc_url($right_button['url']); ?>"
                                target="<?php echo esc_attr($right_button['target'] ?: '_self'); ?>"
                                <?php echo ($right_button['target'] ?? '') === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            >
                                <?php echo esc_html($right_button['title'] ?: 'Learn More'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>
    </div>
</section>
