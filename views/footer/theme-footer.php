</div><!-- END #content -->
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
$show_footer_switch = apply_filters('theme_show_footer',true);

$footer_options = pw_grab_option( PW_OPTIONS_THEME, 'footer' );
?>

<?php if( $show_footer_switch ): ?>
	<!-- FOOTER -->
	<footer
		id="footer"
		class="pw-transition-fadein"
		pw-timeout="1000"
		timeout-action="addClass('fadein-on')">
		
		<div class="page-width">

			<!-- WIDGETS -->
			<?php if( $has_widgets ): ?>
				<div class="footer-widgets">
					<div class="post-foot-widgets footer-widgets-row footer-columns-<?php echo $widget_columns ?>">
						<?php echo $foot_widgets['widgets'] ?>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endif ?>

			<?php if( $footer_options['show_footer'] ): ?>

				<?php
					/**
					 * @todo 	Know how many of the footer columns are needed,
					 * 			be it 1, 2, 3, 4, and divide 12/columns - dynamically reorient 
					 */
				?>
				<div class="row footer-base">

					<!-- CUSTOM -->
					<div class="col-sm-4">
						<?php if( $footer_options['custom']['show_custom_a'] ): ?>
							<div class="footer--custom center-vertical-parent footer-custom-a">
								<div class="inner-content">
									<?php echo nl2br( $footer_options['custom']['content_a']) ?>
								</div>
							</div>
						<?php endif ?>
					</div>

					<!-- IMAGE -->
					<div class="col-sm-4">
						<?php if( $footer_options['image']['show_image'] ): ?>
							<div class="footer--image">
								<?php
									$footer_image_id = $footer_options['image']['attachment_id'];
									$footer_image = ( !empty($footer_image_id) ) ?
										pw_get_post( $footer_image_id, 'list' ) : false;
									$footer_image_link_url = _get( $footer_options, 'image.link_url' );
								?>
								<div class="inner-content">
									<?php if($footer_image_link_url): ?>
										<a href="<?php echo $footer_image_link_url ?>">
									<?php endif ?>
											<img src="<?php echo _get($footer_image,'image.sizes.sm.url') ?>">
									<?php if($footer_image_link_url): ?>
										</a>
									<?php endif ?>
								</div>
							</div>
						<?php endif ?>			
					</div>

					<!-- RIGHT COLUMN -->
					<div class="col-sm-4">
						<?php if( $footer_options['custom']['show_custom_b'] ): ?>
							<div class="footer--custom center-vertical-parent footer-custom-b">
								<div class="inner-content">
									<?php echo nl2br( $footer_options['custom']['content_b']) ?>
								</div>
							</div>
						<?php endif ?>
					</div>

				</div>
			<?php endif ?>

		</div>

	</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>