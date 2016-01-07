<?php include locate_template( 'views/theme/header-search.php' ) ?>
<div id="mobile-menu-button">
	<button
		class="mobile-menu"
		ng-click="
			uiToggleElementClass('open', '#mobile-menu');
			uiToggleElementClass('mobile-menu-open', 'body');
			uiToggleElementClass('selected', $event)">
		<i class="pwi-nav"></i>
	</button>
</div>