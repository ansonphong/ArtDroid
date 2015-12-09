<?php
	///////// FILE OBSOLETE /////////
	$header_meta = pw_get_postmeta( array( "sub_key" => "header" ));
?>
<header>
	<!-- SLIDER -->
	<?php
	///// SWTICH HEADER TYPE /////
	switch( $header_meta['type'] ){
		case 'slider':
			include locate_template("views/theme/slider-page.php");
			break;
		case 'featured_image':
			include locate_template("views/theme/page-head-image.php");
			break;
		default:
			include locate_template("views/theme/post-head-default.php");
			break;
	}
	?>
</header>