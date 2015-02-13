<?php
function theme_sidebars_init(){

	$title_before = '<div class="heading primary-color"><div class="heading-line"></div><h2>';
	$title_after = '</h2></div>';

	$sidebars = array(
		array(
			'name'          => "Home Page: Feed",
			'id'            => 'home-page-feed',
			'description'   => 'The primary widgets which appear on the home page.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),
		array(
			'name'          => "Post Foot",
			'id'            => 'post-foot',
			'description'   => 'At the footer of a single post.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => $title_before,
			'after_title'   => $title_after
			),
		array(
			'name'          => "Page Foot",
			'id'            => 'page-foot',
			'description'   => 'At the footer of a single page.',
			'class'         => '',
			'before_widget' => '<div class="widget-column"><div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div></div>',
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