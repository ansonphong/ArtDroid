<?php
/**
 * Preload Template Partials
 * Decreases load time.
 */
add_action( 'theme_preload_templates', 'theme_preload_template_partials' );
function theme_preload_template_partials(){
	$context = pw_view_context();

	if( in_array( 'archive-post-type-blog', $context ) ||
		in_array( 'single-blog', $context ) ){
		echo pw_grab_ng_template( 'panels', 'featured-image--full' );
		echo pw_grab_ng_template( 'panels', 'featured-image--slice' );
	}

	if( in_array( 'home', $context ) ||
		in_array( 'archive', $context ) ){
		echo pw_grab_ng_template( 'panels', 'post-controls' );
	}

	if( in_array( 'single', $context ) ||
		in_array( 'page', $context ) ){
		echo pw_grab_ng_template( 'panels', 'image-info' );
	}

}

