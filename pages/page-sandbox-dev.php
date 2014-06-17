<?php // Template Name: Sandbox [DEV] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>
<?php
////////// PAGE ////////// ?>

<div id="page" class="page-home page-bounds" style="margin-top:180px;">
	

	MENU ITEMS :

	<div class="grid feed view feed">
		<?php
		$fields = "all";
		$feed = pw_print_menu_feed( array( "menu" => "Front Page Features", "fields" => $fields, "view" => "grid-h2o" ) );
		echo $feed;
		?>
	</div>


	<code><pre><?php

		$object = wp_get_nav_menu_object( "front-page-features" );
		echo json_encode( $object, JSON_PRETTY_PRINT );

		$args = array(
	        'order'                  => 'ASC',
	        'orderby'                => 'menu_order',
	        'post_type'              => 'nav_menu_item',
	        'post_status'            => 'publish',
	        'output'                 => ARRAY_A,
	        'output_key'             => 'menu_order',
	        'nopaging'               => true,
	        'update_post_term_cache' => false );

		$items = wp_get_nav_menu_items( $object->slug, $args );
		
		//$items = get_objects_in_term( 29 );
		
		//echo json_encode( $items, JSON_PRETTY_PRINT );

	?></pre></code>

	

	<code><pre><?php
		$args = array(
			'post_parent' => 145,
			//'post_type'   => 'any', 
			//'posts_per_page' => -1,
			//'post_status' => 'any'
			);

		$images = pw_get_post_galleries_attachment_ids( 145 );

		echo "<hr>";
		echo json_encode( pw_get_posts( $images, array( "ID", "post_title", "post_type", "image(all)" ) ), JSON_PRETTY_PRINT );

		echo "<hr>";
		echo json_encode( $images, JSON_PRETTY_PRINT );
		
	?></pre></code>

	<hr>
	
	<pre><code><?php
		$query = array(
			"post_type" => "page",
			"post_status" => "publish",
			"posts_per_page" => 20,
			"post_parent" => 65,
			"fields" => array( 'ID', 'post_title', 'post_parent', 'link_url', 'link_format' ),
			);
		echo "QUERY : " . json_encode($query);
		echo "<br>RESULTS : " . json_encode( pw_query( $query )->posts, JSON_PRETTY_PRINT );

	?></code></pre>

</div>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>