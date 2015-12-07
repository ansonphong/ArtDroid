<?php
global $post;
global $pw;

// Get Header Meta
$header_meta = pw_get_postmeta( array( "sub_key" => "header" ));

// Redirect pages with redirect_url postmeta
$redirect_url = get_post_meta( $post->ID, 'redirect_url', true );
if( !empty($redirect_url) )
	wp_redirect( $redirect_url, '301' );

pw_header('single');

/**
 * ///// HEAD /////
 * This part appears above the post content.
 */
if( is_page() )
	include locate_template( 'views/theme/page-head.php' ); 
//else if( is_single() )
//	include locate_template( 'views/theme/post-head.php' ); 

/**
 * If the current post is Password Protected
 * Then prompt for the password.
 */
if( post_password_required() )
	echo get_the_password_form();
/**
 * Show the main content.
 */
else
	include 'single-content.php';


/**
 * ///// CONTENT /////
 * Allows Postworld to modify the layout.
 */
$layout_args = array(
	'content'			=>	$post_html,
	);
pw_print_layout( $layout_args );

pw_footer();

?>
<!-- Generated in <?php timer_stop(1); ?> seconds... -->