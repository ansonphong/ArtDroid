<?php
function theme_sidebars_init(){

	$title_before = '<h3 class="sidebar-title">';
	$title_after = '</h3>';

	$sidebars = array(
		array(
			'name'          => "Home Page: Feed",
			'id'            => 'home-page-feed',
			'description'   => 'The primary widgets which appear in the home page Feed.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),
		array(
			'name'          => "Post Footer",
			'id'            => 'post-foot',
			'description'   => 'At the footer of a single post.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),
		array(
			'name'          => "Page Footer",
			'id'            => 'page-foot',
			'description'   => 'At the footer of a single page.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),

		array(
			'name'          => "Error Footer",
			'id'            => 'error-foot',
			'description'   => 'At the footer of error (404) pages. Add content here to keep mis-guided visitors engaged.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),

		array(
			'name'          => "Touch Menu - Posts",
			'id'            => 'touch-menu-post',
			'description'   => 'Appears when clicking the menu button on touch displays, while on posts.',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),

		array(
			'name'          => "Touch Menu - Pages",
			'id'            => 'touch-menu-page',
			'description'   => 'Appears when clicking the menu button on touch displays, while on pages.',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),

		array(
			'name'          => "Touch Menu - Archives",
			'id'            => 'touch-menu-archive',
			'description'   => 'Appears when clicking the menu button on touch displays, while on archives, such as categories and tags.',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),

		);

	/*
	///// ENABLE EVENTS FOOTER : ON SWITCH /////
	if( pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'events.enable' ) ) )
		$sidebars[] = array(
			'name'          => "Events Foot",
			'id'            => 'event-foot',
			'description'   => 'Goes at the foot of single event pages.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			);
	*/

	foreach( $sidebars as $sidebar ){
		register_sidebar( $sidebar );
	}

}


add_action( 'widgets_init', 'theme_sidebars_init' );

?>