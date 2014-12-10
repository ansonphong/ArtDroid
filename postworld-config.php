<?php
/*____  _ _          ____ _       _           _     
 / ___|(_) |_ ___   / ___| | ___ | |__   __ _| |___ 
 \___ \| | __/ _ \ | |  _| |/ _ \| '_ \ / _` | / __|
  ___) | | ||  __/ | |_| | | (_) | |_) | (_| | \__ \
 |____/|_|\__\___|  \____|_|\___/|_.__/ \__,_|_|___/
													
////// ----- CUSTOM SITE CONFIGURATIONS ----- //////*/

global $lang;
global $pwUniversalLanguage;
global $template_paths;

global $pwSiteGlobals;
$pwSiteGlobals = array(

	'modules'	=>	array(
		'site',
		'layouts',
		'sidebars',
		'styles',
		'social',
		'feeds',
		'backgrounds',
		),

	'wp_admin'	=>	array(
		'metabox'	=>	array(
			'link_url'	=>	array(
				'post_types'	=>	array( 'post', 'page', 'attachment' ),
				),
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
			'layout'	=>	array(
				'post_types'	=>	array( 'page' ),
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

	'icons'	=>	array(
		'order'	=>	array(
			'descending'	=>	'glyphicon-arrow-down',
			'ascending'		=>	'glyphicon-arrow-up',
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

	'icons'	=>	array(
		'order'	=>	array(
			'descending'	=>	'glyphicon-arrow-down',
			'ascending'		=>	'glyphicon-arrow-up',
			),
		),
	
	'images' => array(
		'tags'	=>	array(

			),
		),

	'post_options'	=>	array(
	
		//'month'	=>	$pwUniversalLanguage['months'][$lang],

		'year'	=>	array( '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', ),

		'taxonomies'	=>	array( 'category', 'post_tag' ),

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
					'icon'		=> 'icon-circle-thick'
				),
				array(
					'name'		=>	'Link',
					'slug'		=>	'link',
					'domains'	=>	array(),
					'icon'		=>	'icon-link'
				),
				array(
					'name'		=>	'Video',
					'slug'		=>	'video',
					'domains'	=>	array('youtube.com/','youtu.be/','vimeo.com/','hulu.com/','ted.com/','sapo.pt/','dailymotion.com','blip.tv/','ustream.tv/',),
					'icon'		=>	'icon-play-fill'
				),
				array(
					'name'		=>	'Audio',
					'slug'		=>	'audio',
					'domains'	=>	array('soundcloud.com/','mixcloud.com/','official.fm/','shoudio.com/','rdio.com/'),
					'icon'		=>	'icon-headphones'
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

	'post_views'	=> array( 'modal', 'detail', 'grid', 'grid-horizontal', 'full' ),

	'language'	=>	array(
		
		),


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
		            "icon" => 	"icon-quick-edit",
		            "action" => "quick-edit"
					),
				array(
					"name" => 	"PW Edit",
		            "icon" => 	"icon-edit-square",
		            "action" => "pw-edit"
					),
				array(
					"name" => 	"Edit",
		            "icon" => 	"icon-edit",
		            "action" => "wp-edit"
					),
				array(
					"name" => 	"Trash",
		            "icon" => 	"icon-trash-o",
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