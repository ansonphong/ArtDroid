<?php
/*____           _                      _     _    ____             __ _       
 |  _ \ ___  ___| |___      _____  _ __| | __| |  / ___|___  _ __  / _(_) __ _ 
 | |_) / _ \/ __| __\ \ /\ / / _ \| '__| |/ _` | | |   / _ \| '_ \| |_| |/ _` |
 |  __/ (_) \__ \ |_ \ V  V / (_) | |  | | (_| | | |__| (_) | | | |  _| | (_| |
 |_|   \___/|___/\__| \_/\_/ \___/|_|  |_|\__,_|  \____\___/|_| |_|_| |_|\__, |
                                                                         |___/ 
/////////////////// ----- GLOBAL SITE CONFIGURATIONS ----- ///////////////////*/

add_action('postworld_config', 'theme_postworld_config', 10);
function theme_postworld_config(){
	/**
	 * Define prefixed postmeta keys to be used.
	 */
	define( 'THEME_ALT_IMAGE', 'artdroid_alt_image' );
	define( 'THEME_REDIRECT_URL', 'artdroid_redirect_url' );
	define( 'THEME_LINK_TARGET', 'artdroid_link_target' );

	/**
	 * Define prefixed termmeta keys to be used.
	 */
	define( 'THEME_ICON', 'artdroid_icon' );
	define( 'THEME_IMAGE_PRIMARY', 'artdroid_image_primary' );
	define( 'THEME_IMAGE_SECONDARY', 'artdroid_image_secondary' );

	$postmeta_key = 'artdroid_meta'; // @todo Pre-register automatically in Postworld Core, so PW_POSTMETA_KEY can be used

	pw_config('includes',  array(
		'js' => array(
			'in_footer' => true,
			),
		));

	pw_config_required_modules( array(
		'site',
		'layouts',
		'sidebars',
		'styles',
		'social',
		'feeds',
		'iconsets',
		'taxonomy_meta',
		'shortcodes',
		'devices',
		'colors',
		'widgets',
		'comments'
		));

	pw_config_supported_modules( array(
		'site',
		'layouts',
		'sidebars',
		'styles',
		'social',
		'feeds',
		'backgrounds',
		'iconsets',
		'taxonomy_meta',
		'shortcodes',
		'devices',
		'post_cache',
		'colors',
		'widgets',
		'comments'
		));

	pw_config('post_views', array(
		'supported' => array('list','modal','grid','full'),
		'options' => array(
			'feeds' => array('list','grid','full'),
			'related_posts' => array('list'),
			),
		'meta'	=>	array(
			'list' => array(
				'label' => 'List',
				),
			'detail' => array(
				'label' => 'Detail',
				),
			'grid' => array(
				'label' => 'Grid',
				),
			'full' => array(
				'label' => 'Single',
				),
			'modal' => array(
				'label' => 'Modal',
				)
			),
		));

	pw_config_module('widgets', array(
		'labels' => array(
			'prefix' => '(ArtDroid)'
			),
		'supported' => array(
			'related_posts',
			'term_feed',
			'feed',
			//'menu_kit',
			//'module',
			//'user'
			),
		'settings' => array(
			'term_feed' => array(
				'views' => array('term-feed-list'),
				),
			),
		));

	pw_config_module('comments', array(
		'supported' => array(
			//'disqus',
			//'facebook',
			'wordpress'
			)
		));



	pw_metabox_config('colors', array(
		'post_types'	=> array( 'attachment', 'post' ),
		));

	pw_metabox_config('link_url', array(
		'post_types'	=>	array( 'post', 'blog', 'page', 'attachment' ),
		));

	pw_metabox_config('layout', array(
		'post_types'	=>	array( 'page' ),
		));

	pw_metabox_config('background', array(
		'post_types'	=>	array( 'post', 'page' ),
		));


	pw_metabox_config('wp_postmeta', array(
		///// POST META /////
		array(
			'post_types' => array('blog'),
			'metabox'		=>	array(
				'title'		=>	__('Post Options','postworld'),
				'context'	=>	'normal',
				),
			'fields' => array(
				array(
					'supports'			=>	array('custom_default'),
					'type'				=>	'radio-buttons',
					'label'				=>	__('Featured Image Display','postworld'),
					'description'		=>	__('How to display the featured image','postworld'),
					'icon'				=>	'pwi-image',
					'meta_key'			=>	$postmeta_key,
					'sub_key'			=>	'featured_image.display',
					'default_value'		=>	'default',
					'options' 			=>	array(
						array(
							'value' => 'default',
							//'icon' 	=> 'pwi-circle-thin',
							'label' => __('Default','postworld'),
							'description' => 'Use the default setting configured in theme settings.'
							),
						array(
							'value' => 'slice',
							//'icon' 	=> 'pwi-arrows-h',
							'label' => __('Slice','postworld'),
							'description' => 'Shows a horizontal slice of the image in the post header.'
							),
						array(
							'value' => 'full',
							//'icon' 	=> 'pwi-image',
							'label' => __('Full','postworld'),
							'description' => 'Shows the full image in the post header.'
							),
						array(
							'value' => 'none',
							//'icon' 	=> 'pwi-close-thin',
							'label' => __('None','postworld')
							),
						),
					),
				),
			),

		array(
			'post_types'	=>	array( 'post', 'page' ),
			'metabox'		=>	array(
				'title'		=>	'Post Options',
				'context'	=>	'normal',
				),
			'fields'	=>	array(
				array(
					'type'				=>	'image-id',
					'label'				=>	'Alternative Featured Image',
					'description'		=>	'Used for the slider',
					'meta_key'			=>	THEME_ALT_IMAGE,
					'icon'				=>	'pwi-image',
					),
				array(
					'type'				=>	'text-input',
					'label'				=>	'Redirect to URL',
					'description'		=>	'301 redirect',
					'meta_key'			=>	THEME_REDIRECT_URL,
					'icon'				=>	'pwi-link',
					),
				array(
					'type'				=>	'select-input',
					'label'				=>	'Link Target',
					'description'		=>	'Target of the link when clicked, used by sliders',
					'meta_key'			=>	THEME_LINK_TARGET,
					'icon'				=>	'pwi-target',
					'options'			=>	array(
						array(
							'value' => '',
							'label' => __('Default','postworld')
							),
						array(
							'value' => '_blank',
							'label' => __('Open in New Tab','postworld')
							),
						),
					),
				
				),

			),

		));

	pw_config( 'wp_admin.admin_bar_menu', array(
		'enable' => true,
		'title' => __('ArtDroid','artdroid'),
		));

	pw_config( 'wp_admin.taxonomy_meta', array(
		array(
			'taxonomies'	=>	array( 'category', 'post_tag', 'blog_category' ),
			'fields'	=>	array(
				array(
					'type'				=>	'icon',
					'label'				=>	'Icon',
					'description'		=>	'An icon used to represent the term.',	
					'meta_key'			=>	THEME_ICON,
					'icon'				=>	'pwi-circle-thick',
					'placeholder'		=>	''
					),
				
				array(
					'type'				=>	'image-id',
					'label'				=>	'Primary Image',
					'description'		=>	'An image used to represent the term in the header.',
					'meta_key'			=>	THEME_IMAGE_PRIMARY,
					'icon'				=>	'pwi-image',
					),

				array(
					'type'				=>	'image-id',
					'label'				=>	'Secondary Image',
					'description'		=>	'An image used in sliders, if different from the primary image. If a secondary image is not selected, the primary image will be used.',
					'meta_key'			=>	THEME_IMAGE_SECONDARY,
					'icon'				=>	'pwi-image',
					),
				/*
				array(
					'type'				=>	'editor',
					'label'				=>	'Rich Description',
					'description'		=>	'The rich description is used in place of the description if provided.',
					'meta_key'			=>	'artdroid_rich_description',
					'icon'				=>	'pwi-quick-edit',
					),
				*/

				),	
			),
		));

	pw_config('user_meta', array(
		'pw_avatar'	=>	false,
		));

	pw_config('database', array(
		'tables' => array(
			//'post_meta',
			'cache'
			),
		'wp_postmeta' => array(
			'json_meta_keys' => array(
				'event',
				$postmeta_key,
				),
			),
		));

	pw_config_module('iconsets', array(
		'required'	=>	array(
			'postworld-icons',
			),
		));

	pw_config_module('colors', array(
		'process_images' => true,
		'max_size' => 640,
		'number' => 5,
		));

}