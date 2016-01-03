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

		<div class="well">
			<h2>
				Footer
			</h2>

			<div class="well">
				<label>
					<input type="checkbox" ng-model="pwOptions.footer.show_footer">
					<b>Show Footer</b>
					<small>: Show a footer at the bottom of each page.</small>
				</label>

				<div class="indent" ng-show="pwOptions.footer.show_footer">

					<hr class="thin">
					<label>
						<input type="checkbox" ng-model="pwOptions.footer.credits.show_credits">
						<b>Show Credits</b>
						<small>: Credits in the footer.</small>
					</label>

					<hr class="thin">
					<label>
						<input type="checkbox" ng-model="pwOptions.footer.custom.show_custom">
						<b>Show Custom Message</b>
						<small>: Add a custom message to your footer.</small>
					</label>
					<div class="indent" ng-show="pwOptions.footer.custom.show_custom">
						<hr class="thin">
						<textarea msd-elastic class="full-width" ng-model="pwOptions.footer.custom.content"></textarea>
					</div>

				</div>

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
					Main Menu
				</h3>
				<?php /* 
				<span class="icon-md"><i class="pwi-nav"></i></span>
				<?php
					
					echo pw_select_menus( array(
						'options_model'	=>	'options.menus',
						'ng_model'	=>	'pwOptions.menus.primary.id',
						'null_option'	=>	'No Menu',
						));?>
				<hr class="thin">
				*/ ?>
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