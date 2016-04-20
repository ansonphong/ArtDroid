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
						<?php if( $footer_options['custom']['show_custom'] ): ?>
							<div class="footer--custom center-vertical-parent">
								<div class="inner-content">
									<?php echo nl2br( $footer_options['custom']['content']) ?>
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
								?>
								<div class="inner-content">
									<img src="<?php echo _get($footer_image,'image.sizes.sm.url') ?>">
								</div>
							</div>
						<?php endif ?>			
					</div>

					<!-- CREDITS -->
					<div class="col-sm-4">
						<?php if( $footer_options['credits']['show_credits'] ): ?>
							<!-- Thanks for using ArtDroid! -->
							<div class="footer--credits">
								<div class="inner-content">
									<div class="theme-logo">
										<a href="https://artdroid.phong.com" target="_blank">
											<i class="icon pwi-merkaba"></i>
										</a>
									</div>
									<div class="credit">
										<?php _ex('Powered by ArtDroid for WordPress', 'credits', 'artdroid') ?>
									</div>
									<div class="credit">
										<?php _ex('Spawned by', 'credits','artdroid') ?> <a href="http://androidjones.com" target="_blank"><?php _ex('Android Jones', 'credits','artdroid') ?></a>
									</div>
									<div class="credit">
										<?php _ex('Designed by','credits','artdroid') ?> <a href="https://phong.com" target="_blank"><?php _ex('Phong', 'credits','artdroid') ?></a>
									</div>
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