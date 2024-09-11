<?php

/**
 * Block Name: Manifesto
 *
 * This is the template that displays the Manifesto block.
 */

// create id attribute for specific styling
$id = 'manifesto-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/manifesto.png' ?>" alt="">
<?php return; endif;
?>

<section id="<?php echo $id; ?>" class="manifesto container">
    <div class="left">
        <h5 class="eyebrow"> <?php the_field('eyebrow') ?></h5>
        <h3> <?php the_field('top_title') ?></h3>
        <ul>
        <?php
        if( have_rows('list_items') ):
            while( have_rows('list_items') ) : the_row();
                $item = get_sub_field('list_item');
                ?> 
                <li><?php echo $item ?></li>
                <?php
            endwhile;

        endif;
        ?>
        </ul>
        <h3 class="bottom-title"> <?php the_field('bottom_title') ?></h3>

    </div>

    <div class="right">
        <?php if (get_field('image')) : ?>
        <div>
            <img src="<?php the_field('image'); ?>" alt="">
        </div>
        <?php endif; ?>
    </div>

</section>