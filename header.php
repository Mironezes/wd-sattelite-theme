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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWL263Z"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
	<header class="site-header">			
			<div class="header-logo">
				<div class="container">
					<?php if( is_home() ) : 
						if(get_field('logo_type', 'option') === 'text') : ?>
							<span><?= get_field('logo_text','option'); ?></span>
						<?php elseif(get_field('logo_type', 'option') === 'image') : ?>
								<img width="400" height="40" src="<?= get_field('logo_image');?>" alt="logo">
						<?php endif;?>
					<?php else: 
							if(get_field('logo_type', 'option') === 'text') : ?>
								<a href="<?= site_url('/');?>"><?= get_field('logo_text','option'); ?></a>
							<?php elseif(get_field('logo_type', 'option') === 'image') : ?>
								<a href="<?= site_url('/');?>"><img width="400" height="40" src="<?= get_field('logo_image', 'option');?>" alt="logo"></a>
							<?php endif;?>
						<?php endif; ?>
					</div>
			</div> <!-- .header-logo -->

			<div class="header-navigation-n-lang">
				<div class="container">
					<nav id="header-navigation" class="navigation">
						<div id="mobile-menu-toggler">
							<span id="mobile-menu-open">Menu <img src="<?= get_template_directory_uri() ;?>/images/burger-icon--white.svg" width="27" height="21" alt="icon"></span>
							<span id="mobile-menu-close">Close <img src="<?= get_template_directory_uri() ;?>/images/close-icon--white.svg" width="21" height="21" alt="icon"></span>
						</div>
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
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'header_nav',
					'menu_id'        => 'mobile-nav',
				)
			);
		?>
	</nav> <!-- #mobile-navigation -->
