<?php

/**
 * Registers the `resource` post type.
 */
function resource_init() {
	register_post_type(
		'resource',
		[
			'labels'                => [
				'name'                  => __( 'Resources', 'cor' ),
				'singular_name'         => __( 'Resource', 'cor' ),
				'all_items'             => __( 'All Resources', 'cor' ),
				'archives'              => __( 'Resource Archives', 'cor' ),
				'attributes'            => __( 'Resource Attributes', 'cor' ),
				'insert_into_item'      => __( 'Insert into Resource', 'cor' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'cor' ),
				'featured_image'        => _x( 'Featured Image', 'resource', 'cor' ),
				'set_featured_image'    => _x( 'Set featured image', 'resource', 'cor' ),
				'remove_featured_image' => _x( 'Remove featured image', 'resource', 'cor' ),
				'use_featured_image'    => _x( 'Use as featured image', 'resource', 'cor' ),
				'filter_items_list'     => __( 'Filter Resources list', 'cor' ),
				'items_list_navigation' => __( 'Resources list navigation', 'cor' ),
				'items_list'            => __( 'Resources list', 'cor' ),
				'new_item'              => __( 'New Resource', 'cor' ),
				'add_new'               => __( 'Add New', 'cor' ),
				'add_new_item'          => __( 'Add New Resource', 'cor' ),
				'edit_item'             => __( 'Edit Resource', 'cor' ),
				'view_item'             => __( 'View Resource', 'cor' ),
				'view_items'            => __( 'View Resources', 'cor' ),
				'search_items'          => __( 'Search Resources', 'cor' ),
				'not_found'             => __( 'No Resources found', 'cor' ),
				'not_found_in_trash'    => __( 'No Resources found in trash', 'cor' ),
				'parent_item_colon'     => __( 'Parent Resource:', 'cor' ),
				'menu_name'             => __( 'Resources', 'cor' ),
			],
			'taxonomies'          => array( 'category' ),
			'public'                => false,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'thumbnail',  ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'resource',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'resource_init' );

/**
 * Sets the post updated messages for the `resource` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `resource` post type.
 */
function resource_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['resource'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Resource updated. <a target="_blank" href="%s">View Resource</a>', 'cor' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'cor' ),
		3  => __( 'Custom field deleted.', 'cor' ),
		4  => __( 'Resource updated.', 'cor' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Resource restored to revision from %s', 'cor' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Resource published. <a href="%s">View Resource</a>', 'cor' ), esc_url( $permalink ) ),
		7  => __( 'Resource saved.', 'cor' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Resource submitted. <a target="_blank" href="%s">Preview Resource</a>', 'cor' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Resource scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resource</a>', 'cor' ), date_i18n( __( 'M j, Y @ G:i', 'cor' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Resource draft updated. <a target="_blank" href="%s">Preview Resource</a>', 'cor' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'resource_updated_messages' );

/**
 * Sets the bulk post updated messages for the `resource` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `resource` post type.
 */
function resource_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['resource'] = [
		/* translators: %s: Number of Resources. */
		'updated'   => _n( '%s Resource updated.', '%s Resources updated.', $bulk_counts['updated'], 'cor' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Resource not updated, somebody is editing it.', 'cor' ) :
						/* translators: %s: Number of Resources. */
						_n( '%s Resource not updated, somebody is editing it.', '%s Resources not updated, somebody is editing them.', $bulk_counts['locked'], 'cor' ),
		/* translators: %s: Number of Resources. */
		'deleted'   => _n( '%s Resource permanently deleted.', '%s Resources permanently deleted.', $bulk_counts['deleted'], 'cor' ),
		/* translators: %s: Number of Resources. */
		'trashed'   => _n( '%s Resource moved to the Trash.', '%s Resources moved to the Trash.', $bulk_counts['trashed'], 'cor' ),
		/* translators: %s: Number of Resources. */
		'untrashed' => _n( '%s Resource restored from the Trash.', '%s Resources restored from the Trash.', $bulk_counts['untrashed'], 'cor' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'resource_bulk_updated_messages', 10, 2 );
