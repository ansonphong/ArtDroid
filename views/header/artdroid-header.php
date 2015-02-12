<?php
// Template Name: ART-DROID Main Header
// Template Description: The main header for all pages.
global $pw;
//echo json_encode($pw);
?>

<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
	<base href="/">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1" />
	<title><?php wp_title(' | ', true, 'left'); ?></title>
	<link rel="icon" type="image/png" href="<?php echo pw_site_favicon()['url']; ?>">
	<?php wp_head(); ?>
</head>
<body
	ng-app="postworld"
	class="<?php echo pw_body_classes(); ?>"
	pw-background="primary">

<?php
	///// SECRET LOGIN /////
	include locate_template( 'views/theme/menu-login-secret.php' );?>

<!-- SECONDARY BACKGROUND LAYER -->
<div
	id="pw-background-secondary"
	document-height="100"
	pw-background="secondary"></div>
	
<div id="background"></div>
<!-- HEADER / NAVIGATION -->
<header
	id="header"
	pw-ui>
	<div class="page-width">

		<div class="header-row">
			<div id="logo" class="header-col-logo <?php if( is_front_page() ) echo 'is-front-page' ?>">
				<?php
				// Link to home page
				if( !is_front_page() ){ ?>
					<a
						href="<?php echo get_home_url();?>"
						tooltip="Go to Home Page"
						tooltip-placement="bottom"
						tooltip-popup-delay="1000">
				<?php } ?>
					<img src="<?php echo pw_get_image_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'images.logo', 'size' => 'full' ) )['url']; ?>">
				<?php
				// End link to home page
				if( !is_front_page() ){ ?>
					</a>
				<?php } ?>
			</div>
			
			<div id="main-menu" class="header-col-menu">
				<?php include locate_template( 'views/theme/menu-primary.php' ); ?>
			</div>

			<div id="mobile-menu">

				<button
					class="mobile-menu"
					ng-click="uiToggleElementDisplay('#main-menu'); uiToggleElementClass('selected', $event)">
					<i class="icon-nav"></i>
				</button>

			</div>

		</div>
	</div>
	<div class="clearfix"></div>

</header>

<div
	id="content"
	class="page-content i-transition-fadein page-width"
	pw-timeout="100"
	timeout-action="addClass('fadein-on')">
	
	<div class="clearfix"></div>
