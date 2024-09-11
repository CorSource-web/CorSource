<?php

/**
 * Block Name: Graphic Cards
 *
 * This is the template that displays the Graphic Cards block.
 */

// create id attribute for specific styling
$id = 'graphic-cards-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/graphic-cards.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="graphic-cards container">
    <div class="cards-wrapper">
        <?php
        if (have_rows('card')) :
            while (have_rows('card')) : the_row();
                $image = get_sub_field('image');
                $mobile_image = get_sub_field('mobile_image');
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $background_color = get_sub_field('background_color');
        ?>
                <div class="card">
                    <div class="card__top"
                        style="background-color: <?php echo $background_color?>!important;">
                        <img class="desktop-image" src="<?php echo $image; ?>" />
                        <img class="mobile-image" src="<?php echo $mobile_image ? $mobile_image : $image; ?>" />
                    </div>
                    <div class="card__bottom">
                        <h5><?php echo $title; ?></h5>
                        <p><?php echo $subtitle; ?></p>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</section>