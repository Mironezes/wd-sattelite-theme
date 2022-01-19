<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WD_Sattelite_Theme
 */

?>

	<footer class="site-footer">
		<div class="container">
			<nav id="footer-navigation" class="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_nav',
						'menu_id'        => 'footer',
					)
				);
				?>
			</nav><!-- #footer-navigation -->
			<div id="footer-others">
				<div class="site-info">
					<div class="dmca"><a href="<?= get_field('dmca_link', 'option');?>" title="Content Protection by DMCA.com" class="dmca-badge"><img class="lazy" src="<?= get_field('dmca_image_url', 'option');?>" alt="Content Protection by DMCA.com" width="100" height="20"></a></div>
					<span class="copyright"><?= get_field('copyright', 'option');?></span>
				</div>
				<span id="site-back-to-top"><img src="<?= get_template_directory_uri();?>/assets/arrow-up-var3.svg" width="17" height="23" alt="back-to-top"></span>
			</div>
		</div>
	</footer><!-- footer -->
</div><!-- #page -->


<?php
	global $post;
	$content = get_the_content($post);
	$pattern = '/<h\d>(.*?)<\/h\d>/';

	preg_match_all($pattern, $content, $results);
	if(!empty($results)) {

		if(mb_strpos($results[0][0], 'h2') == false) {
			$h2 = preg_replace($pattern, '<h2>$1</h2>', $results[0][0]);
			
			$old_tag = preg_replace('/\//', '\/', $results[0][0]);
			$old_tag = preg_replace('/\?/', '\?', $old_tag);
			$content = preg_replace('/'.$old_tag . '/', $h2, $content);
			
			var_dump($content);
		}	
	}

?>


<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<?php 
include_once(__DIR__ . '/inc/adserver.php');
wp_footer(); ?>

</body>
</html>
