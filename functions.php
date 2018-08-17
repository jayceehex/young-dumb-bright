<?php
/**
 * Young, Dumb and Bright functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Young,_Dumb_and_Bright
 */

if ( ! function_exists( 'young_dumb_bright_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function young_dumb_bright_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Young, Dumb and Bright, use a find and replace
		 * to change 'young-dumb-bright' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'young-dumb-bright', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'young-dumb-bright' ),
			'social-menu' => esc_html__('Social', 'young-dumb-bright')
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
		add_theme_support( 'custom-background', apply_filters( 'young_dumb_bright_custom_background_args', array(
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
add_action( 'after_setup_theme', 'young_dumb_bright_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function young_dumb_bright_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'young_dumb_bright_content_width', 640 );
}
add_action( 'after_setup_theme', 'young_dumb_bright_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function young_dumb_bright_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'young-dumb-bright' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'young-dumb-bright' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'young_dumb_bright_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function young_dumb_bright_scripts() {
	wp_enqueue_style( 'young-dumb-bright-style', get_stylesheet_uri() );

	wp_enqueue_script( 'young-dumb-bright-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'young-dumb-bright-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'young_dumb_bright_scripts' );

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


// Create project post type

add_action('init','create_custom_post_type_project'); // define event custom post type

function create_custom_post_type_project(){
	$labels = array(
		'name' => 'Projects',
		'singular_name' => 'Project',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'view_item' => 'View Project',
		'search_items' => 'Search Projects',
		'not_found' => 'No projects found',
		'not_found_in_trash' => 'No projects found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
		'label' => __('Projects'),
		'labels' => $labels, // from array above
		'public' => true,
		'has_archive' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-portfolio', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "projects" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'project_category', 'post_tag') // own categories
	);

	register_post_type('project', $args); // used as internal identifier

}

// Project query

$project_query_args = array(
	'post_type' => 'project',
	'posts_per_page' => 6,
	'orderby' => 'rand'
);

$project_result = new WP_Query( $project_query_args );

function setColumns() {
	if ( (is_page()) || (is_post_type_archive( 'project' )) ) :
		echo "col-1";
	else :
		echo "col-2";
	endif;
}

// Social menu icons

function socialMenu() {
	$knownSites = [
		'Facebook' => '<i class="fab fa-facebook" target="_blank"></i>',
		'Github' => '<i class="fab fa-github social-icon" target="_blank"></i>',
		'LinkedIn' => '<i class="fab fa-linkedin-in social-icon" target="_blank"></i>',
		'Twitter' => '<i class="fab fa-twitter social-icon" target="_blank"></i>',
		'other' => '<i class="fas fa-link"></i>'
	];
	$replaced = wp_nav_menu( array( 'theme_location' => 'social-menu', 'container_class' => 'social-buttons', 'echo' => false ) );
	foreach($knownSites AS $site => $icon)
		$replaced = str_replace($site, $icon, $replaced);
	return $replaced;
}

// CTA query

function ctaQuery() {
	$cta_query_args = array( 'page_id' => 16 );
	$cta_result = new WP_Query( $cta_query_args );
	return $cta_result;
}
