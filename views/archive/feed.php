<?php
	global $pw;
	//echo json_encode( $pw['view']['context'] );
	$view_context = $pw['view']['context'];

	//////////// FEED //////////
	// Setup Query
	$feed_query = array(
		'post_type'			=>	'any',
		'post_status'		=>	'publish',
		'fields'			=>	'preview',
		'posts_per_page'	=>	500,
		);

	/// DATE ARCHIVE ///
	if( in_array( 'archive-date', $view_context ) ){
		$feed_query = array_replace_recursive($pw['view']['query'], $feed_query);
	}
	/// TAXONOMY ARCHIVE ///
	else if( in_array( 'archive-taxonomy', $view_context ) ){
		$feed_query['tax_query'] = array(
			array(
				'taxonomy'	=>	$pw['view']['term']['taxonomy'],
				'field'		=>	'id',
				'terms'		=>	$pw['view']['term']['term_id']
				)
			);
	}

	// Setup Feed
	$feed_vars = array(
		'directive'	=>	'live-feed',
		'aux_template'	=>	'seo-list',
		'feed'	=>	array(
			'preload'	=>	16,
			'feed_template'	=>	'feed-grid',
			'view'	=>	array(
				'current'	=>	'grid',
				),
			'query'	=>	$feed_query,
			//'query'	=>	$feed_query = $pw['view']['query'],
			),
		);
		
	// Insert Live Feed
	pw_live_feed( $feed_vars );
?>
