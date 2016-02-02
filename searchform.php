<form role="search" method="get" class="search-form search-form--standard" action="<?php echo home_url( '/' ); ?>">
	
	<div class="row">
		
		<div class="search-col col-sm-10">
			<input
				type="search"
				id="search-menu-input-s"
				class="search-field"
				placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'postworld' ) ?>"
				value="<?php echo get_search_query() ?>"
				autocomplete="off"
				name="s"
				title="Search for"
				ng-model="pw.query.s"/>
		</div>

		<div class="col-sm-2">
			<button type="submit" class="search-submit">
				<i class="icon pwi-search"></i>
			</button>
		</div>
	</div>
</form>