<?php
////////// POSTWORLD //////////
/// POSTWORLD CONFIG ///
include "postworld-config.php";
include "postworld-language.php";

/// POSTWORLD CORE ///
include "postworld/postworld.php";

////////// INIT POSTWORLD //////////
function theme_postworld_includes(){
	$postworld_inject = array(
		'masonry.js',
		'jquery',
		);
	postworld_includes( array(
		'angular_version' => 'angular-1.4.6',
		'inject'  => $postworld_inject,
	));
}
add_action( 'wp_enqueue_scripts', 'theme_postworld_includes' );
add_action( 'admin_enqueue_scripts', 'theme_postworld_includes' );

///// THEME VERSION /////
global $theme_version;
$theme_version = 1.31;
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

////////// BLOG //////////
include "php/post-type-blog.php";

////////// ON THEME ACTIVATION //////////
include "php/activate.php";

///// CUSTOM FUNCTIONS /////
function theme_get_option($key){
	return pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => $key ) );
}

///// TGM Plugin Activation /////
include "php/tgm-plugin-activation.php";
//include "php/visual-composer-shortcodes.php";

////////// CHILD THEME //////////
add_action( 'wp_enqueue_scripts', 'theme_include_styles' );
function theme_include_styles(){
	// CHILD LESS
	wp_enqueue_style( 'Theme-Styles', get_stylesheet_directory_uri() . '/less/style.less' );
}
add_action( 'wp_enqueue_scripts', 'theme_include_scripts' );
function theme_include_scripts(){
	global $theme_version;
	///// JQUERY /////
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	// MAIN SCRIPTS
	wp_enqueue_script( 'scripts-main', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery', 'jquery-ui-core') , $theme_version , true );
}

////////// INIT WORDPRES //////////
function theme_init() {  
	// Add tag metabox to pages
	register_taxonomy_for_object_type('post_tag', 'page'); 
	// Add tag metabox to pages
	register_taxonomy_for_object_type('post_tag', 'attachment'); 
	// Add category metabox to pages
	register_taxonomy_for_object_type('category', 'page');
	// Post Type Suport
	add_post_type_support( 'page', array('excerpt') );
}
add_action( 'init', 'theme_init' );

/////////// ADD IMAGE SIZES //////////
//add_image_size( 'grid', '640', '480', true );
//add_image_size( 'x-wide', '1600', '800', true );
//add_image_size( 'x-large', '2400', '2400', false );

//add_image_size( 'thumb-square', '400', '400', true );

//add_image_size( 'thumb-wide', '600', '400', true );
//add_image_size( 'thumb-x-wide', '800', '400', true );

//add_image_size( 'thumb-tall', '400', '600', true );
//add_image_size( 'thumb-x-tall', '400', '800', true );


add_action('init', 'theme_remove_image_sizes');
function theme_remove_image_sizes() {	
	//set_post_thumbnail_size( 150, 150 );
	/*
	remove_image_size('thumbnail');
	remove_image_size('medium');
	remove_image_size('large');
	remove_image_size('post-thumbnail');
	*/

	/////////// ADD IMAGE SIZES //////////
	pw_add_image_size( 'xs', 128, 128, 2 );
	pw_add_image_size( 'sm', 256, 256, 2 );
	pw_add_image_size( 'md', 512, 512, 2 );
	pw_add_image_size( 'lg', 1024, 1024, 2 );
	pw_add_image_size( 'xl', 2048, 2048, 2 );

}


////////// REMOVE FILTERS //////////
remove_filter( 'the_content', 'prepend_attachment', 10 );

////////// SOCIAL MEDIA WIDGETS //////////
global $social_settings;
$social_settings = array(
	"meta"  =>  array(
		"title"       =>  "expanse",
		//"url"		         =>  get_permalink(), //"http://wonderfulwordweaving.com", //
		"before_network"  =>  "<span class=\"social-widget %network%\">",
		"after_network"   =>  "</span>"
		),
	"networks"  =>  array(

		array(
			"network"     =>  "facebook",
			"widget"      =>  "like-button",
			"appId"       =>  pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.facebook_app_id' ) ),
			"include_sdk" =>  true,
			"settings"  =>  array(
				"layout"    	=>  "button_count",
				"action"    	=>  "like",
				"show_faces"  	=>  "false",
				"share"     	=>  "true",
				"width"     	=>  "133",
				"height"    	=>  "24",
				"colorscheme" 	=> 	"light",
				),
			),
		array(
			"network"     =>  "twitter",
			"widget"      =>  "share",
			"include_script"=>  true,
			"settings"    =>  array(
				"via"       =>  pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.twitter' ) ), //"twitter_user",
				"related"   =>  pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.twitter' ) ),
				"hashtags"  =>  pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.twitter_hashtags' ) ), //"twitter_user",
				"size"      =>  "small",
				"lang"      =>  "en",
				"dnt"       =>  "true",
				),
			),

		),

	);


///// ADD EDITOR STYLE /////
add_editor_style( "/css/editor-style.css" );

///// BOOTSTRAP ANGULAR APP TO BLOGOSPHERE OPTIONS PAGE /////
add_filter( 'pw_admin_bootstrap_angular', 'theme_admin_boostrap_angular' );
function theme_admin_boostrap_angular( $bootstrap ){
	$bootstrap['base_substring'][] = 'artdroid';
	return $bootstrap;
}

///// ADD ADMIN STYLES /////
function theme_admin_enqueue() {
	wp_enqueue_style( 'Theme-Admin-Styles', get_template_directory_uri() . '/admin/less/styles.less' );
}
add_action( 'admin_enqueue_scripts', 'theme_admin_enqueue' );

////////// POST FORMATS //////////
//add_theme_support( 'post-formats', array( 'image', 'link' ) );

// Add action attribute to forms
add_action('wp_footer', 'pw_add_forms_action_attribute');

/**
 * Check for Theme Updates with WP Updates
 * @link http://wp-updates.com/
 */
require_once('php/wp-updates-theme.php');
new WPUpdatesThemeUpdater_1478( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

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
 * Author: Kumar Abhisek
 * Author URI: http://increasy.com
 */
add_action('template_redirect', 'theme_private_content_redirect_to_login', 9);
function theme_private_content_redirect_to_login() {
	global $wp_query,$wpdb;
	if (is_404()) {
		$private = $wpdb->get_row($wp_query->request);
		$location = wp_login_url($_SERVER["REQUEST_URI"]);
		if( 'private' == $private->post_status  ) {
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
add_filter('nav_menu_css_class' , 'theme_special_nav_class' , 10 , 2);
function theme_special_nav_class($classes, $item){
	global $pw;
	$item_url = $item->url;

	if( empty($item_url) )
		return $classes;

	/**
	 * If the url starts with a /, implying that it's
	 * relative to the base site url.
	 */
	if (substr($item_url, 0, 1) === '/'){
		// The item's full url without protocol
		$item_url = $_SERVER['SERVER_NAME'] . $item_url;
	}
	if (strpos($pw['view']['url'],$item_url) !== false) {
		$classes[] = 'current-menu-ancestor';
	}
	return $classes;
}

/**
 * Register theme menu locations.
 */
function theme_register_menu_locations() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Main Menu' ),
			'home-page-slider' => __( 'Home Page Slider' )
			)
	);
}
add_action( 'init', 'theme_register_menu_locations' );


/**
 * From Plugin: Private Content Login Redirect
 * Plugin URI: http://increasy.com
 * Redirects non-logged users to the login page when they follow a link to private post or private page.After successful login, it automatically redirects users with private content access to the private content link they followed.
 * Author: Kumar Abhisek
 * Author URI: http://increasy.com
 */
add_action('template_redirect', 'theme_private_content_redirect_to_login', 9);
function theme_private_content_redirect_to_login() {
	global $wp_query,$wpdb;
	if (is_404()) {
		$private = $wpdb->get_row($wp_query->request);
		$location = wp_login_url($_SERVER["REQUEST_URI"]);
		if( 'private' == $private->post_status  ) {
			wp_safe_redirect($location);
			exit;
		}
	}
}

?>