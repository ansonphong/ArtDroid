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
		'infinite',
		'wp-less',
		'masonry.js',
		'jquery',
		);
	postworld_includes( array(
		'angular_version' => 'angular-1.3.13',	// 'angular-1.2.25',
		'inject'  => $postworld_inject,
	));
}
add_action( 'wp_enqueue_scripts', 'theme_postworld_includes' );
add_action( 'admin_enqueue_scripts', 'theme_postworld_includes' );

///// THEME VERSION /////
global $theme_version;
$theme_version = 1.15;
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

////////// ON THEME ACTIVATION //////////
include "php/activate.php";

////////// CHILD THEME //////////
add_action( 'wp_enqueue_scripts', 'theme_include_styles' );
function theme_include_styles(){
	// CHILD LESS
	wp_enqueue_style( 'Theme-Styles', get_stylesheet_directory_uri() . '/less/style.less' );
}
add_action( 'wp_enqueue_scripts', 'theme_include_scripts' );
function theme_include_scripts(){
	///// JQUERY /////
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	// MAIN SCRIPTS
	wp_enqueue_script( 'scripts-main', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery', 'jquery-ui-core') , '' , true );
}

////////// INIT WORDPRES //////////
function expanse_init() {  
	// Add tag metabox to pages
	register_taxonomy_for_object_type('post_tag', 'page'); 
	// Add tag metabox to pages
	register_taxonomy_for_object_type('post_tag', 'attachment'); 
	// Add category metabox to pages
	register_taxonomy_for_object_type('category', 'page');
	// Post Type Suport
	add_post_type_support( 'page', array('excerpt') );
}
add_action( 'init', 'expanse_init' );

/////////// ADD IMAGE SIZES //////////
add_image_size( 'grid', '640', '480', true );
add_image_size( 'x-wide', '1600', '800', true );
add_image_size( 'x-large', '2400', '2400', false );

add_image_size( 'thumb-square', '400', '400', true );

add_image_size( 'thumb-wide', '600', '400', true );
add_image_size( 'thumb-x-wide', '800', '400', true );

add_image_size( 'thumb-tall', '400', '600', true );
add_image_size( 'thumb-x-tall', '400', '800', true );

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



/**
 * DISABLE EMOJIS
 * For some reason, emojis were added to the WordPress Core
 * This adds to load time and is never used.
 */
function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

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
 * Prevent this site from being a host for XML-RPC DDoS Attacks
 */
add_filter( 'xmlrpc_methods', function( $methods ) {
	unset( $methods['pingback.ping'] );
	return $methods;
});

/**
 * Disable XML-RPC to prevent from being gateway for incoming DDoS Attacks
 */
add_filter('xmlrpc_enabled', '__return_false');

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

?>