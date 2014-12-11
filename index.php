<!-- INFINITE HEADER -->
<?php
	pw_header();
	global $post;
?>

<h1 class="main"><?php echo $post->post_title; ?></h1>
<!-- INFINITE LAYOUT -->
<?php
	// Callback function for the page content (optional)
	function page_content_function(){
		global $post;
		?>
			<!-- HTML HERE -->
		<?
		// Add options for featured image
		// i_print_thumbnail( as div bg / img, assign width, height, style options, class, etc. );
	}
	
	// Create the main layout
	global $pw;
	$layout_args = array(
		'layout'			=>	$pw['layout']['layout'],
		'function'			=>	'page_content_function',
		'content'			=>	apply_filters( 'the_content', $post->post_content ),
		'before_content' 	=> "<div class='post page block'><div class='post_content'>",
		'after_content' 	=> "</div></div>",
		
		);
	pw_print_layout( $layout_args );
?>

<!--<pre><code><?php //echo json_encode($iGlobals, JSON_PRETTY_PRINT); ?></code></pre>-->

<!-- INFINITE FOOTER -->
<?php pw_footer(); ?>