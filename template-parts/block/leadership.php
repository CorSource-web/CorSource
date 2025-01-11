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
            <div class="titles-wrapper">
                <h1 class="title"><?php the_field('title'); ?></h1> 
            </div>

            <?php if( have_rows('leader') ): ?>
                <div class="leaders">
                    <?php while( have_rows('leader') ): the_row(); 
                        $name = get_sub_field('name') ?: 'No Name Provided';
                        $job = get_sub_field('job') ?: 'No Job Provided';
                        $picture = get_sub_field('picture');
                        $hover_content = get_sub_field('hover_content'); 
                        $linkedin_url = get_sub_field('linkedin_url'); 
                        $picture_url = isset($picture['url']) ? $picture['url'] : 'path/to/default-image.jpg';
                        $picture_alt = isset($picture['alt']) ? $picture['alt'] : $name;
                        $fun_fact = get_sub_field('fun_fact')
                    ?>

                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" class="leader">
                        <?php if( !empty($picture_url) ): ?>
                            <div class="leader-image-wrapper">
                                <img class="picture" src="<?php echo esc_url($picture_url); ?>" alt="<?php echo esc_attr($picture_alt); ?>" class="leader-picture">
                                    <div class="hover-content">
                                        <h2 class="leader-name"><?php echo esc_html($name); ?></h2>
                                        <p class="leader-job"><?php echo esc_html($job); ?></p>
                                        <p class="leader-job"><?php echo esc_html($fun_fact); ?></p> 
                                        <?php if ($linkedin_url): ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leadership/li.png" alt="LinkedIn">
                                        <?php endif; ?>
                                    </div>
                            </div>
                        <?php else: ?>
                            <p>No Picture Available</p>
                        <?php endif; ?>
                    </a>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No leaders found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
