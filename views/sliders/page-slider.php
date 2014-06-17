<?php
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
?>
<div class="slider">
	<?php
		$slider = $i_meta_header['slider'];
		$page_slider_vars = array(
			//'query' 		=> 	$home_slider_query,
			'template' 		=> 	'slider-page',
			'id'			=> 	'header-slider',
			'class'			=> 	'slider',
			'transition'	=> 	$slider['transition'],
			'no_pause'		=> 	$slider['no_pause'],
			'interval'		=>	$slider['interval'],
			'height'		=>	$slider['height'],
			'query_vars'	=>	$slider['query_vars'],
			//'meta'			=>	$i_meta_header['slider']
			);
		echo pw_print_slider( $page_slider_vars );
	?>
</div>