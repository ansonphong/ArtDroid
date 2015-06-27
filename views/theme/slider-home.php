<div class="slider-wrapper">
	<?php
		// Get and set the Menu ID
		$slider = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.slider' ) );

		$slider = _set( $slider, 'menu_vars.menu_id', _get( $slider, 'menu' ) );
		//pw_log( 'slider', $slider);

		$page_slider_vars = array(
			//'query' 		=> 	$home_slider_query,
			//'posts'			=>	$slider['posts'],
			'mode'			=>	'menu',
			'template' 		=> 	'slider-default',
			'id'			=> 	'header-slider',
			'class'			=> 	'slider',
			'transition'	=> 	$slider['transition'],
			'no_pause'		=> 	$slider['no_pause'],
			'interval'		=>	_get( $slider, 'interval' ), 
			'height'		=>	_get( $slider, 'height' ),
			'query_vars'	=>	$slider['query_vars'],
			'menu_vars'		=>	$slider['menu_vars'],
			'hyperlink'		=>	_get( $slider, 'hyperlink' ),
			'show_title'	=>	_get( $slider, 'show_title' ),
			'show_excerpt'	=>	_get( $slider, 'show_excerpt' ),
			//'meta'			=>	$i_meta_header['slider']
			);
		echo pw_print_slider( $page_slider_vars );
	?>
</div>