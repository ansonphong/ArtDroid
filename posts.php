<?php
/**
 * Template Name: Posts
 * @package ArtDroid
 */

pw_header();

$primary_content = pw_ob_include_template( 'views/archive/feed.php' );
pw_print_layout( array( 'content' => $primary_content ) );

pw_footer();