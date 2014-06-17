<?php // Template Name: Sandbox [ Slider ] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>

<?php
////////// PAGE ////////// ?>

<div id="page" class="page-home page-bounds" style="margin-top:180px;">
	
	
	<hr>

	<?php
		echo do_shortcode("[i-slider query=\"{ \'post_type\':\'page\' }\" ]");
	?>
	
	<hr>

	<pre><code><?php
		$query = array(
			"post_type" => "page",
			"post_status" => "publish",
			"posts_per_page" => 20,
			"post_parent" => 65,
			"fields" => array( 'ID', 'post_title', 'post_parent' ),
			);
		echo "QUERY : " . json_encode($query);
		echo "<br>RESULTS : " . json_encode( pw_query( $query )->posts, JSON_PRETTY_PRINT );

	?></code></pre>

	<?php
		echo the_content();
	?>

</div>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>