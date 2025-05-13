<?php
/**
 * Block Name: Background Wrapper
 *
 * This is the template that displays a full-width background wrapper.
 */

// Create id attribute for specific styling
$id = 'background-wrapper-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/background-wrapper.png' ?>" alt="">
<?php return;
endif;

// Get background color with fallback
$bg_color = get_field('background_color') ?: '#ffffff';
?>

<section id="<?php echo $id; ?>" class="background-wrapper" style="background-color:<?php echo esc_attr($bg_color); ?>;">
    <div class="container">
        <InnerBlocks />
    </div>
</section>