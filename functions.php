<?php
/*   _         _   ____            _     _ 
    / \   _ __| |_|  _ \ _ __ ___ (_) __| |
   / _ \ | '__| __| | | | '__/ _ \| |/ _` |
  / ___ \| |  | |_| |_| | | | (_) | | (_| |
 /_/   \_\_|   \__|____/|_|  \___/|_|\__,_|
                                           
----------- WELCOME TO ARTDROID -----------*/

global $theme_version;
$theme_version = 1.413;

/*x
ArtDroid is a Premium WordPress theme
designed with artists, designers,
photographers and motion picture directors
in mind. ArtDroid focuses on getting your
art seen, up-front and center stage.

Thanks for using ArtDroid, we hope you
enjoy using it and if you have any support
issues, questions, ideas for future features
or bugs to report, please visit:
http://artdroid.phong.com

ArtDroid is spawned by Android Jones
http://androidjones.com

Designed, coded, supported and
maintained by Phong Media Design
http://phong.com

Distributed by Theme Forest
http://themeforest.net/?ref=phongmedia
*/

/**
 * ArtDroid is built using Postworld
 * a theme development framework developed
 * by Phong Media Design. Postworld provides
 * a backend framework which builds ontop
 * of the native WordPress functionality
 * coupled with the client-side Javascript
 * to create an exceptional experience
 * for both the developer and the user.
 */
// Configure Postworld
include "postworld-config.php";
// Include the Postworld library
include "postworld/postworld.php";
// Enqueue Postworld scripts and styles
function theme_postworld_includes(){
	postworld_includes( array(
		'inject'  => array(
			'masonry.js',
			'jquery',
			),
	));
}
add_action( 'wp_enqueue_scripts', 'theme_postworld_includes' );
add_action( 'admin_enqueue_scripts', 'theme_postworld_includes' );

/**
 * Theme Version
 */
function theme_version_filter( $pw_version ){
	global $theme_version;
	$ver = $theme_version . '-' . $pw_version; 
	return $ver;
}
add_filter( PW_THEME_VERSION, 'theme_version_filter' );

////////// ADMIN //////////
//include_once get_infinite_directory().'/php/options.php';

////////// ADMIN //////////
include_once 'admin/php/admin.php';

////////// CHILD STYLE MODEL //////////
include "php/postworld-style-model.php";

////////// TAXONOMIES //////////
include "php/taxonomies.php";

////////// SHORTCODES //////////
include "php/shortcodes.php";

////////// POSTMETA //////////
include "php/postworld-postmeta.php";

////////// FILTERS //////////
include "php/postworld-filters.php";

////////// ACTIONS //////////
include "php/postworld-actions.php";

////////// MIGRATIONS //////////
include "php/postworld-migrations.php";

////////// FIELDS //////////
include "php/postworld-fields.php";

////////// FONTS //////////
include "php/postworld-fonts.php";

////////// THEME OPTIONS //////////
include "php/postworld-theme-options.php";

////////// TERM DATA //////////
include "php/term-data.php";

////////// SIDEBARS //////////
include "php/sidebars.php";

////////// CUSTOMIZE //////////
include "php/customize.php";

////////// BLOG //////////
include "php/post-type-blog.php";

////////// UPDATES //////////
include "php/postworld-updates.php";

////////// ON THEME ACTIVATION //////////
include "php/activate.php";

///// CUSTOM FUNCTIONS /////
function theme_get_option($key){
	return pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => $key ) );
}

///// TGM Plugin Activation /////
include "php/tgm-plugin-activation.php";
//include "php/visual-composer-shortcodes.php";

// STYLES
add_action( 'wp_enqueue_scripts', 'theme_include_styles' );
function theme_include_styles(){

	// If doing a style preview with the cusotmizer, use an alternate stylesheet
	if( defined('PW_DOING_CUSTOMIZER') && PW_DOING_CUSTOMIZER ){
		wp_enqueue_style(
			'Theme-Preview-Styles',
			get_stylesheet_directory_uri() . '/less/style-preview.less',
			array(),
			$GLOBALS['theme_version'] );
	}
	else{
		wp_enqueue_style(
			'Theme-Styles',
			get_stylesheet_directory_uri() . '/less/style.less',
			array(),
			$GLOBALS['theme_version'] );
	}


}

add_action( 'wp_enqueue_scripts', 'theme_include_scripts' );
function theme_include_scripts(){
	///// JQUERY /////
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	// MAIN SCRIPTS
	wp_enqueue_script(
		'theme-scripts',
		get_stylesheet_directory_uri() . '/js/scripts.js',
		array('jquery', 'jquery-ui-core'),
		$GLOBALS['theme_version'],
		true );
}

////////// INIT WORDPRES //////////
function theme_init() {  
	// Add tag metabox to pages
	//register_taxonomy_for_object_type('post_tag', 'page'); 
	// Add tag metabox to pages
	//register_taxonomy_for_object_type('attachment'); 
	// Add category metabox to pages
	//register_taxonomy_for_object_type('category', 'page');
	// Post Type Suport
	add_post_type_support( 'page', array('excerpt') );
}
add_action( 'init', 'theme_init' );

add_action('init', 'theme_add_image_sizes');
function theme_add_image_sizes() {	
	//set_post_thumbnail_size( 150, 150 );

	/////////// ADD IMAGE SIZES //////////
	pw_add_image_size( 'xs', 128, 128, 2 );
	pw_add_image_size( 'sm', 256, 256, 2 );
	pw_add_image_size( 'md', 512, 512, 2 );
	pw_add_image_size( 'lg', 1024, 1024, 2 );
	pw_add_image_size( 'xl', 2048, 2048, 2 );

}


////////// REMOVE FILTERS //////////
remove_filter( 'the_content', 'prepend_attachment', 10 );

/**
 * Add editor styles
 */
add_editor_style( "/css/editor-style.css" );

/**
 * Bootstrap AngularJS to theme admin options pages.
 */
add_filter( 'pw_admin_bootstrap_angular', 'theme_admin_boostrap_angular' );
function theme_admin_boostrap_angular( $bootstrap ){
	$bootstrap['base_substring'][] = 'artdroid';
	return $bootstrap;
}

/**
 * Modify the Postworld REST namespace to match the theme name.
 */
add_filter( 'pw_rest_namespace', 'theme_rest_namespace' );
function theme_rest_namespace( $namespace ){
	return 'artdroid';
}

/**
 * Enqueue styles for the administrative panel.
 */
function theme_admin_enqueue() {
	global $theme_version;
	wp_enqueue_style(
		'Theme-Admin-Styles',
		get_template_directory_uri() . '/admin/less/styles.less',
		array(),
		$theme_version);
}
add_action( 'admin_enqueue_scripts', 'theme_admin_enqueue' );

/**
 * Add action attribute to forms, to override Angular behavior
 */
add_action( 'wp_footer', 'pw_add_forms_action_attribute');

/**
 * Specifically enable automatic updates even if
 * a VCS folder (.git, .hg, .svn etc) was found in the
 * WordPress directory or any of its parent directories.
 *
 * @link https://codex.wordpress.org/Configuring_Automatic_Background_Updates
 */
add_filter( 'automatic_updates_is_vcs_checkout', '__return_false', 1 );

/**
 * The WordPress Dashboard by default allows administrators to edit PHP files,
 * such as plugin and theme files. This is often the first tool an attacker
 * will use if able to login, since it allows code execution.
 * WordPress has a constant to disable editing from Dashboard. 
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Fixes 'Slimming Paint' bug in WordPress Admin for Chrome 45
 * @link https://core.trac.wordpress.org/ticket/33199
 */
function chromefix_admin_init(){
	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false ){
		add_action( 'admin_print_styles', 'chromefix_print_css' );
	}
}
function chromefix_print_css(){ 
?>
	<style type="text/css" media="screen">
		#adminmenu{
			transform: translateZ(0);
		}
	</style>
<?php
}
add_action( 'admin_init', 'chromefix_admin_init' );

/**
 * Add an action attribute to the Mailchimp for WP form
 * so that it's submitting properly when Angular JS is loaded. 
 *
 * @link https://wordpress.org/support/plugin/mailchimp-for-wp
 * @link https://wordpress.org/support/topic/please-allow-filtering-the-form-attributes-form-not-submitting-with-angularjs
 * @link https://github.com/ibericode/mailchimp-for-wordpress/issues/91
 */
function theme_mc4wp_form_action( $action ){
	global $pw;
	$current_url = $pw['view']['url'];
	return $current_url;
}
add_filter( 'mc4wp_form_action', 'theme_mc4wp_form_action' );


/**
 * From Plugin: Private Content Login Redirect
 * Plugin URI: http://increasy.com
 * Redirects non-logged users to the login page when they follow a link to private post or private page.After successful login, it automatically redirects users with private content access to the private content link they followed.
 *
 * Author: Kumar Abhisek
 * Author URI: http://increasy.com
 */
add_action('template_redirect', 'theme_private_content_redirect_to_login', 9);
function theme_private_content_redirect_to_login() {
	global $wp_query,$wpdb;
	if (is_404()) {
		$private = $wpdb->get_row($wp_query->request);
		$location = wp_login_url($_SERVER["REQUEST_URI"]);
		// Notice: Trying to get property of non-object in functions.php on line 282
		if( is_object($private) && 'private' == $private->post_status  ) {
			wp_safe_redirect($location);
			exit;
		}
	}
}


/**
 * Add an additional CSS class to menu item
 * If the item's url is contained with the current URL.
 * Useful for in-site custom links.
 */
add_filter('nav_menu_css_class' , 'pw_nav_menu_css_class' , 10 , 2);


/**
 * Register theme menu locations.
 */
function theme_register_menu_locations() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Main Menu', 'theme' ),
			'home-page-slider' => __( 'Home Page Slider', 'theme' )
			)
	);
}
add_action( 'init', 'theme_register_menu_locations' );


/**
 * Modify context types.
 */
add_filter('pw_context_types', 'theme_filter_pw_context_types' );
function theme_filter_pw_context_types( $contexts ){
	// Remove blog context
	$contexts = array_diff( $contexts, array('blog') );
	return $contexts;
}


/**
 * Sets the default content width.
 */
if ( ! isset( $content_width ) ) $content_width = 900;


/**
 * Add automatic feed links.
 */
add_theme_support( 'automatic-feed-links' );

add_post_type_support( 'post', 'excerpt' );
add_post_type_support( 'blog', 'excerpt' );

