<?php
////////// DEFAULT THEME OPTIONS //////////
add_filter( PW_OPTIONS_THEME, 'pw_theme_options_filter' );
function pw_theme_options_filter( $options ){
	// Set the default postworld theme options

	$defaultOptions = array(
		'loading'	=>	array(
			'show_loading' => true,
			),
		'archives'	=>	array(
			'taxonomy'	=>	array(
				'header'	=>	array(
					'background_image'	=>	array(
						'show_title'	=>	true,
						),
					'height' => array(
						'method' => 'proportion',
						'value' => 4
						),
					),
				),
			),
		'blog'	=>	array(
			'enable'	=>	true,
			'settings'	=>	array(
				'main_page' => array(
					'show_header' => true,
					'title' => 'My Blog',
					'subtitle' => 'News, current events and ramblings.',
					'icon' => '',
					'header' => array(
						'height' => array(
							'method' => 'proportion',
							'value' => 4
							),
						),
					'cover_image' => array(
						'attachment_id' => null,
						),
					),
				'views' => array(
					'full' => array(
						'header' => array(
							'height' => array(
								'method' => 'proportion',
								'value' => 4
								),
							),
						),
					),
				'post_type' => array(
					'base'				=> 'blog',
					'name'				=> 'Blog',
					'item_name' 		=> 'Blog Post',
					'item_name_plural' 	=> 'Blog Posts'
					),
				'home'	=>	array(
					'show_in_feed'	=>	false,
					),
				),
			),

		'colors' => array(
			'views' => array(
				'single' => array(
					'dynamic_colors' => true,
					),
				'grid' => array(
					'dynamic_colors' => false,
					),
				),
			'profiles' => array(
				),
			),
		'fonts'	=>	array(
			'body'		=>	'Roboto',
			'title'		=>	'Roboto',
			'content'	=>	'Roboto Slab',
			'menu'		=>	'Roboto',
			),
		'posts'	=>	array(

			'images'	=>	array(
				'height' => array(
					'method' => 'window-base',
					'value'	=>	66
					),
				),

			'embeds'	=>	array(
				'height' => array(
					'method' => 'window-base',
					'value'	=>	66
					),
				),

			'galleries' => array(
				'x_gallery' => array(
					'height' => array(
						'method' => 'window-base',
						'value'	=>	66
						),
					),
				'frame_gallery' => array(
					'height' => array(
						'method' => 'window-base',
						'value'	=>	66
						),
					),
				), 
			'post'	=>	array(
				'post_meta'	=>	array(
					PW_POSTMETA_KEY	=>	array(
						'post_content'	=>	array(
							'columns'	=>	1,
							),
						'link_url'	=>	array(
							'label'	=>	array(
								'show'	=>	'custom',
								'highlight'	=>	true,
								'tooltip'	=>	array(
									'custom' => "Buy this Art",
									),
								'custom' => 'Buy Now',
								),
							'new_target' => true,
							),
						'image'	=>	array(
							'download'	=>	true,
							),
						'gallery' => array(
							'template' => 'inline',
							'immersive' => false,
							'vertical' => array(
								'show_title' => true,
								'show_caption' => true
								),
							),
						),
					),
				),
			),
		'social'	=>	array(
			'share'	=>	array(
				'networks'	=>	array(
					'facebook',
					'twitter',
					'reddit',
					'google_plus',
					'pinterest',
					),
				),
			'in_main_menu'		=>	true,
			'in_main_menu_gray'	=>	true,
			),
		'home'	=>	array(
			'feed'	=>	array(
				'blocks'	=>	array(
					'offset' => 3,
					'increment' => 6,
					'max' => 20,
					'classes' => 'view-grid block-widget x-wide',
					'template' => 'widget-grid',
					'widgets' => array(
						'sidebar' => null,
						'background_image'	=>	array(
							'id'	=>	null,
							'parallax_ratio' => 1.5,
							),
						),	
					),
				),
			'slider' => array(
				'show_slider'	=>	false,
				'menu' =>	null,
				'height' => 70,
				'interval' => 5000,
				'hyperlink' => true,
				'no_pause' => true,
				'show_title' => true,
				'show_excerpt' => true,
				'transition' => 'fade',
				'proportion' => false,
				'parallax_depth' => 1.5
				),
			),
		'modals'	=>	array(
			'header'	=>	array(
				'show'	=>	true,
				'image' => array(
					'show_image' => false,
					'attachment_id' => false
					),
				),
			),
		'media'	=>	array(
			/*
			'embeds'	=>	array(
				'height'	=>	50,
				),
			
			'images'	=>	array(
				'height'	=>	75,
				),
			*/
			),
		'embeds'	=>	array(
			'autoplay'	=>	true,
			'youtube'	=>	array(
				'theme'		=>	'light',
				'color'		=>	'red',
				'controls'	=>	'2',
				),
			),
		'feeds'	=>	array(
			'loading'	=>	array(
				'icon'	=>	'pwi-spinner-2',
				),
			'settings' => array(
				'load_increment' => 10,
				),
			),
		'search' => array(
			'show_search' => true,
			),
		'menus'	=>	array(
			'primary'	=>	array(
				//'id'				=>	null,
				'show_social'		=>	true,
				'show_icons_top'	=>	true,
				'show_icons_sub'	=>	false,
				'alignment'			=>	'left',
				),
			/*
			'secondary'	=>	array(
				'id'				=>	null,
				'show_icons_top'	=>	true,
				'show_icons_sub'	=>	false,
				),
			*/
			'login'	=>	array(
				'secret_login'	=>	true,
				),
			),
		'footer' => array(
			'show_footer' => true,
			'credits' => array(
				'show_credits' => true,
				),
			'custom' => array(
				'show_custom' => true,
				'content' => "Copyright &COPY; All rights reserved."
				),
			'image' => array(
				'show_image' => false,
				'attachment_id' => null,
				'link_url' => '',
				),
			),
		);

	$options = array_replace_recursive( $defaultOptions, $options );

	return $options;
}

?>