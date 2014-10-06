<?php // Template Name: Home Page ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
	global $pwSiteGlobals;
?>
<!-- SPACER -->
<div> <!-- window-height="80%" -->
	<?php
		////////// HEAD //////////
		//include locate_template( 'views/modules/page-head.php' );

		///// HEADER SLIDER /////
		include locate_template("views/modules/slider-home.php");
	?>
</div>

<!-- ////////// FEED ////////// -->
<script>
	///// LIVE FEED /////
	pw.feeds['blog-posts'] = {
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

<!-- DEV 
<pre><code><?php echo json_encode( $pwSiteGlobals['images'] ); ?></code></pre>
-->

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>