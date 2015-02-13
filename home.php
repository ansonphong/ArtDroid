<?php // Template Name: Home Page ?>

<?php pw_header('home'); ?>

<div id="page" class="page-home">

	<?php
	///// HOME PAGE SLIDER /////
	$show_slider = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.slider.show_slider' ) );
	if($show_slider)
		include locate_template( 'views/theme/slider-home.php' );
	//else
	//	echo "<div class='header-spacer'></div>";
	?>

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