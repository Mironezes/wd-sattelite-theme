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
					<h1><?= pll_e('Oops! That page can&rsquo;t be found');?></h1>
					<p><?= pll_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?');?></p>

					<?php
					get_search_form();
					?>

					<a href="<?= site_url('/');?>" class="error404-return-link"><?= pll_e('Return to homepage');?></a>

			</section>	
		</div>
	</main>

<?php
get_footer();