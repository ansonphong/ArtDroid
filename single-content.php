<?php
/**
 * ///// CONTENT /////
 * The main part of the post.
 */

// Social Media Widgets
global $social_settings;
$social_settings['meta']['url'] = get_permalink();

// Get theme options
$theme_options = pw_get_option(array('option_name'=>PW_OPTIONS_THEME));

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
	'image(stats)',
	'image(tags)',
	'image(colors)',
	'image(sm,512,512,2)',
	'image(md,1024,1024,2)',
	'image(lg,2048,2048,2)',
	'image(xl,4096,4096,2)',
	'image(full)',
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
		'password_protected'=> !empty( $post->post_password ),
		'theme_options'		=> $theme_options,
		'header_type'		=> $header_type,
		//'is_page_header_image' => ( $header_type === 'feature_image' && $post->post_type === 'page' )
		),
	'js_vars'	=>	array('post'),
	);

// Get and Print the Post in Template
$post_html = pw_print_post( $post_settings );