<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WD_Sattelite_Theme
 */

 
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wd_sattelite_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wd_sattelite_theme_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wd_sattelite_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wd_sattelite_theme_pingback_header' );


/**
 * Add a fallback for get_field() in case if there`s no ACF plugin on site 
 */
function wd_sattelite_theme_acf_fallback() {
	if(!class_exists('ACF')) {
		function get_field() {
			return null;
		}
	}
}
add_action('wp', 'wd_sattelite_theme_acf_fallback');