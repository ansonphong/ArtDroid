<?php
// Template Name: ART-DROID Main Header
// Template Description: The main header for all pages.
global $i_paths;
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
	class="infinite <?php echo pw_body_classes(); ?>">

	<!--
	pw-scrollfix
	scrollfix-y-class="scrollfix-y"
	scrollfix-y-offset="getIdHeight('page-head') - getIdHeight('header')"
	-->

<div id="background"></div>

<!-- HEADER / NAVIGATION -->
<header
	id="header">

	<!--
	i-pointer-activate="addClass('active')"
	inactive-delay="3000"
	-->
	<div class="page-width">

		<div class="header-row">
			<div id="logo" class="header-col-logo">
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
				<?php include locate_template( 'views/menus/main-menu.php' ); ?>
			</div>

			<div id="mobile-menu">

				<button
					class="mobile-menu"
					pw-click-toggle-display="#main-menu"
					pw-click-toggle-class="#mobile-menu .mobile-menu"
					toggle-class="selected">
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
