<?php
global $post;
global $pw;

// Redirect pages with redirect_url postmeta
$redirect_url = get_post_meta( $post->ID, 'redirect_url', true );
if( !empty($redirect_url) )
	wp_redirect( $redirect_url, '301' );

pw_header();

/**
 * If the current post is Password Protected
 * Then prompt for the password.
 */
if( post_password_required() )
	echo get_the_password_form();
else
	include 'single-content.php';

pw_footer();

?>
<!-- Generated in <?php timer_stop(1); ?> seconds... -->