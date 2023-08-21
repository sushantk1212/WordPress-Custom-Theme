<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package a2n-base
 */

if ( ! function_exists( 'a2n_base_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function a2n_base_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'a2n-base' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'a2n_base_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function a2n_base_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'a2n-base' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'a2n_base_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function a2n_base_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'a2n-base' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'a2n-base' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'a2n-base' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'a2n-base' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'a2n-base' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'a2n-base' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'a2n_base_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function a2n_base_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

// Custom post type home page slider

function home_page_slider() {

	$labels = array(
		'name'                  => _x( 'Home page slider', 'Home page slider', 'a2n-base' ),
		'singular_name'         => _x( 'Home page slider', 'Home page slider', 'a2n-base' ),
		'menu_name'             => __( 'Home page slider', 'a2n-base' ),
		'name_admin_bar'        => __( 'Home page slider', 'a2n-base' ),
		'archives'              => __( 'Item Archives', 'a2n-base' ),
		'attributes'            => __( 'Item Attributes', 'a2n-base' ),
		'parent_item_colon'     => __( 'Parent Item:', 'a2n-base' ),
		'all_items'             => __( 'All Items', 'a2n-base' ),
		'add_new_item'          => __( 'Add New Item', 'a2n-base' ),
		'add_new'               => __( 'Add New', 'a2n-base' ),
		'new_item'              => __( 'New Item', 'a2n-base' ),
		'edit_item'             => __( 'Edit Item', 'a2n-base' ),
		'update_item'           => __( 'Update Item', 'a2n-base' ),
		'view_item'             => __( 'View Item', 'a2n-base' ),
		'view_items'            => __( 'View Items', 'a2n-base' ),
		'search_items'          => __( 'Search Item', 'a2n-base' ),
		'not_found'             => __( 'Not found', 'a2n-base' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'a2n-base' ),
		'featured_image'        => __( 'Featured Image', 'a2n-base' ),
		'set_featured_image'    => __( 'Set featured image', 'a2n-base' ),
		'remove_featured_image' => __( 'Remove featured image', 'a2n-base' ),
		'use_featured_image'    => __( 'Use as featured image', 'a2n-base' ),
		'insert_into_item'      => __( 'Insert into item', 'a2n-base' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'a2n-base' ),
		'items_list'            => __( 'Items list', 'a2n-base' ),
		'items_list_navigation' => __( 'Items list navigation', 'a2n-base' ),
		'filter_items_list'     => __( 'Filter items list', 'a2n-base' ),
	);
	$args = array(
		'label'                 => __( 'Home page slider', 'a2n-base' ),
		'description'           => __( 'Create slider for home page', 'a2n-base' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'homepage_slider', $args );
}

add_action( 'init', 'home_page_slider', 0 );

// Custom post type our team

function our_team_posttype() {

	$team_labels = array(
		'name'                  => _x( 'Our Team', 'Our Team', 'a2n-base' ),
		'singular_name'         => _x( 'Our Team', 'Our Team', 'a2n-base' ),
		'menu_name'             => __( 'Our Team', 'a2n-base' ),
		'name_admin_bar'        => __( 'Our Team', 'a2n-base' ),
		'archives'              => __( 'Item Archives', 'a2n-base' ),
		'attributes'            => __( 'Item Attributes', 'a2n-base' ),
		'parent_item_colon'     => __( 'Parent Item:', 'a2n-base' ),
		'all_items'             => __( 'All Items', 'a2n-base' ),
		'add_new_item'          => __( 'Add New Item', 'a2n-base' ),
		'add_new'               => __( 'Add New', 'a2n-base' ),
		'new_item'              => __( 'New Item', 'a2n-base' ),
		'edit_item'             => __( 'Edit Item', 'a2n-base' ),
		'update_item'           => __( 'Update Item', 'a2n-base' ),
		'view_item'             => __( 'View Item', 'a2n-base' ),
		'view_items'            => __( 'View Items', 'a2n-base' ),
		'search_items'          => __( 'Search Item', 'a2n-base' ),
		'not_found'             => __( 'Not found', 'a2n-base' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'a2n-base' ),
		'featured_image'        => __( 'Featured Image', 'a2n-base' ),
		'set_featured_image'    => __( 'Set featured image', 'a2n-base' ),
		'remove_featured_image' => __( 'Remove featured image', 'a2n-base' ),
		'use_featured_image'    => __( 'Use as featured image', 'a2n-base' ),
		'insert_into_item'      => __( 'Insert into item', 'a2n-base' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'a2n-base' ),
		'items_list'            => __( 'Items list', 'a2n-base' ),
		'items_list_navigation' => __( 'Items list navigation', 'a2n-base' ),
		'filter_items_list'     => __( 'Filter items list', 'a2n-base' ),
	);
	$team_args = array(
		'label'                 => __( 'Our Team', 'a2n-base' ),
		'description'           => __( 'Team member', 'a2n-base' ),
		'labels'                => $team_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'our_team', $team_args );

}
add_action( 'init', 'our_team_posttype', 0 );

// Custom post type Testimonials

function testimonials_posttype() {

	$tstimonial_labels = array(
		'name'                  => _x( 'Testimonials', 'Testimonials', 'a2n-base' ),
		'singular_name'         => _x( 'Testimonials', 'Testimonials', 'a2n-base' ),
		'menu_name'             => __( 'Testimonials', 'a2n-base' ),
		'name_admin_bar'        => __( 'Testimonials', 'a2n-base' ),
		'archives'              => __( 'Item Archives', 'a2n-base' ),
		'attributes'            => __( 'Item Attributes', 'a2n-base' ),
		'parent_item_colon'     => __( 'Parent Item:', 'a2n-base' ),
		'all_items'             => __( 'All Items', 'a2n-base' ),
		'add_new_item'          => __( 'Add New Item', 'a2n-base' ),
		'add_new'               => __( 'Add New', 'a2n-base' ),
		'new_item'              => __( 'New Item', 'a2n-base' ),
		'edit_item'             => __( 'Edit Item', 'a2n-base' ),
		'update_item'           => __( 'Update Item', 'a2n-base' ),
		'view_item'             => __( 'View Item', 'a2n-base' ),
		'view_items'            => __( 'View Items', 'a2n-base' ),
		'search_items'          => __( 'Search Item', 'a2n-base' ),
		'not_found'             => __( 'Not found', 'a2n-base' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'a2n-base' ),
		'featured_image'        => __( 'Featured Image', 'a2n-base' ),
		'set_featured_image'    => __( 'Set featured image', 'a2n-base' ),
		'remove_featured_image' => __( 'Remove featured image', 'a2n-base' ),
		'use_featured_image'    => __( 'Use as featured image', 'a2n-base' ),
		'insert_into_item'      => __( 'Insert into item', 'a2n-base' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'a2n-base' ),
		'items_list'            => __( 'Items list', 'a2n-base' ),
		'items_list_navigation' => __( 'Items list navigation', 'a2n-base' ),
		'filter_items_list'     => __( 'Filter items list', 'a2n-base' ),
	);
	$team_args = array(
		'label'                 => __( 'Testimonials', 'a2n-base' ),
		'description'           => __( 'Testimonial', 'a2n-base' ),
		'labels'                => $tstimonial_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $team_args );

}
add_action( 'init', 'testimonials_posttype', 0 );