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
 * Generates an post excerpt from its content.
 */
function wd_sattelite_theme_excerpt() {

	$archive_layout = get_field('archive_blog_posts_layout', 'option');

	$show_categories_list = get_field('homepage_blog_categories_list', 'option');
	$show_categories_list = !empty($show_categories_list) ? $show_categories_list[0] : 0;

	if(isset($archive_layout)) {
		if (!has_excerpt())
		{
				$content = get_the_content();
				$filtered_content = '';
	
				if (preg_match('/<div[^>]*id="toc"[^>]*>.*?<\/div>/', $content))
				{
						$filtered_content = strip_tags(preg_replace('#<div[^>]*id="toc"[^>]*>.*?</div>#is', '', $content));
				}
				elseif (preg_match('/<p[^>]*[^>]*>.*?<\/p>/', $content))
				{
						$excerpt_raw = preg_match_all('/<p[^>]*[^>]*>.*?<\/p>/', $content, $results);
						if (!empty($results[0][1]))
						{
								$filtered_content = strip_tags($results[0][1]);
						}
				}
	
				if($archive_layout === 'fullwidth' || !$show_categories_list) {
					$excerpt = trim(mb_substr($filtered_content, 0, 250)); 
					if(!mb_strlen($excerpt)) {
						$excerpt = trim(mb_substr(strip_tags($content), 0, 250)); 
					}
				}
	
				else {
					$excerpt = wp_trim_words($filtered_content, 16, '...');
					if(!mb_strlen($excerpt)) {
						$excerpt = wp_trim_words(strip_tags(get_the_excerpt()), 16, '...');
					}
				}
				return $excerpt;
		}
		else {
			return strip_tags(get_the_excerpt());
		}
	}
	else {
		return strip_tags(get_the_excerpt());
	}

}