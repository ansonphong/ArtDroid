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

		///// FEED /////
		include locate_template("views/archive/feed.php");

	?>
</div>


<!-- DEV 
<pre><code><?php echo json_encode( $pwSiteGlobals['images'] ); ?></code></pre>
-->

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>