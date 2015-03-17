<?php
//////////////////// GALLERIES ////////////////////
// Remove the default Gallery shortcode
remove_shortcode('gallery');
// Replace it with the Postworld Gallery shortcode
add_shortcode( 'gallery', 'pw_gallery_shortcode' );

function theme_should_omit_gallery( $vars ){
	// Function which detects whether or not to
	// omit the gallery shortcode based on conditions

	// Omit the gallery shortcode where the gallery.template is any of these values
	$omit_galleries_in = array(
		'horizontal',
		'vertical',
		'frame',
		);
	$gallery_template = pw_get_obj( $vars, 'post.post_meta.'.PW_POSTMETA_KEY.'.gallery.template' );
	if( $gallery_template == false ){
		$gallery_template = pw_get_wp_postmeta( array(
				"post_id" 	=>  $vars['post_id'],
				"meta_key"  =>  PW_POSTMETA_KEY,
				"sub_key"	=>  'gallery.template',
				)
			);
	}
	$vars['gallery_template'] = $gallery_template;

	if( in_array( $gallery_template, $omit_galleries_in ) )
		return true;
	else
		return false;
}

// BEFORE POST CONTENT PROCESSING
function theme_pw_get_post_content_action( $vars ){
	// DEV VAR
	//global $dev;
	//$dev = $vars;

	// If the gallery template is to be ommitted, disable the gallery shortcode
	if( theme_should_omit_gallery($vars) ){
		remove_shortcode('gallery');
		add_shortcode( 'gallery', 'pw_empty_shortcode' );
	}
}
add_action( 'pw_get_post_content', 'theme_pw_get_post_content_action' );

// AFTER POST CONTENT PROCESSING
function theme_pw_get_post_complete_action( $vars ){
	// Re-add the gallery shortcode
	if( theme_should_omit_gallery($vars) ){
		remove_shortcode('gallery');
		add_shortcode( 'gallery', 'pw_gallery_shortcode' );
	}
}
add_action( 'pw_get_post_complete', 'theme_pw_get_post_complete_action' );

?>