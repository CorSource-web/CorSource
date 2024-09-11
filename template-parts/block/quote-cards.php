<?php

/**
 * Block Name: Quote Cards
 *
 * This is the template that displays the quote cards block.
 */

// create id attribute for specific styling
$id = 'quote-cards-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/quote-cards.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="quote-cards container">
    <p><?php the_field('subtitle'); ?></p>
    <div class="cards-wrapper">
        <?php
        if (have_rows('card')) :
            while (have_rows('card')) : the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $quote = get_sub_field('quote');
                $add_a_quote = get_sub_field('add_a_quote');
                $title = get_sub_field('title');
                $card_color = get_sub_field('card_color');
        ?>
                <div class="quotecard">
                    <div class="quotecard__top" style='background-color: <?php echo $card_color ?>'>
                        <img src="<?php echo $image; ?>" />
                    </div>
                    <div class="quotecard__bottom" style='background-color: <?php echo $card_color ?>'>
                        <h5><?php echo $title; ?></h5>
                        <?php
                        if (get_sub_field('quoter')) {
                            echo '<p>' . get_sub_field('quoter') . '</p>';
                        } ?>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</section>