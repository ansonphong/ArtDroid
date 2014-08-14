<?php

function i_meta_postmeta_defaults( $post ){
	
	// Return early if no i_meta object or if in edit mode
	if( !isset( $post['post_meta']['i_meta'] ) ||
		$post['mode'] == 'edit' )
		return $post;

	// Check for Defaults
	$iOptions = i_get_option( array( 'option_name'	=>	'i-options' ) );
	$default_i_meta = i_get_obj( $iOptions, 'posts.post.post_meta.i_meta' );

	// If default i_meta is set
	if( empty( $default_i_meta ) )
		return $post;
	
	// Use default meta as default values
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
	///// LABEL : SHOW /////
	$post_obj = i_get_obj( $post, 'post_meta.i_meta.link_url' );
	$site_obj = i_get_obj( $default_i_meta, 'link_url' );
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

	///// NEW TARGET /////
	$new_obj['new_target'] = $post_obj['new_target'];

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

	///// RETURN /////	
	//$post = i_set_obj( $post, "post_meta.i_meta.defaults", $default_i_meta );
	return $post;	

}

add_filter( 'pw_get_post_complete_filter', 'i_meta_postmeta_defaults' );

?>