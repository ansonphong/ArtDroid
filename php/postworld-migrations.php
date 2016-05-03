<?php
/**
 * Do theme migrations for versions less than 1.425
 */
add_action( 'artdroid_theme_upgrade', 'theme_migration_one_point_four_two_five' );
function theme_migration_one_point_four_two_five( $vars ){

	$pw_database = new PW_Database();

	// If the version being upgraded is earlier than 1.425
	if( version_compare( $vars['previous_version'], '1.425' ) === -1 ){

		/**
		 * Migrate Postmeta keys, to prefixed versions
		 */
		$pw_database->rename_all_postmeta_keys( 'redirect_url', 'artdroid_redirect_url' );
		$pw_database->rename_all_postmeta_keys( 'link_target', 'artdroid_link_target' );

		// @todo impliment prefixing for these in postworld core.
		
		// pw_meta -> artdroid_meta
		// pw_colors -> artdroid_colors
		// pw_avatar -> artdroid_avatar

		/**
		 * 	update wp_postmeta
			set meta_key = 'new_key_name'
			where meta_key = 'old_key_name'
		 */



		// Rename Database Tables
		

		// OPTIONS TABLE
		// postworld-theme-artdroid -> artdroid-theme-options
		// postworld-styles-artdroid -> artdroid-styles

	} 
}

/**
 * THEME OPTIONS MIGRATIONS
 */
add_filter( PW_OPTIONS_THEME, 'theme_options_migrate' );
function theme_options_migrate( $options ){

	/**
	 * HOME PAGE SLIDER HEIGHT
	 * Switch from proportional height model to
	 * Using pw-height methods.
	 */
	$home_slider_height = _get( $options, 'home.slider.height' );
	if( !is_array( $home_slider_height ) )
		$options['home']['slider']['height'] = array(
			'method' => 'window-percent',
			'value' => 66
			);

	/**
	 * Blog post header height
	 */
	$blog_post_header_height = _get( $options, 'blog.settings.views.full.header.height' );
	if( !is_array( $blog_post_header_height ) )
		$options['blog']['settings']['views']['full']['header']['height'] = array(
			'method' => 'proportion',
			'value' => 4
			);

	return $options;

}

/**
 * POSTMETA MIGRATIONS
 */
add_filter( PW_POSTMETA, 'theme_postmeta_migrate', 11 );
function theme_postmeta_migrate( $pwMeta ){

	// If slider height is a string or float, make default value
	if( !is_array( $pwMeta['header']['slider']['height'] ) )
		$pwMeta['header']['slider']['height'] = array(
			'method' => 'window-percent',
			'value' => 66
			);

	return $pwMeta;

}