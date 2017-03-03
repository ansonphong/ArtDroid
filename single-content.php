<?php
global $post;

// Get Header Meta
$header_meta = pw_get_postmeta( array( "sub_key" => "header" ));
if( is_page() )
	include locate_template( 'views/theme/page-head.php' ); 

// Define what post data is queried
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
	'image(all)',
	'time_ago',
	'author(ID)',
	'edit_post_link',
	'taxonomy(all)',
	'post_meta(all)',
	'gallery(ids,posts)',
	'fields',
	'stats'
	);

$pw_post = pw_get_post($post->ID, $fields);

$pw_comment_form_options = array();


// Add conditional post classes
$add_post_classes = array();
$get_page_style = get_post_meta( $post->ID, THEME_PAGE_STYLE, true );
pw_log( 'get_page_style', $get_page_style );
if( $get_page_style == 'inverted' ){
	$add_post_classes[] = 'page-style--inverted';
}

$vars = array(
	'post'					=>	$pw_post,
	'social_widgets'		=>	pw_social_widgets(),
	'social_share'			=>	pw_social_share( $post ),
	'password_protected'	=>	!empty( $post->post_password ),
	'theme_options'			=>	pw_grab_option(PW_OPTIONS_THEME),
	'header_meta'			=>	$header_meta,
	'device' 				=>	pw_device_meta(),
	'wordpress_comments_enabled' => ($post->post_type !== 'page' && pw_grab_option( PW_OPTIONS_COMMENTS, 'wordpress.enable' )),
	'pw_comment_form' 		=>	pw_comment_form( $pw_comment_form_options, $post->ID ),
	'comments_thirdparty'	=>	pw_get_comments_thirdparty( array( 'post_id' => $post->ID ) ),
	'post_class'			=>	pw_post_class( $add_post_classes, $post->ID),
	'gallery_template'		=>	_get( $pw_post, 'post_meta.'.PW_POSTMETA_KEY.'.gallery.template' ),
	'post_icon'				=>	_get($pw_post,'post_meta.'.PW_POSTMETA_KEY.'.icon.class'),
	'immersive_gallery'		=>	(_get($pw_post,'post_meta.'.PW_POSTMETA_KEY.'.gallery.immersive') && _get($pw_post,'post_meta.'.PW_POSTMETA_KEY.'.gallery.template') !== 'inline'),
	);

pw_print_layout( array(
	'content' => pw_ob_include_template('views/posts/post-single.php', $vars),
	));

