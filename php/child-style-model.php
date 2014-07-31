<?php

global $i_child_style_model;
$i_child_style_model = array(

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

			),

		'bootstrap'	=>	array(
			'grid-gutter-width'	=>	'40px',
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

		),
	);
	

////////// CHILD STYLE LANGUAGE //////////
global $i_child_style_language;
$i_child_style_language = array(
	"var"	=>	array(

		//// Slider ////
		"slider-arrow-color"	=>	array(
			"label"	=>	array(
				"en"	=>	"Slider Arrow Color",
				),
			"info"	=>	array(
				"en"	=>	"The color of the circle around the next/previous slide arrows",
				),
			),

		//// Header ////
		"header-image-height"	=>	array(
			"label"	=>	array(
				"en"	=>	"Header Image Height",
				),
			"info"	=>	array(
				"en"	=>	"The height of the default/featured header image (include 'px')",
				),
			),

		//// Footer ////
		"footer-background"	=>	array(
			"label"	=>	array(
				"en"	=>	"Footer Background",
				),
			"info"	=>	array(
				"en"	=>	"The background of the footer",
				),
			),
		"footer-color"	=>	array(
			"label"	=>	array(
				"en"	=>	"Footer Text",
				),
			"info"	=>	array(
				"en"	=>	"The color of the footer text",
				),
			),


		),	
	);



$i_child_style_model_NEW = array(

	'var'	=>	array(

		array(
			'key' => 'colors',
			'values' => array(
				array(
					'key'	=>	'primary-color-light',
					'value'	=>	'#d8b883'
					),
				array(
					'key'	=>	'primary-color-medium',
					'value'	=>	'#ad4200'
					),
				array(
					'key'	=>	'primary-color-dark',
					'value'	=>	'#812c00'
					),
				),	

			),

		),
	
	);


?>