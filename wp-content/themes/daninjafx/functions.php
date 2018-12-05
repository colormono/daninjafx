<?php
/**
 * daninjafx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package daninjafx
 */

if ( ! function_exists( 'daninjafx_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function daninjafx_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on daninjafx, use a find and replace
		 * to change 'daninjafx' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'daninjafx', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'daninjafx' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'daninjafx_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'daninjafx_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function daninjafx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'daninjafx' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'daninjafx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'daninjafx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function daninjafx_scripts() {
	//wp_enqueue_style( 'bs-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
	wp_enqueue_style( 'magnific-popup-style', get_template_directory_uri() . '/js/magnific-popup/magnific-popup.css');
	wp_enqueue_style( 'plyr-style', get_template_directory_uri() . '/js/plyr/plyr.css');
	wp_enqueue_style( 'daninjafx-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery-custom', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '2018', false);
	wp_enqueue_script( 'axios-script', get_template_directory_uri() . '/js/axios/axios.js', array(), '2018', true );
	wp_enqueue_script( 'magnific-popup-script', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup.js', array(), '2018', true );
	wp_enqueue_script( 'masonry-script', get_template_directory_uri() . '/js/masonry/masonry.pkgd.min.js', array(), '2018', true );
	wp_enqueue_script( 'imgloaded-script', get_template_directory_uri() . '/js/masonry/imagesloaded.pkgd.min.js', array(), '2018', true );
	wp_enqueue_script( 'plyr-script', get_template_directory_uri() . '/js/plyr/plyr.js', array(), '2018', true );
	wp_enqueue_script( 'daninjafx-app', get_template_directory_uri() . '/js/app.js', array(), '2018-12', true );
}
add_action( 'wp_enqueue_scripts', 'daninjafx_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * CUSTOMIZE MENU
 */
function daninjafx_custom_menu_item_class($classes, $item, $args) {
  if($args->theme_location == 'menu-1') {
    $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'daninjafx_custom_menu_item_class', 1, 3);


function daninjafx_custom_menu_anchor_class( $atts, $item, $args ) {
	$class = 'nav-link';
	$atts['class'] = $class;
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'daninjafx_custom_menu_anchor_class', 10, 3 );