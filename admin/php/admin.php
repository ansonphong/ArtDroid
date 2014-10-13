<?php
///// METABOXES /////
include "metaboxes.php";

function postworld_theme_submenu( $submenu ){
	global $pw;
	$submenu['child'] = array(
		'parent_slug'	=> $pw['slug'],
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'capability' 	=> 'manage_options',
		'menu_slug' 	=> $pw['slug'].'-child',
		'function' 		=> 'postworld_admin_theme_page',
		'icon_url'		=> '',
		);
	return $submenu;
}
add_filter( 'pw_admin_submenu', 'postworld_theme_submenu' );


///// SOCIAL SCREEN /////
function postworld_admin_theme_page(){
	global $child_admin;
	i_include_admin_styles();
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