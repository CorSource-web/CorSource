<?php
// Load block parts

add_action('acf/init', 'init_acf_fields');
function init_acf_fields()
{
    // check function exists
    if (function_exists('acf_register_block')) {

        // register hero block
        acf_register_block(array(
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('Custom Hero'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'cover-image',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('hero', 'masthead'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )

        ));

        // register three card row block
        acf_register_block(array(
            'name'              => 'three-card-row',
            'title'             => __('Three Card Row'),
            'description'       => __('Three Card Row'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'admin-page',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('three', 'card', 'row'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register info cards
        acf_register_block(array(
            'name'              => 'info-cards',
            'title'             => __('Info Cards'),
            'description'       => __('Row of cards with content and an optional cta'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'columns',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('info cards', 'card'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register quote cards
        acf_register_block(array(
            'name'              => 'quote-cards',
            'title'             => __('Quote Cards'),
            'description'       => __('Quote Cards'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'columns',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('quote', 'cards'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register content quote with image
        acf_register_block(array(
            'name'              => 'content-quote-with-image',
            'title'             => __('Content Quote With Image'),
            'description'       => __('Content Quote With Image on Client Page'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'format-quote',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Content Quote With Image', 'content'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register two column block
        acf_register_block(array(
            'name'              => 'two-column-content',
            'title'             => __('Two Column Content'),
            'description'       => __('Two Column Content'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'columns',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Two Column Content'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register card grid block
        acf_register_block(array(
            'name'              => 'card-grid',
            'title'             => __('Card Grid'),
            'description'       => __('Card Grid'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'images-alt',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Card Grid'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register testimonial block
        acf_register_block(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial Slider'),
            'description'       => __('Horizontal slider displaying testimonials'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'testimonial',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('testimonial', 'slider'),
            'enqueue_assets' => function () {
                wp_enqueue_script(
                    'jquery',
                    get_template_directory_uri() . '/assets/jquery.min.js',
                    null,
                    22
                );

                wp_enqueue_script(
                    'slick',
                    'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
                    null,
                    22
                );

                wp_enqueue_script(
                    'testimonial',
                    get_template_directory_uri() . '/assets/js/testimonial.js',
                    null,
                    22
                );
            },
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register banner block
        acf_register_block(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('Banner'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'button',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('banner', 'cta'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register career cta block
        acf_register_block(array(
            'name'              => 'career-cta',
            'title'             => __('Career Cta'),
            'description'       => __('Career Cta'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Career Cta'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register page hero block
        acf_register_block(array(
            'name'              => 'page-hero',
            'title'             => __('Page Hero'),
            'description'       => __('Page Hero'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'cover-image',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Page Hero'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            ),
            'enqueue_assets' => function () {
                wp_enqueue_script(
                    'jquery',
                    get_template_directory_uri() . '/assets/jquery.min.js',
                    null,
                    22
                );
                wp_enqueue_script(
                    'page-hero-script',
                    get_template_directory_uri() . '/assets/js/page-hero.js',
                    null,
                    22
                );
            },

        ));

        // register capability dropdowns block
        acf_register_block(array(
            'name'              => 'capability-dropdowns',
            'title'             => __('Capability Dropdowns'),
            'description'       => __('Capability Dropdowns'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Capability Dropdowns'),
            'enqueue_assets' => function () {
                wp_enqueue_script(
                    'jquery',
                    get_template_directory_uri() . '/assets/jquery.min.js',
                    null,
                    22
                );
                wp_enqueue_script(

                    'capability-dropdowns-script',
                    get_template_directory_uri() . '/assets/js/capability-dropdowns.js',
                    null,
                    22
                );
            },
        ));

        // register source aq cta block
        acf_register_block(array(
            'name'              => 'source-aq-cta',
            'title'             => __('Source Aq Cta'),
            'description'       => __('Source Aq Cta'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),

            'keywords'          => array('Source Aq Cta'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register page our services block
        acf_register_block(array(
            'name'              => 'our-services',
            'title'             => __('Our Services'),
            'description'       => __('Our Services'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,

            ),
            'keywords'          => array('Our Services'),
            'enqueue_assets' => function () {
                wp_enqueue_script(
                    'jquery',
                    get_template_directory_uri() . '/assets/jquery.min.js',
                    null,
                    22
                );
                wp_enqueue_script(

                    'our-services-script',
                    get_template_directory_uri() . '/assets/js/our-services.js',
                    null,
                    22
                );
            },
        ));

        // register animated text block
        acf_register_block(array(
            'name'              => 'animated-text',
            'title'             => __('Animated Text'),
            'description'       => __('Wrapper that center aligns and animates text'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('text'),
        ));
        // register inline hero
        acf_register_block(array(
            'name'              => 'inline hero',
            'title'             => __('Inline Hero'),
            'description'       => __('This is an image hero with parallax'),
            'render_callback'   => 'block_renderer',
            'category'          => 'text',
            'icon'              => 'cover-image',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('inline hero', 'masthead'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register page image content block
        acf_register_block(array(
            'name'              => 'image-content',
            'title'             => __('Image Content'),
            'description'       => __('Image Content'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'images-alt',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('Image Content'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source meet cta block
        acf_register_block(array(
            'name'              => 'meet-cta-block',
            'title'             => __('Meet Cta Block'),
            'description'       => __('Meet Cta Block'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Meet Cta Block'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source clients block
        acf_register_block(array(
            'name'              => 'clients',
            'title'             => __('Clients'),
            'description'       => __('Clients'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Clients'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source consultants block
        acf_register_block(array(
            'name'              => 'consultants',
            'title'             => __('Consultants'),
            'description'       => __('Consultants'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('Consultants'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source general block
        acf_register_block(array(
            'name'              => 'general',
            'title'             => __('General'),
            'description'       => __('General'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
            ),
            'keywords'          => array('General'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source thank you
        acf_register_block(array(
            'name'              => 'thank-you',
            'title'             => __('Thank You'),
            'description'       => __('Thank You'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('Thank You'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source manifest
        acf_register_block(array(
            'name'              => 'manifesto',
            'title'             => __('Manifesto'),
            'description'       => __('Manifesto'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('Manifesto'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));


        // register source graphic cards
        acf_register_block(array(
            'name'              => 'graphic-cards',
            'title'             => __('Graphic Cards'),
            'description'       => __('Graphic Cards'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('Graphic Cards'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));

        // register source AQ resource center
        acf_register_block(array(
            'name'              => 'source-aq',
            'title'             => __('Source AQ'),
            'description'       => __('Renders source AQ resource center'),
            'render_callback'   => 'block_renderer',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'align'           => 'full',
            'supports'        => array(
                'align' => array('full'),
                'jsx'             => true,
            ),
            'keywords'          => array('Source AQ'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image' => [],
                    )
                )
            )
        ));
    }
}

function block_renderer($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/template-parts/block/{$slug}.php"))) {
        include(get_theme_file_path("/template-parts/block/{$slug}.php"));
    }
}
