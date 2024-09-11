<?php

/**
 * Block Name: Content Quote With Image
 *
 * This is the template that displays the Content Quote With Image block.
 */

// create id attribute for specific styling
$id = 'content-quote-with-image-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/content-quote-with-image.png' ?>" alt="">
<?php return; endif;

$larger_left_hand_column = get_field('larger_left_hand_column');
$grid_template_column = $larger_left_hand_column ? "1.5fr 1fr;" : "1fr 1fr;";
?>

<section 
id="<?php echo $id; ?>" 
class="content-quote-with-image container"
style="grid-template-columns: <?php echo $grid_template_column; ?>">
    <div class="content-quote-with-image__left">
    <?php if( get_field('image') ): ?>
      <img
        src="<?php the_field('image'); ?>"
        style="background-color:<?php echo get_field('image_has_background_color') ? the_field('image_background_color') : null ?>;"
        class="<?php echo get_field('image_has_background_color') ? 'image-has-background': ''; ?>"
      />
    <?php endif; ?>
    </div>
    <div class="content-quote-with-image__right">
        <div class="top">
            <h4><?php the_field('title'); ?></h4>
            <p><?php the_field('subtitle'); ?></p>

        </div>
        <div class="bottom">
            <p class="quote"><?php the_field('quote'); ?></p>
            <p class="italic"><?php the_field('quoter'); ?></p>
        </div>
    </div>

</section>