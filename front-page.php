<?php
global $pw;
global $post;
$home_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home' ) );
$wp_page_template = get_post_meta( $post->ID, '_wp_page_template', true );

pw_header();

/**
 * SLIDER
 */
if( _get( $home_options, 'slider.show_slider' ) ){
	include locate_template( 'views/theme/slider-home.php' );
}

$show_on_front = get_option( 'show_on_front' );

/**
 * POSTS FEED
 */
if( $show_on_front == 'posts' || is_home() || $wp_page_template === 'posts.php'  ){
	$primary_content = pw_ob_include_template('views/archive/feed-posts.php');
	pw_print_layout( array( 'content' => $primary_content ) );
}

/**
 * PAGE
 */
else if( $show_on_front == 'page' ){
	// If Blog page is selected
	if( $wp_page_template === 'blog.php' ){
		$primary_content = pw_ob_include_template( 'views/archive/feed-blog.php' );
		pw_print_layout( array( 'content' => $primary_content ) );
	}
	// Otherwise show the page
	else
		include locate_template('single-content.php');
}

pw_footer();
?>

<!-- Generated in <?php timer_stop(1); ?> seconds... -->