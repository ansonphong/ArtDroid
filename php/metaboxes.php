<?php

function i_admin_child_metabox_templates(){
	include 'metaboxes/options.php';
}
add_action('i_admin_options_metabox_templates', 'i_admin_child_metabox_templates' );

function i_admin_child_metabox_scripts(){
	include 'metaboxes/scripts.php';
}
add_action('i_admin_options_metabox_scripts', 'i_admin_child_metabox_scripts' )

?>