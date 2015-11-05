<?php
	global $pw;
	$pw_meta_header = pw_get_postmeta( array( "sub_key" => "header" ));
?>
<header>
	<?php
	///// SWITCH HEADER TYPE /////
	switch( $pw_meta_header['type'] ){
		case 'slider':
			include locate_template("views/theme/slider-page.php");
			break;
		case 'featured_image':
			include locate_template("views/theme/page-head-image.php");
			break;
		default:
			include locate_template("views/theme/page-head-default.php");
			break;
	}
	?>
</header>