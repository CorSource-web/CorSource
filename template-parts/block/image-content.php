<?php

/**
 * Block Name: Image Content
 *
 * This is the template that displays the Image Content block.
 */

// create id attribute for specific styling
$id = 'image-content-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/image-content.png' ?>" alt="">
<?php return;
endif;
?>

<section 
id="<?php echo $id; ?>" 
class="image-content container 
<?php echo get_field('reverse_columns') ? "reverse-columns" : "" ?>
">
    <div class="image-content__left" style='order: <?php echo the_field('reverse_columns') ? "1" : "" ?>'>
        <InnerBlocks />
    </div>

    <div class="image-content__right">
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