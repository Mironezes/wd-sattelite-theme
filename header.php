<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WD_Sattelite_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
	<?php require_once('inc/dynamic-styles.php'); ?>
</head>

<body <?php body_class($body_classes); ?>>
<?php wp_body_open(); ?>

<?php 
	$home_url = site_url('/');
	if(function_exists('pll_the_languages')) {
		$current_lang = pll_current_language('slug');
		$default_lang = pll_default_language('slug');
		if($current_lang == $default_lang) {
			$home_url = '/';
		}
		else {
			$site_domain = $_SERVER['SERVER_NAME'];
			if(strpos($site_domain, $current_lang) !== false) {	
				$home_url = '/';
			}
			else {
				$home_url = '/' . $current_lang . '/';
			}
		}
	}
?>

<div id="page" class="site">
	<header class="site-header">			
			<div class="header-logo">
				<div class="container">
					<?php if( is_home() ) : 
						if(get_field('logo_type', 'option') === 'text') : ?>
							<span><?= get_field('logo_text','option'); ?></span>
						<?php elseif(get_field('logo_type', 'option') === 'image') : ?>
								<img width="300" height="40" src="<?= get_field('logo_image', 'option');?>" alt="logo">
						<?php endif;?>
					<?php else: 
							if(get_field('logo_type', 'option') === 'text') : ?>
								<a href="<?= $home_url;?>"><?= get_field('logo_text','option'); ?></a>
							<?php elseif(get_field('logo_type', 'option') === 'image') : ?>
								<a href="<?= $home_url;?>"><img width="300" height="40" src="<?= get_field('logo_image', 'option');?>" alt="logo"></a>
							<?php endif;?>
						<?php endif; ?>
					</div>
			</div> <!-- .header-logo -->

			<div class="header-navigation-n-lang">
				<div class="container">
					<nav id="header-navigation" class="navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header_nav',
								'menu_id'        => 'header',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				<?php include_once('inc/lang-switcher.php'); ?>
			</div> <!-- .container -->
		</div> <!-- .header-navigation-n-lang -->
	</header><!-- header -->

	<nav id="mobile-navigation" class="navigation">
		<input type="checkbox" id="mobile-menu-checkbox" value="" name="mobile-menu-checkbox">
		<div id="mobile-menu-toggler">
				<span id="mobile-menu-open"><?= pll_e('Menu'); ?> <img src="<?= get_template_directory_uri() ;?>/assets/burger-icon--white.svg" width="27" height="21" alt="icon"></span>
				<span id="mobile-menu-close"><?= pll_e('Close'); ?> <img src="<?= get_template_directory_uri() ;?>/assets/close-icon--white.svg" width="21" height="21" alt="icon"></span>
			</div>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'header_nav',
					'menu_id'        => 'mobile-nav',
				)
			);
		?>
	</nav> <!-- #mobile-navigation -->
