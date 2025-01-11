<?php

/**
 * Block Name: Leadership Hero
 *
 * This is the template that displays the leadership hero block with ACF using arrays.
 */

// Create ID attribute for specific styling
$id = 'leadership-hero-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/leadership-hero.png' ?>" alt="">
<?php return; endif;

// Fetch ACF fields using an array
$fields = get_fields();
$title = $fields['title'] ?? 'Default Title';
$subtitle = $fields['subtitle'] ?? 'Default Subtitle';
$image = $fields['image'] ?? null;

?>

<section id="<?php echo esc_attr($id); ?>" class="leadership-hero">
    <div class="container">
        <div class="leadership-hero-wrapper">
            <div class="titles-wrapper">
                <h1 class="leadership-hero-title"><?php echo esc_html($title); ?></h1>
                <h3 class="leadership-hero-subtitle"><?php echo esc_html($subtitle); ?></h3>
            </div>

            <?php if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Leadership Hero Image'); ?>" class="leadership-hero-image">
            <?php else : ?>
                <p>No Image Provided</p>
            <?php endif; ?>
        </div>
    </div>
</section>
