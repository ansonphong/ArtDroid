<?php
	global $post;
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
?>
<div class="slider-wrapper">
	<?php

		// Slider
		if( !isset($slider) )
			$slider = array();

		$slider_menu = i_get_option( array( 'option_name' => 'i-options', 'key' => 'home.slider.menu' ) );
		$fields = "all";
		$slider['posts'] = pw_get_menu_posts( $slider_menu, $fields );

		$slider['height'] = i_get_option( array( 'option_name' => 'i-options', 'key' => 'home.slider.height' ) );

		//echo json_encode($slider_posts);
		//$slider = $i_meta_header['slider'];
		$page_slider_vars = array(
			//'query' 		=> 	$home_slider_query,
			'mode'			=>	$slider['mode'],
			'posts'			=>	$slider['posts'],
			'template' 		=> 	'slider-page',
			'id'			=> 	'header-slider',
			'class'			=> 	'slider',
			'transition'	=> 	$slider['transition'],
			'no_pause'		=> 	$slider['no_pause'],
			'interval'		=>	$slider['interval'],
			'height'		=>	$slider['height'], 
			'query_vars'	=>	$slider['query_vars'],
			'menu_vars'		=>	$slider['menu_vars'],
			//'meta'			=>	$i_meta_header['slider']
			);
		echo pw_print_slider( $page_slider_vars );
	?>
</div>

<script>
	
	console.log( "HOME SLIDER POSTS : ", <?php echo json_encode($slider_posts); ?> );
	//console.log( "PAGE ID : ", <?php echo $post->ID; ?> );

</script>

