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


	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="site-header">
		<div class="container">
			<div class="header-logo">
				<?php if( is_home() ) : ?>
					<span><?= get_field('logo_text','option'); ?></span>
				<?php else: ?>
					<a href="<?= site_url('/');?>"><?= get_field('logo_text','option'); ?></a>
				<?php endif; ?>
			</div>
			<nav id="header-navigation" class="navigation">
				<div id="mobile-menu-toggler">
					<span id="mobile-menu-open">Menu <img src="<?= get_template_directory_uri() ;?>/images/burger-icon.svg" alt="icon"></span>
					<span id="mobile-menu-close"><img src="<?= get_template_directory_uri() ;?>/images/close-icon.svg" alt="icon"></span>
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
		</div>
	</header><!-- header -->
