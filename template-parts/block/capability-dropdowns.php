<?php

/**
 * Block Name: Capability Dropdowns
 *
 * This is the template that displays the capability dropdowns block.
 */

// create id attribute for specific styling
$id = 'capability-dropdowns-' . $block['id'];
?>

<section id="<?php echo esc_attr($id); ?>" class="capability-dropdowns">
    <div class="container">
        <div class="capability-dropdowns-wrapper">
            <div class="capability-dropdowns-wrapper__top">
                <h2><?php the_field('main_title'); ?></h2>
                <p><?php the_field('main_subtitle'); ?></p>
            </div>
            <div class="capability-dropdowns-wrapper__bottom">

                <?php
                if( have_rows('column') ):
                    while( have_rows('column') ) : the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        $italics = get_sub_field('italics');
                        $quote = get_sub_field('quote');
                        $quoter = get_sub_field('quoter');
                        $addQuote = get_sub_field('add_quote');
                        $addButton = get_sub_field('add_button'); // True/False field
                        $button = get_sub_field('button'); // Button Group field
                        ?>
                        <div class="capability-dropdowns-column">
                            <div class="column-top-wrapper">
                                <div class="column-top">
                                    <?php if ($image) : ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"/>
                                    <?php endif; ?>
                                </div>
                                <div class="column-bottom">
                                    <h5><?php echo esc_html($title); ?></h5>
                                    <p class="minor col-subtitle"><?php echo esc_html($subtitle); ?></p>
                                    <p class="minor italics"><?php echo esc_html($italics); ?></p>
                                </div>
                            </div>
                            
                            <div class="accordion-wrapper">
                                <?php
                                if( have_rows('dropdown') ):
                                    while( have_rows('dropdown') ) : the_row();
                                    $dropdown_title = get_sub_field('title');
                                    $content = get_sub_field('content');
                                    ?>
                                    <div class="accordion-item">
                                        <div class="accordion-item__title">
                                            <p class="bold"><?php echo esc_html($dropdown_title); ?></p>
                                            <img class="chevron" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/capability-dropdowns/chevron.svg" alt="Chevron"/>
                                        </div>
                                        <div class="accordion-item__content">
                                            <p class="minor"><?php echo esc_html($content); ?></p>
                                        </div>
                                    </div>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>

                            <?php if ($addQuote) : ?>
                                <div class="quote-wrapper">
                                    <p class="minor quote"><?php echo esc_html($quote); ?></p>
                                    <p class="minor italic"><?php echo esc_html($quoter); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php 
                            // Display button if add_button is checked
                            if ($addButton && !empty($button)): 
                                $button_text = $button['button_text'] ?? 'Click Here'; 
                                $button_url = $button['button_url'] ?? '#'; 
                                $button_target = $button['target'] ?? '_self';
                            ?>
                            <div class="button-wrapper">
                                <a href="<?php echo esc_url($button_url); ?>" class="btn btn_red" target="<?php echo esc_attr($button_target); ?>">
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            </div>
                            <?php endif; ?>

                        </div>
                <?php
                endwhile;   
                endif;
                ?>

            </div>
            
        </div>
    </div>

</section>
