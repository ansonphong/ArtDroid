<?php pw_header(); ?>
<div id="page" class="search-page">
	<?php
	global $pw;
	$query = array();

	include "search-header.php";

	?>

	<div id="content" class="layout full page-bounds">

		<?php
			$term_feed = array(
				'terms' => array(
					'taxonomies' => array( 'post_tag', 'category' ),
					'args' => array(
						'search' => $pw['query']['s']
						)
					),
				'options' => array(
					'print_empty' => false
					)
				);
			echo pw_print_term_feed( $term_feed );
		?>

		<?php
			$layout_args = array(
				'content'			=>	pw_ob_include_template('views/archive/feed.php'),
				);
			pw_print_layout( $layout_args );
		?>
	</div>
</div>

<?php pw_footer(); ?>