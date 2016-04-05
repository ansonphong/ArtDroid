<?php
$home_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home' ) );
pw_header('home');

// SLIDER
if( _get( $home_options, 'slider.show_slider' ) ){
	include locate_template( 'views/theme/slider-home.php' );
}

$show_on_front = get_option( 'show_on_front' );

if( $show_on_front == 'posts' || is_home()  ){
	$primary_content = pw_ob_include_template('views/archive/feed.php');
	pw_print_layout( array( 'content' => $primary_content ) );
}
else if( $show_on_front == 'page' ){
	include locate_template('single-content.php');
}

/*
// INTGRATE INTO BLOG PAGE TEMPLATE
// PRIMARY CONTENT
switch( _get( $home_options, 'content.primary' ) ){
	case 'blog':
		$primary_content = pw_feed(array(
			'echo' => false,
			'aux_template'	=>	'seo-list',
			'feed' => array(
				'view' => array(
					'current' => 'full'
					),
				'query' => array(
					'post_type' => 'blog',
					'post_status' => 'publish'
					),
				)
			));
		break;
}
*/

pw_footer('home');

?>

<!-- Generated in <?php timer_stop(1); ?> seconds... -->