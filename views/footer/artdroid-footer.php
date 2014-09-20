

</div> <!-- END #content -->


<div class="clearfix"></div>

<!-- FOOTER -->
<footer
	id="footer"
	class="i-transition-fadein"
	pw-timeout="2000"
	timeout-action="addClass('fadein-on')">
	<div class="page-bounds">
		
		<?php
		// H2O
		global $pw;
		global $post;
		global $iGlobals;

		// Import Data
		$footer_data = array();
		$i_social = $iGlobals['social'];
		$footer_data['contact'] = $i_social['contact'];

		$footer_data['url'] = array();
		$footer_data['url']['site_url'] = get_site_url();
		
		$footer_data['social_menu'] = i_social_menu( array( 'size' => 32, 'style' => 'default' , 'meta' => array( 'tooltip-placement' => 'top' ) ) );

		// Get sub-pages of current page
		$footer_data['subpages'] = (array) pw_query(
			array(
				"post_parent" => $post->ID,
				"post_type"	=>	"any",
				"fields" => array( "ID", "post_title", "post_permalink")
				)
			)->posts;

		// Run H2O
		//require_once $pw['paths']['postworld_dir'].'/lib/h2o/h2o.php';
		$h2o = new h2o( locate_template( "views/modules/page-foot.php" ) );
		$footer_html = $h2o->render($footer_data);
		echo $footer_html;
		?>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>