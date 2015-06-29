<div class="slider-wrapper">
	<?php
		// Get the saved slider settings
		$slider = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.slider' ) );

		// Set the Menu ID
		$slider = _set( $slider, 'menu_vars.menu_id', _get( $slider, 'menu' ) );

		// Set additional keys
		$slider['mode'] = 'menu';
		$slider['template'] = 'slider-default';
		$slider['id'] = 'header-slider';
		$slider['class'] = 'slider';

		// Print the slider
		echo pw_print_slider( $slider );
	?>
</div>