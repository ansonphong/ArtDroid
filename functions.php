<?php

////////// ADMIN //////////
include_once 'admin/php/admin.php';

////////// POSTWORLD //////////
include "postworld/pw-config.php";
include "postworld/pw-language.php";

////////// CHILD STYLE MODEL //////////
include "php/child-style-model.php";

////////// TAXONOMIES //////////
include "php/taxonomies.php";

////////// POSTMETA //////////
include "php/postmeta.php";

////////// ADMIN METABOXES //////////
include "php/metaboxes.php";

////////// ON THEME ACTIVATION //////////
include "php/activate.php";

// ADD LESS SUPPORT
require_once( get_template_directory().'/packages/wp-less/wp-less.php' );

////////// POST FORMATS //////////
add_theme_support( 'post-formats', array( 'image', 'link' ) );

////////// INCLUDE POSTWORLD //////////
if( function_exists( 'postworld_includes' ) ){
	postworld_includes( array(
		'mode'    => 'dev',
		'angular_version' => 'angular-1.3.0-beta.13', //'angular-1.2.9', //'angular-1.3.0-beta.13',
		'inject'  => array( 'wp-less', 'font-awesome-3', 'icon-x' ),
	));
}

////////// CHILD THEME //////////

add_action( 'wp_enqueue_scripts', 'include_child_styles' );
function include_child_styles(){
	// CHILD LESS
	wp_enqueue_style( 'Child-Styles', get_stylesheet_directory_uri() . '/less/style.less' );
}
add_action( 'wp_enqueue_scripts', 'include_child_scripts' );
function include_child_scripts(){
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
	// Add category metabox to pages
	register_taxonomy_for_object_type('category', 'page');
	// Post Type Suport
	add_post_type_support( 'page', array('excerpt') );
}
add_action( 'init', 'expanse_init' );



//////////////////// GALLERIES ////////////////////

// Remove the default Gallery shortcode
remove_shortcode('gallery');
// Replace it with the Postworld Gallery shortcode
add_shortcode( 'gallery', 'pw_gallery_shortcode' );

function i_should_omit_gallery( $vars ){
	// Function which detects whether or not to
	// omit the gallery shortcode based on conditions

	$omit_galleries_in = array(
		'horizontal',
		'vertical'
		);
	$gallery_template = pw_get_obj( $vars, 'post.post_meta.i_meta.gallery.template' );
	if( $gallery_template == false ){
		$gallery_template = pw_get_wp_postmeta( array(
				"post_id" =>  $vars['post_id'],
				"meta_key"  =>  'i_meta',
				"sub_key" =>  'gallery.template',
				)
			);
	}
	$vars['gallery_template'] = $gallery_template;

	if( in_array( $gallery_template, $omit_galleries_in ) )
		return true;
	else
		return false;
}


// BEFORE POST CONTENT PROCESSING
function i_pw_get_post_content_action( $vars ){
	// DEV VAR
	//global $dev;
	//$dev = $vars;

	// If the gallery template is to be ommitted, disable the gallery shortcode
	if( i_should_omit_gallery($vars) ){
		remove_shortcode('gallery');
		add_shortcode( 'gallery', 'pw_empty_shortcode' );
	}
}
add_action( 'pw_get_post_content', 'i_pw_get_post_content_action' );

// AFTER POST CONTENT PROCESSING
function i_pw_get_post_complete_action( $vars ){
	// Re-add the gallery shortcode
	if( i_should_omit_gallery($vars) ){
		remove_shortcode('gallery');
		add_shortcode( 'gallery', 'pw_gallery_shortcode' );
	}
}
add_action( 'pw_get_post_complete', 'i_pw_get_post_complete_action' );


/////////// ADD IMAGE SIZES //////////
add_image_size( 'grid', '640', '480', true );
add_image_size( 'widescreen', '1600', '900', true );

add_image_size( 'thumb-square', '400', '400', true );

add_image_size( 'thumb-wide', '600', '400', true );
add_image_size( 'thumb-x-wide', '800', '400', true );

add_image_size( 'thumb-tall', '400', '600', true );
add_image_size( 'thumb-x-tall', '400', '800', true );


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
			"appId"       =>  "1405296116397365",
			"include_sdk" =>  true,
			"settings"  =>  array(
				"layout"    =>  "button_count",
				"action"    =>  "like",
				"show_faces"  =>  "false",
				"share"     =>  "true",
				"width"     =>  "133",
				"height"    =>  "24",
				"colorscheme" => "light",
				),
			),

		array(
			"network"     =>  "twitter",
			"widget"      =>  "share",
			"include_script"=>  true,
			"settings"    =>  array(
				"via"       =>  "twitter_user",
				"related"   =>  "twitter_user",
				"hashtags"  =>  "twitter_user",
				"size"      =>  "small",
				"lang"      =>  "en",
				"dnt"       =>  "true",
				),
			),

		),

	);



?>