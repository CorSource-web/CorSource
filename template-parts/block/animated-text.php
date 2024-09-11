<?php

/**
 * Block Name: Animated Text
 *
 * This is the template that displays the animated text block.
 */

// create id attribute for specific styling
$id = 'animated-text-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="animated-text">
    <div class="container">
        <InnerBlocks />
    </div>
</section>