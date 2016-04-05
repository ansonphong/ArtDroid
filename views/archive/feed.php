<?php
	global $pw;
	$feed_query = $pw['query'];
	$feed_query['has_password'] = false;

	$feed_vars = array(
		'aux_template'	=>	'seo-list',
		'feed'	=>	array(
			'query'	=>	$feed_query,
			),
		);

	pw_feed( $feed_vars );
