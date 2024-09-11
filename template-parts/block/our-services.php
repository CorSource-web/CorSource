<?php

/**
 * Block Name: Our Services
 *
 * This is the template that displays the our services block.
 */

// create id attribute for specific styling
$id = 'our-services-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="our-services <?php echo $block['className']; ?>">
    <div class="container">
        <div class="our-services-wrapper">

            <div class="our-services__top">
                <h2 class="<?php echo is_admin() ? '' : 'reveal-text' ?>"><?php the_field('main_title'); ?></h2>
                <p class="<?php echo is_admin() ? '' : 'reveal-text' ?>"><?php the_field('main_subtitle'); ?></p>
                <?php if (get_field('image')) : ?>
                    <div class="image-wrapper ">
                        <div class="image parallax-wrapper">
                            <img src="<?php the_field('image'); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (get_field('image') || get_field('mobile_image')) : ?>
                    <div class="mobile-image-wrapper">
                        <div class="mobile-image parallax-wrapper">
                            <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('image'); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>


            </div>

            <div class="our-services__bottom">

                <div class="left">
                    <h3><?php the_field('left_column_title'); ?></h3>
                    <p><?php the_field('left_column_content'); ?></p>
                </div>

                <div class="right">

                    <?php

                    if (have_rows('dropdown')) :
                        while (have_rows('dropdown')) : the_row();
                            $title = get_sub_field('title');
                            $content = get_sub_field('content');
                    ?>
                            <div class="accordion-item">
                                <div class="accordion-item__title">
                                    <h4><?php echo $title; ?></h4>
                                    <img class="chevron" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-services/chevron.svg" />
                                </div>
                                <div class="accordion-item__content">
                                    <p><?php echo $content; ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </div>
            </div>
            <InnerBlocks />
        </div>
    </div>

</section>