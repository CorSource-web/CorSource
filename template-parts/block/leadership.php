<?php

/**
 * Block Name: Leadership
 *
 * This is the template that displays the Leadership block.
 */

// create id attribute for specific styling
$id = 'leadership-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/leadership.png' ?>" alt="">
<?php return; endif;
?>

<section id="<?php echo $id; ?>" class="leadership">
    <div class="container">
        <div class="leadership-wrapper">
            <h1>Leadership</h1>

            <?php if( have_rows('leader') ): ?>
                <div class="leaders">
                    <?php while( have_rows('leader') ): the_row(); 
                        // Get subfields for each leader with error handling
                        $name = get_sub_field('name') ?: 'No Name Provided';
                        $job = get_sub_field('job') ?: 'No Job Provided';
                        $picture = get_sub_field('picture');

                        // Check if the picture is an image and return a default if not
                        $picture_url = isset($picture['url']) ? $picture['url'] : 'path/to/default-image.jpg';
                        $picture_alt = isset($picture['alt']) ? $picture['alt'] : $name;
                    ?>
                    <div class="leader">
                        <?php if( !empty($picture_url) ): ?>
                            <img src="<?php echo esc_url($picture_url); ?>" alt="<?php echo esc_attr($picture_alt); ?>" class="leader-picture masked-image">
                        <?php else: ?>
                            <p>No Picture Available</p>
                        <?php endif; ?>
                        <h2 class="leader-name"><?php echo esc_html($name); ?></h2>
                        <p class="leader-job"><?php echo esc_html($job); ?></p>
                    </div>

                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No leaders found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
