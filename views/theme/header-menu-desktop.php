<?php include locate_template( 'views/theme/header-search.php' ) ?>

<div
	id="main-menu"
	class="header-col-menu"
	ng-class="uiWrappingClass('.menu-main','.menu>li','is-wrapping')">

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