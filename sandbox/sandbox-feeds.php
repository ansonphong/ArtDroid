<?php // Template Name: SANDBOX [ Feeds ] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
	global $pwSiteGlobals;
?>

<!-- SPACER -->
<div class="header-spacer"></div>
<hr>
<h1><?php echo $post->post_title; ?></h1>
<hr>
<!-- ////////// FEED ////////// -->
<script>
	///// LIVE FEED /////
	feed_settings['blog-posts'] = {
		preload : 10,
		load_increment : 10,
		offset: 0,
		max_posts:200,
		order_by : '-post_date',
		view : {
			current : 'grid',
			options : ['detail', 'grid','grid-horizontal'],
			settings: {
				grid:{
					width: 200,
					height: 200,
				}
			}
		},
		query_args : {
			post_type:['post'],
			post_status:'publish',
			fields: 'preview',
			// category_name: 'home-page-feature',
			// post_parent: <?php echo $post_id; ?>,
		},
		feed_template: 'feed-grid',	// Optional, needed in case of different widgets [having different panels for example] 
		
		grid:{
			fixedHeight:200,
		}

	};	
</script>

<div live-feed='blog-posts' class="grid feed view"></div>
<!-- ////////// END FEED ////////// -->

<!-- DEV -->
<pre><code><?php echo json_encode( $pwSiteGlobals['images'] ); ?></code></pre>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>