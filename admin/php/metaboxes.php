<?php

function pw_admin_child_metabox_templates(){
	include 'metaboxes/options.php';
}
add_action('pw_admin_options_metabox_templates', 'pw_admin_child_metabox_templates' );

function pw_admin_child_metabox_scripts(){
	include 'metaboxes/scripts.php';
}
add_action('pw_admin_options_metabox_scripts', 'pw_admin_child_metabox_scripts' )

?>