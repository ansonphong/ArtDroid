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

////////// POST FORMATS //////////
add_theme_support( 'post-formats', array( 'image', 'link' ) );


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

/////////// ADD IMAGE SIZES //////////
add_image_size( 'grid', '640', '480', true );
//add_image_size( 'larger', '1600', '1200', true );
add_image_size( 'widescreen', '1600', '900', true );

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