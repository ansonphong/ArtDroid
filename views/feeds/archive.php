<!-- ////////// FEED ////////// -->
<?php
	global $iGlobals;
	/*
	if( get_current_user_id() ){
		///// NEW POST BUTTON /////
		include locate_template( 'views/edit/modules/button-post-new.php' );
		$vars = array(
			"post_type"		=>	"event-post",
			"post_parent"	=>	$post->ID,
			);
		unify_button_post_new( $vars );
		// Required for the Media Uploader
			wp_enqueue_media();
	}
	*/
	//echo $post_type;

?>

<script>
	///// LIVE FEED /////
	feed_settings['archive-feed'] = {
		preload : 10,
		load_increment : 5,
		offset: 0,
		max_posts:100,
		order_by : '-post_date',
		view : {
			current : 'grid',
			options : ['grid']
		},
		query_args : {
			post_type:'<?php echo $query["post_type"];?>',
			post_status:'publish',
			<?php
				///// TAXONMOY QUERY /////
				if( $iGlobals['context']['type'] == 'taxonomy' ){
				?>
					tax_query:[
						{
							'taxonomy' : '<?php echo $iGlobals['context']['meta']['taxonomy']; ?>',
							'field' : 'slug',
							'terms' : ['<?php echo $iGlobals['context']['meta']['slug']; ?>'],
						}
					],
				<?php
				} 
			?>
		},
		feed_template: 'feed-live-feed',	// Optional, needed in case of different widgets [having different panels for example] 
	};	
</script>

<div live-feed='archive-feed' class="grid view"></div>

<!-- ////////// END FEED ////////// -->