<?php
pw_feed(array(
	'aux_template'	=>	'seo-list',
	'feed' => array(
		'view' => array(
			'current' => 'full'
			),
		'query' => array(
			'post_type' => 'blog',
			'post_status' => 'publish',
			),
		)
	));
