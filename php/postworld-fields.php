<?php

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

?>