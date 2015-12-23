<?php
///// METABOXES /////
include "metaboxes.php";

function theme_pw_admin_submenu_slug( $slug = '' ){
	return 'artdroid';
}
add_filter('pw_admin_submenu_slug','theme_pw_admin_submenu_slug');

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


/**
 * Add item to admin menu bar on the top.
 */
if( current_user_can('manage_options') )
	add_action( 'admin_bar_menu', 'theme_admin_bar_menu', 999 );
function theme_admin_bar_menu($wp_admin_bar){
	$theme_url = get_admin_url(null,'admin.php?page=artdroid');

	$menu_name = 'theme-menu';

	// Primary Menu Item
	$args = array(
		'id'     	=> 	$menu_name,
		'title'		=>	'<span class="ab-icon"></span> ArtDroid',
		'meta'   	=> 	array( 'class' => 'first-toolbar-group' ),
		'href'		=>	$theme_url,
	);
	$wp_admin_bar->add_node( $args );	

	// Sub menu items
	$args = array();

	array_push($args,array(
		'id'		=>	'theme_settings',
		'title'		=>	'Theme Settings',
		'href'		=>	$theme_url,
		'parent'	=>	$menu_name,
	));

	array_push($args,array(
		'id'     	=>	'site_options',
		'title'		=>	'Site Options',
		'href'		=>	$theme_url.'-site',
		'parent' 	=>	$menu_name,
		'meta'   	=>	array( 'class' => 'theme-menu-item' ),
	));

	array_push($args,array(
		'id'		=>	'site_layout',
		'title'		=>	'Layout',
		'href'		=>	$theme_url.'-layout',
		'parent'	=>	$menu_name,
	));
	
	array_push($args,array(
		'id'		=>	'site_sidebars',
		'title'		=>	'Sidebars',
		'href'		=>	$theme_url.'-sidebars',
		'parent'	=>	$menu_name,
	));
	
	array_push($args,array(
		'id'		=>	'site_styles',
		'title'		=>	'Styles',
		'href'		=>	$theme_url.'-styles',
		'parent'	=>	$menu_name,
	));

	array_push($args,array(
		'id'		=>	'site_social',
		'title'		=>	'Social',
		'href'		=>	$theme_url.'-social',
		'parent'	=>	$menu_name,
	));

	array_push($args,array(
		'id'		=>	'site_feeds',
		'title'		=>	'Feeds',
		'href'		=>	$theme_url.'-feeds',
		'parent'	=>	$menu_name,
	));

	if( pw_module_enabled('backgrounds') )
		array_push($args,array(
			'id'		=>	'site_backgrounds',
			'title'		=>	'Backgrounds',
			'href'		=>	$theme_url.'-backgrounds',
			'parent'	=>	$menu_name,
		));

	array_push($args,array(
		'id'		=>	'site_iconsets',
		'title'		=>	'Iconsets',
		'href'		=>	$theme_url.'-iconsets',
		'parent'	=>	$menu_name,
	));

	array_push($args,array(
		'id'		=>	'site_shortcodes',
		'title'		=>	'Shortcodes',
		'href'		=>	$theme_url.'-shortcodes',
		'parent'	=>	$menu_name,
	));

	array_push($args,array(
		'id'		=>	'site_database',
		'title'		=>	'Database',
		'href'		=>	$theme_url.'-database',
		'parent'	=>	$menu_name,
	));

	// Add plugins to the main frontend admin menu
	array_push($args,array(
		'id'		=>	'plugins',
		'title'		=>	'Plugins',
		'href'		=>	get_admin_url(null,'plugins.php'),
		'parent'	=>	'site-name',
	));

	for($a=0;$a<count($args);$a++){
		$wp_admin_bar->add_node($args[$a]);
	}
	
} 

///// ADMIN STYLES /////
add_action('admin_print_styles', 'theme_admin_icon_styles');
add_action('wp_print_styles', 'theme_admin_icon_styles');
function theme_admin_icon_styles(){
	?>
	<style>
		#toplevel_page_artdroid .dashicons-before:before,
		#wpadminbar #wp-admin-bar-theme-menu .ab-icon:before{
			content: "\e701";
			font-family: "Postworld-Icons"
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