<?php
include "metaboxes.php";

/**
 * Change the slug of the Postworld admin settings so it's branded
 */
add_filter('pw_admin_submenu_slug','theme_pw_admin_submenu_slug');
function theme_pw_admin_submenu_slug( $slug = '' ){
	return 'artdroid';
}

/**
 * Add the theme branded header to the top of Postworld Admin pages
 */
add_action('postworld_admin_header','theme_admin_header');
function theme_admin_header(){
	echo pw_ob_admin_template('theme-admin-header');
}

add_action( 'admin_menu', 'artdroid_admin_menu', 8 );
function artdroid_admin_menu(){
	$admin = array(
		'menu' => array(
			'page_title' => 'ArtDroid',
			'menu_title' => 'ArtDroid',
			'capability' => 'manage_options',
			'menu_slug' => 'artdroid',
			'function' => 'postworld_admin_theme_page',
			'menu_icon'	=>	'dashicons-art',
			'position' => ''
			),
		'submenu' => array(),
		);
	add_menu_page(
    	$admin['menu']['page_title'],
    	$admin['menu']['menu_title'],
    	$admin['menu']['capability'],
    	$admin['menu']['menu_slug'],
    	$admin['menu']['function'],
    	$admin['menu']['menu_icon']
    	);
}
function postworld_admin_theme_page(){
	include 'page-theme.php';
}

/**
 * Add Theme Icon to WP Admin Bar and Top-level Admin Menu
 */
if( is_admin_bar_showing() ){
	add_action('wp_print_styles', 'theme_admin_icon_styles');
}
add_action('admin_print_styles', 'theme_admin_icon_styles');
function theme_admin_icon_styles(){
	echo '
	<style>
		#toplevel_page_artdroid .dashicons-before:before,
		#wpadminbar #wp-admin-bar-postworld-menu .ab-icon:before{
			content: "\e900";
			font-family: "Postworld-Icons"
		}
	</style>
	';
}

