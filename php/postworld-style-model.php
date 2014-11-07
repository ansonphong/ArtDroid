<?php

function theme_pw_styles_defaults( $value ){
	$style_model = array(
		'colors'	=>	array(
			'core' =>	array(
				'global-background-color'	=>	'#000000',
				'global-foreground-color'	=>	'#ffffff',
				
				'primary-color-light'		=>	'#d8b883',
				'primary-color-medium'		=>	'#ad4200',
				'primary-color-dark'		=>	'#812c00',

				'secondary-color-light'		=>	'@primary-color-light',
				'secondary-color-medium'	=>	'@primary-color-medium',
				'secondary-color-dark'		=>	'@primary-color-dark',

				'neutral-color-light'		=>	'#e4ded2',
				'neutral-color-medium'		=>	'#7a6357',
				'neutral-color-dark'		=>	'#2e2c24',

				'highlight-color-light'		=>	'#ffac7f',
				'highlight-color-medium'	=>	'#ff5a00',
				'highlight-color-dark'		=>	'#802d00',
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

			
			),

		'layout'	=>	array(

			'bootstrap'	=>	array(
				'grid-gutter-width'	=>	'0px',
				),

			'page'	=>	array(
				'page-xs-width'		=>	'100%',
				'page-sm-width'		=>	'95%',
				'page-md-width'		=>	'90%',
				'page-lg-width'		=>	'85%',
				'page-max-width'	=>	'1200px',
				),

			),

		'posts'	=>	array(

			'grid'	=>	array(
				'grid-image-size'		=>	'cover',
				'grid-unit-padding'		=>	'1px',
				'grid-unit-border'		=>	'1px solid transparent',
				'grid-title-background'	=>	'fade( @neutral-color-dark, 80% )',
				'grid-title-align'		=>	'left',
				),

			),

		);


	//'galleries'
	// Add default width for vertical scroll galleries
	// Add default height for horizontal scroll galleries


	/*
	'grid'	=>	array(
				'grid-background-size'	=>	'cover',
				),
	*/

	$value = array_replace_recursive( $style_model, $value ); 
	return $value;

}

add_filter( PW_OPTIONS_STYLES, 'theme_pw_styles_defaults' );

////////// STYLE ADMIN //////////
function theme_pw_styles_structure( $structure = array() ){

	$theme_structure = array(
		array(
			"name"	=>	"Colors",
			"key"	=>	"colors",
			"icon"	=>	"icon-droplet",
			"values"	=>	array(

				///// COLORS /////
				array(
					"name"		=>	"Core",
					"key"		=>	"core",
					"icon"		=>	"icon-triadic-2",
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

		array(
			"name"	=>	"Layout",
			"key"	=>	"layout",
			"icon"	=>	"icon-th-large-2",
			"values"	=>	array(


				///// BOOTSTRAP /////
				array(
					'name'	=>	'Bootstrap',
					'key'	=>	'bootstrap',
					'icon'	=>	'icon-grid-2',
					'values'	=>	array(
						array(
							"name"			=>	"Grid Gutter Width",
							"key"			=>	"grid-gutter-width",
							"input"			=>	"text",
							"description"	=>	"Space between columns"
							),
						),
					),


				///// PAGE /////
				array(
					'name'	=>	'Page',
					'key'	=>	'page',
					'icon'	=>	'icon-th-large',
					'values'	=>	array(
						array(
							"name"			=>	"Width (Extra Small)",
							"key"			=>	"page-xs-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on mobile devices",
							"icon"			=>	"icon-mobile"
							),
						array(
							"name"			=>	"Width (Small)",
							"key"			=>	"page-sm-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on larger mobile devices",
							"icon"			=>	"icon-mobile-wide"
							),
						array(
							"name"			=>	"Width (Medium)",
							"key"			=>	"page-md-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on wide tablets",
							"icon"			=>	"icon-tablet"
							),
						array(
							"name"			=>	"Width (Large)",
							"key"			=>	"page-lg-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on desktop and laptops",
							"icon"			=>	"icon-laptop"
							),
						array(
							"name"			=>	"Maximum Width",
							"key"			=>	"page-max-width",
							"input"			=>	"text",
							"description"	=>	"The maximum width of the page layout",
							"icon"			=>	"icon-arrows-h"
							),

						),
					),





				),
			),


		array(
			"name"	=>	"Posts",
			"key"	=>	"posts",
			"icon"	=>	"icon-circle-medium",
			"values"	=>	array(

				///// BOOTSTRAP /////
				array(
					'name'	=>	'Grid',
					'key'	=>	'grid',
					'icon'	=>	'icon-th',
					'values'	=>	array(
						array(
							"name"			=>	"Grid Image Size",
							"key"			=>	"grid-image-size",
							"input"			=>	"select",
							"ng_options"	=>	"options.style.backgroundSize",
							"description"	=>	"How the images are sized in the grid"
							),
						array(
							"name"			=>	"Grid Unit Padding",
							"key"			=>	"grid-unit-padding",
							"input"			=>	"text",
							"description"	=>	"How much space around each grid unit"
							),
						array(
							"name"			=>	"Grid Unit Border",
							"key"			=>	"grid-unit-border",
							"input"			=>	"text",
							"description"	=>	"The border around each grid unit"
							),
						array(
							"name"			=>	"Grid Title Background",
							"key"			=>	"grid-title-background",
							"input"			=>	"text",
							"description"	=>	"The backgroud color of the title"
							),
						array(
							"name"			=>	"Grid Title Align",
							"key"			=>	"grid-title-align",
							"input"			=>	"select",
							"ng_options"	=>	"options.style.textAlign",
							"description"	=>	"The alignment of the title text"
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
add_filter( PW_MODEL_STYLES, 'theme_pw_styles_structure' );

// Depreciated
add_filter( 'iOptions-i-styles-structure', 'theme_pw_styles_structure' );



?>