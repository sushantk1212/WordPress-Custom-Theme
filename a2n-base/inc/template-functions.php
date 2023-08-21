<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package a2n-base
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function a2n_base_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class to pages except home page
	if( ! is_front_page() ) {
		$classes[] = 'sub_page';
	}

	return $classes;
}
add_filter( 'body_class', 'a2n_base_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function a2n_base_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'a2n_base_pingback_header' );
