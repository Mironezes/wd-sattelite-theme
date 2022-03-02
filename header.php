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
	$attach_id;
	$logo_img;
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

	if(strpos(get_option('wdst_header_logo_type'), 'image')) {
		$attach_id = get_option('wdst_header_logo_image', '');
		$logo_data = wp_get_attachment_image_src($attach_id, 'full');
		$logo_img = "<img src='$logo_data[0]' width='$logo_data[1]' height='$logo_data[2]' alt='Logo'>";
	}
?>

<div id="page" class="site">
	<header class="site-header">			
			<div class="header-logo">
				<div class="container">
					<?php if( is_home() ) : 
						if(strpos(get_option('wdst_header_logo_type'), 'text')) : ?>
							<span><?= get_option('wdst_header_logo_text'); ?></span>
						<?php elseif(strpos(get_option('wdst_header_logo_type'), 'image')) : ?>
							<?= $logo_img;?>
						<?php endif;?>
					<?php else: 
							if(strpos(get_option('wdst_header_logo_type'), 'text')) : ?>
								<a href="<?= $home_url;?>"><?= get_option('wdst_header_logo_text'); ?></a>
							<?php elseif(strpos(get_option('wdst_header_logo_type'), 'image')) : ?>
								<a href="<?= $home_url;?>"><?= $logo_img;?></a>
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
