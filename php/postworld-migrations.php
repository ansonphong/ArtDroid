<?php
/**
 * Every time the theme version increases, run these methods.
 */
add_action( 'artdroid_theme_upgrade', 'artdroid_upgrade_routine' );
function artdroid_upgrade_routine(){
	// Clear Cache on Theme Upgrade
	pw_truncate_cache();
}

/**
 * THEME DATABASE UPGRADE MIGRATIONS
 * Do theme migrations for versions less than 1.4.32
 */
add_action( 'artdroid_theme_upgrade', 'theme_migration_one_point_four_point_three_two' );
function theme_migration_one_point_four_point_three_two( $vars, $force = false ){
	if( version_compare( $vars['previous_version'], '1.4.32' ) === -1 || $force == true ){
		pw_log('RUN MIGRATIONS', 'theme_migration_one_point_four_point_three_two');
		global $wpdb;
		$pw_database = new PW_Database();
		$post_meta_table = $wpdb->postworld_prefix.'post_meta';
		// If the legacy table exists, from an older install of ArtDroid
		if( $pw_database->table_exists($post_meta_table) ){
			// Get the link_url and link_format values from $wpdb->postworld_prefix.'post_meta'
			// And transfer values to wp_postmeta prefixed with the theme name
			$post_meta_table = $pw_database->get_all_table_values( $post_meta_table );
			$key_prefix = pw_theme_slug().'_';
			foreach( $post_meta_table as $row ){
				if( !empty( $row->link_url ) )
					update_post_meta( $row->post_id, $key_prefix.'link_url', $row->link_url );
				if( $row->link_format !== 'standard' )
					update_post_meta( $row->post_id, $key_prefix.'link_format', $row->link_format );
			}
			// Delete table
			$pw_database->drop_table( $post_meta_table );
		}
	}
	return;
}

/**
 * THEME DATABASE UPGRADE MIGRATIONS
 * Do theme migrations for versions less than 1.4.25
 */
add_action( 'artdroid_theme_upgrade', 'theme_migration_one_point_four_point_two_five' );
function theme_migration_one_point_four_point_two_five( $vars ){
	global $wpdb;
	//pw_log('RUN MIGRATIONS', 'theme_migration_one_point_four_point_two_five');

	$pw_database = new PW_Database();

	// If the version being upgraded is earlier than 1.4.25
	if( version_compare( $vars['previous_version'], '1.4.25' ) === -1 ){

		/**
		 *	WP_POSTMETA TABLE
		 *	Migrate Postmeta keys, to prefixed versions in wp_postmeta table
		 */
		$pw_database->rename_postmeta_keys( 'redirect_url', THEME_REDIRECT_URL );
		$pw_database->rename_postmeta_keys( 'link_target', 	THEME_LINK_TARGET );
		$pw_database->rename_postmeta_keys( 'alt_image', 	THEME_ALT_IMAGE );

		$pw_database->rename_postmeta_keys( 'pw_meta', 		PW_POSTMETA_KEY );
		$pw_database->rename_postmeta_keys( 'pw_colors', 	PW_COLORS_KEY );
		$pw_database->rename_postmeta_keys( 'pw_avatar', 	PW_AVATAR_KEY );

		/**
		 *	WP_TERMMETA TABLE
		 *	Migrate Termmeta keys, to prefixed versions in wp_termmeta table
		 */
		$pw_database->rename_termmeta_keys( 'icon', 			THEME_ICON );
		$pw_database->rename_termmeta_keys( 'image-primary', 	THEME_IMAGE_PRIMARY );
		$pw_database->rename_termmeta_keys( 'image-secondary', 	THEME_IMAGE_SECONDARY );

		/**
		 *	WP_OPTIONS TABLE
		 *	Migrate 'postworld' Prefixed option names to
		 *	'artdroid' theme prefixed option names
		 */
		$pw_database->rename_option( 'postworld-theme-artdroid', 		PW_OPTIONS_THEME );
		$pw_database->rename_option( 'postworld-styles-artdroid', 		PW_OPTIONS_STYLES );

		$pw_database->rename_option( 'postworld-modules',				PW_OPTIONS_MODULES );
		$pw_database->rename_option( 'postworld-site',					PW_OPTIONS_SITE );
		$pw_database->rename_option( 'postworld-layouts',				PW_OPTIONS_LAYOUTS );
		$pw_database->rename_option( 'postworld-sidebars',				PW_OPTIONS_SIDEBARS );
		$pw_database->rename_option( 'postworld-feeds',					PW_OPTIONS_FEEDS );
		$pw_database->rename_option( 'postworld-feed-settings',			PW_OPTIONS_FEED_SETTINGS );
		$pw_database->rename_option( 'postworld-social',				PW_OPTIONS_SOCIAL );
		$pw_database->rename_option( 'postworld-iconsets',				PW_OPTIONS_ICONSETS );
		$pw_database->rename_option( 'postworld-backgrounds',			PW_OPTIONS_BACKGROUNDS );
		$pw_database->rename_option( 'postworld-background-contexts',	PW_OPTIONS_BACKGROUND_CONTEXTS );
		$pw_database->rename_option( 'postworld-shortcodes',			PW_OPTIONS_SHORTCODES );
		$pw_database->rename_option( 'postworld-shortcode-snippets',	PW_OPTIONS_SHORTCODE_SNIPPETS );
		$pw_database->rename_option( 'postworld-header-code',			PW_OPTIONS_HEADER_CODE );
		$pw_database->rename_option( 'postworld-defaults',				PW_OPTIONS_DEFAULTS );
		$pw_database->rename_option( 'postworld-comments',				PW_OPTIONS_COMMENTS );
		$pw_database->rename_option( 'postworld-db-version',			PW_DB_VERSION );

		// Update metakey names in the option_value column
		$pw_database->search_and_replace( array(
			'table_name' => $wpdb->options,
			'column_name' => 'option_value',
			'search_value' => 'pw_meta',
			'replace_value' => PW_POSTMETA_KEY,
			'where_row' => 'option_name',
			'where_value' => array(
				PW_OPTIONS_DEFAULTS,
				)
			));

		/**
		 * Rename tables from postworld_ prefixed to artdroid_ prefixed
		 */
		$pw_database->rename_table(
			$wpdb->prefix.'postworld_post_meta',
			$wpdb->postworld_prefix.'post_meta' );
		$pw_database->rename_table(
			$wpdb->prefix.'postworld_cache',
			$wpdb->postworld_prefix.'cache' );

	} 
}

/**
 * THEME OPTIONS RUNTIME MIGRATIONS
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
 * POSTMETA RUNTIME MIGRATIONS
 */
add_filter( PW_POSTMETA, 'theme_postmeta_migrate', 11 );
function theme_postmeta_migrate( $pw_meta ){

	// If slider height is a string or float, make default value
	$slider_height = _get( $pw_meta, 'header.slider.height' );
	if( !is_array( $slider_height ) )
		$pw_meta = _set( $pw_meta, 'header.slider.height', array(
			'method' => 'window-percent',
			'value' => 66
			));

	return $pw_meta;

}