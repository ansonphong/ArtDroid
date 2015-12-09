<?php

add_filter( PW_OPTIONS_THEME, 'theme_options_migrate' );

function theme_options_migrate( $options ){

	/**
	 * HOME PAGE SLIDER HEIGHT
	 * Switch from proportional height model to
	 * Using pw-height methods.
	 */
	$home_slider_height = _get( $options, 'home.slider.height' );
	if( !is_array( $home_slider_height ) )
		$options['home']['slider']['height'] = array(
			'method' => 'window-percent',
			'value' => 66
			);

	return $options;

}

