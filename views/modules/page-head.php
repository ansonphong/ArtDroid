<?php
	global $pw;
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
		<div class="page-bounds">
		<?php
			///// HOME /////
			if( is_home() ){?>
				<h1>Home</h1>
			<?php }
			///// ARCHIVE /////
			else if( is_archive() ){
				$blog_url = get_permalink( get_option('page_for_posts' ) );
				?>
				<h1>
					<a href='<?php echo $blog_url; ?>'>Blog</a> /
					<?php echo $pw['view']['taxonomy']['labels']['singular_name']; ?> /
					<a href="<?php echo $pw['view']['term']['term_link']; ?>">
						<?php echo $pw['view']['term']['name']; ?>
					</a>

				</h1>
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

