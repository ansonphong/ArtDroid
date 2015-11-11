<?php
	global $pw;

	//////////// FEED //////////
	// Setup Query
	$feed_query = array(
		'post_type'			=>	'post',
		'post_status'		=>	'publish',
		'fields'			=>	'preview',
		'posts_per_page'	=>	500,
		);

	/// DATE ARCHIVE ///
	if( in_array( 'archive-date', $pw['view']['context'] ) ){
		$feed_query = array_replace_recursive($pw['query'], $feed_query);
	}
	/// TAXONOMY ARCHIVE ///
	else if( in_array( 'archive-taxonomy', $pw['view']['context'] ) ){
		$feed_query['tax_query'] = array(
			array(
				'taxonomy'	=>	$pw['view']['term']['taxonomy'],
				'field'		=>	'id',
				'terms'		=>	$pw['view']['term']['term_id']
				)
			);
	}
	/// SEARCH PAGE ///
	else if( in_array( 'search', $pw['view']['context'] ) ){
		$feed_query = $pw['query'];
	}

	// Setup Feed
	$feed_vars = array(
		'directive'	=>	'live-feed',
		'aux_template'	=>	'seo-list',
		'feed'	=>	array(
			'query'	=>	$feed_query,
			),
		);
		
	// Insert Live Feed
	pw_live_feed( $feed_vars );
	
?>