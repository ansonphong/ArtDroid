<?php
/*____           _                      _     _    ____             __ _       
 |  _ \ ___  ___| |___      _____  _ __| | __| |  / ___|___  _ __  / _(_) __ _ 
 | |_) / _ \/ __| __\ \ /\ / / _ \| '__| |/ _` | | |   / _ \| '_ \| |_| |/ _` |
 |  __/ (_) \__ \ |_ \ V  V / (_) | |  | | (_| | | |__| (_) | | | |  _| | (_| |
 |_|   \___/|___/\__| \_/\_/ \___/|_|  |_|\__,_|  \____\___/|_| |_|_| |_|\__, |
                                                                         |___/ 
/////////////////// ----- GLOBAL SITE CONFIGURATIONS ----- ///////////////////*/

define( 'PW_OPTIONS_THEME', 'postworld-theme-artdroid' );
define( 'PW_OPTIONS_STYLES', 'postworld-styles-artdroid' );

global $lang;
global $pwUniversalLanguage;
global $template_paths;

global $pwSiteGlobals;
$pwSiteGlobals = array(

	'modules'	=>	array(
		'required'	=>	array(
			'site',
			'layouts',
			'sidebars',
			'styles',
			'social',
			'feeds',
			'iconsets',
			'taxonomy-meta',
			'shortcodes',
			'devices',
			'colors',
			'widgets'
			),
		'supported'	=>	array(
			'site',
			'layouts',
			'sidebars',
			'styles',
			'social',
			'feeds',
			'backgrounds',
			'iconsets',
			'taxonomy-meta',
			'shortcodes',
			'devices',
			'post_cache',
			'layout_cache',
			'colors',
			'widgets'
			),
		),

	'widgets' => array(
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
		),

	'wp_admin'	=>	array(
		
		'admin_bar_menu' => array(
			'enable' => true,
			'title' => 'ArtDroid'
			),

		'taxonomy_meta'	=>	array(
			array(
				'taxonomies'	=>	array( 'category', 'post_tag', 'blog_category' ),
				'fields'	=>	array(
					array(
						'type'				=>	'icon',
						'label'				=>	'Icon',
						'description'		=>	'An icon used to represent the term.',	
						'meta_key'			=>	'icon',
						'icon'				=>	'pwi-circle-thick',
						'placeholder'		=>	''
						),
					
					array(
						'type'				=>	'image-id',
						'label'				=>	'Primary Image',
						'description'		=>	'An image used to represent the term in the header.',
						'meta_key'			=>	'image-primary',
						'icon'				=>	'pwi-image',
						),

					array(
						'type'				=>	'image-id',
						'label'				=>	'Secondary Image',
						'description'		=>	'An image used in sliders, if different from the primary image. If a secondary image is not selected, the primary image will be used.',
						'meta_key'			=>	'image-secondary',
						'icon'				=>	'pwi-image',
						),

					array(
						'type'				=>	'editor',
						'label'				=>	'Rich Description',
						'description'		=>	'The rich description is used in place of the description if provided.',
						'meta_key'			=>	'rich_description',
						'icon'				=>	'pwi-quick-edit',
						),
					),	
				),
			),


		'user_meta'	=>	array(
			'pw_avatar'	=>	true,
			),
		'metabox'	=>	array(
			'colors' => array(
				'post_types' => array( 'attachment', 'post' )
				),
			'link_url'	=>	array(
				'post_types'	=>	array( 'post', 'blog', 'page', 'attachment' ),
				),
			/*
			'post_parent'	=>	array(
				array(
					'labels'	=>	array(
						'title'		=>	'Parent Page',
						'search'	=>	'Search pages...'
						),
					'post_types' 	=> array( 'page' ),
					'query'	=>	array(
						'post_type'			=>	'page',
						),
					),
				),
			*/
			'layout'	=>	array(
				'post_types'	=>	array( 'page' ),
				),
			'background'	=>	array(
				'post_types'	=>	array( 'page', 'post' ),
				),


			// Adds inputs for additional custom WordPress postmeta fields
			'wp_postmeta'		=>	array(
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
							'meta_key'			=>	'pw_meta',
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
							'meta_key'			=>	'alt_image',
							'icon'				=>	'pwi-image',
							),
						array(
							'type'				=>	'text-input',
							'label'				=>	'Redirect to URL',
							'description'		=>	'301 redirect',
							'meta_key'			=>	'redirect_url',
							'icon'				=>	'pwi-link',
							),
						array(
							'type'				=>	'select-input',
							'label'				=>	'Link Target',
							'description'		=>	'Target of the link when clicked',
							'meta_key'			=>	'link_target',
							'icon'				=>	'pwi-target',
							'options'			=>	array(
								array(
									'value' => '',
									'label' => 'Default'
									),
								array(
									'value' => '_blank',
									'label' => 'Open in New Tab'
									),
								),
							),
						
						),

					),

				),

			),
		),

	'db'	=>	array(
		'wp_postmeta' => array(
			'json_meta_keys' => array(
				'event',
				'pw_meta',
				),
			),
		),

	// Add options for image meta here
	'colors' => array(
		// Cached under pw_colors postmeta key
		'process_images' => true,
		'max_size' => 640,
		'number' => 5,
		// Generated real-time via pw_get_post_image
		//'color_profiles' => 
		),

	'iconsets'	=>	array(
		'required'	=>	array(
			'postworld-icons',
			//'glyphicons-halflings',
			),
		),

	'edit_post'	=>	array(
		'post'	=>	array(
			'url'	=>	'/post/',
			'new'	=>	array(
				'default'	=>	array(
					'post_type'		=>	'post',
					'post_status'	=>	'publish',
					'post_class'	=>	'contributor',
					'link_format'	=>	'standard',
					),
				),
			),
		),
	
	'images' => array(
		'tags'	=>	array(

			),
		'tag_mapping' => array(
			
			),
		),

	'post_options'	=>	array(
	
		//'month'	=>	$pwUniversalLanguage['months'][$lang],

		'year'	=>	array( '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', ),

		'taxonomies'	=> array( 'category', 'post_tag' ),

		'taxonomy_outline'	=>	array(
			'category' => array(
				'max_depth' => 2,
				'fields' => array(
					'term_id',
					'name',
					'slug'
					),
				//'filter' => 'label_group'
				),
			'post_tag' => array(
				'max_depth' => 1,
				'fields' => array(
					'term_id',
					'name',
					'slug'
					),
				),
			),

		'link_format'	=>	array(
			'standard'	=> 'Standard',
			'link'		=> 'Link',
			'video'		=> 'Video',
			'audio'		=> 'Audio',
			),

		'link_format_defaults'	=>	array(
			'none'	=>	'standard',
			'link'	=>	'link'
			),

		'link_format_meta'	=>	array(
				array(
					'name'		=>	'',
					'slug'		=>	'standard',
					'domains'	=>	array(),
					'icon'		=> 'pwi-circle-thick'
				),
				array(
					'name'		=>	'Link',
					'slug'		=>	'link',
					'domains'	=>	array(),
					'icon'		=>	'pwi-link'
				),
				array(
					'name'		=>	'Video',
					'slug'		=>	'video',
					'domains'	=>	array('youtube.com/','youtu.be/','vimeo.com/','hulu.com/','ted.com/','sapo.pt/','dailymotion.com','blip.tv/','ustream.tv/',),
					'icon'		=>	'pwi-play-fill'
				),
				array(
					'name'		=>	'Audio',
					'slug'		=>	'audio',
					'domains'	=>	array('soundcloud.com/','mixcloud.com/','official.fm/','shoudio.com/','rdio.com/'),
					'icon'		=>	'pwi-headphones'
				),
			),

		'post_class'	=>	array(
			// By Post Types
			'event-post' => array(
				'participant'	=> 'Participant',
				'organizer'		=> 'Organizer',
				),
			'announcement' => array(
				'movement'		=> 'On Movement',
				'events'		=> 'On Events & Movement',
				),
			),

		'post_status'	=>	array(
			'publish' => 'Published',
			'draft' => 'Draft',
			'pending' => 'Pending'
			),

		'role_post_type_status_access'	=>	array(
			'administrator' => array(
					'post'		=> array('publish','draft','pending'),
					),
				'editor' => array(
					'post'		=> array('publish','draft','pending'),
					),
				'author' => array(
					'post'		=> array('draft','pending'),
					),
				'contributor' => array(
					'post'		=> array('draft','pending'),
					),
				),
			),

	'post_views'	=>	array(
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
		),

	'language'	=>	array(),

	'controls'	=>	array(
		'post'	=>	array(
			'role_access'	=>	array(
				'administrator' => array(
					  'own' => array( 'quick-edit', 'wp-edit', 'trash' ), // 'pw-edit',
					'other' => array( 'quick-edit', 'wp-edit', 'trash' ),
					),
				'editor' => array(
					  'own' => array( 'quick-edit', 'wp-edit', 'trash' ),
					'other' => array( 'quick-edit','wp-edit', 'trash' ),
					),
				'author' => array(
					  'own' => array( 'quick-edit', 'wp-edit', 'trash' ),
					'other' => array(  ),
					),
				'contributor' => array(
					  'own' => array( 'quick-edit', 'wp-edit', 'trash' ),
					'other' => array(  ),
					),
				'guest' => array(
					  'own' => array(  ),
					'other' => array(  ),
					),
				),
			'menu_options'	=>	array(
				array(
					"name" => 	"Quick Edit",
		            "icon" => 	"pwi-quick-edit",
		            "action" => "quick-edit"
					),
				array(
					"name" => 	"PW Edit",
		            "icon" => 	"pwi-edit-square",
		            "action" => "pw-edit"
					),
				array(
					"name" => 	"Edit",
		            "icon" => 	"pwi-edit",
		            "action" => "wp-edit"
					),
				array(
					"name" => 	"Trash",
		            "icon" => 	"pwi-trash-o",
		            "action" => "trash"
					),
				),
			),
		'comment'	=>	array(
			'role_access'	=>	array(
				'administrator' => array(
					  'own' => array( 'edit', 'flag', 'trash' ),
					'other' => array( 'edit', 'flag', 'trash' ),
					),
				'editor' => array(
					  'own' => array( 'edit', 'flag', 'trash' ),
					'other' => array( 'edit', 'flag', 'trash' ),
					),
				'author' => array(
					  'own' => array( 'edit', 'trash' ),
					'other' => array( 'flag' ),
					),
				'contributor' => array(
					  'own' => array( 'edit', 'trash' ),
					'other' => array( 'flag' ),
					),
				'guest' => array(
					  'own' => array( ),
					'other' => array( ),
					),
				),
			),
		),

	'avatar'			=> array(
		'default'	=>	$template_paths['POSTWORLD_URL'].'/images/avatars/avatar-ajones-A.png',
		),

	'roles' 			=> array(
		'administrator' 	=> array(
			'vote_points'	=> 10,
			'post_class'	=> 'author',
			),
		'editor' 			=> array(
			'vote_points'	=> 5,
			'post_class'	=> 'author',
			),
		'organizer' 			=> array(
			'vote_points'	=> 2,
			'post_class'	=> 'author',
			),
		'contributor' 		=> array(
			'vote_points'	=> 1,
			'post_class'	=> 'contributor'
			),
		'default'	 		=> array(
			'vote_points'	=> 1,
			'post_class'	=> 'guest'
			),
		),

	'role' => array(
		'default'	=>	'contributor',
		'map'	=>	array(
			'administrator'	=> array( 'administrator' ),
	        'editor'		=> array( 'administrator', 'editor' ),
	        'author'		=> array( 'author' ),
	        'contributor'	=> array( 'contributor' ),
			)
		),

	// OBSOLETE AFTER MERGING POSTWORLD
	'role_map'	=>	array(
		'administrator'	=> array( 'administrator' ),
        'editor'		=> array( 'administrator', 'editor' ),
        'author'		=> array( 'author' ),
        'contributor'	=> array( 'contributor' ),
		),



	'points' => array(
		'post_types'		=> array('feature','blog','link','event','announcement'),
		'cache_interval'	=> 'fifteen_minutes',
		'cron_logs'			=> 0,
		),

	/*
	'rank' => array(
		'post_types'		=> array('feature','blog','link','event','announcement'),
		'cache_interval'	=> 'fifteen_minutes',
		'cron_logs'			=> 0,
		'equations'			=> array(
			'default'		=> array(
				'time_compression'	=>	0.5,
				'time_weight'		=>	1,
				'comments_weight'	=>	1,
				'points_weight'		=>	1,
				'fresh_period'		=>	1*$ONE_WEEK,
				'fresh_multiplier'	=>	2,
				'archive_period'	=>	6*$ONE_MONTH,
				'archive_multiplier'=>	0.2,
				'free_rank_points'	=>	100,
				'free_rank_period'	=>	3*$ONE_DAY,
				),
			'rsv2'		=> array(
				'time_compression'	=>	0.5,
				'time_weight'		=>	2,
				'comments_weight'	=>	0.05,
				'points_weight'		=>	1.5,
				'fresh_period'		=>	2*$ONE_WEEK,
				'fresh_multiplier'	=>	6,
				'archive_period'	=>	2*$ONE_MONTH,
				'archive_multiplier'=>	0.2,
				'free_rank_points'	=>	333,
				'free_rank_period'	=>	8*$ONE_MONTH,
				),
			),
		),
	*/
	'feeds' => array(
		'cache_feeds'		=> array(),
		'cache_interval'	=> 'fifteen_minutes',
		'cron_logs'			=> 0,
		),

	'shares'	=> array(
		'post_types'	=>	array(),
		'tracker'	=>	array(
			'ip_history'	=>	100,	// How many unique IP addresses before re-count
			),
		),

	'embedly'	=>	array(
		'key'	=>	'512f7d063fc1490d9bcc7504c764a6dd',
		),

	// CLASSES : CURRENTLY NOT OPERATIONAL : TODO : IMPLIMENT
	'classes'	=>	array(
		'post_types'	=>	array(),
		'data'	=>	array(
			'author'	=>	array(
				'name'			=>	'Blog',
				'description'	=>	'Main Blog',
				'roles'			=>	array('Administrator', 'Editor', 'Author'),
				),
			'contributor'	=>	array(
				'name'			=>	'Contributer',
				'description'	=>	'Features for community members.',
				'roles'			=>	array('Contributor'),
				),
			'members'	=>	array(
				'name'			=>	'Members Only',
				'description'	=>	'Features for community members.',
				'roles'			=>	array('Contributor'),
				),
			),
		),


	'templates'	=>	array(
		'dir'	=>	array(
			'default'	=>	get_template_directory() . '/postworld/templates/' ,
			'override'	=>	get_stylesheet_directory().'/views/',
			),
		'url'	=>	array(
			'default'	=>	get_template_directory_uri().'/postworld/templates/',
			'override'	=>	get_stylesheet_directory_uri().'/views/',
			),
		),

	'paths'	=>	array(
		'postworld' => array(
			'url'	=>	get_template_directory_uri().'/postworld',
			)
		),
	);


?>