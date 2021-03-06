<?php
	/*
	$logo_id = pw_get_option( array(
		'option_name' => PW_OPTIONS_THEME,
		'key' => 'images.logo'
		));
	*/

	$logo_id = get_theme_mod( 'custom_logo' );

	$has_logo_image = ( is_numeric($logo_id) ) ? true : false; 
	$logo_fields = array(
		'ID',
		'post_type',
		'image(stats)',
		//'image(md,63,63,2)',
		'image(lg,128,128,2)',
		'image(xl,256,256,2)',
		);
	$logo_post = ( $has_logo_image ) ? pw_get_post( $logo_id, $logo_fields ) : array();

	pw_print_ng_controller(array(
		'controller' => 'headerLogo',
		'vars' => array(
			'logoPost' => $logo_post
			),
		));
?>

<div
	id="logo"
	class="header-col-logo center-vertical-parent <?php if( is_front_page() ) echo 'is-front-page' ?>"
	ng-controller="headerLogo">
	<?php
	// Link to home page
	if( !is_front_page() ){ ?>
		<a
			href="<?php echo get_home_url();?>"
			uib-tooltip="Go to Home Page"
			tooltip-placement="bottom"
			tooltip-popup-delay="1000">
	<?php } ?>
		
		<?php if( $has_logo_image ): ?>
			<!-- LOGO -->
			<img
				class="center-vertical"
				src="<?php echo _get( $logo_post, 'image.sizes.lg.url' ) ?>"
				pw-smart-image="logoPost.image"
				ng-cloak>
		<?php endif ?>

		<?php if( !$has_logo_image ): ?>
			<!-- SITE NAME -->
			<div class="site-name-wrapper">
				<div class="site-name">
					<?php echo get_bloginfo( 'name' ); ?>
				</div>
			</div>
		<?php endif ?>

	<?php
	// End link to home page
	if( !is_front_page() ){ ?>
		</a>
	<?php } ?>
</div>