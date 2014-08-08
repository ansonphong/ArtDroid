<?php

function i_meta_postmeta_defaults( $post ){

	// Return early if no i_meta object
	if( !isset( $post['post_meta']['i_meta'] ) )
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
		
		///// SET DEFAULT VALUES /////
		
		// DOWNLOAD IMAGE
		$post_value = $post['post_meta']['i_meta']['image']['download'];
		// Override null value with default value
		if( $post_value == null )
			$post['post_meta']['i_meta']['image']['download'] = $default_i_meta['image']['download'];
		
	}
	
	//$post = i_set_obj( $post, "post_meta.i_meta.defaults", $default_i_meta );

	return $post;	

}

add_filter( 'pw_get_post_complete_filter', 'i_meta_postmeta_defaults' );

?>