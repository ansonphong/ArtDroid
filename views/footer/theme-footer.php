
</div> <!-- END #content -->

<div class="clearfix"></div>


<?php
///// SINGLE POST FOOTER /////
if( (is_single() || is_page() || is_404()) && !is_home() && !is_front_page() ){

	global $post;

	if( is_404() )
		$sidebar_prefix = 'error';
	else
		$sidebar_prefix = $post->post_type;

	///// POST WIDGETS /////
	$foot_widgets = pw_print_widgets( array(
		'sidebar'		=>	$sidebar_prefix.'-foot',
		'before'		=>	'<div class="sidebar">',
		'after'			=>	'</div>',
		'echo'			=>	false,
		'show_empty'	=>	true,
		'include_meta'	=>	true,
		));

	// Get the number of widgets
	$widget_count = _get( $foot_widgets, 'meta.count' );
	// Set this as the number of columns
	$widget_columns = $widget_count;
	// Limit the number of columns to 3
	if( $widget_columns > 3 )
		$widget_columns = 3;

}
else{
	$foot_widgets = array('widgets' => '');
}

?>
<?php if( isset( $widget_count ) && $widget_count > 0 ): ?>
	<!-- FOOTER -->
	<footer
		id="footer"
		class="pw-transition-fadein"
		pw-timeout="1000"
		timeout-action="addClass('fadein-on')">
		
		<div class="page-width">

			<div class="post-foot-widgets footer-widgets-row footer-columns-<?php echo $widget_columns ?>">
				<?php echo $foot_widgets['widgets'] ?>
			</div>

		</div>

	</footer>
<?php endif; ?>



<!-- <pre><?php //echo json_encode( $pw['view'], JSON_PRETTY_PRINT ); ?></pre> -->

<?php wp_footer(); ?>
</body>
</html>