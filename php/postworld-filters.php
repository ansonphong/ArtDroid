<?php

add_filter('pw_options_meta','theme_options_meta');
function theme_options_meta($options_meta){

	$options_meta['header']['type'] = array(
			array(
				'slug' => 'default',
				'name' => _x( 'Default', 'default option', 'postworld' ),
			),
			array(
				'slug' => 'featured_image',
				'name' => __( 'Featured Image', 'postworld' ),
			),
			array(
				'slug' => 'slider',
				'name' => __( 'Slider', 'postworld' ),
			),
			array(
				'slug' => 'none',
				'name' => __( 'None', 'postworld' ),
			),
		);

	return $options_meta;

}

/**
 * Turn off footer if gallery type is immersive.
 */
add_filter( 'theme_show_footer', 'theme_show_footer_options', 1 );
function theme_show_footer_options( $show_footer ){

	if( is_page() || is_single() ){
		global $post;
		$is_immersive = pw_grab_postmeta( $post->ID, PW_POSTMETA_KEY, 'gallery.immersive' );
		return !$is_immersive;
	}
	else{
		return $show_footer;
	}
	
}

/**
 * Pre-load posts which are injected into the pwData Angular service
 * Under pwData.posts
 */
add_filter( PW_POSTS, 'theme_pw_posts_preload' );
function theme_pw_posts_preload( $posts ){

	// Load the modal header image
	$modal_image_id = pw_grab_option( PW_OPTIONS_THEME, 'modals.header.image.attachment_id' );
	if( !empty( $modal_image_id ) )
		$posts[] = pw_get_post(
			$modal_image_id,
			array( 'ID','post_type','image(md,1000,128,2)','image(sm,500,64,2)' ),
			array( 'cache' => true ) );

	return $posts;
}

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
add_filter( PW_GLOBAL_OPTIONS, 'pw_theme_global_options' );
function pw_theme_global_options( $options = array() ){
	// Print these options for access in Javascript context
	$options['theme'] = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) );
	return $options;
}


/**
 * DEFAULT FEED OPTIONS
 */
add_filter( PW_FEED_DEFAULT, 'pw_theme_feed_defaults_filter' );

function pw_theme_feed_defaults_filter( $feed ){
	// Set the default number of columns in the grid view
	$feed = _set( $feed, 'options.views.grid.columns', 4 );
	return $feed;
}


/**
 * LOAD GLOBAL OPTIONS
 * Adds variables to global Javascript options
 * available in Javascript at $pw.options
 */
add_filter( PW_GLOBAL_OPTIONS, 'theme_pw_global_options' );
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


/**
 * FILTER OEMBED OPTIONS
 */
add_filter( 'pw_oembed_get', 'theme_filter_pw_oembed_get' );
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



/**
 * Override feed settings in select contexts.
 * @todo Cleanup logic pattern, make compatible for wider user and CPTs
 */
add_filter( PW_FEED_OVERRIDE, 'theme_feed_override_filter' );
function theme_feed_override_filter( $feed ){
	global $pw;
	global $post;

	$is_from_preset_feed = (bool) _get( $feed, 'id' );
	$is_home_page = in_array( 'home', $pw['view']['context'] );
	$is_year_archive = in_array( 'archive-year', $pw['view']['context'] );

	/**
	 * Force posts for home and year archives
	 *
	 * @todo Make this compatible for blog or CPT year archives
	 */
	if( $is_year_archive && !$is_from_preset_feed ){
		$feed['query']['post_type'] = 'post';
	}
	
	/**
	 * Adjust the feed settings when setting the posts template
	 * On a regular page.
	 */
	/*
	$wp_page_template = get_post_meta( $post->ID, '_wp_page_template', true );
	if( is_page() && $wp_page_template === 'posts.php' ){
		unset($feed['query']['pagename']);
		$feed['query']['post_type'] = 'post';
	}
	*/
	
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
add_filter( PW_FEED_OVERRIDE, 'theme_feed_default_filter' );
function theme_feed_default_filter( $feed ){
	global $pw;

	////////// HOME PAGE //////////
	if( in_array( 'home', $pw['view']['context'] ) &&
		_get( $feed, 'view.current' ) !== 'list' ){
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
		'preload' => get_option('posts_per_page', 10),
		'load_increment' => pw_grab_option( PW_OPTIONS_THEME, 'feeds.settings.load_increment' ),
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
	// Blog defaults from custom defaults
	if( _get( $post, 'post_type' ) === 'blog' ){
		$post['post_meta'] = pw_set_custom_default( array(
			'subject' => $post['post_meta'],
			'type' => 'wp_postmeta',
			'default_key' => PW_POSTMETA_KEY.'.featured_image.display'
			));
	}

	///// RETURN /////	
	//$post = _set( $post, "post_meta.".PW_POSTMETA_KEY.".defaults", $default_pw_meta );
	return $post;	

}


/**
 * GET ALTERNATIVE IMAGE FROM POST META ID
 */
add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_alt_image' );
function theme_postmeta_alt_image( $post ){
	// The theme has the option to select an alternative image for each post
	// This is tored inthe postmeta as alt_image, in the form of a thumbnail_id
	$alt_image_id = _get( $post, 'post_meta.'.THEME_ALT_IMAGE );
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
		'post_meta('.PW_POSTMETA_KEY.')',
		'post_meta('.THEME_ALT_IMAGE.')',
		'post_meta(_thumbnail_id)',
		'feed_order',
		);

}


/**
 * Reverse the ordering, depending on if the background is light or dark.
 * ASC for dark backgrounds
 * DESC for light backgrounds
 */
function theme_get_color_order(){
	// Check for cached value
	if( isset( $GLOBALS['theme_color_order'] ) )
		return $GLOBALS['theme_color_order'];

	// Decide on the color order
	$pw_colors = new PW_Colors();
	$background_color = pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.global-background-color' );
	$background_color_tags = $pw_colors->get_color_tags( $background_color, 'hex' );
	
	// If the light color tag is detected
	if( in_array( 'light', $background_color_tags ) )
		$order = 'DESC';
	else
		$order = 'ASC';

	// Cache color order on runtime global variable
	$GLOBALS['theme_color_order'] = $order;

	return $order;
}

add_filter( 'pw_color_profiles', 'theme_color_profiles', 11 );
function theme_color_profiles( $profiles ){

	unset( $profiles['default'] );
	$order = theme_get_color_order();

	$profiles['dynamic'] = array(
		'order_by'		=> 'lightness',
		'order'			=> $order,
		'processing'	=>	array(
			'lightness_range' => array(
				'low' => 0.15,
				'high' => 0.8,
				'distribute' => true,
				'order' => $order,
				),
			'saturation_range' => array(
				'low' => 0.0,
				'high' => 0.5,
				'distribute' => false,
				'order' => $order,
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

