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


////////// DEFAULT THEME OPTIONS //////////
function pw_theme_options_filter( $options ){
	// Set the default postworld theme options

	$defaultOptions = array(
		'posts'	=>	array(
			'media'	=>	array(
				'style'	=>	array(
					'height'	=>	66,
					),
				),
			'post'	=>	array(
				'post_meta'	=>	array(
					'pw_meta'	=>	array(
						'post_content'	=>	array(
							'columns'	=>	2,
							),
						'link_url'	=>	array(
							'label'	=>	array(
								'show'	=>	'custom',
								'highlight'	=>	true,
								'tooltip'	=>	array(
									'custom' => "Buy this Art",
									),
								'custom' => 'Buy Now',
								),
							'new_target' => true,
							),
						'image'	=>	array(
							'download'	=>	true,
							),
						),
					),
				),
			),
		'social'	=>	array(
			'share'	=>	array(
				'networks'	=>	array(
					'facebook',
					'twitter',
					'reddit',
					'google_plus',
					'pinterest',
					),
				),
			'in_main_menu'		=>	true,
			'in_main_menu_gray'	=>	true,
			),
		'home'	=>	array(
			'feed'	=>	array(
				'blocks'	=>	array(
					'offset' => 3,
					'increment' => 6,
					'max' => 20,
					'classes' => 'view-grid block-widget x-wide',
					'template' => 'widget-grid',
					'widgets' => array(
						'sidebar' => null,
						'background_image'	=>	array(
							'id'	=>	null,
							'parallax_ratio' => -0.5,
							),
						),	
					),
				),
			'slider' => array(
				'show_slider'	=>	false,
				'menu' =>	null,
				'height' => 70,
				'interval' => 5000,
				'hyperlink' => true,
				'no_pause' => true,
				'show_title' => true,
				'show_excerpt' => true,
				),
			),
		'modals'	=>	array(
			'header'	=>	array(
				'show'	=>	true,
				),
			),
		'media'	=>	array(
			'embeds'	=>	array(
				'height'	=>	50,
				),
			/*
			'images'	=>	array(
				'height'	=>	75,
				),
			*/
			),
		'embeds'	=>	array(
			'autoplay'	=>	true,
			'youtube'	=>	array(
				'theme'		=>	'light',
				'color'		=>	'red',
				'controls'	=>	2,
				),
			),
		'feeds'	=>	array(
			'loading'	=>	array(
				'icon'	=>	'icon-spinner-2'
				),
			'settings'	=>	array(
				'preload'			=>	10,
				'load_increment'	=>	10,
				),
			),
		);

	$options = array_replace_recursive( $defaultOptions, $options );
	return $options;
}

add_filter( PW_OPTIONS_THEME, 'pw_theme_options_filter' );

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


////////// THEME FEED ARCHIVE FILTER //////////
function theme_feed_archive_filter( $feed_vars ){
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
			'classes'	=>	'view-grid block-widget x-wide',
			'widgets'	=>	array(
				'sidebar'	=>	null,
				),
		);
		// Get blocks from the theme options
		$blocks = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.feed.blocks' ) );
		// Check to see if blocks options are set
		if( $blocks != false ){
			// Get the specified sidebar id
			$sidebar_id = _get( $blocks, 'widgets.sidebar' );
			// If a sidebar is specified
			if( !empty( $sidebar_id ) ){
				// Overwrite the default blocks settings with the saved settings
				$blocks = array_replace_recursive( $default_blocks, $blocks );
				// Set the blocks settings into the feed variables
				$feed_vars = _set( $feed_vars, 'feed.blocks', $blocks );
			}
		}
	}

	////////// GLOBAL //////////
	$feed_settings = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'feeds.settings' ) );
	$feed_vars['feed'] = array_replace_recursive( $feed_vars['feed'], $feed_settings );

	// Pre-process the theme feed vars
	$feed_vars = apply_filters( 'theme_feed_preprocess', $feed_vars );

	return $feed_vars;
	
}
add_filter( 'pw_feed', 'theme_feed_archive_filter' );


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

function theme_feed_preprocess_blocks_background_image( $feed_vars ){
	// Define the key where the background image is
	$key = 'feed.blocks.widgets.background_image';
	// Detect if there is a feed block widget background image set
	$background_image_id = _get( $feed_vars, $key.'.id' );
	// If so, replace the ID with the actual image object
	if( !empty( $background_image_id ) ){
		$background_image = pw_get_image_obj( $background_image_id );
		$feed_vars = _set( $feed_vars, $key.'.obj', $background_image );
	}
	return $feed_vars;
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
	if( $post_value == 'default' && $mode != 'edit' ){
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
		switch( $post_obj['label']['tooltip']['show'] ){
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

////////// GET ALTERNATIVE IMAGE FROM POST META ID //////////
function theme_postmeta_alt_image( $post ){
	// The theme has the option to select an alternative image for each post
	// This is tored inthe postmeta as alt_image, in the form of a thumbnail_id
	$alt_image_id = _get( $post, 'post_meta.alt_image' );
	if( is_numeric( $alt_image_id ) ){
		$post = _set( $post, 'image.alt', pw_get_post_image( $post, array( 'image(all)', 'image(post,micro)' ), $alt_image_id ) );
		//pw_log( "POST ID : " . $post['ID'] .' // ' . "ALT IMAGE ID : " . $alt_image_id );
	}
	return $post;
}
add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_alt_image' );

function theme_get_loading_icon_options(){
	$icons = array(
		'icon-spinner-1',
		'icon-spinner-2',
		'icon-spinner-3',
		'icon-spinner-4',
		'icon-spinner-5',
		'icon-spinner-6',
		'icon-seal-1',
		'icon-triadic-1',
		'icon-triadic-2',
		'icon-triadic-3',
		'icon-triadic-4',
		'icon-triadic-5',
		'icon-seed-of-life',
		'icon-seed-of-life-fill',
		'icon-merkaba',
		'icon-target',
		'icon-sun',
		'icon-contrast',
		'icon-loop',
		'icon-hexagon-thick',
		'icon-hexagon-medium',
		'icon-hexagon-thin',
		'icon-arrow-down-circle',
		);
	return $icons;
}

?>