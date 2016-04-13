<?php
/**
 * Template Name: Development
 * @package ArtDroid
 */

pw_header();
?>
<div style="padding: 40px">
	<?php

		$vars = array(
			'posts_per_page' => 100,
			'post_type' => 'post',
			//'s' => 'ArtDroid',
			//'post_class' => 'foobar',
			'orderby' => 'post_points',
			'order' => 'ASC',
			'event_after' => '1460511196',
			'fields' => array(
				'ID',
				'post_title',
				'post_points'
				),
			);

		$pw_query = pw_query_posts($vars);

	?>

	<pre style="font-family: monospace; white-space: pre;"><code><?php echo json_encode( $pw_query, JSON_PRETTY_PRINT) ?> </code></pre>

</div>
<?php
pw_footer();