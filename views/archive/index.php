<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>
<?php
////////// PAGE ////////// ?>
<div id="page" class="page-home">
	<?php
	////////// HEAD //////////
	include locate_template( 'views/modules/page-head.php' ); ?>
	<?php
	////////// CONTENT ////////// ?>
	<div id="content" class="layout full page-bounds">
		<?php
			///////// INFINITE LAYOUT /////////
			// Callback function for the page content (optional)
			function page_content_function(){
			}
			///// MAIN LAYOUT /////
			global $iGlobals;
			$layout_args = array(
				//'function'			=>	'page_content_function',
				'content'			=>	pw_ob_include_template('views/archive/feed.php'),
				'before_content' 	=>	'<div class="post_content">',
				'after_content' 	=>	'</div>',
				
				);
			i_print_layout( $layout_args );
		?>

	</div>
</div>
<!-- INFINITE FOOTER -->
<?php i_footer(); ?>