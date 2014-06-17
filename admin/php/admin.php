<?php

global $theme_admin_menu_name;
$theme_admin_menu_name = 'theme-options';

global $child_admin;
$child_admin = array(

	'expanse' => array(
		'parent_slug' => $theme_admin_menu_name,
		'page_title' => 'Expanse',
		'menu_title' => 'Expanse',
		'capability' => 'manage_options',
		'menu_slug' => $theme_admin_menu_name.'-expanse',
		'function' => 'infinite_options_expanse',
		),
	
	);


///// ADD ADMIN MENU PAGE /////
add_action( 'admin_menu', 'child_theme_admin_menu', 11 );
function child_theme_admin_menu(){
	global $child_admin;
	//$page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position
	
    add_submenu_page(
    	$child_admin['expanse']['parent_slug'],
    	$child_admin['expanse']['page_title'],
    	$child_admin['expanse']['menu_title'],
    	$child_admin['expanse']['capability'],
    	$child_admin['expanse']['menu_slug'],
    	$child_admin['expanse']['function'],
    	$child_admin['expanse']['icon_url']
    	);

}


///// SOCIAL SCREEN /////
function infinite_options_expanse(){
	global $child_admin;
	include_admin_styles();
	i_include_scripts();
	?>
	<div id="infinite_admin" ng-app="infinite" class="expanse">
		<h1><i class="icon-heart"></i> <?php echo $child_admin['expanse']['page_title']; ?></h1>
		<?php
			include 'page-expanse.php';
		?>
	</div>
<?php }


?>