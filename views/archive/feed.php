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

	// Add taxonomy query
	if( $pw['view']['type'] == 'term_archive' ){
		$feed_query['tax_query'] = array(
			array(
				'taxonomy'	=>	$pw['view']['term']['taxonomy'],
				'field'		=>	'id',
				'terms'		=>	$pw['view']['term']['term_id']
				)
			);
	}

	// Add year query
	if( $pw['view']['type'] == 'year_archive' ){ 
		$feed_query['year'] = $pw['view']['query']['year'];
	}

	// Setup Feed
	$feed_vars = array(
		'directive'	=>	'live-feed',
		'aux_feed'	=>	'seo-list',
		'feed'	=>	array(
			'feed_template'	=>	'feed-grid',
			'view'	=>	array(
				'current'	=>	'grid',
				),
			'query'	=>	$feed_query,
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
