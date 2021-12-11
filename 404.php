<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WD_Sattelite_Theme
 */

get_header();
?>


<main class="site-content">
		<div class="container">
			<section class="site-content-main">
					<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'wds-theme' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wds-theme' ); ?></p>

					<?php
					get_search_form();
					?>

					<a href="<?= site_url('/');?>" class="error404-return-link">Return to homepage</a>

			</section>	
		</div>
	</main>

<?php
get_footer();