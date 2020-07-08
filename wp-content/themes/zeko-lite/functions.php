<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zeko Lite
 */

if ( ! function_exists( 'zeko_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zeko_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'zeko_lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'zeko_lite', get_template_directory() . '/languages' );

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

	add_image_size( 'zeko-lite-featured-image', 2600, 900, true );

	add_image_size( 'zeko-lite-featured-archive-image', 700, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top'=> esc_html__( 'Top Menu', 'zeko-lite' ),
		'social'=> esc_html__( 'Social Menu', 'zeko-lite' ),
	) );
	
	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', zeko_lite_fonts_url() ) );
	
	/*
	 * Enable support for custom logo.
	 *
	 *  @since Zeko 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
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
	add_theme_support( 'custom-background', apply_filters( 'zeko_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support to selectively refresh widgets in Customizer
	add_theme_support( 'customize_selective_refresh_widgets' );
	
	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
		
	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Strong Red', 'zeko-lite' ),
				'slug'  => 'strong-red',
				'color' => '#9e0022',
			),
	) );
}
endif;
add_action( 'after_setup_theme', 'zeko_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zeko_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zeko_lite_content_width', 700 );
	
	//Adjust content_width value for page and attachement templates.
	if ( is_page_template( 'page-templates/full-width-page.php' )) {
		$GLOBALS['content_width'] = 1120;
	}
}
add_action( 'after_setup_theme', 'zeko_lite_content_width', 0 );


/**
 * Register custom fonts
 */
function zeko_lite_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = esc_html_x( 'on', 'open_sans font: on or off', 'zeko-lite' );

	/* Translators: If there are characters in your language that are not
	* supported by Karla, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$oswald = esc_html_x( 'on', 'Oswald font: on or off', 'zeko-lite' );

	if ( 'off' !== $open_sans || 'off' !== $oswald ) {
		$font_families = array();

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
		}

		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:200,300,400,500,600,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zeko_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zeko-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'zeko-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'zeko-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your first footer area.', 'zeko-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'zeko-lite' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your second footer area.', 'zeko-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'zeko-lite' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your third footer area.', 'zeko-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// echo esc_attr( zeko_lite_widget_column_class( 'sidebar-1' ) );
}
add_action( 'widgets_init', 'zeko_lite_widgets_init' );


/**
 * Wrap avatars in div for easier styling
 */
function zeko_lite_get_avatar( $avatar ) {
	if ( ! is_admin() ) {
		$avatar = '<span class="avatar-container">' . $avatar . '</span>';
	}
	return $avatar;
}
add_filter( 'get_avatar', 'zeko_lite_get_avatar', 10, 5 );


/**
 * Use front-page.php when 'Front page displays' is set to a static page.
 * Will use custom page templates if set.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults
 * to index.php), else $template.
 */
function zeko_lite_front_page_template( $template ) {
	
	// Get the template for the page if it were displayed normally.
	$page_template = get_page_template();

	// Check the template name. If it's not a default page tmeplate file, ie
	// it's a custom page template, then use the custom template instead.
	if ( ! in_array( basename( $page_template ), array( 'single.php', 'singular.php', 'page.php' ), true ) ) {
		$template = $page_template;
	}

	// If is a blog post listing then use the default index template.
	if ( is_home() ) {
		return '';
	}

	// Use the page template that has been selected.
	return $template;

}
add_filter( 'frontpage_template',  'zeko_lite_front_page_template' );

/**
 * Enqueue scripts and styles.
 */
function zeko_lite_scripts() {
	wp_enqueue_style( 'zeko-lite-style', get_stylesheet_uri() );

	wp_enqueue_style( 'zeko-lite-fonts_url', zeko_lite_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), null );

	wp_enqueue_script( 'zeko-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );

	wp_enqueue_script( 'zeko-lite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'zeko_lite_scripts' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function zeko_lite_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'zeko-lite-gutenberg', get_theme_file_uri( '/editor.css' ), false, '1.1.2', 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'zeko-lite-fonts_url', zeko_lite_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'zeko_lite_gutenberg_styles' );

/**
 * Enqueue the stylesheet.
 */
function zeko_lite_enqueue_customizer_stylesheet() {
	
	wp_enqueue_style( 'zeko-lite-customizer-css', get_template_directory_uri() . '/admin/customizer.css', array(), '1.0' );

}
add_action( 'customize_controls_print_styles', 'zeko_lite_enqueue_customizer_stylesheet' );

if (!function_exists('zeko_lite_admin_scripts')) {
	function zeko_lite_admin_scripts($hook) {
		if ('appearance_page_charity' === $hook) {
			wp_enqueue_style('zeko-lite-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'zeko_lite_admin_scripts');

if (is_admin()) {
	require get_template_directory() . '/admin/admin.php';
}

/**
 * Custom_Comment_Form_Setup
 */
function zeko_lite_comment_form_before() {
	ob_start();
}
add_action( 'comment_form_before', 'zeko_lite_comment_form_before' );

function zeko_lite_comment_form_after() {
	$html = ob_get_clean();
	$html = preg_replace(
		'/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
		'<h2 id="reply-title"\1>\2</h2>',
		$html
	);
	echo $html;
}
add_action( 'comment_form_after', 'zeko_lite_comment_form_after' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zeko_lite_require_plugins' );

function zeko_lite_require_plugins() {

	$plugins = array(

		// One Click Demo Import
		array(
			'name'      => esc_html__( 'One Click Demo Import', 'zeko-lite' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		// Contact Form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'zeko-lite' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// Give
		array(
			'name'      => esc_html__( 'Give', 'zeko-lite' ),
			'slug'      => 'give',
			'required'  => false,
		),
		// MailChimp
		array(
			'name'      => esc_html__( 'Jetpack', 'zeko-lite' ),
			'slug'      => 'jetpack',
			'required'  => false,
		),
		// Elementor
		array(
			'name'      => esc_html__( 'Elementor', 'zeko-lite' ),
			'slug'      => 'elementor',
			'required'  => false,
		),
		// WPForms
		array(
			'name'      => esc_html__( 'WPForms Lite', 'zeko-lite' ),
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),

);
		$config = array(
		'id'           => 'zeko-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}
/**
 * One Click Demo Import
 */
function zeko_lite_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__( 'Demo Import', 'zeko-lite' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-lite.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-lite-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/zeko-lite-export.dat',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'zeko_lite_ocdi_import_files' );
function zeko_lite_ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
	$social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'top' => $main_menu->term_id,
		'social' => $social_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title (esc_html__( 'Welcome to Zeko', 'zeko-lite' ));
	$blog_page_id  = get_page_by_title (esc_html__( 'Latest News', 'zeko-lite' ));

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'zeko_lite_ocdi_after_import_setup' );
function zeko_lite_ocdi_plugin_intro_notice ( $default_text ) {
	return wp_kses_post( str_replace ( 'Before you begin, make sure all the required plugins are activated.', esc_html__( 'Before you begin, make sure all the recommended plugins are activated.', 'zeko-lite'), $default_text ) );
}
add_filter( 'pt-ocdi/plugin_intro_text', 'zeko_lite_ocdi_plugin_intro_notice' );
