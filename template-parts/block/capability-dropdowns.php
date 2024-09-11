<?php

/**
 * Block Name: Capability Dropdowns
 *
 * This is the template that displays the capability dropdowns block.
 */

// create id attribute for specific styling
$id = 'capability-dropdowns-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="capability-dropdowns">
    <div class="container">
        <div class="capability-dropdowns-wrapper">
            <div class="capability-dropdowns-wrapper__top">
                <h2><?php the_field('main_title')?></h2>
                <p><?php the_field('main_subtitle')?></p>
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
                        $addQuote = get_sub_field('add_quote')
                        ?>
                        <div class="capability-dropdowns-column">
                            <div class="column-top-wrapper">
                                <div class="column-top">
                                    <img src="<?php echo $image?>"/>
                                </div>
                                <div class="column-bottom">
                                    <h5><?php echo $title?></h5>
                                    <p class="minor col-subtitle"><?php echo $subtitle?></p>
                                    <p class="minor italics"><?php echo $italics?></p>
                                </div>
                            </div>
                            <div class="accordion-wrapper">
                                <?php
                                if( have_rows('dropdown') ):
                                    while( have_rows('dropdown') ) : the_row();
                                    $title = get_sub_field('title');
                                    $content = get_sub_field('content');

                                    ?>
                                    <div class="accordion-item">
                                        <div class="accordion-item__title">
                                            <p class="bold"><?php echo $title?></p>
                                            <img class="chevron" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/capability-dropdowns/chevron.svg"/>
                                        </div>
                                        <div class="accordion-item__content">
                                            <p class="minor"><?php echo $content?></p>
                                        </div>
                                    </div>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <?php if ($addQuote) { ?>
                            <div class="quote-wrapper">
                                <p class="minor quote"><?php echo $quote; ?></p>
                                <p class="minor italic"><?php echo $quoter; ?></p>
                            </div>
                        <?php } ?>
              

                </div>
                <?php
                endwhile;   
                endif;
                ?>

            </div>
            
        </div>
    </div>

</section>