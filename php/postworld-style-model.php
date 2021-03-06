<?php

add_filter( PW_OPTIONS_STYLES, 'theme_pw_styles_default' );
function theme_pw_styles_default( $styles = array() ){

	$defaults = array(
		'colors'	=>	array(
			'core' =>	array(
				'global-background-color'		=>	'#191919',
				'global-foreground-color'		=>	'#e6e6e6',
				'inverted-background-color'		=>	'@global-foreground-color',
				'inverted-foreground-color'		=>	'@global-background-color',
				'primary-color-medium'			=>	'#cc6600',
				'secondary-color-medium'		=>	'#cc6600',
				'neutral-color-medium'			=>	'#808080',
				'highlight-foreground-color'	=>	'#cc6600',
				'highlight-background-color'	=>	'#fff',
				'modal-foreground-color'		=>	'#fff',
				'modal-background-color'		=>	'#000',
				'highlight-color-medium'		=>	'#ff5a00',
				),

			'header'	=>	array(
				'header-background'			=>	'#2b2b2b',
				'header-background-opacity'	=>	'90%',
				'header-line-color'			=>	'#545454',
				'main-menu-foreground'		=>	'#e6e6e6',
				'sub-menu-background'		=>	'#d4d4d4',
				'sub-menu-foreground'		=>	'#323232',
				'search-button-background'	=>	'#808080',
				'logo-background-hover'		=>	'#333',
				),

			'media'	=>	array(
				'media-viewer-background'			=>	'#000',
				),

			'footer'=>	array(
				//'footer-background'			=>	'transparent',
				'footer-color'				=>	'@neutral-color-medium',
				'footer-widgets-background' =>	'@global-background-color',
				'footer-base-background' 	=>	'@global-background-color',
				),

			'slider'=>	array(
				'slider-arrow-color'	=>	'@secondary-color-dark',
				),

			'widgets'	=>	array(
				'widget-background-color'	=>	'@neutral-color-dark',
				'widget-foreground-color'	=>	'@neutral-color-medium',
				'widget-link-color'			=>	'@primary-color-medium',
				),

			'blog'	=>	array(
				'blog-background-color'		=>	'@global-background-color',
				'blog-foreground-color'		=>	'@global-foreground-color',
				'blog-link-color'			=>	'@primary-color-medium',
				),

			),

		'typography'	=>	array(
			'menu'	=>	array(
				'menu-text-transform' 		=> 'none',
				'menu-font-size-desktop'	=>	'25px',
				'menu-font-size-tablet'		=>	'19px',
				'menu-font-size-mobile'		=>	'16px',
				),
			),

		'layout'	=>	array(
			'header' => array(
				'header-height-expand'	=>	'96px',
				),
			'bootstrap'	=>	array(
				'grid-gutter-width'	=>	'0px',
				),
			'page'	=>	array(
				'page-xs-width'		=>	'100%',
				'page-sm-width'		=>	'100%',
				'page-md-width'		=>	'100%',
				'page-lg-width'		=>	'100%',
				'page-max-width'	=>	'4200px',
				),
			'modal'	=>	array(
				'modal-xs-width'		=>	'100%',
				'modal-sm-width'		=>	'100%',
				'modal-md-width'		=>	'100%',
				'modal-lg-width'		=>	'100%',
				'modal-max-width'		=>	'4200px',
				),
			),

		'posts'	=>	array(
			'grid'	=>	array(
				'grid-image-size'			=>	'cover',
				'grid-unit-padding'			=>	'1px',
				'grid-feed-padding'			=>	'0px',
				'grid-unit-border'			=>	'1px solid transparent',
				'grid-title-foreground'		=>	'@global-foreground-color',
				'grid-title-background'		=>	'fade( @neutral-color-dark, 80% )',
				'grid-title-shadow'			=>	'none',
				'grid-title-font-weight'	=>	'normal',
				'grid-details-foreground'	=>	'#fff',
				'grid-details-background'	=>	'@neutral-color-dark',
				'grid-title-align'			=>	'left',
				),
			),

		'galleries' => array(
			'horizontal' => array(
				'horizontal-gallery-image-padding' => '10px 0 10px 10px',
				),
			'vertical' => array(
				'vertical-gallery-image-padding' => '0 0 10px 0',
				),
			'frame' => array(
				'frame-gallery-image-padding' => '20px',
				),
			'inline' => array(
				'inline-gallery-image-padding' => '20px',
				),
			),

		'pages'	=>	array(
			'single'	=>	array(
				'page-header-background'	=>	'@neutral-color-dark',
				'page-header-foreground'	=>	'@neutral-color-light',
				),
			),

		'term_feeds'	=>	array(
			'grid'	=>	array(
				'term-feed-grid-gutter'	=>	'10px',
				),
			),

		'thirdparty' =>	array(
			'wpcf7'	=> array(
				'wpcf7-primary-color' => '@neutral-color-medium',
				),
			),

		'detailing' => array(
			'gradient-overlay' => array(
				'header-gradient-overlay-opacity' => '1',
				'pagelist-gradient-overlay-opacity' => '1',
				'termlist-gradient-overlay-opacity' => '1',
				),
			),

		);

	return array_replace_recursive( $defaults, $styles ); 

}


////////// STYLE ADMIN //////////
add_filter( PW_MODEL_STYLES, 'theme_pw_styles_structure' );
function theme_pw_styles_structure( $structure = array() ){

	$theme_structure = array(
		array(
			"name"	=>	"Colors",
			"key"	=>	"colors",
			//"icon"	=>	"pwi-droplet",
			"values"	=>	array(

				///// COLORS /////
				array(
					"name"		=>	"Core",
					"key"		=>	"core",
					"icon"		=>	"pwi-triadic-2",
					"values"	=>	array(
						array(
							"name"			=>	"Background Color",
							"key"			=>	"global-background-color",
							"input"			=>	"color",
							"description"	=>	"Background color"
							),
						array(
							"name"			=>	"Foreground Color",
							"key"			=>	"global-foreground-color",
							"input"			=>	"color",
							"description"	=>	"Text color"
							),
						array( 'line' ),
						array(
							"name"			=>	"Inverted Background Color",
							"key"			=>	"inverted-background-color",
							"input"			=>	"color",
							"description"	=>	"Background color for inverted pages"
							),
						array(
							"name"			=>	"Inverted Foreground Color",
							"key"			=>	"inverted-foreground-color",
							"input"			=>	"color",
							"description"	=>	"Text color for inverted pages"
							),
						array( 'line' ),
						array(
							"name"			=>	"Primary Color",
							"key"			=>	"primary-color-medium",
							"input"			=>	"color",
							"description"	=>	__("Used for primary elements. Choose a color with around 50% lightness.", "postworld"),
							),
						array(
							"name"			=>	"Secondary Color",
							"key"			=>	"secondary-color-medium",
							"input"			=>	"color",
							"description"	=>	__("Used for secondary elements. Choose a color with around 50% lightness.", "postworld"),
							),
						array(
							"name"			=>	"Neutral Color",
							"key"			=>	"neutral-color-medium",
							"input"			=>	"color",
							"description"	=>	__("Used for neutral elements. Choose a color with around 50% lightness.", "postworld"),
							),
						array( 'line' ),
						array(
							"name"			=>	"Highlight Foreground",
							"key"			=>	"highlight-foreground-color",
							"input"			=>	"color",
							"description"	=>	"The foreground (text) color used for mouseovers"
							),
						array(
							"name"			=>	"Highlight Background",
							"key"			=>	"highlight-background-color",
							"input"			=>	"color",
							"description"	=>	"The background color used for mouseovers"
							),
						array( 'line' ),
						array(
							"name"			=>	"Modal Foreground",
							"key"			=>	"modal-foreground-color",
							"input"			=>	"color",
							"description"	=>	"The foreground (text) color used for modal windows"
							),
						array(
							"name"			=>	"Modal Background",
							"key"			=>	"modal-background-color",
							"input"			=>	"color",
							"description"	=>	"The background color used for modal windows"
							),
						array( 'line' ),
						array(
							"name"			=>	"Highlight Medium",
							"key"			=>	"highlight-color-medium",
							"input"			=>	"color",
							"description"	=>	__("Used for items which require special attention.", "postworld"),
							),
						),
					),

				///// HEADER /////
				array(
					'name'	=>	'Header',
					'key'	=>	'header',
					'icon'	=>	'pwi-arrow-up-circle',
					'values'	=>	array(
						array(
							"name"			=>	"Header Background",
							"key"			=>	"header-background",
							"input"			=>	"color",
							"description"	=>	"Background color of the header"
							),

						array(
							"name"			=>	"Header Background Opacity",
							"key"			=>	"header-background-opacity",
							"input"			=>	"text",
							"description"	=>	"Opacity of the header background in percent, between 0-100%, include (%), ie. 90%",
							),

						array(
							"name"			=>	"Header Line",
							"key"			=>	"header-line-color",
							"input"			=>	"color",
							"description"	=>	"The color of the line under the header"
							),
						/*
						array(
							"name"			=>	"Main Menu Background",
							"key"			=>	"main-menu-background",
							"input"			=>	"color",
							"description"	=>	"Background color of the main menu items"
							),
						*/
						array(
							"name"			=>	"Main Menu Text Color",
							"key"			=>	"main-menu-foreground",
							"input"			=>	"color",
							"description"	=>	"Color of the main menu items text"
							),
						array(
							"name"			=>	"Sub-menu Background",
							"key"			=>	"sub-menu-background",
							"input"			=>	"color",
							"description"	=>	"Background color of the dropdown menus"
							),
						array(
							"name"			=>	"Sub-menu Text Color",
							"key"			=>	"sub-menu-foreground",
							"input"			=>	"color",
							"description"	=>	"Color of the dropdown menu text"
							),
						array(
							"name"			=>	"Search Button Background",
							"key"			=>	"search-button-background",
							"input"			=>	"color",
							"description"	=>	"Background color of the header search button",
							),
						array(
							"name"			=>	"Logo Background Hover",
							"key"			=>	"logo-background-hover",
							"input"			=>	"color",
							"description"	=>	"Color of the logo background on mouse hover",
							),
						),
					),

				///// FOOTER /////
				array(
					'name'	=>	'Footer',
					'key'	=>	'footer',
					'icon'	=>	'pwi-arrow-down-circle',
					'values'	=>	array(
						array(
							"name"			=>	"Footer Text Color",
							"key"			=>	"footer-color",
							"input"			=>	"color",
							"description"	=>	"Color of text in the footer area"
							),
						array(
							"name"			=>	"Footer Widgets Background",
							"key"			=>	"footer-widgets-background",
							"input"			=>	"color",
							"description"	=>	"Background of the footer widgets area"
							),
						array(
							"name"			=>	"Footer Base Background",
							"key"			=>	"footer-base-background",
							"input"			=>	"color",
							"description"	=>	"Background of the base footer area"
							),
						),
					),

				///// MEDIA /////
				array(
					'name'	=>	'Media',
					'key'	=>	'media',
					'icon'	=>	'pwi-images',
					'values'	=>	array(
						array(
							"name"			=>	"Media Viewer Background",
							"key"			=>	"media-viewer-background",
							"input"			=>	"color",
							"description"	=>	"Background color behind media embeds"
							),
						),
					),
				

				///// SLIDERS /////
				array(
					'name'	=>	'Sliders',
					'key'	=>	'slider',
					'icon'	=>	'pwi-layers-2',
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
					'icon'	=>	'pwi-dashboard',
					'values'	=>	array(
						array(
							"name"			=>	"Background Color",
							"key"			=>	"widget-background-color",
							"input"			=>	"color",
							"description"	=>	"General Color of widgets"
							),
						array(
							"name"			=>	"Text Color",
							"key"			=>	"widget-foreground-color",
							"input"			=>	"color",
							"description"	=>	"Color of text in widgets"
							),
						array(
							"name"			=>	"Link Color",
							"key"			=>	"widget-link-color",
							"input"			=>	"color",
							"description"	=>	"Color of text in widgets"
							),
						array(
							"name"			=>	"Highlight Color",
							"key"			=>	"widget-highlight-color",
							"input"			=>	"color",
							"description"	=>	"Highlighted and selected items"
							),
						),
					),


				///// BLOG /////
				array(
					'name'	=>	'Blog',
					'key'	=>	'blog',
					'icon'	=>	'pwi-blog',
					'values'	=>	array(
						array(
							"name"			=>	"Background Color",
							"key"			=>	"blog-background-color",
							"input"			=>	"color",
							"description"	=>	"Background color of blog posts."
							),
						array(
							"name"			=>	"Foreground Color",
							"key"			=>	"blog-foreground-color",
							"input"			=>	"color",
							"description"	=>	"Text color of blog posts."
							),
						array(
							"name"			=>	"Link Color",
							"key"			=>	"blog-link-color",
							"input"			=>	"color",
							"description"	=>	"Link color in blog posts."
							),
						),
					),


				),

			),


		array(
			"name"	=>	"Typography",
			"key"	=>	"typography",
			//"icon"	=>	"pwi-th-large-2",
			"values"	=>	array(

				///// MENU /////
				array(
					'name'	=>	'Menu',
					'key'	=>	'menu',
					'icon'	=>	'pwi-nav',
					'values'	=>	array(
						array(
							"name"			=>	"Text Transform",
							"key"			=>	"menu-text-transform",
							"input"			=>	"text",
							"description"	=>	"Text transform property of the menu container."
							),
						array( 'line' ),
						array(
							"name"			=>	"Font Size - Desktop",
							"key"			=>	"menu-font-size-desktop",
							"input"			=>	"text",
							"description"	=>	"Font size on desktop device."
							),
						array(
							"name"			=>	"Font Size - Tablet",
							"key"			=>	"menu-font-size-tablet",
							"input"			=>	"text",
							"description"	=>	"Font size on tablet device."
							),
						array(
							"name"			=>	"Font Size - Mobile",
							"key"			=>	"menu-font-size-mobile",
							"input"			=>	"text",
							"description"	=>	"Font size on mobile device."
							),
						),
					),
				),
			),


		array(
			"name"	=>	"Layout",
			"key"	=>	"layout",
			//"icon"	=>	"pwi-th-large-2",
			"values"	=>	array(

				///// HEADER /////
				array(
					'name'	=>	'Header',
					'key'	=>	'header',
					'icon'	=>	'pwi-arrow-up-circle',
					'values'	=>	array(
						array(
							"name"			=>	"Header Height",
							"key"			=>	"header-height-expand",
							"input"			=>	"text",
							"description"	=>	"Expanded height of the header before scrolling. (include 'px')"
							),
						),
					),

				
				///// BOOTSTRAP /////
				array(
					'name'	=>	'Bootstrap',
					'key'	=>	'bootstrap',
					'icon'	=>	'pwi-grid-2',
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
					'icon'	=>	'pwi-file',
					'values'	=>	array(
						array(
							"name"			=>	"Width (Extra Small)",
							"key"			=>	"page-xs-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on mobile devices (recommended: 100%)",
							"icon"			=>	"pwi-mobile"
							),
						array(
							"name"			=>	"Width (Small)",
							"key"			=>	"page-sm-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on larger mobile devices",
							"icon"			=>	"pwi-mobile-wide"
							),
						array(
							"name"			=>	"Width (Medium)",
							"key"			=>	"page-md-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on wide tablets",
							"icon"			=>	"pwi-tablet"
							),
						array(
							"name"			=>	"Width (Large)",
							"key"			=>	"page-lg-width",
							"input"			=>	"text",
							"description"	=>	"The width of the layout on desktop and laptops",
							"icon"			=>	"pwi-laptop"
							),
						array(
							"name"			=>	"Maximum Width",
							"key"			=>	"page-max-width",
							"input"			=>	"text",
							"description"	=>	"The maximum width of the page layout",
							"icon"			=>	"pwi-arrows-h"
							),

						),
					),

				///// MODAL /////
				array(
					'name'	=>	'Modal Window',
					'key'	=>	'modal',
					'icon'	=>	'pwi-stack',
					'values'	=>	array(
						array(
							"name"			=>	"Width (Extra Small)",
							"key"			=>	"modal-xs-width",
							"input"			=>	"text",
							"description"	=>	"The width of the modal window on mobile devices (recommended: 100%)",
							"icon"			=>	"pwi-mobile"
							),
						array(
							"name"			=>	"Width (Small)",
							"key"			=>	"modal-sm-width",
							"input"			=>	"text",
							"description"	=>	"The width of the modal window on larger mobile devices",
							"icon"			=>	"pwi-mobile-wide"
							),
						array(
							"name"			=>	"Width (Medium)",
							"key"			=>	"modal-md-width",
							"input"			=>	"text",
							"description"	=>	"The width of the modal window on wide tablets",
							"icon"			=>	"pwi-tablet"
							),
						array(
							"name"			=>	"Width (Large)",
							"key"			=>	"modal-lg-width",
							"input"			=>	"text",
							"description"	=>	"The width of the modal window on desktop and laptops",
							"icon"			=>	"pwi-laptop"
							),
						array(
							"name"			=>	"Maximum Width",
							"key"			=>	"modal-max-width",
							"input"			=>	"text",
							"description"	=>	"The maximum width of the modal window",
							"icon"			=>	"pwi-arrows-h"
							),

						),
					),





				),
			),


		array(
			"name"	=>	"Posts",
			"key"	=>	"posts",
			//"icon"	=>	"pwi-pushpin",
			"values"	=>	array(

				///// BOOTSTRAP /////
				array(
					'name'	=>	'Grid',
					'key'	=>	'grid',
					'icon'	=>	'pwi-th',
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
							"name"			=>	"Grid Feed Padding",
							"key"			=>	"grid-feed-padding",
							"input"			=>	"text",
							"description"	=>	"Padding around the grid feed"
							),
						array(
							"name"			=>	"Grid Unit Border",
							"key"			=>	"grid-unit-border",
							"input"			=>	"text",
							"description"	=>	"The border around each grid unit"
							),
						array( 'line' ),
						array(
							"name"			=>	"Grid Title Background",
							"key"			=>	"grid-title-background",
							"input"			=>	"color",
							"description"	=>	"The backgroud color of the title"
							),
						array(
							"name"			=>	"Grid Title Foreground",
							"key"			=>	"grid-title-foreground",
							"input"			=>	"color",
							"description"	=>	"The color of the title text"
							),
						array(
							"name"			=>	"Grid Title Shadow",
							"key"			=>	"grid-title-shadow",
							"input"			=>	"text",
							"description"	=>	"The text-shadow on the title text"
							),
						array(
							"name"			=>	"Grid Title Font Weight",
							"key"			=>	"grid-title-font-weight",
							"input"			=>	"text",
							"description"	=>	"The font weight of the grid title (lighter,normal,bold)"
							),
						array(
							"name"			=>	"Grid Title Align",
							"key"			=>	"grid-title-align",
							"input"			=>	"select",
							"ng_options"	=>	"options.style.textAlign",
							"description"	=>	"The alignment of the title text"
							),
						array( 'line' ),
						array(
							"name"			=>	"Grid Details Background",
							"key"			=>	"grid-details-background",
							"input"			=>	"color",
							"description"	=>	"The backgroud color of the grid details"
							),
						array(
							"name"			=>	"Grid Details Foreground",
							"key"			=>	"grid-details-foreground",
							"input"			=>	"color",
							"description"	=>	"The color of the grid details text"
							),
						),
					),


				),

			),

		array(
			"name"	=>	"Pages",
			"key"	=>	"pages",
			//"icon"	=>	"pwi-file",
			"values"	=>	array(

				///// BOOTSTRAP /////
				array(
					'name'	=>	'Single',
					'key'	=>	'single',
					'icon'	=>	'pwi-circle-medium',
					'values'	=>	array(
						array(
							"name"			=>	"Header Background",
							"key"			=>	"page-header-background",
							"input"			=>	"color",
							"description"	=>	"The header background color on single pages"
							),
						array(
							"name"			=>	"Header Foreground",
							"key"			=>	"page-header-foreground",
							"input"			=>	"color",
							"description"	=>	"The header text color on single pages"
							),
						
						),
					),


				),

			),

		array(
			"name"	=>	"Term Feeds",
			"key"	=>	"term_feeds",
			//"icon"	=>	"pwi-th-large",
			"values"	=>	array(

				///// GRID /////
				array(
					'name'	=>	'Grid',
					'key'	=>	'grid',
					'icon'	=>	'pwi-th',
					'values'	=>	array(
						array(
							"name"			=>	"Term Spacing",
							"key"			=>	"term-feed-grid-gutter",
							"input"			=>	"text",
							"description"	=>	"Space between terms in grid term feed"
							),
						
						),
					),


				),

			),

		
		array(
			"name"	=>	"Galleries",
			"key"	=>	"galleries",
			//"icon"	=>	"pwi-images",
			"values"	=>	array(

				array(
					'name'	=>	'Horizontal Galleries',
					'key'	=>	'horizontal',
					'icon'	=>	'pwi-arrows-h',
					'values'	=>	array(
						
						array(
							"name"			=>	"Image Padding",
							"key"			=>	"horizontal-gallery-image-padding",
							"input"			=>	"text",
							"description"	=>	"The space around an image in a horizontal gallery. (include 'px')"
							),
						
						),
					),


				array(
					'name'	=>	'Vertical Galleries',
					'key'	=>	'vertical',
					'icon'	=>	'pwi-arrows-v',
					'values'	=>	array(
						
						array(
							"name"			=>	"Image Padding",
							"key"			=>	"vertical-gallery-image-padding",
							"input"			=>	"text",
							"description"	=>	"The space around an image in a vertical gallery. (include 'px')"
							),
						
						),
					),


				array(
					'name'	=>	'Frame Galleries',
					'key'	=>	'frame',
					'icon'	=>	'pwi-square-medium',
					'values'	=>	array(
						
						array(
							"name"			=>	"Image Padding",
							"key"			=>	"frame-gallery-image-padding",
							"input"			=>	"text",
							"description"	=>	"The space around an image in a frame gallery. (include 'px')"
							),
						
						),
					),


				array(
					'name'	=>	'Inline/Grid Galleries',
					'key'	=>	'inline',
					'icon'	=>	'pwi-grid',
					'values'	=>	array(
						
						array(
							"name"			=>	"Image Padding",
							"key"			=>	"inline-gallery-image-padding",
							"input"			=>	"text",
							"description"	=>	"The space around an image in an inline grid gallery. (include 'px')"
							),
						
						),
					),


				),

			),

		array(
			"name"	=>	"Third Party Plugins",
			"key"	=>	"thirdparty",
			//"icon"	=>	"pwi-plugin",
			"values"	=>	array(
				array(
					'name'	=>	'Contact Form 7',
					'key'	=>	'wpcf7',
					'icon'	=>	'pwi-mail',
					'values'	=>	array(
						array(
							"name"			=>	"Primary Color",
							"key"			=>	"wpcf7-primary-color",
							"input"			=>	"color",
							"description"	=>	"The main color for WordPress Contact Form 7 Plugin"
							),
						),
					),
				),
			),

		array(
			"name"	=>	"Detailing",
			"key"	=>	"detailing",
			//"icon"	=>	"pwi-plugin",
			"values"	=>	array(
				array(
					'name'	=>	'Gradient Overlays',
					'key'	=>	'gradient-overlay',
					'icon'	=>	'pwi-paint-format',
					'values'	=>	array(
						array(
							"name"			=>	"Header Gradient Overlay Opacity",
							"key"			=>	"header-gradient-overlay-opacity",
							"input"			=>	"text",
							"description"	=>	"Opacity of the header's gradient overlay (0-1)"
							),
						array(
							"name"			=>	"Pagelist Overlay Opacity",
							"key"			=>	"pagelist-gradient-overlay-opacity",
							"input"			=>	"text",
							"description"	=>	"Opacity of the pagelist menu's gradient overlay (0-1)"
							),
						array(
							"name"			=>	"Termlist Overlay Opacity",
							"key"			=>	"termlist-gradient-overlay-opacity",
							"input"			=>	"text",
							"description"	=>	"Opacity of the term list's gradient overlay (0-1)"
							),
						),
					),
				),
			),

		);

	$structure = array_replace_recursive( $structure, $theme_structure ); 

	return $structure;

}

/**
 * STYLE SET : EARTH TONE
 */
/*
pw_register_style_set(array(
	'name' => 'Earth Tone',
    'id' => 'earth-tone',
	'styles' => array(
		'colors'	=>	array(
			'core' =>	array(
				'global-background-color'		=>	'#000000',
				'global-foreground-color'		=>	'#ffffff',
				
				'primary-color-light'			=>	'#d8b883',
				'primary-color-medium'			=>	'#ad4200',
				'primary-color-dark'			=>	'#812c00',

				'secondary-color-light'			=>	'@primary-color-light',
				'secondary-color-medium'		=>	'@primary-color-medium',
				'secondary-color-dark'			=>	'@primary-color-dark',

				'neutral-color-light'			=>	'#e4ded2',
				'neutral-color-medium'			=>	'#7a6357',
				'neutral-color-dark'			=>	'#2e2c24',

				'highlight-foreground-color'	=>	'@primary-color-medium',
				'highlight-background-color'	=>	'#fff',

				'modal-foreground-color'	=>	'#fff',
				'modal-background-color'	=>	'#000',

				'highlight-color-light'			=>	'#ffac7f',
				'highlight-color-medium'		=>	'#ff5a00',
				'highlight-color-dark'			=>	'#802d00',
				),

			'header'	=>	array(
				'header-background'			=>	'@global-background-color',
				'header-line-color'			=>	'@global-background-color',
				'logo-background'			=>	'@global-background-color',
				'logo-background-hover'		=>	'mix(@neutral-color-medium, @global-background-color, 50%)',
				//'main-menu-background'		=>	'@neutral-color-dark',
				'main-menu-foreground'		=>	'@global-foreground-color',
				'secondary-menu-background'	=>	'mix(@neutral-color-medium, @global-background-color, 12%)',
				'secondary-menu-foreground'	=>	'@global-foreground-color',
				),

			'media'	=>	array(
				'media-viewer-background'			=>	'#000',
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
				'widget-foreground'			=>	'@primary-color-medium',
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
				'grid-image-size'			=>	'cover',
				'grid-unit-padding'			=>	'1px',
				'grid-unit-border'			=>	'1px solid transparent',
				'grid-title-foreground'		=>	'@global-foreground-color',
				'grid-title-background'		=>	'fade( @neutral-color-dark, 80% )',
				'grid-title-shadow'			=>	'none',
				'grid-title-font-weight'	=>	'normal',
				'grid-details-foreground'	=>	'#fff',
				'grid-details-background'	=>	'@neutral-color-dark',
				'grid-title-align'			=>	'left',
				),
			),

		'pages'	=>	array(
			'single'	=>	array(
				'page-header-background'	=>	'@neutral-color-dark',
				'page-header-foreground'	=>	'@neutral-color-light',
				),
			),
		)
	)
);
*/