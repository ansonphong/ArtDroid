<?php
	// Enable Media Library
	wp_enqueue_media();

	$home_slider_settings = array(
		'ng_model' 	=>	'pwOptions.home.slider',
		'show'		=>	array(
			'height',
			'interval',
			'no_pause',
			'hyperlink',
			'show_title',
			'show_excerpt',
			'transition',
			'proportion'
			),
		'defaults'	=>	array(
			'interval'		=>	5000,
			'mode'			=>	'menu',
			'no_pause'		=>	true,
			'transition'	=>	'fade',
			),
		'options' => array(
			'proportion' => array(
				array(
					'value' => false,
					'name' => 'Flexible',
					),
				array(
					'value' => 2,
					'name' => '2 : 1',
					),
				array(
					'value' => 2.5,
					'name' => '2.5 : 1',
					),
				array(
					'value' => 3,
					'name' => '3 : 1',
					),
				array(
					'value' => 3.5,
					'name' => '3.5 : 1',
					),
				array(
					'value' => 4,
					'name' => '4 : 1',
					),
				),
			),
		);
?>
<script>
	postworldAdmin.controller( 'optionsDataCtrl',
		[ '$scope', 'iOptionsData',
		function( $scope, iOptionsData ){
			$scope.pwOptions = <?php echo json_encode( pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) ) ); ?>;
			$scope['images'] = {};
			$scope['options'] = iOptionsData['options'];
			$scope.fontOptions = <?php echo json_encode( theme_get_font_options() ); ?>;
	}]);
</script>

<div class="theme">

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
							<i class="pwi-merkaba"></i>
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

				<!--///// FONTS /////-->
				<?php include 'theme-fonts.php' ?>

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


				<!--///// POSTS /////-->
				<div class="well">
					
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
					
					<h2>
						<i class="pwi-pushpin"></i>
						Posts
					</h2>

					<!-- COLUMNS -->
					<div class="well">
						<small>New posts will be created with default: </small>
						<hr class="thin">
						<?php echo pw_content_columns_option( array( "context" => "siteAdmin" ) ); ?>
					</div>

					<!-- DOWNLOAD IMAGE -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-arrow-down-thin"></i></span>
							Download Image
						</h3>
						<?php echo pw_download_image_option( array( "context" => "siteAdmin" ) ); ?>
					</div>

					<!-- LINK URL -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-link"></i></span>
							Link Label
						</h3>
						<?php echo pw_link_url_options( array( 'context' => 'siteAdmin' ) ); ?>
						<div style="clear:both"></div>
					</div>


					<!-- MODALS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-layers-2"></i></span>
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
							<span class="icon-md"><i class="pwi-image"></i></span>
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
				
				<!--///// HOME /////-->
				<div class="well">
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
					<h2><i class="pwi-home"></i> Home Page</h2>

					<!-- SLIDER -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-image"></i></span>
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
							<span class="icon-md"><i class="pwi-nav"></i></span>
							<?php
								echo pw_select_menus( array(
									'options_model'	=>	'options.menus',
									'ng_model'	=>	'pwOptions.home.slider.menu',
									'null_option'	=>	'No Menu',
									));?>

							<div ng-hide="!pwOptions.home.slider.menu">
								<hr class="thin">
								<h4>Settings</h4>
								<?php
									echo pw_select_slider_settings( $home_slider_settings );?>
							</div>

						</div>

					</div>

					<!-- SECONDARY MENU -->
					<div
						class="well"
						ng-show="pwOptions.home.slider.show_slider">
						<h3>
							<span class="icon-md"><i class="pwi-nav-thin"></i></span>
							Secondary Menu
						</h3>
						<small>This menu will appear under the slider.</small>
						<hr class="thin">
						<div>
							<span class="icon-md"><i class="pwi-nav"></i></span>
							<?php
								echo pw_select_menus( array(
									'options_model'	=>	'options.menus',
									'ng_model'	=>	'pwOptions.home.secondary_menu',
									'null_option'	=>	'No Menu',
									));?>
						</div>
					</div>

					<!-- BLOCKS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-grid"></i></span>
							Blocks
						</h3>
						<small>
							Blocks appear in-line the feed, and can be used to place widgets, promotional material, newsletter signups, Facebook like buttons, Twitter tweet buttons, etc.
						</small>
						<hr class="thin">
						<?php
							echo pw_select_blocks_settings( array(
								'option_var' 	=> 'pwOptions',
								'option_key'	=>	'home.feed.blocks',
								'show'			=>	array( 'offset', 'increment', 'max', 'background-image', 'parallax' ),
								));?>
					</div>

				</div>


				<!--///// MEDIA EMBEDS /////-->
				<div class="well">
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
					<h2><i class="pwi-embed"></i> Media Embeds</h2>

					<!-- GENERAL -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-gear"></i></span>
							General
						</h3>

						<select
							ng-options="val.value as val.name for val in options.general.doubleSwitch"
							ng-model="pwOptions.embeds.autoplay">
						</select>
						autoplay
						<small>
							: play the media automatically
						</small>

					</div>

					<!-- YOUTUBE -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-play-youtube"></i></span>
							YouTube
						</h3>

						<select
							ng-model="pwOptions.embeds.youtube.theme">
							<option value="dark">Dark</option>
							<option value="light">Light</option>
						</select>
						theme
						<small> : the backdrop of the player controls</small>

						<hr class="thin">

						<select
							ng-model="pwOptions.embeds.youtube.color">
							<option value="red">Red</option>
							<option value="white">White</option>
						</select>
						color
						<small> : used to highlight the video progress</small>

						<hr class="thin">

						<select
							ng-model="pwOptions.embeds.youtube.controls">
							<option value="0">Hide controls, show title</option>
							<option value="1">Show controls, show title</option>
							<option value="2">Hide controls, hide title</option>
						</select>
						controls
						<small> : before playing the video</small>

					</div>

				</div>


				<!--///// FEEDS /////-->
				<div class="well">
					<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
					<h2><i class="pwi-th-list"></i> Feeds</h2>

					<!-- LOADING ICONS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-circle-medium"></i></span>
							<?php ___('feeds.settings.loading_icon') ?>
						</h3>
						<?php
							$loading_icon_options = theme_get_loading_icon_options();
							echo pw_select_icon_options(
								array(
									'ng_model' => 'pwOptions.feeds.loading.icon',
									'icons'	=>	$loading_icon_options,
									'icon_spin' => true,
									)); ?>
					</div>

					<!-- SETTINGS -->
					<div class="well">
						<h3>
							<span class="icon-md"><i class="pwi-gear"></i></span>
							Settings
						</h3>

						<input
							type="number"
							class="short"
							ng-model="pwOptions.feeds.settings.preload">
						preload : <small>number of posts to preload on page load</small>

						<hr class="thin">
						<input
							type="number"
							class="short"
							ng-model="pwOptions.feeds.settings.load_increment">
						load increment : <small>number of posts to load each infinite scroll</small>				
					</div>

				</div>

			</div>

		</div>

		<?php if( pw_dev_mode() ) : ?>
			<hr class="thick">		
			<div class="well">
				<h3>$scope.pwOptions</h3>
				<pre><code>{{ pwOptions | json }}</code></pre>
			</div>
		<?php endif; ?>
		
	</div>
</div>