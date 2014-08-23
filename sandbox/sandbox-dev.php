<?php // Template Name: Sandbox [DEV] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>
<?php
////////// PAGE ////////// ?>

<div id="page" class="page-home page-bounds" style="margin-top:180px;">
	
	<pre><?php

	//$ratio >= 3

		$tag_filters = pw_image_tag_filters( array( "width" => 300, "height" =>  200, "ratio" => 1.5 ) );

		echo json_encode( $tag_filters, JSON_PRETTY_PRINT );

		echo "<br><br>";
		foreach( $tag_filters as $tag_filter ){
			$condition = ( string ) $tag_filter['condition'];
			$condition = "return (" . $condition . ");";

			$boolean = (bool) eval( $condition );

			if( $boolean == true )
				$tags[] = $tag_filter['tag'];

			echo json_encode($boolean);
			echo " • ";
			echo json_encode($tag_filter);
			echo "<hr>";
			

		}


	?></pre>


</div>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>