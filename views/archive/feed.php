<?php
	global $pw;
?>


<!-- ////////// FEED ////////// -->
<script>
	///// LIVE FEED /////
	feed_settings['primaryFeed'] = {
		preload : 10,
		load_increment : 10,
		offset: 0,
		max_posts:200,
		order_by : '-post_date',
		view : {
			current : 'grid',
			options : ['detail', 'grid','grid-horizontal']
		},
		query_args : {
			post_type:[ 'post' ],
			post_status:'publish',
			fields: 'preview',
			<?php
				// Add taxonomy query
				if( $pw['view']['type'] == 'term_archive' ){ ?>
					tax_query:[
						{
							taxonomy: '<?php echo $pw['view']['term']['taxonomy']; ?>',
							field: 'id',
							terms: <?php echo $pw['view']['term']['term_id']; ?>,
						}
					],
				<?
				}
			?>
			<?php
				// Add year query
				if( $pw['view']['type'] == 'year_archive' ){ ?>
					year: <?php echo $pw['view']['query']['year']; ?>,
				<?
				}
			?>
		},
		feed_template: 'feed-grid',	// Optional, needed in case of different widgets [having different panels for example] 
	};	
</script>

<div live-feed='primaryFeed' class="feed"></div>
<!-- ////////// END FEED ////////// -->

<?php
	///// DEV /////
	//echo $pw['view']['term'];
	//echo "<pre>pw : " . json_encode( $pw, JSON_PRETTY_PRINT ) . "</pre>";
?>