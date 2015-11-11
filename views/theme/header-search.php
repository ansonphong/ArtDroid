<?php
if( $show_search ) : ?>
<div
	id="search-menu">
	<button
		class="search-icon"
		ng-click="uiToggleView( 'searchInput' ); uiFocusElement( '#search-menu-input-s' )"
		ng-class="uiSetClass( 'searchInput', 'active' )">
		<i class="pwi-search"></i>
	</button>
</div>

<div
	id="search-menu-input"
	ng-class="uiSetClass( 'searchInput', 'active' )"
	pw-globals="pw">
	
	<?php
		///// SEARCH FORM /////
		include locate_template( 'views/theme/search-form.php' );
	?>

</div>

<?php endif ?>