<?php
/**
 * Check for Theme Updates from ArtDroid server.
 */
add_action('init','theme_check_for_updates');
function theme_check_for_updates(){
	require_once( get_template_directory().'/lib/theme-updates/theme-update-checker.php');
	$update_server_url = 'https://artdroid.phong.com/';
	$query_vars = array(
		'update_action' => 'get_metadata',
		'update_slug' => 'artdroid',
		'installed_version' => pw_theme_version(),
		);
	$query_string = http_build_query( $query_vars );
	$request_url = $update_server_url . '?' . $query_string;
	//pw_log('update request_url', $request_url);
	$update_theme = new ThemeUpdateChecker( 'artdroid', $request_url );
}