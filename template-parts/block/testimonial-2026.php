<?php

/**
 * Block Name: 2026 Testimonial
 */

$id = 'testimonial-2026-' . $block['id'];

$testimonials = get_field('testimonials');
$button       = get_field('button');

$button_text = $button['button_text'] ?? '';
$button_url  = $button['url'] ?? '';
?>

<section
    id="<?php echo esc_attr($id); ?>"
    class="testimonial-2026"
>
    <div class="container">

        <div class="testimonial-2026-inner">

            <?php if ($testimonials) : ?>

                <div class="testimonial-2026-slider">

                    <?php foreach ($testimonials as $testimonial) :

                        $image = $testimonial['image'] ?? '';
                        $name  = $testimonial['name'] ?? '';
                        $job   = $testimonial['job'] ?? '';
                        $icon  = $testimonial['icon'] ?? '';
                        $quote = $testimonial['quote'] ?? '';
                    ?>

                        <div class="testimonial-2026-slide">

                            <div class="testimonial-2026-person">

                                <?php if ($image) : ?>
                                    <div class="testimonial-2026-person__image">
                                        <img
                                            src="<?php echo esc_url($image); ?>"
                                            alt="<?php echo esc_attr($name); ?>"
                                        >
                                    </div>
                                <?php endif; ?>

                                <?php if ($name) : ?>
                                    <div class="testimonial-2026-person__name">
                                        <?php echo esc_html($name); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($job) : ?>
                                    <div class="testimonial-2026-person__job">
                                        <?php echo esc_html($job); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($icon) : ?>
                                    <div class="testimonial-2026-person__icon">
                                        <img
                                            src="<?php echo esc_url($icon); ?>"
                                            alt=""
                                        >
                                    </div>
                                <?php endif; ?>

                            </div>


                            <div class="testimonial-2026-content">

                                <?php if ($quote) : ?>
                                    <div class="testimonial-2026-quote">
                                        <?php echo wpautop(wp_kses_post($quote)); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($button_text && $button_url) : ?>
                                    <div class="testimonial-2026-button-wrapper">

                                        <a
                                            href="<?php echo esc_url($button_url); ?>"
                                            class="btn_red testimonial-2026-button"
                                        >
                                            <?php echo esc_html($button_text); ?>
                                        </a>

                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>

    </div>
</section>