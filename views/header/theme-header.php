<?php
// Template Name: ART-DROID Main Header
// Template Description: The main header for all pages.

global $pw;

// Boolean if search is to be shown
$show_search = theme_get_option('search.show_search');
if( in_array( 'search', $pw['view']['context'] ) )
	$show_search = false;

?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?> class="<?php echo pw_html_classes() ?>">
<head>
	<base href="/">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1" />
	<?php wp_head(); ?>
</head>
<body
	ng-app="postworld"
	class="<?php echo pw_body_classes(); ?>"
	theme-body-classes
	pw-background="primary">
<?php
	do_action('theme_preload_templates');
	/**
	 * Include Loading Overlay.
	 */
	if( pw_grab_option( PW_OPTIONS_THEME, 'loading.show_loading' ) )
		include locate_template( 'views/theme/loading-overlay.php' );
	/**
	 * Include the secret login button.
	 */
	include locate_template( 'views/theme/menu-login-secret.php' );?>
<div
	id="pw-background-secondary"
	pw-background="secondary"></div>

<div id="background"></div>


<?php if( !defined('THEME_HIDE_NAV') ): ?>

	<!-- HEADER / NAVIGATION -->
	<header
		theme-header
		id="header"
		class="<?php if($show_search) echo 'show-search'?>"
		pw-ui>
		<div class="header-inner page-width">
			<div class="header-row">
				<?php include locate_template( 'views/theme/header-logo.php' ); ?>
				<?php
					if( is_desktop() )
						include locate_template( 'views/theme/header-menu-desktop.php' );
					else
						include locate_template( 'views/theme/header-menu-mobile.php' );
				?>
			</div>
		</div>
		<div class="clearfix"></div>
	</header>

	<?php
		/**
		 * Include the mobile menu, which is shown
		 * When the menu button is clicked.
		 */
		if( !is_desktop() ):
			include locate_template( 'views/theme/menu-mobile.php' ); 
		endif;
	?>

	<!-- PRIMARY MENU SPACER -->
	<div id="primary-menu-spacer"></div>

	<!-- LINE -->
	<!--<div id="header-border"></div>-->

<?php endif ?>

<!-- POSTWORLD GLOBALS -->
<div pw-globals="pw"></div>

<div
	id="content"
	class="page-content pw-transition-fadein page-width"
	pw-timeout="100"
	timeout-action="addClass('fadein-on')"
	ng-cloak>
	
	<div class="clearfix"></div>
