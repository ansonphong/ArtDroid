<?php
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
	$i_meta_header = i_get_postmeta_key( array( "key" => "header" ));
?>
<header>
	<!-- SLIDER -->
	<?php
	///// SWTICH HEADER TYPE /////
	switch( $i_meta_header['type'] ){
		case 'slider':
			include locate_template("views/modules/slider-page.php");
			break;
		//case 'featured_image':
		//	include locate_template("views/modules/page-head-image.php");
		//	break;
		default:
			include locate_template("views/modules/post-head-default.php");
			break;
	}
	?>
</header>