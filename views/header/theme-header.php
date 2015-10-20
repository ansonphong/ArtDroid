<?php
// Template Name: ART-DROID Main Header
// Template Description: The main header for all pages.
global $pw;
?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?> class="<?php echo pw_html_classes() ?>">
<head>
	<base href="/">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1" />
	<title><?php wp_title(' | ', true, 'left'); ?></title>
	<link rel="icon" type="image/png" href="<?php $favicon = pw_site_favicon(); echo $favicon['url']; ?>">
	<?php wp_head(); ?>
</head>
<body
	ng-app="postworld"
	class="<?php echo pw_body_classes(); ?>"
	pw-background="primary">

<?php
	///// SECRET LOGIN /////
	include locate_template( 'views/theme/menu-login-secret.php' );?>

<div
	id="pw-background-secondary"
	pw-background="secondary"></div>
	
<div id="background"></div>
<!-- HEADER / NAVIGATION -->
<header id="header" pw-ui>
	<div class="header-inner page-width">

		<div class="header-row">

			<?php include locate_template( 'views/theme/header-logo.php' ); ?>

			<?php if( is_desktop() ){
				include locate_template( 'views/theme/menu-desktop.php' );
			}?>

			<?php if( !is_desktop() ): ?>
				<div id="mobile-menu-button">
					<button
						class="mobile-menu"
						ng-click="
							uiToggleElementClass('open', '#mobile-menu');
							uiToggleElementClass('modal-open mobile-menu-open', 'body');
							uiToggleElementClass('selected', $event)">
						<i class="pwi-nav"></i>
					</button>
				</div>
			<?php endif ?>

		</div>
	</div>
	<div class="clearfix"></div>
</header>

<?php if( !is_desktop() ): ?>
	<?php include locate_template( 'views/theme/menu-mobile.php' ); ?>
<?php endif ?>

<!-- PRIMARY MENU SPACER -->
<div id="primary-menu-spacer"></div>

<!-- LINE -->
<div id="header-border"></div>

<div
	id="content"
	class="page-content pw-transition-fadein page-width"
	pw-timeout="100"
	timeout-action="addClass('fadein-on')"
	ng-cloak>
	
	<div class="clearfix"></div>
