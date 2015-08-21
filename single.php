<?php
global $post;
global $pw;

// Redirect pages with redirect_url postmeta
$redirect_url = get_post_meta( $post->ID, 'redirect_url', true );
if( !empty($redirect_url) )
	wp_redirect( $redirect_url, '301' );

pw_header('single');


/**
 * ///// HEAD /////
 * This part appears above the post content.
 */
if( is_page() )
	include locate_template( 'views/theme/page-head.php' ); 
//else if( is_single() )
//	include locate_template( 'views/theme/post-head.php' ); 


/**
 * ///// CONTENT /////
 * The main part of the post.
 */

// Social Media Widgets
global $social_settings;
$social_settings['meta']['url'] = get_permalink();

$fields = array(
	'ID',
	'post_id',
	'post_type',
	'post_status',
	'post_title',
	'post_content',
	'post_excerpt',
	'post_name',
	'post_permalink',
	'post_date',
	'post_date_gmt',
	'post_timestamp',
	'post_class',
	'post_format',
	'link_format',
	'link_url',
	'related_post',
	'post_parent',
	'parent_post(preview)',
	'image(all)',
	'image(tags)',
	'image(stats)',
	'time_ago',
	'author(ID)',
	'edit_post_link',
	'taxonomy(all)',
	'post_meta(all)',
	'gallery(ids,posts)'
	);

///// PRINT POST /////
$post_settings = array(
	'post_id'	=>	$post->ID,
	'fields'	=>	$fields,
	'view'		=>	'full-h2o',
	'vars'	=> array(
		'social_widgets'	=>	pw_social_widgets( $social_settings ),
		'social_share'		=>	pw_social_share( $post ),
		'pw'				=>	$pw,
		),
	'js_vars'	=>	array('post'),
	);

// Get and Print the Post in Template
$post_html = pw_print_post( $post_settings );


/**
 * ///// CONTENT /////
 * Allows Postworld to modify the layout.
 */
$layout_args = array(
	'content'			=>	$post_html,
	);
pw_print_layout( $layout_args );

pw_footer();

?>