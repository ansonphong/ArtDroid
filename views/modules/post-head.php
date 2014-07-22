<?php
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
	$i_meta_header = i_get_postmeta_key( array( "key" => "header" ));
?>
<div id="page-head" class="page-head">
	<!-- SLIDER -->
	<?php
	///// SWTICH HEADER TYPE /////
	switch( $i_meta_header['type'] ){
		case 'slider':
			include locate_template("views/sliders/page-slider.php");
			break;
		//case 'featured_image':
		//	include locate_template("views/modules/page-head-image.php");
		//	break;
		default:
			include locate_template("views/modules/post-head-default.php");
			break;
	}
	?>
</div>