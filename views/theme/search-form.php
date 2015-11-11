<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	
	<div class="row">
		
		<div class="col-md-10">
			<div class="input-icon absolute top-left">
				<i class="pwi-search"></i>
			</div>
			<input
				type="search"
				id="search-menu-input-s"
				class="search-field"
				placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>"
				value="<?php echo get_search_query() ?>"
				autocomplete="off"
				name="s"
				title="Search for"
				ng-model="pw.query.s"/>
		</div>

		<?php /*
		<div class="col-md-4 col-xs-6">
			<div class="search-field-unit">
				<div class="select-label">
					in
				</div>
				<select
					type="search"
					class="search-field labeled"
					name="post_type"
					ng-options="key as value for (key, value) in pw.postTypes"
					ng-model="pw.query.post_type">
					<option value="">All</option>
				</select>
				<div class="dropdown-icon">
					<i class="icon pwi-triangle-down-thin"></i>
				</div>
			</div>
		</div>
		*/?>

		<div class="col-md-2 col-xs-6">
			<button type="submit" class="search-submit">
				<?php echo esc_attr_x( 'Search', 'submit button' ) ?>
			</button>
		</div>

	</div>

</form>