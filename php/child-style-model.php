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
	
	///// CLASSES /////
	"class"	=>	array(
		"page"	=>	array(
			"background-color"	=>	"#fff",
			"border-radius"		=>	"0px",
			"box-shadow"		=>	"none",
			"border"			=>	"none",
			"padding"			=>	"0px",
			"margin"			=>	"0px"
			),

		"block"	=>	array(
			"background-color"	=>	"transparent",
			"border-radius"		=>	"0px",
			"box-shadow"		=>	"none",
			"border"			=>	"0px solid #ccc",
			"padding"			=>	"0px",
			"margin"			=>	"0px"
			),

		"content"	=>	array(
			"background-color"	=>	"transparent",
			"border-radius"		=>	"0px",
			"box-shadow"		=>	"none",
			"border"			=>	"none",
			"padding"			=>	"0px",
			"font-size"			=>	"15px",
			"font-family"		=>	"inherit",
			"color"				=>	"@neutral-color-dark",
			),

		"sidebar"	=>	array(
			"background-color"	=>	"transparent",
			"border-radius"		=>	"0px",
			"box-shadow"		=>	"none",
			"border"			=>	"0px solid transparent",
			),

		"sidebar-widget"	=>	array(
			"background-color"	=>	"transparent",
			"border-radius"		=>	"0px",
			"box-shadow"		=>	"none",
			"border"			=>	"0px solid #ccc",
			"padding"			=>	"0px",
			"margin"			=>	"40px 0 0"
			),

		"sidebar-title"	=>	array(
			"color"				=>	"@neutral-color-dark",
			"font-size"			=>	"21px",
			"font-family"		=>	"inherit",
			"letter-spacing"	=>	"0",
			"line-height"		=>	"auto",
			"background-color"	=>	"transparent",
			"margin"			=>	"20px 0 10px 0px",
			"padding"			=>	"0px",
			),

		"sidebar-list"	=>	array(
			"list-style-type"	=>	"none",
			"margin"			=>	"0px",
			"padding"			=>	"0px",
			),

		"sidebar-list-link"	=>	array(
			"transition"		=>	"0.33s ease all",
			"display"			=>	"block",
			"color"				=>	"fade(@primary-color-dark, 80%)",
			"color:hover"		=>	"@primary-color-dark",
			"background-color"	=>	"fade(@neutral-color-light, 25%)",
			"background-color:hover" =>	"@primary-color-light",
			"font-size"			=>	"17px",
			"font-weight"		=>	"normal",
			"font-family"		=>	"inherit",
			"border"			=>	"1px solid @neutral-color-light",
			"border:hover"		=>	"1px solid @primary-color-dark",
			"border-radius"		=>	"3px",
			"margin"			=>	"2px 0 0 0",
			"padding"			=>	"5px 20px",
			"text-decoration"	=>	"none",
			"text-decoration-hover" => "none",
			"position"			=>	"relative",
			"top"				=>	"0",
			"top:hover"			=>	"0",
			"left"				=>	"0",
			"left:hover"		=>	"0",
			"box-shadow"		=>	"none",
			"text-shadow"		=>	"none",
			"box-shadow:hover"	=>	"none",
			),

		"sidebar-list-link-selected"	=>	array(
			"display"			=>	"block",
			"color"				=>	"#999",
			"color:hover"		=>	"#333",
			"background-color"	=>	"#f2f2f2",
			"background-color:hover" =>	"#ccc",
			"font-size"			=>	"17px",
			"font-weight"		=>	"bold",
			"border"			=>	"1px solid #ccc",
			"border:hover"		=>	"1px solid #000",
			"border-radius"		=>	"3px",
			"margin"			=>	"auto",
			"padding"			=>	"auto",
			"text-decoration"	=>	"none",
			"text-decoration-hover" => "none",
			"position"			=>	"relative",
			"top"				=>	"0",
			"top:hover"			=>	"0",
			"left"				=>	"0",
			"left:hover"		=>	"0",
			"box-shadow"		=>	"none",
			//"box-shadow:hover"	=>	"none",
			"text-shadow"		=>	"none",
			),

		"tag"	=>	array(
			"color"				=>	"#999",
			"color:hover"		=>	"#333",
			"background-color"	=>	"#f2f2f2",
			"background-color:hover" =>	"#ccc",
			"font-size"			=>	"21px",
			"font-family"		=>	"inherit",
			"border"			=>	"1px solid #ccc",
			"border:hover"		=>	"1px solid #000",
			"border-radius"		=>	"3px",
			"box-shadow"		=>	"none",
			"text-decoration"	=>	"none",
			"text-decoration-hover" => "none",
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