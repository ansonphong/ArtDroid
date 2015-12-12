<?php
$home_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home' ) );
pw_header('home');
?>

<div id="page" class="page-home">
	<?php
	// HOME SLIDER
	include locate_template( 'views/theme/slider-home.php' );
	
	switch( _get( $home_options, 'content.primary' ) ){
		case 'posts':
			$primary_content = pw_ob_include_template('views/archive/feed.php');
			break;
		case 'blog':
			$primary_content = pw_feed(array(
				'echo' => false,
				'aux_template'	=>	'seo-list',
				'feed' => array(
					'view' => array(
						'current' => 'full'
						),
					'query' => array(
						'post_type' => 'blog'
						),
					)
				));
			break;
	}

	?>
	<div id="content" class="layout full page-bounds">
		<?php
			$layout_args = array(
				'content'	=>	$primary_content,
				);
			pw_print_layout( $layout_args );
		?>
	</div>
</div>

<?php pw_footer('home'); ?>

<!-- Generated in <?php timer_stop(1); ?> seconds... -->