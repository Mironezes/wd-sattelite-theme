<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WD_Sattelite_Theme
 */

if ( ! function_exists( 'wd_sattelite_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wd_sattelite_theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x(pll__('Posted on') . ' %s', 'post date', 'wdst' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wd_sattelite_theme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wd_sattelite_theme_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x(pll__('by') . ' %s', 'post author', 'wdst' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


if ( ! function_exists( 'wd_sattelite_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wd_sattelite_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}
		
		if( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'medium',
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
		else :  
	?>
		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<img width="215" height="150" src="<?= get_template_directory_uri();?>/assets/default-preview.jpg" alt="default image">
		</a>
	<?php 
		endif;
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
	
				if((is_archive() && $archive_layout === 'fullwidth') || (is_home() && !$show_categories_list)) {
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
			if((is_archive() && $archive_layout === 'fullwidth') || (is_home() && !$show_categories_list)) {
				return get_the_excerpt();
			}
			else {
				$excerpt = wp_trim_words(get_the_excerpt(), 16, '...');
				return $excerpt;
			}
		}
	}
	else {
		return get_the_excerpt();
	}

}