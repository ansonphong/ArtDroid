<?php // Template Name: Sandbox [ Post ] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>
<?php
////////// PAGE ////////// ?>

<div id="page" class="page-home page-bounds" style="margin-top:64px;">

	<pre><?php

	$post = array(
		"ID"	=>	309,
		"post_meta"	=>	array(
			"i_meta"	=>	array( "one" => "two" ),
			),
		);

	echo json_encode( pw_save_post( $post ) );

	?></pre>

</div>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>