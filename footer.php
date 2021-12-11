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
				<div class="dmca"><a href="<?= get_field('dmca_link', 'option');?>" title="Content Protection by DMCA.com" class="dmca-badge"><img class="lazy" src="<?= get_field('dmca_image_url', 'option');?>" alt="Content Protection by DMCA.com" width="100" height="20"></a></div>
				<span class="copyright"><?= get_field('copyright', 'option');?></span>
			</div>
		</div>
	</footer><!-- footer -->
</div><!-- #page -->

<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<?php 

$args = array(
	'post_type' => 'post',
	'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'inherit'),
	'posts_per_page' => -1,
	'orderby' => 'ID',
	'order' => 'desc');

$blank_posts = array();
$content_post =array();

$posts = new WP_Query( $args );
$ids_list = array();
$lang_list = pll_languages_list('locale');

if ( $posts->have_posts() ) : 
	while ( $posts->have_posts() ) : $posts->the_post();
	global $post;
		 $content = get_the_content();
			if(empty($content)) { 
					array_push( $blank_posts, $post);
			}else{
					array_push( $content_post, $post);
			}
	endwhile;
endif;

// var_dump($blank_posts);

if(!empty($blank_posts)){
	foreach ($blank_posts as $pst) {
		if(function_exists('pll_the_languages')) {
			$origin_id = $pst->ID;
			foreach($lang_list as $lang) {
				$translation_id = pll_get_post($origin_id, $lang);

				if($translation_id) {
					array_push($ids_list, $translation_id);
				}
				else {
					array_push($ids_list, $origin_id);
				}
			}
		}
		else {
			array_push($ids_list, $pst->ID);
		}
	}
}


// foreach($ids_list as $id) {
// 	$revisions_arr = wp_get_post_revisions( $id, 
// 	[
// 			'offset'           => 2,    // Start from the previous change
// 			'posts_per_page'  => 1,    // Only a single revision
// 			'post_name__in'   => [ "{$id}-revision-v1" ],
// 			'check_enabled'   => false,
// 	]);

// 	if( !empty($revisions_arr) ) {
// 		$revision = array_pop(array_reverse($revisions_arr));
// 		$revision_parent_id = $revision->post_parent;

// 		if($id === $revision_parent_id) {
// 			$revision_content = $revision->post_content;

// 			$updated_post_args = array(
// 				'ID'          => $id,
// 				'post_content' => $revision_content
// 			);
// 			wp_update_post($args);
// 		}
// 		sleep(2);
// 	}
// }








wp_footer(); ?>

</body>
</html>
