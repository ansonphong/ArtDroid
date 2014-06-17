<!-- ////////// FEED ////////// -->
<script>
	///// LIVE FEED /////
	feed_settings['blog-posts'] = {
		preload : 9,
		load_increment : 3,
		offset: 0,
		max_posts:200,
		order_by : '-post_date',
		view : {
			current : 'detail',
			options : ['detail', 'grid','grid-horizontal']
		},
		query_args : {
			post_type:['post'],
			post_status:'publish',
			// category_name: 'home-page-feature',
			// post_parent: <?php echo $post_id; ?>,
		},
		feed_template: 'feed-live-feed',	// Optional, needed in case of different widgets [having different panels for example] 
	};	
</script>

<div live-feed='blog-posts' class="feed"></div>
<!-- ////////// END FEED ////////// -->