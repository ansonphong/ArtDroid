<?php
	global $pw;
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
	$i_meta_header = pw_get_postmeta( array( "sub_key" => "header" ));
?>

<header>
	<?php
	///// SWITCH HEADER TYPE /////
	switch( $i_meta_header['type'] ){
		case 'slider':
			include locate_template("views/modules/slider-page.php");
			break;
		case 'featured_image':
			include locate_template("views/modules/page-head-image.php");
			break;
		default:
			include locate_template("views/modules/page-head-default.php");
			break;
	}
	?>
	<!-- LABEL -->
	<div class="page-meta">



		<?php
			///// SWITCH HEADER TEMPLATES /////
			if( in_array( 'archive-taxonomy', $pw['view']['context'] ) )
				include 'page-head-archive-taxonomy.php';

			else if( in_array( 'archive-date', $pw['view']['context'] ) )
				include 'page-head-archive-date.php';

			else if( in_array( 'archive-post-type', $pw['view']['context'] ) )
				include 'page-head-archive-post-type.php';
		?>


	</div>
</header>

