<?php i_header(); ?>
<div id="page" class="page-home">
	<?php
	include locate_template( 'views/modules/page-head.php' ); ?>
	<div id="content" class="layout full page-bounds">
		<?php
			$layout_args = array(
				'content'			=>	pw_ob_include_template('views/archive/feed.php'),
				'before_content' 	=>	'<div class="post_content">',
				'after_content' 	=>	'</div>',
				);
			i_print_layout( $layout_args );
		?>
	</div>
</div>

<?php i_footer(); ?>