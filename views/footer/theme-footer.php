</div> <!-- END #content -->
<div class="clearfix"></div>

<?php
/**
 * Single post footer
 */
if( (is_single() || is_page() || is_404()) && !is_home() && !is_front_page() ){

	global $post;

	if( is_404() )
		$sidebar_prefix = 'error';
	else
		$sidebar_prefix = $post->post_type;

	// Post Widgets
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

$has_widgets = ( isset( $widget_count ) && $widget_count > 0 );
$footer_options = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'footer' ) );

$credits_style = (!$footer_options['credits']['show_credits']) ? "display:none" : "";

?>

<?php if( $has_widgets || $footer_options['show_footer'] ): ?>
	<!-- FOOTER -->
	<footer
		id="footer"
		class="pw-transition-fadein"
		pw-timeout="1000"
		timeout-action="addClass('fadein-on')">
		
		<div class="page-width">

			<!-- WIDGETS -->
			<?php if( $has_widgets ): ?>
				<div class="post-foot-widgets footer-widgets-row footer-columns-<?php echo $widget_columns ?>">
					<?php echo $foot_widgets['widgets'] ?>
				</div>
				<div class="clearfix"></div>
			<?php endif ?>


			<?php if( $footer_options['show_footer'] ): ?>
				<div class="row">
					<div class="col-sm-6">
						<!-- CUSTOM -->
						<?php if( $footer_options['custom']['show_custom'] ): ?>
							<div class="footer--custom">
								<?php echo $footer_options['custom']['content'] ?>
							</div>
						<?php endif ?>
					</div>
					<div class="col-sm-6">
						<!-- CREDITS -->
						<!-- Thanks for using ArtDroid! -->
						<div class="footer--credits" style="<?php echo $credits_style ?>">
							<div class="theme-logo">
								<a href="https://artdroid.phong.com" target="_blank">
									<i class="icon pwi-merkaba"></i>
								</a>
							</div>
							<div class="credit">
								Powered by ArtDroid for WordPress
							</div>
							<div class="credit">
								Spawned by <a href="http://androidjones.com" target="_blank">Android Jones</a>
							</div>
							<div class="credit">
								Designed by <a href="https://phong.com" target="_blank">Phong</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

		</div>

	</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>