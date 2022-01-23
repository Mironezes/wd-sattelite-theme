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
					<div class="dmca"><a href="<?= get_option('wdst_dmca_badge_url', '');?>" title="Content Protection by DMCA.com" class="dmca-badge"><img class="lazy" src="<?= get_option('wdst_dmca_badge_image', '');?>" alt="Content Protection by DMCA.com" width="100" height="20"></a></div>
					<span class="copyright"><?= get_option('wdst_copyright', '');?></span>
				</div>
				<span id="site-back-to-top"><img src="<?= get_template_directory_uri();?>/assets/arrow-up-var3.svg" width="17" height="23" alt="back-to-top"></span>
			</div>
		</div>
	</footer><!-- footer -->
</div><!-- #page -->


<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<?php 
include_once(__DIR__ . '/inc/adserver.php');
wp_footer(); ?>

</body>
</html>
