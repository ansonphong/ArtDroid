<?php pw_header(); ?>
<div id="page" class="page-home">
	<?php

	global $pw;
	$query = array();

	///// SWITCH HEADER TEMPLATES /////
	if( in_array( 'archive-taxonomy', $pw['view']['context'] ) )
		include 'archive-head-taxonomy.php';
	else
		include locate_template( 'views/theme/page-head.php' );

	?>

	<div id="content" class="layout full page-bounds">
		<?php
			$layout_args = array(
				'content'			=>	pw_ob_include_template('views/archive/feed.php'),
				);
			pw_print_layout( $layout_args );
		?>
	</div>
</div>

<?php pw_footer(); ?>