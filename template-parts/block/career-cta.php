<?php

/**
 * Block Name: Career Cta
 *
 * This is the template that displays the career cta block.
 */

// create id attribute for specific styling
$id = 'career-cta-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/career-cta.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="career-cta container <?php echo $block['className']; ?>">

    <div class="career-cta__left">

        <?php
        $left_column = get_field('left_column');
        if ($left_column) : ?>
            <div class="image-wrapper">
                <img src="<?php echo esc_url($left_column['image']); ?>" alt="" />
            </div>
            <h3><?php echo $left_column['title']; ?></h3>
            <?php
            if ($left_column['subtitle']) {
            ?><p><?php echo $left_column['subtitle']; ?></p><?php
                } else {
                    echo null;
                }
            ?>
            <?php
            if ($left_column['button_url']) {
            ?><a href="<?php echo $left_column['button_url']; ?>" class="btn_red"><?php echo $left_column['button_text']; ?></a><?php
                }
            ?>



        <?php endif; ?>

    </div>

    <div class="career-cta__right">

        <?php
        if (have_rows('right_column')) :
            while (have_rows('right_column')) : the_row();
                $quote = get_sub_field('quote');
                $quoter = get_sub_field('quoter');
        ?>
                <div class="quote-card">
                    <p class="quote"><?php echo $quote ?></p>
                    <p class="minor quoter italic"><?php echo $quoter ?></p>
                </div>
        <?php
            endwhile;
        endif;
        ?>

    </div>

</section>