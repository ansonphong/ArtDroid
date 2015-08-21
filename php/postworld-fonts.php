<?php
///// FONT OPTIONS /////
function theme_get_font_options(){
	$fonts = array(
		array(
			'name'	=>	'Roboto',
			'style'	=>	array('sans-serif'),
			'code'	=>	'Roboto:100,300,700,100italic,300italic,400',
			),
		array(
			'name'	=>	'Ubuntu',
			'style'	=>	array('sans-serif'),
			'code'	=>	'Ubuntu:300,400,700,300italic,400italic',
			),
		array(
			'name'	=>	'Open Sans',
			'style'	=>	array('sans-serif'),
			'code'	=>	'Open+Sans:300italic,400italic,400,300,700',
			),
		array(
			'name'	=>	'PT Sans',
			'style'	=>	array('sans-serif'),
			'code'	=>	'PT+Sans:400,700,400italic',
			),
		array(
			'name'	=>	'Exo 2',
			'style'	=>	array('sans-serif'),
			'code'	=>	'Exo+2:700,300italic,200italic,200,300,400,400italic',
			),
		array(
			'name'	=>	'Lato',
			'style'	=>	array('sans-serif'),
			'code'	=>	'Lato:100,300,400,700,100italic,300italic',
			),
		array(
			'name'	=>	'Roboto Slab',
			'style'	=>	array('serif'),
			'code'	=>	'Roboto+Slab:400,300,100,700',
			),
		array(
			'name'	=>	'Lora',
			'style'	=>	array('serif'),
			'code'	=>	'Lora:400,700,400italic,700italic',
			),
		array(
			'name'	=>	'Libre Baskerville',
			'style'	=>	array('serif'),
			'code'	=>	'Libre+Baskerville:400,700,400italic',
			),
		array(
			'name'	=>	'Noto Serif',
			'style'	=>	array('serif'),
			'code'	=>	'Noto+Serif:400,700,400italic',
			),
		array(
			'name'	=>	'Glegoo',
			'style'	=>	array('serif'),
			'code'	=>	'Glegoo:400,700',
			),
		array(
			'name'	=>	'Sorts Mill Goudy',
			'style'	=>	array('serif'),
			'code'	=>	'Sorts+Mill+Goudy:400,400italic',
			),
		array(
			'name'	=>	'Merriwhether',
			'style'	=>	array('serif'),
			'code'	=>	'Merriweather:400italic,400,300italic,300,700,700italic',
			),
		array(
			'name'	=>	'Ovo',
			'style'	=>	array('serif'),
			'code'	=>	'Ovo',
			),
		array(
			'name'	=>	'Open Sans',
			'style'	=>	array('serif'),
			'code'	=>	'Open+Sans:300italic,400italic,400,300,700',
			),
		array(
			'name'	=>	'Vollkorn',
			'style'	=>	array('serif'),
			'code'	=>	'Vollkorn:400italic,400,700',
			),
		array(
			'name'	=>	'PT Serif',
			'style'	=>	array('serif'),
			'code'	=>	'PT+Serif:400,700,400italic',
			),
		array(
			'name'	=>	'Special Elite',
			'style'	=>	array('serif'),
			'code'	=>	'Special+Elite',
			),
		array(
			'name'	=>	'Anonymous Pro',
			'style'	=>	array('serif','monospace'),
			'code'	=>	'Anonymous+Pro:400,700,400italic',
			),
		array(
			'name'	=>	'Ubuntu Mono',
			'style'	=>	array('serif','monospace'),
			'code'	=>	'Ubuntu+Mono:400,700,400italic',
			),
		array(
			'name'	=>	'PT Mono',
			'style'	=>	array('serif','monospace'),
			'code'	=>	'PT+Mono',
			),
		array(
			'name'	=>	'Source Code Pro',
			'style'	=>	array('serif','monospace'),
			'code'	=>	'Source+Code+Pro:200,300,400,700',
			),
		array(
			'name'	=>	'Oswald',
			'style'	=>	array('sans-serif','condensed'),
			'code'	=>	'Oswald:300,400,700',
			),
		array(
			'name'	=>	'Lobster',
			'style'	=>	array('serif','handwriting'),
			'code'	=>	'Lobster',
			),
		array(
			'name'	=>	'Cinzel',
			'style'	=>	array('serif'),
			'code'	=>	'Cinzel:700,400',
			),
		array(
			'name'	=>	'Cinzel Decorative',
			'style'	=>	array('serif'),
			'code'	=>	'Cinzel+Decorative:400,700',
			),
		array(
			'name'	=>	'Alfa Slab One',
			'style'	=>	array('serif'),
			'code'	=>	'Alfa+Slab+One',
			),
		);

	return $fonts;

}

///// INCLUDE SELECTED FONTS /////
//add_action( 'wp_head', 'theme_include_fonts' );
add_filter( 'pw_include_google_fonts', 'theme_include_google_fonts' );
function theme_include_google_fonts( $fonts ){

	// Get the array of font options
	$font_options = theme_get_font_options();
	
	///// ADMIN /////
	// Return all the font options in the admin for previews
	if( is_admin() && _get( $_GET, 'page' ) == theme_pw_admin_submenu_slug() )
		return $font_options;
	// Return empty if on other admin pages
	elseif( is_admin() )
		return $fonts;

	///// FRONT END /////
	// Include only the selected fonts

	// Get the user-selected fonts
	$font_settings = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key'	=>	'fonts' ) );
	// Create empty array to contain the added fonts
	$added_fonts = array();
	// Foreach font setting
	foreach( $font_settings as $key => $value ){
		// Find the font object 
		$font = pw_find_where( $font_options, array( 'name' => $value ) );		
		// If the font hasn't been added yet
		if( !in_array( _get( $font, 'name' ), $added_fonts ) ){
			// Add the font
			$fonts[] = $font;
			// And add it's name to the added fonts array, so it doesn't get added twice
			$added_fonts[] = _get( $font, 'name' );
		}
	}

	return $fonts;

}

///// INJECT FONT VARIABLES INTO LESS /////
add_filter( 'less_vars', 'theme_less_vars', 10, 2 );
function theme_less_vars( $vars, $handle ) {
	// Add variables to LESS files
	$theme_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) );
	$theme_vars = array(
		'font-family-body'		=>	'"'._get( $theme_options, 'fonts.body' ).'"',
		'font-family-title'		=>	'"'._get( $theme_options, 'fonts.title' ).'"',
		'font-family-content'	=>	'"'._get( $theme_options, 'fonts.content' ).'"',
		'font-family-menu'		=>	'"'._get( $theme_options, 'fonts.menu' ).'"',
		);
	$vars = array_replace_recursive( $vars, $theme_vars);
	return $vars;

}
?>