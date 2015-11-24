<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// LOGO /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<span class="icon-md"><i class="pwi-image"></i></span>
				Logo
			</h2>
			<div class="well">
				<?php
					echo pw_select_image_id( array( 
						'ng_model'	=>	'pwOptions.images.logo',
						'slug'			=>	'logo',
						'label'			=>	'Logo',
						'width'			=>	'400px',
					 	));?>
			</div>
		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
		
		<!--///// MENUS /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<i class="pwi-nav-thin"></i>
				Menus
			</h2>
			<!-- PRIMARY MENU -->
			<div class="well">
				<h3>
					Primary Menu
				</h3>
				<span class="icon-md"><i class="pwi-nav"></i></span>
				<?php
					echo pw_select_menus( array(
						'options_model'	=>	'options.menus',
						'ng_model'	=>	'pwOptions.menus.primary.id',
						'null_option'	=>	'No Menu',
						));?>
				<hr class="thin">
				<label>
					<input type="checkbox" ng-model="pwOptions.menus.primary.show_social">
					Show Social Menu
				</label>
				<hr class="thin">
				<label>
					<input type="checkbox" ng-model="pwOptions.menus.primary.show_icons_top">
					Show Icons at Top Level
				</label>
				<div class="indent">
					<hr class="thin">
					<label>
						<input type="checkbox" ng-model="pwOptions.menus.primary.show_icons_sub">
						Show Icons in Submenus
					</label>
				</div>
			</div>
			<!-- SEARCH -->
			<div
				class="well">
				<h3>
					<span class="icon-md"><i class="pwi-search"></i></span>
					Search
				</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.search.show_search">
					Show Search
					<small>: A seach icon appears in the header.</small> 
				</label>
			</div>
			<!-- SECRET LOGIN -->
			<div
				class="well">
				<h3>
					Login
				</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.menus.login.secret_login">
					Enable Secret login
					<small>: A &pi; symbol will appear when hovering over the bottom-right of the page when not logged in. Clicking the &pi; button will prompt login. </small> 
				</label>
			</div>
		</div>

	</div>
</div>