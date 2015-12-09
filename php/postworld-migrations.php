<?php
/**
 * THEME OPTIONS MIGRATIONS
 */
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

/**
 * POSTMETA MIGRATIONS
 */
add_filter( PW_POSTMETA, 'theme_postmeta_migrate', 11 );
function theme_postmeta_migrate( $pwMeta ){

	// If slider height is a string or float, make default value
	if( !is_array( $pwMeta['header']['slider']['height'] ) )
		$pwMeta['header']['slider']['height'] = array(
			'method' => 'window-percent',
			'value' => 66
			);

	return $pwMeta;

}