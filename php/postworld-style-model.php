<?php

function theme_pw_styles_model( $value ){
	$style_model = array(
		'var'	=>	array(
			'colors' =>	array(
				'primary-color-light'		=>	'#bcd5e3',
				'primary-color-medium'		=>	'#5a84ba',
				'primary-color-dark'		=>	'#28538a',

				'secondary-color-light'		=>	'#d8b883',
				'secondary-color-medium'	=>	'#ad4200',
				'secondary-color-dark'		=>	'#812c00',

				'neutral-color-light'		=>	'#e4ded2',
				'neutral-color-medium'		=>	'#8f877b',
				'neutral-color-dark'		=>	'#4f422f',

				'global-foreground-color'	=>	'#ffffff',
				'global-background-color'	=>	'#000000',

				'highlight-color-light'		=>	'#ffac7f',
				'highlight-color-medium'	=>	'#ff5a00',
				'highlight-color-dark'		=>	'#802d00',

				),

			'bootstrap'	=>	array(
				'grid-gutter-width'	=>	'0px',
				),

			'header'=>	array(
				'header-image-height'	=>	'260px',
				),

			'footer'=>	array(
				'footer-background'	=>	'transparent',
				'footer-color'		=>	'@neutral-color-medium',
				),

			'slider'=>	array(
				'slider-arrow-color'	=>	'@secondary-color-dark',
				),

			'widgets'	=>	array(
				'widget-base-color'			=>	'@primary-color-dark',
				'widget-text-color'			=>	'@primary-color-medium',
				'widget-highlight-color'	=>	'@primary-color-light',
				),

			//'galleries'
				// Add default width for vertical scroll galleries
				// Add default height for horizontal scroll galleries
			),

		);

	$value = array_replace_recursive( $style_model, $value ); 
	return $value;

}
add_filter( 'pwGetOption-i-styles', 'theme_pw_styles_model' );


////////// STYLE ADMIN //////////
function theme_pw_styles_structure( $structure = array() ){

	$theme_structure = array(
		array(
			"name"	=>	"Variables",
			"key"	=>	"var",
			"icon"	=>	"icon-code",
			"values"	=>	array(

				///// COLORS /////
				array(
					"name"		=>	"Colors",
					"key"		=>	"colors",
					"icon"		=>	"icon-droplet",
					"values"	=>	array(
						array(
							"name"			=>	"Background Color",
							"key"			=>	"global-background-color",
							"input"			=>	"color",
							"description"	=>	"Background"
							),
						array(
							"name"			=>	"Foreground Color",
							"key"			=>	"global-foreground-color",
							"input"			=>	"color",
							"description"	=>	"Text"
							),
						array( 'line' ),
						array(
							"name"			=>	"Primary Light",
							"key"			=>	"primary-color-light",
							"input"			=>	"color",
							"description"	=>	"Used for accents"
							),
						array(
							"name"			=>	"Primary Medium",
							"key"			=>	"primary-color-medium",
							"input"			=>	"color",
							"description"	=>	"Used for mid tones"
							),
						array(
							"name"			=>	"Primary Dark",
							"key"			=>	"primary-color-dark",
							"input"			=>	"color",
							"description"	=>	"Used for deep shades"
							),
						array( 'line' ),
						array(
							"name"			=>	"Secondary Light",
							"key"			=>	"secondary-color-light",
							"input"			=>	"color",
							"description"	=>	"Used for accents"
							),
						array(
							"name"			=>	"Secondary Medium",
							"key"			=>	"secondary-color-medium",
							"input"			=>	"color",
							"description"	=>	"Used for mid tones"
							),
						array(
							"name"			=>	"Secondary Dark",
							"key"			=>	"secondary-color-dark",
							"input"			=>	"color",
							"description"	=>	"Used for deep shades"
							),
						array( 'line' ),
						array(
							"name"			=>	"Neutral Light",
							"key"			=>	"neutral-color-light",
							"input"			=>	"color",
							"description"	=>	"Used for accents"
							),
						array(
							"name"			=>	"Neutral Medium",
							"key"			=>	"neutral-color-medium",
							"input"			=>	"color",
							"description"	=>	"Used for mid tones"
							),
						array(
							"name"			=>	"Neutral Dark",
							"key"			=>	"neutral-color-dark",
							"input"			=>	"color",
							"description"	=>	"Used for deep shades"
							),
						array( 'line' ),
						array(
							"name"			=>	"Highlight Light",
							"key"			=>	"highlight-color-light",
							"input"			=>	"color",
							"description"	=>	"Used for accents"
							),
						array(
							"name"			=>	"Highlight Medium",
							"key"			=>	"highlight-color-medium",
							"input"			=>	"color",
							"description"	=>	"Used for mid tones"
							),
						array(
							"name"			=>	"Highlight Dark",
							"key"			=>	"highlight-color-dark",
							"input"			=>	"color",
							"description"	=>	"Used for deep shades"
							),
						),
					),

				///// BOOTSTRAP /////
				array(
					'name'	=>	'Bootstrap',
					'key'	=>	'bootstrap',
					'icon'	=>	'icon-grid-2',
					'values'	=>	array(
						array(
							"name"			=>	"Grid Gutter Width",
							"key"			=>	"grid-gutter-width",
							"input"			=>	"pixels",
							"description"	=>	"Space between columns"
							),
						),
					),


				///// SLIDERS /////
				array(
					'name'	=>	'Sliders',
					'key'	=>	'slider',
					'icon'	=>	'icon-layers-2',
					'values'	=>	array(
						array(
							"name"			=>	"Slider Arrow Color",
							"key"			=>	"slider-arrow-color",
							"input"			=>	"color",
							"description"	=>	"Color of the slider arrows"
							),
						),
					),


				///// WIDGETS /////
				array(
					'name'	=>	'Widgets',
					'key'	=>	'widgets',
					'icon'	=>	'icon-dashboard',
					'values'	=>	array(
						array(
							"name"			=>	"Base Color",
							"key"			=>	"widget-base-color",
							"input"			=>	"color",
							"description"	=>	"General Color of widgets"
							),
						array(
							"name"			=>	"Text Color",
							"key"			=>	"widget-text-color",
							"input"			=>	"color",
							"description"	=>	"Color of text in widgets"
							),
						array(
							"name"			=>	"Base Color",
							"key"			=>	"widget-highlight-color",
							"input"			=>	"color",
							"description"	=>	"Highlighted and selected items"
							),
						),
					),



				),
			),
		);


	$structure = array_replace_recursive( $structure, $theme_structure ); 

	return $structure;

}

// Hook in the style structure to the filter
add_filter( 'pwOptions-styles-structure', 'theme_pw_styles_structure' );

// Depreciated
add_filter( 'iOptions-i-styles-structure', 'theme_pw_styles_structure' );



?>