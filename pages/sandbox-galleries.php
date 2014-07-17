<?php // Template Name: Sandbox [Galleries] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
	$galleries = pw_get_post( $post->ID, "all" ); // array( "ID", "post_title", "gallery(ids,posts)") //pw_get_post_galleries_attachment_ids( $post->ID );
?>
<?php
////////// PAGE ////////// ?>

<div id="page" class="page-home">

	<div class="header-spacer"></div>

	<?php ////////// CONTENT ////////// ?>
	<div id="content" class="layout full page-bounds">
		
		<script>
			var load_post = [];
			load_post['single_post'] = {
				post_id : 50,
				fields : 'all',
				view : 'full',
			};
		</script>
		<div load-post="single_post"></div>

		<hr>

		<pre><code><?php //echo json_encode( $galleries, JSON_PRETTY_PRINT ); ?></code></pre>
	
	</div>
	
</div>

<!-- INFINITE FOOTER -->
<?php i_footer(); ?>

