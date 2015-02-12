<?php


////////// DEFAULT THEME OPTIONS //////////
function pw_theme_options_filter( $options ){
	// Set the default postworld theme options

	$defaultOptions = array(
		'posts'	=>	array(
			'media'	=>	array(
				'style'	=>	array(
					'height'	=>	66,
					),
				),
			'post'	=>	array(
				'post_meta'	=>	array(
					'pw_meta'	=>	array(
						'post_content'	=>	array(
							'columns'	=>	2,
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
							'parallax_ratio' => -0.5,
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
				),
			),
		'modals'	=>	array(
			'header'	=>	array(
				'show'	=>	true,
				),
			),
		'media'	=>	array(
			'embeds'	=>	array(
				'height'	=>	50,
				),
			/*
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
				'controls'	=>	2,
				),
			),
		'feeds'	=>	array(
			'loading'	=>	array(
				'icon'	=>	'icon-spinner-2'
				),
			'settings'	=>	array(
				'preload'			=>	10,
				'load_increment'	=>	10,
				),
			),
		'menus'	=>	array(
			'primary'	=>	array(
				'id'				=>	null,
				'show_social'		=>	true,
				'show_icons_top'	=>	true,
				'show_icons_sub'	=>	false,
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
		);

	$options = array_replace_recursive( $defaultOptions, $options );
	return $options;
}

add_filter( PW_OPTIONS_THEME, 'pw_theme_options_filter' );

?>