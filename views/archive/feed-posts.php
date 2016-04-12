<?php

pw_feed( array(
	'aux_template'	=>	'seo-list',
	'feed' => array(
		'query' => array(
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'posts_per_page' 	=> 1000,
			'has_password'		=>	false,
			'post_password'		=> '',	
			),
		)
	));