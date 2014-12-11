<?php // Template Name: Home Page ?>

<?php pw_header(); ?>

<div id="page" class="page-home">
	<?php
	include locate_template( 'views/modules/slider-home.php' ); ?>
	<div id="content" class="layout full page-bounds">
		<?php
			$layout_args = array(
				'content'			=>	pw_ob_include_template('views/archive/feed.php'),
				//'before_content' 	=>	'<div>',
				//'after_content' 	=>	'</div>',
				);
			pw_print_layout( $layout_args );
		?>
	</div>
</div>

<?php pw_footer(); ?>