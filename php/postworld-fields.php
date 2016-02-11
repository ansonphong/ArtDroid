<?php
/**
 * Add field models for post views.
 */
add_action('init','theme_register_field_models');
function theme_register_field_models(){
	$preview_fields = pw_get_post_field_model('preview');
	$micro_fields = pw_get_post_field_model('micro');

	// FULL
	pw_register_post_field_model('full', array_merge( $preview_fields, array(
		'post_content(more)'
	)));

	// LIST
	pw_register_post_field_model('list', array_merge( $micro_fields, array(
		'image(xs)',
		'image(sm)',
		'stats',
	)));

	// LIST-H2O
	pw_register_field_model( 'post', 'list-h2o', array(
	'ID',
	'post_title',
	'post_parent',
	'post_excerpt',
	'post_timestamp',
	'post_date',
	'post_date_gmt',
	'comment_status',
	'post_parent',
	'post_type',
	'comment_count',
	'post_permalink',
	'image(stats)',
	//'image(id)',
	//'image(meta)',
	'image(sm,256,256,2)',
	'image(md,512,512,2)',
	'image(lg,1024,1024,2)',
	'feed_order',
	'post_meta(all)',
	'fields'
	));
}