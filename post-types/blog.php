<?php

/**
 * Registers the `blog` post type.
 */
function blog_init() {
	register_post_type( 'blog', array(
		'labels'                => array(
			'name'                  => __( 'Blog', 'evolv-api' ),
			'singular_name'         => __( 'Blog', 'evolv-api' ),
			'all_items'             => __( 'All Blog', 'evolv-api' ),
			'archives'              => __( 'Blog Archives', 'evolv-api' ),
			'attributes'            => __( 'Blog Attributes', 'evolv-api' ),
			'insert_into_item'      => __( 'Insert into Blog', 'evolv-api' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'evolv-api' ),
			'featured_image'        => _x( 'Featured Image', 'Blog', 'evolv-api' ),
			'set_featured_image'    => _x( 'Set featured image', 'Blog', 'evolv-api' ),
			'remove_featured_image' => _x( 'Remove featured image', 'Blog', 'evolv-api' ),
			'use_featured_image'    => _x( 'Use as featured image', 'Blog', 'evolv-api' ),
			'filter_items_list'     => __( 'Filter Blog list', 'evolv-api' ),
			'items_list_navigation' => __( 'Blog list navigation', 'evolv-api' ),
			'items_list'            => __( 'Blog list', 'evolv-api' ),
			'new_item'              => __( 'New Blog', 'evolv-api' ),
			'add_new'               => __( 'Add New', 'evolv-api' ),
			'add_new_item'          => __( 'Add New Blog', 'evolv-api' ),
			'edit_item'             => __( 'Edit Blog', 'evolv-api' ),
			'view_item'             => __( 'View Blog', 'evolv-api' ),
			'view_items'            => __( 'View Blog', 'evolv-api' ),
			'search_items'          => __( 'Search Blog', 'evolv-api' ),
			'not_found'             => __( 'No Blog found', 'evolv-api' ),
			'not_found_in_trash'    => __( 'No Blog found in trash', 'evolv-api' ),
			'parent_item_colon'     => __( 'Parent Blog:', 'evolv-api' ),
			'menu_name'             => __( 'Blog', 'evolv-api' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' 						=> array('category'),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-open-folder',
		'show_in_rest'          => true,
		'rest_base'             => 'blog',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'blog_init' );

/**
 * Sets the post updated messages for the `blog` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `blog` post type.
 */
function blog_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['blog'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'blog updated. <a target="_blank" href="%s">View blog</a>', 'evolv-api' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'evolv-api' ),
		3  => __( 'Custom field deleted.', 'evolv-api' ),
		4  => __( 'blog updated.', 'evolv-api' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'blog restored to revision from %s', 'evolv-api' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'blog published. <a href="%s">View blog</a>', 'evolv-api' ), esc_url( $permalink ) ),
		7  => __( 'blog saved.', 'evolv-api' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'blog submitted. <a target="_blank" href="%s">Preview blog</a>', 'evolv-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'blog scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview blog</a>', 'evolv-api' ),
		date_i18n( __( 'M j, Y @ G:i', 'evolv-api' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'blog draft updated. <a target="_blank" href="%s">Preview blog</a>', 'evolv-api' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'blog_updated_messages' );