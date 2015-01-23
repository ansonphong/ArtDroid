<?php
	// Enable Media Library
	wp_enqueue_media();
?>
<script>
	postworldAdmin.controller( 'optionsDataCtrl',
		[ '$scope', 'iOptionsData',
		function( $scope, iOptionsData ){
			$scope.pwOptions = <?php echo json_encode( pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) ) ); ?>;
			$scope['images'] = {};
			$scope['options'] = iOptionsData['options'];
	}]);
</script>

<div ng-app="postworldAdmin" class="theme">

	<div
		pw-admin-options
		ng-controller="optionsDataCtrl"
		ng-cloak
		class="postworld">

	
		<div class="theme-brand">
			<div class="row">
				<div class="col-md-6">
					<h1>
						<span class="artdroid-brand">
							<i class="icon-merkaba"></i>
							ArtDroid 
						</span>
						<span class="subhead">
							Theme Settings
						</span>
					</h1>
				</div>
				<div class="col-md-6" style="text-align:right;">
					<div class="theme-info">
						Spawned by <a href="http://androidjones.com" target="_blank">Android Jones</a> • Designed by <a href="http://phong.com" target="_blank">Phong</a>
					</div>
				</div>
			</div>
		</div>
		


		<hr class="thick">

		<div class="row">
			<div class="col-lg-6 pad-col-lg">

				<!--///// LOGO /////-->
				<div class="well">
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
					<h2>
						<span class="icon-md"><i class="icon-image"></i></span>
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


				<!--///// POSTS /////-->
				<div class="well">
					
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
					
					<h2>
						<i class="icon-pushpin"></i>
						Posts
					</h2>

					<!-- COLUMNS -->
					<div class="well">
						<small>New posts will be created with default: </small>
						<hr class="thin">
						<?php echo i_content_columns_option( array( "context" => "siteAdmin" ) ); ?>
					</div>

					<!-- DOWNLOAD IMAGE -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-arrow-down-thin"></i></span>
							Download Image
						</h3>
						<?php echo i_download_image_option( array( "context" => "siteAdmin" ) ); ?>
					</div>

					<!-- LINK URL -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-link"></i></span>
							Link Label
						</h3>
						<?php echo i_link_url_options( array( 'context' => 'siteAdmin' ) ); ?>
						<div style="clear:both"></div>
					</div>


					<!-- MODALS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-layers-2"></i></span>
							Modals
						</h3>
						<small>
							Modals hover above the page, to view a sequence of posts without leaving the page.
						</small>
						<hr class="thin">
						<label>
							<input
								type="checkbox"
								ng-model="pwOptions.modals.header.show">
							Show Header
						</label>
						<div style="clear:both"></div>
					</div>

					<!-- MEDIA -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-image"></i></span>
							Media
						</h3>
						<label>
							<input
								type="number"
								class="short"
								ng-model="pwOptions.posts.media.style.height"> % 
							Height
							<small>
								How tall to size the images and media.
							</small>
						</label>
						<div style="clear:both"></div>
					</div>

				</div>

			</div>
			<div class="col-lg-6 pad-col-lg">
				
				<!--///// MENUS /////-->
				<div class="well">
					
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
					<h2>
						<i class="icon-nav-thin"></i>
						Menus
					</h2>
					
					<div class="well">
						<!-- Main Menu -->
						<h3>
							Main Menu
						</h3>

						<span class="icon-md"><i class="icon-nav"></i></span>
						<?php
							echo i_select_menus( array(
								'options_model'	=>	'options.menus',
								'ng_model'	=>	'pwOptions.menus.main',
								));?>

						<hr class="thin">

						<input type="checkbox" ng-model="pwOptions.social.in_main_menu" id="social_menu">
						<label for="social_menu">Show Social Menu</label>

						<!--
						<div ng-show="pwOptions.social.in_main_menu" style="margin-left:20px;">
							<hr class="thin">
							<input type="checkbox" ng-model="pwOptions.social.in_main_menu_gray" id="social_menu_gray">
							<label for="social_menu_gray">Grayscale Icons</label>
						</div>
						-->

					</div>
				</div>
				
				
				<!--///// HOME /////-->
				<div class="well">
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
					<h2><i class="icon-home"></i> Home Page</h2>

					<!-- SLIDER -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-image"></i></span>
							Slider
						</h3>

						<label>
						<input
							type="checkbox"
							ng-model="pwOptions.home.slider.show_slider">
							Display a slideshow on the home page
						</label>
						
						<div
							ng-show="pwOptions.home.slider.show_slider">

							<hr class="thin">
							<b>Menu</b> - <small>The pages and posts on the selected menu will be used as slides.</small>
							<br>
							<span class="icon-md"><i class="icon-nav"></i></span>
							<?php
								echo i_select_menus( array(
									'options_model'	=>	'options.menus',
									'ng_model'	=>	'pwOptions.home.slider.menu',
									'null_option'	=>	'No Menu',
									));?>

							<div ng-hide="!pwOptions.home.slider.menu">
								<hr class="thin">
								<h4>Settings</h4>
								<?php
									echo i_select_slider_settings( array(
										'ng_model' 	=>	'pwOptions.home.slider',
										'show'		=>	array( 'height', 'interval', 'no_pause', 'hyperlink', 'show_title', 'show_excerpt' ),
										'defaults'	=>	array(
												'interval'		=>	5000,
												'mode'			=>	'menu',
												'no_pause'		=>	true,
												),
										));?>
							</div>

						</div>

					</div>

					<!-- SECONDARY MENU -->
					<div
						class="well"
						ng-show="pwOptions.home.slider.show_slider">
						<h3>
							<span class="icon-md"><i class="icon-nav-thin"></i></span>
							Secondary Menu
						</h3>
						<small>This menu will appear under the slider.</small>
						<hr class="thin">
						<div>
							<span class="icon-md"><i class="icon-nav"></i></span>
							<?php
								echo i_select_menus( array(
									'options_model'	=>	'options.menus',
									'ng_model'	=>	'pwOptions.home.secondary_menu',
									'null_option'	=>	'No Menu',
									));?>
						</div>
					</div>

					<!-- BLOCKS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="icon-grid"></i></span>
							Blocks
						</h3>
						<small>
							Blocks appear in-line the feed, and can be used to place widgets, promotional material, newsletter signups, Facebook like buttons, Twitter tweet buttons, etc.
						</small>
						<hr class="thin">
						<?php
							echo i_select_blocks_settings( array(
								'option_var' 	=> 'pwOptions',
								'option_key'	=>	'home.feed.blocks',
								));?>
					</div>


				</div>

			</div>

		</div>

		<hr class="thick">		

		<!--
		<pre>pwOptions: {{ pwOptions | json }}</pre>
		-->
	</div>
</div>