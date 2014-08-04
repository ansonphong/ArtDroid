<div class="slider-wrapper">
	<?php
		global $iGlobals;

		// Slider
		if( !isset($slider) )
			$slider = array();
		
		// Get and set the Menu ID
		$slider = i_set_obj( $slider, 'menu_vars.menu_id', i_get_obj( $iGlobals, 'options.home.slider.menu' ));
		
		$page_slider_vars = array(
			//'query' 		=> 	$home_slider_query,
			//'posts'			=>	$slider['posts'],
			'mode'			=>	'menu',
			'template' 		=> 	'slider-default',
			'id'			=> 	'header-slider',
			'class'			=> 	'slider',
			'transition'	=> 	$slider['transition'],
			'no_pause'		=> 	$slider['no_pause'],
			'interval'		=>	i_get_obj( $iGlobals, 'options.home.slider.interval' ), 
			'height'		=>	i_get_obj( $iGlobals, 'options.home.slider.height' ), 
			'query_vars'	=>	$slider['query_vars'],
			'menu_vars'		=>	$slider['menu_vars'],
			'hyperlink'		=>	$slider['hyperlink'],
			'show_title'	=>	$slider['show_title'],
			'show_excerpt'	=>	$slider['show_excerpt'],
			//'meta'			=>	$i_meta_header['slider']
			);
		echo pw_print_slider( $page_slider_vars );
	?>
</div>