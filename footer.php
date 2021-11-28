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
			<div class="site-info">
				<div class="dmca"><a href="https://www.dmca.com/Protection/Status.aspx?ID=28afe8dc-74ce-4d5e-8168-a269daecf616&refurl=https://kelleysbookkeeping.com/" title="Content Protection by DMCA.com" class="dmca-badge"><img class="lazy" src="https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=7b621546-5236-44ea-be9f-7b92557bc4d3" alt="Content Protection by DMCA.com" width="100" height="20"></a></div>
				<span class="copyright">Copyright 2021</span>
			</div>
		</div>
	</footer><!-- footer -->
</div><!-- #page -->

<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<?php wp_footer(); ?>

</body>
</html>
