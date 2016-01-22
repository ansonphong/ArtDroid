<?php
/**
 * Check for Theme Updates from ArtDroid server
 */
add_action('init','theme_check_for_updates');
function theme_check_for_updates(){
	global $theme_version;
	require_once( get_template_directory().'/lib/theme-updates/theme-update-checker.php');
	$update_server_url = 'http://artdroid.phong.com/';
	$query_vars = array(
		'update_action' => 'get_metadata',
		'update_slug' => 'artdroid',
		'installed_version' => $theme_version
		);
	$query_string = http_build_query( $query_vars );
	$request_url = $update_server_url . '?' . $query_string;
	//pw_log('request_url', $request_url);
	$update_theme = new ThemeUpdateChecker( 'artdroid', $request_url );
}