<?php
if( $show_search ) : ?>
<div id="search-menu">
	<div
		class="search-menu--inner">
		<button
			class="search-icon"
			ng-click="uiToggleView( 'searchInput' ); uiFocusElement( '#search-menu-input-s', 250 )"
			ng-class="uiSetClass( 'searchInput', 'active' )">
			<i class="pwi-search"></i>
		</button>

		<div
			id="search-menu-input"
			ng-class="uiSetClass( 'searchInput', 'active' )"
			pw-globals="pw">
			<div class="search-menu-input--inner">
				<?php
					///// SEARCH FORM /////
					include locate_template( 'views/theme/search-form.php' );
				?>
			</div>
		</div>

	</div>
</div>



<?php endif ?>