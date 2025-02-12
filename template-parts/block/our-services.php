<?php

/**
 * Block Name: Our Services
 *
 * This is the template that displays the our services block.
 */

// create id attribute for specific styling
$id = 'our-services-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="our-services">
    <div class="container">
        <div class="our-services-wrapper">
            <div class="our-services__top">
                <!-- Main Title and Subtitle -->
                <h2 class="reveal-text"><?php the_field('main_title'); ?></h2>
                <p class="reveal-text"><?php the_field('main_subtitle'); ?></p>
                
                <!-- Image (Desktop) -->
                <?php if (get_field('image')) : 
                    $remove_mask_class = get_field('remove_mask_on_image') ? 'remove-the-mask' : '';
                ?>
                    <div class="image-wrapper">
                        <div class="image parallax-wrapper <?php echo $remove_mask_class; ?>">
                            <img src="<?php the_field('image'); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Mobile Image -->
                <?php if (get_field('image') || get_field('mobile_image')) : 
                    $remove_mask_class = get_field('remove_mask_on_image') ? 'remove-the-mask' : '';
                ?>
                    <div class="mobile-image-wrapper">
                        <div class="mobile-image parallax-wrapper <?php echo $remove_mask_class; ?>">
                            <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : get_field('image'); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <div class="our-services__bottom">
                <!-- Left Column -->
                <div class="left">
                    <h3><?php the_field('left_column_title'); ?></h3>
                    <p><?php the_field('left_column_content'); ?></p>
                </div>

                <!-- Right Column with Accordion -->
                <div class="right">
                    <?php if (have_rows('dropdown')) : ?>
                        <?php while (have_rows('dropdown')) : the_row();
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
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
