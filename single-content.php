<?php
$theme_options = pw_grab_option(PW_OPTIONS_THEME);

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
	'view'		=>	'single-h2o',
	'vars'	=> array(
		'pw'					=>	$pw,
		'social_widgets'		=>	pw_social_widgets(),
		'social_share'			=>	pw_social_share( $post ),
		'password_protected'	=>	!empty( $post->post_password ),
		'theme_options'			=>	$theme_options,
		'header_type'			=>	$header_meta['type'],
		'is_page_header_image' 	=>	( $header_meta['type'] === 'featured_image' && $post->post_type === 'page' ),
		'device' 				=>	pw_device_meta(),
		'wordpress_comments_enabled' => ($post->post_type !== 'page' && pw_grab_option( PW_OPTIONS_COMMENTS, 'wordpress.enable' )),
		'comments_thirdparty'	=>	pw_get_comments_thirdparty( array( 'post_id' => $post->ID ) ),
		'post_class'			=>	pw_post_class('', $post->ID),
		),
	'js_vars'	=>	array('post'),
	);

// Get and Print the Post in Template
$post_html = pw_print_post( $post_settings );