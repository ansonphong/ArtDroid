<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// LOGO /////-->
		<?php /*
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<span class="icon-md"><i class="pwi-image"></i></span>
				Logo
			</h2>
			<small>
				The logo image appears at the upper left of every page.
			</small>
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
		*/?>

		<!--///// GENERAL /////-->
		<div class="well">
			<h2>
				<span class="icon-md"><i class="pwi-gear"></i></span>
				General
			</h2>

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
					<span class="icon-md"><i class="icon pwi-switch"></i></span>
					Login
				</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.menus.login.secret_login">
					Enable Secret login
					<small>: A &pi; symbol will appear when hovering over the bottom-right of the page when not logged in. Clicking the &pi; button will prompt login. </small> 
				</label>
			</div>

		</div>

			


		<!--///// MODALS /////-->
		<div class="well">
			<h2>
				<span class="icon-md"><i class="pwi-layers-2"></i></span>
				Modals
			</h2>
			<small>
				Modals hover above the page, to view a sequence of posts without leaving the page.
				For performance reasons, these are only enabled on Desktop devices.
			</small>
			<div class="well">
				<label>
					<input
						type="checkbox"
						ng-model="pwOptions.modals.header.show">
					<b>Show Modal Header</b>
				</label>
				
				<div ng-show="pwOptions.modals.header.show" class="indent">
					<hr class="thin">
					<small>
						Add a simplified brand logo to the top of your modal galleries, for a nice finishing touch.
					</small>
					<hr class="thin">
					<?php
					echo pw_select_image_id( array( 
						'ng_model'	=>	'pwOptions.modals.header.image.attachment_id',
						'slug'			=>	'modal_header_image',
						'label'			=>	_x('Modal Header Logo', 'image at the top of a modal window', 'postworld'),
						'width'			=>	'300px',
					 	));?>

				</div>
			</div>
			<div style="clear:both"></div>
		</div>


		<!--///// ARCHIVES /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<i class="pwi-tag"></i>
				Term Archives
			</h2>
			<!-- HEADER -->
			<div class="well">
				<h3>Header Image</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.archives.taxonomy.header.background_image.show_title">
					Show Image Title
				</label>
				<hr class="thin">
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.archives.taxonomy.header.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
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
					<span class="icon-md"><i class="pwi-circle-thin"></i></span>
					Main Menu
				</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.menus.primary.show_social">
					<b>Show Social Menu</b>
					<div class="indent">
						<small>
							Show Facebook/Twitter/Instagram icons at the upper right. These will link to the profiles provided in

							<a href="<?php get_site_url(); ?>/wp-admin/admin.php?page=<?php echo pw_admin_submenu_slug() ?>-social">
								<?php _e("ArtDroid › Social", 'postworld') ?>
							</a>

						</small>
					</div>
					
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
			
		</div>



		<!--///// FOOTER /////-->
		<div class="well">
			<h2>
				<span class="icon-md"><i class="pwi-triangle-up-medium"></i></span>
				Footer
			</h2>
			<small>
				The footer appears at the bottom of every page.
			</small>
			<div class="well">
				<label>
					<input type="checkbox" ng-model="pwOptions.footer.show_footer">
					<b>Show Footer</b>
					<small>: Show a footer at the bottom of each page.</small>
				</label>

				<div class="indent" ng-show="pwOptions.footer.show_footer">

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

					<hr class="thin">
					<label>
						<input type="checkbox" ng-model="pwOptions.footer.image.show_image">
						<b>Show Image</b>
						<small>: Add a custom image to your footer, such as a logo.</small>
					</label>
					<div class="indent" ng-show="pwOptions.footer.image.show_image">
						<hr class="thin">
						<?php
							echo pw_select_image_id( array( 
								'ng_model'	=>	'pwOptions.footer.image.attachment_id',
								'slug'			=>	'footerImage',
								'label'			=>	'Footer Image',
								'width'			=>	'300px',
							 	));?>
						<div class="space-4"></div>
					</div>

					<hr class="thin">
					<label>
						<input type="checkbox" ng-model="pwOptions.footer.credits.show_credits">
						<b>Show Credits</b>
						<small>: Credits in the footer.</small>
					</label>

				</div>

			</div>

		</div>


	</div>
</div>