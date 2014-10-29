<?php
	global $pw;
?>

<!-- ////////// FEED ////////// -->
<?php

	// Setup Query
	$feed_query = array(
		'post_type'			=>	'post',
		'post_status'		=>	'publish',
		'fields'			=>	'preview',
		'posts_per_page'	=>	500,
		);

	switch( $pw['view']['type'] ){

		// Add taxonomy query
		// MAYBE OBSOLETE ---
		case 'archive-taxonomy':
			$feed_query['tax_query'] = array(
				array(
					'taxonomy'	=>	$pw['view']['term']['taxonomy'],
					'field'		=>	'id',
					'terms'		=>	$pw['view']['term']['term_id']
					)
				);
			break;

		// Add date query
		case 'archive-year';
		case 'archive-month';
		case 'archive-day';
			$feed_query = array_replace_recursive($pw['view']['query'], $feed_query);
			break;

	}

	//echo json_encode($feed_query);

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


<!-- ////////// END FEED ////////// -->

<?php
	///// DEV /////
	//echo $pw['view']['term'];
	//echo "<pre>pw : " . json_encode( $pw, JSON_PRETTY_PRINT ) . "</pre>";
?>
