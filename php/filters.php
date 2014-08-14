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
	if( !empty( $default_i_meta ) ){
		
		// Use default meta as default values
		$post['post_meta']['i_meta'] = array_replace_recursive(
			$default_i_meta,
			$post['post_meta']['i_meta']
			);
		
		////////// SET DEFAULT VALUES //////////
		
		///// DOWNLOAD IMAGE /////
		$post_value = i_get_obj( $post, 'post_meta.i_meta.image.download' ); // $post['post_meta']['i_meta']['image']['download'];
		$site_value = i_get_obj( $default_i_meta, 'image.download' );
		// Override 'default' value with the default value
		if( $post_value == 'default' && $mode != 'edit' ){
			// Set in post
			$post['post_meta']['i_meta']['image']['download'] = $site_value;
		}
		
		///// LABEL : SHOW /////
		$post_obj = i_get_obj( $post, 'post_meta.i_meta.link_url.label' );
		$site_obj = i_get_obj( $default_i_meta, 'link_url.label' );
		$new_obj = array();
		switch( $post_obj['show'] ){
			case 'default':
				$new_obj = $site_obj;
				break;

			case 'custom':
				$new_obj = $post_obj;
				break;

			case true:
					// Use site defaults
					$new_obj = $site_obj;
					// Force show true
					$new_obj['show'] = true;
				break;
				
			case false:
				// Use site defaults
				$new_obj = $site_obj;
				// Force show false
				$new_obj['show'] = false;
				break;

		}

		///// LABEL : HIGHLIGHT /////
		switch( $post_obj['highlight'] ){
			case 'default':
				// Use the site default value
				$new_obj['highlight'] = $site_obj['highlight'];
				break;
		}

		// Set the decided values
		$post['post_meta']['i_meta']['link_url']['label'] = $new_obj;

	}
	
	//$post = i_set_obj( $post, "post_meta.i_meta.defaults", $default_i_meta );

	return $post;	

}

add_filter( 'pw_get_post_complete_filter', 'i_meta_postmeta_defaults' );

?>