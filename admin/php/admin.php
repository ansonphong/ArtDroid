<?php
///// METABOXES /////
include "metaboxes.php";

global $theme_admin_menu_name;
$theme_admin_menu_name = 'theme-options';

global $child_admin;
$child_admin = array(

	'child' => array(
		'parent_slug' => $theme_admin_menu_name,
		'page_title' => 'Settings',
		'menu_title' => 'Settings',
		'capability' => 'manage_options',
		'menu_slug' => $theme_admin_menu_name.'-child',
		'function' => 'infinite_options_child',
		),
	
	);

///// ADD ADMIN MENU PAGE /////
add_action( 'admin_menu', 'child_theme_admin_menu', 11 );
function child_theme_admin_menu(){
	global $child_admin;
	//$page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position
	
    add_submenu_page(
    	$child_admin['child']['parent_slug'],
    	$child_admin['child']['page_title'],
    	$child_admin['child']['menu_title'],
    	$child_admin['child']['capability'],
    	$child_admin['child']['menu_slug'],
    	$child_admin['child']['function'],
    	$child_admin['child']['icon_url']
    	);

}

///// SOCIAL SCREEN /////
function infinite_options_child(){
	global $child_admin;
	include_admin_styles();
	i_include_scripts();
	?>
	<div id="infinite_admin" ng-app="infinite" class="child">
		<h1><i class="icon-heart"></i> <?php echo $child_admin['child']['page_title']; ?></h1>
		<?php
			include 'page-child.php';
		?>
	</div>
<?php }


?>