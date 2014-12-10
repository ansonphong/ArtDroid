
</div> <!-- END #content -->

<div class="clearfix"></div>

<!-- FOOTER -->
<footer
	id="footer"
	class="i-transition-fadein"
	pw-timeout="2000"
	timeout-action="addClass('fadein-on')">
	<div class="page-width">
		
		<?php
		// H2O
		global $pw;
		global $post;

		// Import Data
		$footer_data = array();
		$pw_social = pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL ) );
		$footer_data['contact'] = $pw_social['contact'];

		$footer_data['url'] = array();
		$footer_data['url']['site_url'] = get_site_url();
		
		$footer_data['social_menu'] = i_social_menu(
			array(
				'size' => 32,
				'style' => 'default',
				'meta' => array(
					'tooltip-placement' => 'top'
					)
				)
			);

		// Get sub-pages of current page
		$footer_data['subpages'] = (array) pw_query(
			array(
				"post_parent" => $post->ID,
				"post_type"	=>	"page",
				"fields" => array( "ID", "post_title", "post_permalink")
				)
			)->posts;

		// Run H2O
		$h2o = new h2o( locate_template( 'views/modules/page-foot.php' ) );
		echo $h2o->render($footer_data);
		
		?>

	</div>
</footer>

<!-- <pre><?php //echo json_encode( $pw['view'], JSON_PRETTY_PRINT ); ?></pre> -->

<?php wp_footer(); ?>
</body>
</html>