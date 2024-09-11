<?php

/**
 * Block Name: Two Column Content
 *
 * This is the template that displays the Two Column Content block.
 */

// create id attribute for specific styling
$id = 'two-column-content-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/two-column-content.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" 
class="two-column-content container">

    <div class="two-column-content__left">
        <?php the_field('left_column_content'); ?>
    </div>

    <div 
    class="two-column-content__right"
    style="background-color:<?php the_field('right_column_background_color'); ?>">
        <?php the_field('right_column_content'); ?>
    </div>

</section>