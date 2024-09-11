<?php

/**
 * Block Name: Source AQ
 *
 * This is the template that displays the resource center.
 */

// create id attribute for specific styling
$id = 'thank-you-' . $block['id'];
if (isset($block['data']['preview_image'])) : ?>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/block-previews/source-aq.png' ?>" alt="">
<?php return;
endif;

$search = get_query_var('search') ? get_query_var('search') : '';
?>

<section id="<?php echo $id; ?>" class="source-aq">
    <div class="page-hero">
        <div class="container">
            <div class="monitor-linen-bars"></div>
            <div class="page-hero-wrapper">
                <div class="page-hero-wrapper__left">
                    <h1><?php the_field('title'); ?></h1>
                    <p><?php the_field('subtitle'); ?></p>
                </div>

                <div class="page-hero-wrapper__right">
                    <?php $image = get_field('image'); ?>
                    <?php if ($image) : ?>
                        <div class="desktop-image parallax-wrapper">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="mobile-image parallax-wrapper">
                        <img src="<?php echo get_field('mobile_image') ? get_field('mobile_image') : $image['url']; ?>" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="resources__filters">
        <div class="container">
            <div class="select-wrapper">
                <select name="cat" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                    <option value="<?php echo esc_url(home_url() . '/source-aq') ?>"><?php echo esc_attr_e('All Resources', 'textdomain'); ?></option>
                    <?php
                    $args = array(
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'hide_empty' => 0,
                    );

                    $categories = get_categories($args);
                    foreach ($categories as $category) {
                        $term_link = esc_url(home_url() . '/source-aq?cat=' . $category->term_id);
                        $selected = get_query_var('cat') == $category->term_id ? 'selected' : '';
                        if ($category->cat_name !== 'Uncategorized') {
                            echo '<option ' . $selected . ' value="' . $term_link . '">' . $category->cat_name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="search-wrapper">
                <form id="rc-search" method='get' action='<?php echo home_url(); ?>/source-aq'>
                    <input name='search' type="text" placeholder="SEARCH" value="<?php echo $search; ?>" />
                </form>
            </div>
        </div>
    </div>
    <div class="resources">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $query = new WP_Query(
            array(
                'paged'         => $paged,
                'cat' => get_query_var('cat'),
                'order'         => 'DESC',
                'orderby'       => 'date',
                'post_type'     => 'resource',
                'post_status'   => 'publish',
                'posts_per_page' => 9,
                's' => $search
            )
        ); ?>
        <div class="resources__inner container">
            <div class="resources__result-prompt">
                <?php if ($search !== '' && $query->have_posts()) : ?>
                    <p>Showing results for: <strong><?php echo $search; ?></strong></p>
                <?php endif; ?>

                <?php if (!$query->have_posts() && $search !== '') : ?>
                    <p>There are no results for: <strong><?php echo $search; ?></strong></p>
                <?php endif; ?>
            </div>

            <div class="resources__cards">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <a href="<?php the_field('resource_url', get_the_ID()); ?>" target="<?php echo get_field('open_resource_in_a_new_tab', get_the_ID()) ? '_blank' : ''; ?>" class="resources__card">
                            <?php the_post_thumbnail(); ?>
                            <div class="resources__card-content">
                                <h5><?php the_title(); ?></h5>
                                <div class="desc"><?php the_field('short_description', get_the_ID()); ?></div>
                                <button class="btn_red"><?php the_field('reading_time', get_the_ID()); ?> MIN READ</button>
                            </div>
                        </a>
                    <?php endwhile; ?>
            </div>

            <div class="resources__pagination">
                <?php if ($query->max_num_pages > 1) : ?>
                    Pg.
                <?php
                        echo paginate_links(array(
                            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'total'        => $query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => false,
                            'add_args'     => false,
                            'add_fragment' => '',
                        ));

                    endif;
                ?>
            </div>

        <?php
                    wp_reset_postdata();
                endif;
        ?>
        </div>

    </div>
</section>