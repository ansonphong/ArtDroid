<div class="slider">
<?php
	// Get the slider from post meta
	$slider = $pw_meta_header['slider'];

	// Set additional keys
	$slider['template'] = 'slider-default';
	$slider['id'] = 'header-slider';
	$slider['class'] = 'slider';

	echo pw_print_slider( $slider );

?>
</div>