<?php
///// METABOXES /////
include "metaboxes.php";

/*
function postworld_theme_submenu( $submenu ){
	global $pw;
	$submenu['theme'] = array(
		'parent_slug'	=> $pw['info']['slug'],
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'capability' 	=> 'manage_options',
		'menu_slug' 	=> $pw['info']['slug'].'-theme',
		'function' 		=> 'postworld_admin_theme_page',
		'icon_url'		=> '',
		);
	return $submenu;
}
*/
//add_filter( 'pw_admin_submenu', 'postworld_theme_submenu' );

add_action( 'admin_menu', 'artdroid_admin_menu', 8 );
function artdroid_admin_menu(){
	$admin = array(
		'menu' => array(
			'page_title' => 'ArtDroid',
			'menu_title' => 'ArtDroid',
			'capability' => 'manage_options',
			'menu_slug' => 'artdroid',
			'function' => 'postworld_admin_theme_page',
			//'icon_url' => '',//plugins_url( $migration_admin_folder.'/images/logo/pw_symbol-16.png' ),
			//'menu_icon'	=>	'dashicons-art',
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

///// ADMIN STYLES /////
add_action('admin_print_styles', 'theme_admin_icon_styles');
function theme_admin_icon_styles(){
	?>
	<style>
		#toplevel_page_artdroid .dashicons-before:before{
			content: "\e701";
			font-family: "icomoon"
		}
	</style>
	<?
}


///// SOCIAL SCREEN /////
function postworld_admin_theme_page(){
	//global $child_admin;
	//i_include_scripts();
	include 'page-theme.php';
}

?>