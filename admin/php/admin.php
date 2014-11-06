<?php
///// METABOXES /////
include "metaboxes.php";

function postworld_theme_submenu( $submenu ){
	global $pw;
	$submenu['theme'] = array(
		'parent_slug'	=> $pw['slug'],
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'capability' 	=> 'manage_options',
		'menu_slug' 	=> $pw['slug'].'-theme',
		'function' 		=> 'postworld_admin_theme_page',
		'icon_url'		=> '',
		);
	return $submenu;
}
add_filter( 'pw_admin_submenu', 'postworld_theme_submenu' );


///// SOCIAL SCREEN /////
function postworld_admin_theme_page(){
	global $child_admin;
	i_include_scripts();
	include 'page-theme.php';
}

?>