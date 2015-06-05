<?php
pw_header();
pw_print_layout( array(
	'content'	=>	pw_ob_include_template( 'views/errors/404.php' ),
	));
pw_footer();
?>