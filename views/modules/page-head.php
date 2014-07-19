<?php
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
	$i_meta_header = i_get_postmeta_key( array( "key" => "header" ));
?>

<div id="page-head" class="page-head">
	<!-- SLIDER -->
	<?php
		if( $i_meta_header['type'] == 'slider' ){

		///// HEADER SLIDER /////
			include locate_template("views/sliders/page-slider.php");
		
		///// HEADER IMAGE /////
		} else { ?>
			<div
				id="header-image"
				style="background-image:url(<?php echo i_header_image(); ?>);">
			</div>
		<?php
		}
	?>
	
	<!-- LABEL -->
	<div class="page-meta">
		<div class="page-bounds">
		
		<?php
			///// HOME /////
			if( is_home() ){?>
				<h1>Home</h1>
			<?php }

			///// ARCHIVE /////
			else if( is_archive() ){
				$blog_url = get_permalink( get_option('page_for_posts' ) );
				$queried_object = get_queried_object();?>
				<h1><a href='<?php echo $blog_url; ?>'>Blog</a> / <?php echo $queried_object->name; ?></h1>
			<?php }

			///// FRONT PAGE /////
			else if( is_front_page() ){
				
			}

			///// DEFAULT /////
			else {
				global $post;?>
				<h1><?php echo $post->post_title; ?></h1>
			<?php }
		?>
		
		</div>
	</div>

</div>

