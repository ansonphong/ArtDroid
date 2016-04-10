<?php
global $pw;
$feed_query = $pw['query'];
$feed_query['has_password'] = false;

pw_feed( array(
	'aux_template'	=>	'seo-list',
	'feed'	=>	array(
		'query'	=>	$feed_query,
		),
	));
