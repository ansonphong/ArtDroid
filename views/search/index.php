<?php pw_header(); ?>
<div id="page" class="page-home">
	<?php
	global $pw;
	$query = array();

	include "search-header.php";
	
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