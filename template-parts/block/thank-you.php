<?php

/**
 * Block Name: Thank You
 *
 * This is the template that displays the Thank You block.
 */

// create id attribute for specific styling
$id = 'thank-you-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/thank-you.png' ?>" alt="">
<?php return;
endif;
?>

<section 
id="<?php echo $id; ?>" 
class="thank-you container">
    <div class="thank-you__left">
        <InnerBlocks />
    </div>

    <div class="thank-you__right">
        <?php if (get_field('right_column')) : ?>
            <div class="image-wrapper parallax-wrapper">
                <img src="<?php the_field('right_column'); ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="image-wrapper-mobile">
            <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('right_column'); ?>" alt="">
        </div>
    </div>

</section>