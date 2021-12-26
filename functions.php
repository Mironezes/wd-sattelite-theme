<?php
/**
 * WP Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WD_Sattelite_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wd_sattelite_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wd_sattelite_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Theme, use a find and replace
		 * to change 'wds-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wds-theme', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		/*
		 * Add Small image sizes
		*/
		add_image_size('small_square', '200', '200', array('top', 'left'));
		add_image_size('small', '200', '200', false);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header_nav' => esc_html__( 'Header', 'wds-theme' ),
				'footer_nav' => esc_html__( 'Footer', 'wds-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wd_sattelite_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Disables new Widgets Block Editor
		remove_theme_support( 'widgets-block-editor' );
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wd_sattelite_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wd_sattelite_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wd_sattelite_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wd_sattelite_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wd_sattelite_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wds-theme' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'wds-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'wd_sattelite_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wd_sattelite_theme_scripts() {
	wp_enqueue_style( 'wds-theme-style', get_stylesheet_uri(), array(), wp_rand() );
	wp_style_add_data( 'wds-theme-style', 'rtl', 'replace' );

	wp_enqueue_script('main-bundle', get_template_directory_uri() . '/js/main.js', array(), wp_rand(), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wd_sattelite_theme_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Register ACF Options Page.
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 */
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'wdst-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-edit-large',
		'redirect'		=> false
	));
	
	
}

/**
 * Popualar Posts Widget
 */
function wdst_related_post() {

	$post_id = get_the_ID();
	$cat_ids = array();
	$categories = get_the_category( $post_id );

	if(!empty($categories) && !is_wp_error($categories)):
			foreach ($categories as $category):
					array_push($cat_ids, $category->term_id);
			endforeach;
	endif;

	$current_post_type = get_post_type($post_id);

	$query_args = array( 
			'category__in'   => $cat_ids,
			'post_type'      => $current_post_type,
			'post__not_in'    => array($post_id),
			'posts_per_page'  => '5',
			'orderby' => 'rand'
	 );

	$related_cats_post = new WP_Query( $query_args );

	if($related_cats_post->have_posts()): ?>
		<section id="related-posts" class="widget">
			<h3 class="widget-title"><?= pll_e('Popular posts');?></h3>
			<ul>
				<?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
							<span><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php 
				wp_reset_postdata(); 
			?>
		</section>
	<?php 
	endif;

}


/**
 * Removes WP srcset from images
 */
function wdst_remove_srcset_from_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'wdst_remove_srcset_from_images');


/**
 * Fullfits plugins jQuery dependencies
 */
add_action( 'wp_enqueue_scripts', 'plugin_scripts_dependencies', 99 );
function plugin_scripts_dependencies() {
	if((is_single() || is_archive()) && (shortcode_exists('yop_poll') || class_exists('Rate_My_Post'))) {
		wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery.min.js', array(), true  );
	}
}


/**
 * Theme translations with Polylang strings
 */
require_once(__DIR__ . '/app/pll_theme_strings.php');