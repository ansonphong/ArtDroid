<?php include locate_template( 'views/theme/header-search.php' ) ?>

<?php $menu_alignment = pw_grab_option( PW_OPTIONS_THEME, 'menus.primary.alignment' ); ?>

<div
	id="main-menu"
	class="header-col-menu menu-alignment--<?php echo $menu_alignment ?>"
	ng-class="uiWrappingClass('.menu-main','.menu>li',['is-wrapping','no-wrapping'])">

	<?php include locate_template( 'views/theme/menu-social.php' ) ?>
	
	<div class="menu-indicator">
		<i class="icon pwi-nav"></i>
		Menu
	</div>

	<div
		class="menu-main">
		<?php include locate_template( 'views/theme/menu-primary.php' ) ?>
		<div class="clearfix"></div>
	</div>

</div>