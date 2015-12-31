<?php
/**
 * DEFAULT HEADER ID
 */
add_filter( 'pw_default_layout', 'theme_pw_default_layout' );
function theme_pw_default_layout( $default_layout = array() ){
	$default_layout = array(
		'header'	=>	array(
			'id'	=>	'theme-header',
			),
		'footer'	=>	array(
			'id'	=>	'theme-footer',
			),
		'template'	=>	'full-width',
		);
	return $default_layout;
}

/**
 * PRINT OPTIONS
 */
function pw_theme_global_options( $options = array() ){
	// Print these options for access in Javascript context
	$options['theme'] = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) );
	return $options;
}
add_filter( PW_GLOBAL_OPTIONS, 'pw_theme_global_options' );

/**
 * DEFAULT FEED OPTIONS
 */
function pw_theme_feed_defaults_filter( $feed ){
	// Set the default number of columns in the grid view
	$feed = _set( $feed, 'options.views.grid.columns', 4 );
	return $feed;
}
add_filter( PW_FEED_DEFAULT, 'pw_theme_feed_defaults_filter' );

/**
 * LOAD GLOBAL OPTIONS
 * Adds variables to global Javascript options
 * available in Javascript at $pw.options
 */
function theme_pw_global_options( $options ){
	
	// Adds theme options to Javascript $pw.options
	$theme_options = pw_get_option(array('option_name'=>PW_OPTIONS_THEME));
	$add_options = array(
		'media',
		'embeds',
		'feeds',
		'paths'
		);
	foreach( $add_options as $option ){
		$options[$option] = _get( $theme_options, $option );
	}

	/**
	 * Add specific style options, so that the variables
	 * Can be shared by both LESS and Javascript
	 */
	$pwStyles = pw_get_option( array( 'option_name' => PW_OPTIONS_STYLES ) );
	
	// Get values as variables
	$header_height = intval( _get( $pwStyles, 'layout.header.header-height-expand' ) );
	
	// Set into style array
	$options['style'] = array(
		'header_height_expand' => $header_height,
		);
	
	return $options;
}
add_filter( PW_GLOBAL_OPTIONS, 'theme_pw_global_options' );

/**
 * FILTER OEMBED OPTIONS
 */
function theme_filter_pw_oembed_get( $vars ){
	// Takes the theme embed options
	// And sets them as the default options for embeds
	$embed_options = pw_get_option(array(
		'option_name'	=>	PW_OPTIONS_THEME,
		'key'			=>	'embeds',
		));
	$vars = array_replace_recursive( $vars, $embed_options );
	return $vars;
}
add_filter( 'pw_oembed_get', 'theme_filter_pw_oembed_get' );


/**
 * Override feed settings in select contexts.
 */
add_filter( PW_FEED_OVERRIDE, 'theme_feed_override_filter' );
function theme_feed_override_filter( $feed ){
	global $pw;
	
	// Force posts for home and year archives
	if( in_array( 'home', $pw['view']['context'] ) ||
		in_array( 'archive-year', $pw['view']['context'] ) )
		$feed['query']['post_type'] = 'post';
	
	// Home page primary content
	if( in_array( 'home', $pw['view']['context'] ) ){
		$home_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home' ) );
		if( _get( $home_options, 'content.primary' ) == 'blog' ){
			$feed['query']['post_type'] = 'blog';
			$feed['view']['current'] = 'full';
		}
	}
	return $feed;
}

/**
 * Force Blog Views to Full
 */
add_filter(PW_OPTIONS_FEED_SETTINGS,'theme_options_feed_settings');
function theme_options_feed_settings( $feed_settings ){
	// Force Blog Archives View
	$feed_settings = _set( $feed_settings, 'context.archive-post-type-blog.view.current', 'full' );
	// Force Blog Terms View
	$feed_settings = _set( $feed_settings, 'context.archive-taxonomy-blog_category.view.current', 'full' );

	return $feed_settings;
}

/**
 * THEME FEED ARCHIVE FILTER
 */
add_filter( PW_FEED_DEFAULT, 'theme_feed_default_filter' );
function theme_feed_default_filter( $feed ){
	global $pw;

	////////// HOME PAGE //////////
	if( in_array( 'home', $pw['view']['context'] ) ){
		///// BLOCKS : WIDGETS /////
		// Add Feed blocks
		$default_blocks = array(
			'offset'	=>	2,
			'increment'	=>	8,
			'max' 		=> 	50,
			'template' 	=> 	'widget-grid',
			'classes'	=>	'block-widget x-wide',
			'widgets'	=>	array(
				'sidebar'	=>	null,
				),
		);
		// Get blocks from the theme options
		$blocks = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.feed.blocks' ) );
		// Check to see if blocks options are set
		if( $blocks != false ){
			// Get the specified sidebar id
			$sidebar_id = 'home-page-feed';
			// Set Sidebar ID into the array
			$blocks = _set( $blocks, 'widgets.sidebar', $sidebar_id );
			// Overwrite the default blocks settings with the saved settings
			$blocks = array_replace_recursive( $default_blocks, $blocks );
			// Set the blocks settings into the feed variables
			$feed['blocks'] = $blocks;
		}

	}

	// Pre-process the theme feed vars
	$feed = apply_filters( 'theme_feed_preprocess', $feed );

	return $feed;
	
}


/**
 * DEFAULT FEED SETTINGS
 * Condition the default feed settings,
 * configurable in the admin under Postworld › Feeds.
 */
add_filter( 'pw_default_feed_settings', 'theme_default_feed_settings', 5 );
function theme_default_feed_settings( $feed ){
	$default_feed = array(
		'preload' => 10,
		'load_increment' => 10,
		'view'	=>	array(
			'current' 	=> 'grid',
			),
		'options'	=>	array(
			'views'	=>	array(
				'grid'	=>	array(
					'columns'	=>	4,
					),
				),
			)
		);
	$feed = array_replace_recursive( $feed, $default_feed );
	return $feed;
}


/**
 * Get the background image which is the background of feed blocks.
 */
add_filter( 'theme_feed_preprocess', 'theme_feed_preprocess_blocks_background_image' );
function theme_feed_preprocess_blocks_background_image( $feed ){
	// Define the key where the background image is
	$key = 'blocks.widgets.background_image';
	// Detect if there is a feed block widget background image set
	$background_image_id = _get( $feed, $key.'.id' );
	// If so, replace the ID with the actual image object
	if( !empty( $background_image_id ) ){
		$background_image = pw_get_image_obj( $background_image_id );
		$feed = _set( $feed, $key.'.obj', $background_image );
	}
	return $feed;
}


/**
 * Set postmeta defaults after getting a post.
 */
add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_defaults' );
function theme_postmeta_defaults( $post ){

	// If no pwMeta, set special var
	$has_pw_meta = ( isset( $post['post_meta'][PW_POSTMETA_KEY] ) ) ?
		true : false ;

	// Return early if  in edit mode
	if( $post['mode'] == 'edit' )
		return $post;

	// If it had no initial pw_meta object, return early
	if( !$has_pw_meta )
		return $post;

	// Check for Defaults
	$themeOptions = pw_get_option( array( 'option_name'	=>	PW_OPTIONS_THEME ) );
	$default_pw_meta = _get( $themeOptions, 'posts.post.post_meta.'.PW_POSTMETA_KEY );

	// If default pw_meta is not set
	if( empty( $default_pw_meta ) )
		return $post;
	
	// Use default meta as default values
	$post = _set( $post, 'post_meta.'.PW_POSTMETA_KEY, array() );
	$post['post_meta'][PW_POSTMETA_KEY] = array_replace_recursive(
		$default_pw_meta,
		$post['post_meta'][PW_POSTMETA_KEY]
		);



	/**
	 * SET DEFAULT VALUES
	 */
	///// DOWNLOAD IMAGE /////
	$post_value = _get( $post, 'post_meta.'.PW_POSTMETA_KEY.'.image.download' ); // $post['post_meta'][PW_POSTMETA_KEY]['image']['download'];
	$site_value = _get( $default_pw_meta, 'image.download' );
	// Override 'default' value with the default value
	if( $post_value == 'default' ){
		// Set in post
		$post['post_meta'][PW_POSTMETA_KEY]['image']['download'] = $site_value;
	}
	

	/**
	 * LINK URL
	 * IF PWMETA DOESN'T EXIST (SUCH AS FOR ATTACHMENTS) - PLACE DEFAULT VALUES
	 */
	///// LABEL : SHOW /////
	$post_obj = _get( $post, 'post_meta.'.PW_POSTMETA_KEY.'.link_url' );
	$site_obj = _get( $default_pw_meta, 'link_url' );

	if( $post_obj == false && $site_obj != false ){

		$post = _set( $post, 'post_meta.'.PW_POSTMETA_KEY.'.link_url', $site_obj );

	} else{
		$new_obj = $post_obj;
		switch( $post_obj['label']['show'] ){
			case 'default':
				$new_obj['label'] = $site_obj['label'];
				break;

			case 'custom':
				$new_obj['label'] = $post_obj['label'];
				break;

			case true:
					// Use site defaults
					$new_obj['label'] = $site_obj['label'];
					// Force show true
					$new_obj['label']['show'] = true;
				break;

			case false:
				// Use site defaults
				$new_obj['label'] = $site_obj['label'];
				// Force show false
				$new_obj['label']['show'] = false;
				break;

		}

		///// LABEL : HIGHLIGHT /////
		switch( $post_obj['label']['highlight'] ){
			case 'default':
				// Use the site default value
				$new_obj['label']['highlight'] = $site_obj['label']['highlight'];
				break;
		}

		///// LABEL : TOOLTIP /////
		$show_tooltip = _get( $post_obj, 'label.tooltip.show' );
		switch( $show_tooltip ){
			case 'default':
				// Use the site default value
				$new_obj['label']['tooltip']['custom'] = $site_obj['label']['tooltip']['custom'];
				break;
		}

		///// NEW TARGET /////
		switch( $post_obj['new_target'] ){
			case 'default':
				// Use the site default value
				if( !is_bool( $post_obj['new_target'] ) ){
					$new_obj['new_target'] = $site_obj['new_target'];
				}
				break;
		}

		// Set values into the post
		$post['post_meta'][PW_POSTMETA_KEY]['link_url'] = $new_obj;
	}

	/**
	 * CUSTOM DEFAULTS
	 * This is the new simplified and unified way of settings defaults inline.
	 * Future developments should follow this model, and ignore the previous
	 * High friction methods of settings defaults.
	 */

	$custom_defaults = pw_get_option(array(
		'option_name' => PW_OPTIONS_DEFAULTS,
		'key' => 'wp_postmeta.pw_meta'
		));

	// Blog defaults from custom defaults
	if( _get( $post, 'post_type' ) === 'blog' ){

		/**
		 * @todo Integrate into a unified method which can be cross-used.
		 */
		/*
		$post['post_meta'] = pw_set_custom_default( array(
			'origin' => 'wp_postmeta.pw_meta.featured_image.display'
			'destination' => 'pw_meta.featured_image.display'
			));
		 */
		$fi_display = _get($post,'post_meta.pw_meta.featured_image.display');
		if( !$fi_display || empty($fi_display) || $fi_display == 'default' )
			$post = _set(
				$post,
				'post_meta.pw_meta.featured_image.display',
				_get( $custom_defaults, 'featured_image.display' )
				);

	}

	///// RETURN /////	
	//$post = _set( $post, "post_meta.pw_meta.defaults", $default_pw_meta );
	return $post;	

}



/**
 * GET ALTERNATIVE IMAGE FROM POST META ID
 */
add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_alt_image' );
function theme_postmeta_alt_image( $post ){
	// The theme has the option to select an alternative image for each post
	// This is tored inthe postmeta as alt_image, in the form of a thumbnail_id
	$alt_image_id = _get( $post, 'post_meta.alt_image' );
	if( is_numeric( $alt_image_id ) ){

		/**
		 * Get all the 'fields' with image in it from the post
		 * And get the same image fields for the alt image
		 */
		$image_fields = pw_fields_where( 'image', $post['fields'] );
		//array( 'image(all)', 'image(post,micro)' );

		$post_image = pw_get_post_image( $alt_image_id, $image_fields, true );
		
		$post = _set(
			$post,
			'image.alt',
			$post_image );
		//pw_log( "POST ID : " . $post['ID'] .' // ' . "ALT IMAGE ID : " . $alt_image_id );
	}
	return $post;
}


/**
 * REMOVE THE 'UNCATEGORIZED' ITEM FROM CATEGORIES
 */
add_filter( 'pw_get_post_complete_filter', 'theme_remove_category_uncategorized' );
function theme_remove_category_uncategorized( $post ){
	$categories = _get( $post, 'taxonomy.category' );

	// Check if any categories exist
	if( empty( $categories ) )
		return $post;

	// Remove all 'uncategorized'
	$new_categories = array();
	foreach( $categories as $category ){
		if( $category['slug'] != 'uncategorized' )
			$new_categories[] = $category;
	}
	$post['taxonomy']['category'] = $new_categories;

	return $post;
}


/**
 * Custom field model for Preview posts
 */
add_filter( 'pw_post_field_model_preview', 'theme_post_field_model_preview' );
function theme_post_field_model_preview( $fields ){

	return array(
		'ID',
		'post_title',
		'post_excerpt',
		'post_permalink',
		'time_ago',
		'post_date',
		'post_date_gmt',
		'post_type',
		'post_status',
		'fields',
		'link_format',
		'link_url',
		'post_author',
		'event_start',
		'event_end',
		'post_timestamp',
		
		'image(stats)',
		'image(tags)',
		'image(colors)',
		'image(all)',

		'edit_post_link',
		'taxonomy(all)',
		'post_format',
		'post_meta(pw_meta)',
		'post_meta(alt_image)',
		'post_meta(_thumbnail_id)',
		'feed_order',
		);

}

/**
 * Add field models for post views.
 */
add_action('init','theme_register_field_models');
function theme_register_field_models(){
	$preview_fields = pw_get_post_field_model('preview');
	$micro_fields = pw_get_post_field_model('micro');
	// FULL
	pw_register_post_field_model('full', array_merge( $preview_fields, array(
		'post_content'
	)));
	// LIST
	pw_register_post_field_model('list', array_merge( $micro_fields, array(
		'image(xs)',
		'image(sm)',
	)));
}

add_filter( 'pw_color_profiles', 'theme_color_profiles', 11 );
function theme_color_profiles( $profiles ){

	unset( $profiles['default'] );

	$profiles['dynamic'] = array(
		'order_by'		=> 'lightness',
		'order'			=> 'ASC',
		'processing'	=>	array(
			'lightness_range' => array(
				'low' => 0.15,
				'high' => 0.8,
				'distribute' => true,
				'order' => 'ASC',
				),
			'saturation_range' => array(
				'low' => 0.0,
				'high' => 0.5,
				'distribute' => false,
				'order' => 'ASC',
				),
			),
		);

		/*
		'source' => array(
			'order_by' 		=> 'default'
			),
		*/
		/*
		'median' => array(
			'order_by'		=> 'lightness',
			'order'			=> 'DESC',
			'processing'	=>	array(
				'lightness_range' => array(
					'low' => 0.49,
					'high' => 0.51,
					'distribute' => true,
					'order' => 'DESC',
					),
				'saturation_range' => array(
					'low' => 0.0,
					'high' => 0.5,
					'distribute' => false,
					'order' => 'DESC',
					),
				),
			),
		*/
	

	return $profiles;

}


function theme_get_loading_icon_options(){
	$icons = array(
		'pwi-spinner-1',
		'pwi-spinner-2',
		'pwi-spinner-3',
		'pwi-spinner-4',
		'pwi-spinner-5',
		'pwi-spinner-6',
		'pwi-seal-1',
		'pwi-triadic-1',
		'pwi-triadic-2',
		'pwi-triadic-3',
		'pwi-triadic-4',
		'pwi-triadic-5',
		'pwi-seed-of-life',
		'pwi-seed-of-life-fill',
		'pwi-merkaba',
		'pwi-target',
		'pwi-sun',
		'pwi-contrast',
		'pwi-loop',
		'pwi-hexagon-thick',
		'pwi-hexagon-medium',
		'pwi-hexagon-thin',
		'pwi-arrow-down-circle',
		);
	return $icons;
}



