<?php
	global $pw;
	$feed_query = $pw['query'];

	$feed_vars = array(
		'directive'	=>	'live-feed',
		'aux_template'	=>	'seo-list',
		'feed'	=>	array(
			'query'	=>	$feed_query,
			),
		);

	pw_live_feed( $feed_vars );
?>