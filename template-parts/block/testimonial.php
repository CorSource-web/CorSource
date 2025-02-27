<?php

/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// If Gutenberg preview, show an image instead
if (isset($block['data']['preview_image']) || is_admin()) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/testimonial.png' ?>" alt="Preview of the Testimonial block">
    <?php return;
endif;
?>


<?php 
$background = get_field('background') ? get_field('background') : '#ffffff'; 
$button = get_field('button'); 
$addButton = get_field('add_button');
?>

<section id="<?php echo esc_attr($id); ?>" class="testimonial" style="background-color: <?php echo esc_attr($background); ?>">
    <div class="container">
        
        <?php if ($title = get_field('title')) : ?>
            <p class="minor testimonial__title"><?php echo esc_html($title); ?></p>
        <?php endif; ?>

        <div class="testimonial__slides">
            <?php if ($testimonials = get_field('testimonials')) : ?>
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="testimonial__quote">
                        <h3 class="quote-only"><?php echo esc_html($testimonial['quote']); ?></h3>
                        <p class="italic"><?php echo esc_html($testimonial['name']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if ($addButton && $button) : ?>
            <a href="<?php echo esc_url($button['url']); ?>" class="btn_red"><?php echo esc_html($button['text']); ?></a>
        <?php endif; ?>
    </div>
</section>
