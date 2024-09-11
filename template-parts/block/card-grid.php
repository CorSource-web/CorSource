<?php

/**
 * Block Name: Card Grid
 *
 * This is the template that displays the card grid block.
 */

// create id attribute for specific styling
$id = 'card-grid-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/card-grid.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="card-grid container">


    <?php if (have_rows('cards')) : ?>
        <?php while (have_rows('cards')) : the_row();

            // Get sub field values.
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $content = get_sub_field('content');

        ?>

            <div class="card-grid__card">
                <div class="card-grid__card__top">
                    <img src="<?php echo $image; ?>" alt="" />
                </div>

                <div class="card-grid__card__bottom">
                    <h5><?php echo  $title; ?></h5>
                    <div><?php echo $content; ?></div>
                </div>

            </div>


        <?php endwhile; ?>
    <?php endif; ?>



</section>