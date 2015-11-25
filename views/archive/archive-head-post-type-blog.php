<?php
$blog = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'blog.settings' ) );

if( $blog['main_page']['show_header'] )
	include 'archive-head-post-type-blog-header.php';
