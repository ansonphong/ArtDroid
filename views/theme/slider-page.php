<div class="slider">
	<?php
		$slider = $i_meta_header['slider'];
		$page_slider_vars = array(
			//'query' 		=> 	$home_slider_query,
			'mode' 			=> 	$slider['mode'],
			'template' 		=> 	'slider-default',
			'id'			=> 	'header-slider',
			'class'			=> 	'slider',
			'transition'	=> 	$slider['transition'],
			'no_pause'		=> 	$slider['no_pause'],
			'interval'		=>	$slider['interval'],
			'height'		=>	$slider['height'],
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