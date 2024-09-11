<?php

/**
 * Block Name: Source Aq Cta
 *
 * This is the template that displays the Source Aq Cta block.
 */

// create id attribute for specific styling
$id = 'source-aq-cta-' . $block['id'];
$content = get_field('content');
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/source-aq-cta.png' ?>" alt="">
<?php return;
endif;
?>

<section id="<?php echo $id; ?>" class="source-aq-cta">
    <div class="container">
        <div class="source-aq-cta-wrapper">
            <div class="source-aq-cta-wrapper__left">
                <div class="content-wrapper">
                    <?php the_field('left_column_content'); ?>
                </div>
                <?php
                $button = get_field('button');
                if ($button) : ?>
                    <div class="btn-wrapper">
                        <a href="<?php echo esc_url($button['url']); ?>" class="btn_red"><?php echo $button['text'] ?></a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="source-aq-cta-wrapper__right">
                <?php if (get_field('image')) : ?>
                    <div class="parallax-wrapper desktop-image">
                        <img src="<?php the_field('image'); ?>" />
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

</section>