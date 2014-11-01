<?php

////////// DEFAULT THEME OPTIONS //////////
function pw_theme_options_filter( $options ){
	// Set the default postworld theme options

	$defaultOptions = array(
		'posts'	=>	array(
			'post'	=>	array(
				'post_meta'	=>	array(
					'i_meta'	=>	array(
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
						),	
					),
				),
			'slider' => array(
				'menu' =>	null,
				'height' => 70,
				'interval' => 5000,
				'hyperlink' => true,
				'no_pause' => true,
				'show_title' => true,
				'show_excerpt' => true,
				),
			),
		);

	$options = array_replace_recursive( $defaultOptions, $options );
	return $options;
}

add_filter( 'pwGetOption-'.PW_OPTIONS_THEME, 'pw_theme_options_filter' );



function theme_feed_archive_filter( $feed_vars ){
	global $pw;

	///// HOME PAGE /////
	if( in_array( 'home', $pw['view']['context'] ) ){

		///// BLOCKS : WIDGETS /////
		// Add Feed blocks
		$feed_vars['feed']['blocks'] = array(
			'offset'	=>	2,
			'increment'	=>	8,
			'max' 		=> 	50,
			'template' 	=> 	'widget-grid',
			'classes'	=>	'view-grid block-widget x-wide',
			'widgets'	=>	array(
				'sidebar'	=>	'home-page-sidebar',
				),
		);
	}

	return $feed_vars;
	
}
add_filter( 'theme-feed-archive', 'theme_feed_archive_filter' );


function theme_postmeta_defaults( $post ){

	// If no iMeta, set special var
	$has_i_meta = ( isset( $post['post_meta']['i_meta'] ) ) ?
		true : false ;

	// Return early if  in edit mode
	if( $post['mode'] == 'edit' )
		return $post;

	// If it had no initial i_meta object, return early
	if( !$has_i_meta )
		return $post;

	// Check for Defaults
	$iOptions = i_get_option( array( 'option_name'	=>	'i-options' ) );
	$default_i_meta = i_get_obj( $iOptions, 'posts.post.post_meta.i_meta' );

	// If default i_meta is not set
	if( empty( $default_i_meta ) )
		return $post;
	
	// Use default meta as default values
	$post = i_set_obj( $post, 'post_meta.i_meta', array() );
	$post['post_meta']['i_meta'] = array_replace_recursive(
		$default_i_meta,
		$post['post_meta']['i_meta']
		);
	
	//////////////////// SET DEFAULT VALUES ////////////////////
	////////// DOWNLOAD IMAGE //////////
	$post_value = i_get_obj( $post, 'post_meta.i_meta.image.download' ); // $post['post_meta']['i_meta']['image']['download'];
	$site_value = i_get_obj( $default_i_meta, 'image.download' );
	// Override 'default' value with the default value
	if( $post_value == 'default' && $mode != 'edit' ){
		// Set in post
		$post['post_meta']['i_meta']['image']['download'] = $site_value;
	}
	
	////////// LINK URL //////////

	// IF IMETA DOESN'T EXIST (SUCH AS FOR ATTACHMENTS) - PLACE DEFAULT VALUES
	// ENABLE ATTACHMENTS TO SAVE IMETA

	///// LABEL : SHOW /////
	$post_obj = i_get_obj( $post, 'post_meta.i_meta.link_url' );
	$site_obj = i_get_obj( $default_i_meta, 'link_url' );

	if( $post_obj == false && $site_obj != false ){

		$post = i_set_obj( $post, 'post_meta.i_meta.link_url', $site_obj );

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
		$post['post_meta']['i_meta']['link_url'] = $new_obj;
	}


	///// RETURN /////	
	//$post = i_set_obj( $post, "post_meta.i_meta.defaults", $default_i_meta );
	return $post;	

}

add_filter( 'pw_get_post_complete_filter', 'theme_postmeta_defaults' );

?>