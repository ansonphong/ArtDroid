<header>
	<?php
	///// SWITCH HEADER TYPE /////
	switch( $header_meta['type'] ){
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