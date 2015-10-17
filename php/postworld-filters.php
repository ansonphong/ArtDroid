<?php
////////// DEFAULT HEADER ID //////////
add_filter( 'pw_default_layout', 'theme_pw_default_layout' );
function theme_pw_default_layout( $default_layout = array() ){
	$default_layout = array(
		'header'	=>	array(
			'id'	=>	'artdroid-header',
			),
		'footer'	=>	array(
			'id'	=>	'artdroid-footer',
			),
		'template'	=>	'full-width',
		);
	return $default_layout;
}

////////// PRINT OPTIONS //////////
function pw_theme_global_options( $options = array() ){
	// Print these options for access in Javascript context
	$options['theme'] = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) );
	return $options;
}
add_filter( PW_GLOBAL_OPTIONS, 'pw_theme_global_options' );

////////// DEFAULT FEED OPTIONS //////////
function pw_theme_feed_defaults_filter( $feed ){
	// Set the default number of columns in the grid view
	$feed = _set( $feed, 'options.views.grid.columns', 4 );
	return $feed;
}
add_filter( PW_FEED_DEFAULT, 'pw_theme_feed_defaults_filter' );

////////// LOAD GLOBAL OPTIONS //////////
// Shared in Javascript as $pw.options
function theme_pw_global_options( $options ){
	// Adds to Javascript $pw.options
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
	return $options;
}
add_filter( PW_GLOBAL_OPTIONS, 'theme_pw_global_options' );

////////// FILTER OEMBED OPTIONS //////////
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

////////// THEME FEED ARCHIVE FILTER //////////
function theme_feed_archive_filter( $feed ){
	global $pw;
	//pw_log( $feed );

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

	////////// GLOBAL //////////
	$feed_settings = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'feeds.settings' ) );
	if( is_array( $feed_settings ) )
		$feed = array_replace_recursive( $feed, $feed_settings );

	// Pre-process the theme feed vars
	$feed = apply_filters( 'theme_feed_preprocess', $feed );

	return $feed;
	
}
add_filter( PW_FEED_DEFAULT, 'theme_feed_archive_filter' );


////// DEFAULT FEED SETTINGS /////
function theme_default_feeds( $feed ){
	$theme_default_feed = array(
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
	$feed = array_replace_recursive($feed, $theme_default_feed);
	return $feed;
}
add_filter( PW_FEED_DEFAULT, 'theme_default_feeds' );

/**
 * Get the background image which is the background of feed blocks.
 */
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
add_filter( 'theme_feed_preprocess', 'theme_feed_preprocess_blocks_background_image' );



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
	$iOptions = pw_get_option( array( 'option_name'	=>	PW_OPTIONS_THEME ) );
	$default_pw_meta = _get( $iOptions, 'posts.post.post_meta.'.PW_POSTMETA_KEY );

	// If default pw_meta is not set
	if( empty( $default_pw_meta ) )
		return $post;
	
	// Use default meta as default values
	$post = _set( $post, 'post_meta.'.PW_POSTMETA_KEY, array() );
	$post['post_meta'][PW_POSTMETA_KEY] = array_replace_recursive(
		$default_pw_meta,
		$post['post_meta'][PW_POSTMETA_KEY]
		);
	
	//////////////////// SET DEFAULT VALUES ////////////////////
	////////// DOWNLOAD IMAGE //////////
	$post_value = _get( $post, 'post_meta.'.PW_POSTMETA_KEY.'.image.download' ); // $post['post_meta'][PW_POSTMETA_KEY]['image']['download'];
	$site_value = _get( $default_pw_meta, 'image.download' );
	// Override 'default' value with the default value
	if( $post_value == 'default' ){
		// Set in post
		$post['post_meta'][PW_POSTMETA_KEY]['image']['download'] = $site_value;
	}
	
	////////// LINK URL //////////

	// IF IMETA DOESN'T EXIST (SUCH AS FOR ATTACHMENTS) - PLACE DEFAULT VALUES
	// ENABLE ATTACHMENTS TO SAVE IMETA

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


	///// RETURN /////	
	//$post = _set( $post, "post_meta.pw_meta.defaults", $default_pw_meta );
	return $post;	

}

add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_defaults' );



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
 * PREPROCESS SLIDER IMAGE FIELDS
 * Add image fields based on the proportions
 */
add_filter( 'pw_slider_preprocess', 'theme_slider_preprocess_image_fields' );
function theme_slider_preprocess_image_fields( $slider ){

	$fields = array(
		'ID',
		'post_title',
		'post_type',
		'post_meta(all)',
		'post_excerpt',
		'post_permalink',
		'link_url',
		'link_format',
		'fields',
		);

	$image_fields = array(
		'image(id)',
		//'image(meta)',
		'image(stats)',
		);

	// Get the slider proportion
	$proportion = (int) _get( $slider, 'proportion' );
	// Set the default proportion, also used for 'flex'
	if( empty( $proportion ) )
		$proportion = 2;

	// Define image sizes
	$image_sizes = array(
		array(
			'name' 	=> 'xxl',
			'width' => 3200,
			),
		array(
			'name' => 'xl',
			'width' => 2400,
			),
		array(
			'name' => 'lg',
			'width' => 1600,
			),
		array(
			'name' => 'md',
			'width' => 1000,
			),
		array(
			'name' => 'sm',
			'width' => 640,
			),
		);

	// Generate the custom image field values
	$custom_image_fields = array();
	foreach( $image_sizes as $i ){
		$i['height'] = intval( $i['width'] / $proportion );
		$custom_image_fields[] = 'image('.$i['name'].','.$i['width'].','.$i['height'].',1)';
	}

	// Merge all the fields together
	$fields = array_merge( $fields, $image_fields, $custom_image_fields );

	// Inject the fields into the slider
	$slider = _set( $slider, 'query.fields', $fields );
	
	return $slider;
}

/**
 * Define the custom image fields which are generated
 * By the theme using the Postworld image sizing algorithm.
 */
function theme_get_custom_image_fields(){
	return array(
		'image(stats)',
		'image(xs,128,128,1)',
		'image(sm,256,256,1)',
		'image(md,512,512,2)',
		'image(lg,1024,1024,2)',
		'image(xl,2048,2048,2)',
		//'image(xxl,3072,3072,2)',
		//'image(xxl,4096,4096,2)',
	);
}

/**
 * FIELD MODEL : GALLERY
 */
add_filter( 'pw_post_field_model_gallery', 'theme_post_field_model_gallery' );
function theme_post_field_model_gallery( $fields ){
	//pw_log( 'gallery', $fields );

	$fields = array_diff( $fields, array( 'image(all)' ) );

	$custom_image_fields = theme_get_custom_image_fields();

	$fields = array_merge( $fields, array( 'image(full)' ), $custom_image_fields );

	return $fields;
}


/**
 * Generate additional image sizes which
 * Require Postworld image sizing algorithms.
 *
 * @see wp_generate_attachment_metadata()
 * @see apply_filters( 'wp_generate_attachment_metadata', $metadata, $attachment_id ) 
 *
 * @see pw_get_post_image( $post, $fields )
 * 
 * @todo Sync image fields with theme_post_field_model_gallery()
 */
add_filter( 'wp_generate_attachment_metadata', 'theme_generate_special_images_sizes', 10, 2 );
function theme_generate_special_images_sizes( $metadata, $attachment_id ){
	/**
	 * Get the image with custom dimensions
	 * Using Postworld image resizing algorithm.
	 * This caches the images at that resolution.
	 */
	$custom_image_fields = theme_get_custom_image_fields();
	$post_image = pw_get_post_image(
		$attachment_id,
		$custom_image_fields,
		true,
		$metadata
		);

	$metadata['sizes'] = array_replace( $metadata['sizes'], $post_image['sizes'] );

	return $metadata;

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

		'image(sm,400,400,1)',
		'image(md,800,800,0)',
		'image(lg,1024,1024,2)',
		'image(xl,2048,2048,2)',
		'image(full)',

		'edit_post_link',
		'taxonomy(all)',
		'post_format',
		'post_meta(pw_meta)',
		'post_meta(alt_image)',
		'post_meta(_thumbnail_id)',
		'feed_order',
		);

}


add_filter( 'pw_color_profiles', 'theme_color_profiles', 11 );
function theme_color_profiles( $profiles ){

	unset( $profiles['default'] );

	$profiles['dynamic'] = array(
		'order_by'		=> 'lightness',
		'order'			=> 'DESC',
		'processing'	=>	array(
			'lightness_range' => array(
				'low' => 0.15,
				'high' => 0.8,
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



