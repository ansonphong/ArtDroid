<?php // Template Name: Home Page ?>
<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>

<?php
////////// PAGE ////////// ?>

<?php
////////// HEAD //////////
include locate_template( 'views/modules/page-head.php' ); ?>
<?php
////////// CONTENT ////////// ?>
<div class="page-bounds">
	
	<?php
		///////// INFINITE LAYOUT /////////
		// Callback function for the page content (optional)
		function page_content_function(){
			global $post;
			///// EMBED MEDIA /////
			$embed_link_url = pw_embed_link_url( $post->ID );
			if( $embed_link_url ){
				?>
				<div class="media-embed">
					<?php
						echo $embed_link_url;
					?>
				</div>
				<?php
			}
		}
		///// MAIN LAYOUT /////
		global $iGlobals;
		$layout_args = array(
			'layout'			=>	$iGlobals['layout']['layout'],
			'function'			=>	'page_content_function',
			'content'			=>	apply_filters( 'the_content', $post->post_content ),
			'before_content' 	=>	'<div class="post page post_content">',
			'after_content' 	=>	'</div>',
			
			);
		i_print_layout( $layout_args );
	?>
</div>


<!-- INFINITE FOOTER -->
<?php i_footer(); ?>