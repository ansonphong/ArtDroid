<?php
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
		//'proportion',
		'parallax_depth'
		),
	'defaults'	=>	array(
		'interval'		=>	5000,
		'mode'			=>	'menu',
		'no_pause'		=>	true,
		'transition'	=>	'fade',
		),
	);

$home_options = array(
	'content' => array(
		'primary' => array(
			array(
				'label' => 'Blog Feed',
				'value' => 'blog'
				),
			array(
				'label' => 'Posts Feed',
				'value' => 'posts',
				),
			array(
				'label' => 'Scrolling Gallery',
				'value' => 'scrolling-gallery',
				),
			),
		),
	);

?>

<script>
	postworld.controller('themAdminHome', function($scope){
		$scope.homeOptions = <?php echo json_encode( $home_options ) ?>;
	});
</script>
<div class="row" ng-controller="themAdminHome">
	<div class="col-lg-6 pad-col-lg">


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

		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
	
		<div class="well">

			<!-- DISPLAY -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-eye"></i></span>
					Display
				</h3>
				<small>
					What to show on the home page.
				</small>
				<hr class="thin">
				
				<select
					ng-model="pwOptions.home.content.primary"
					ng-options="option.value as option.label for option in homeOptions.content.primary">
				</select>

				<b>Primary Content</b>
				<small>: What to show as the primary content on the home page.</small>

				<div ng-if="pwOptions.home.content.primary == 'scrolling-gallery'">
					<hr class="thin">
					Use gallery from page:
					<?php
						echo pw_select_setting(array(
							'setting' => 'post-id',
							'ng_model' => 'pwOptions.home.content.post_id',
							'query' => array(
								'post_type' => 'page',
								'post_status' => 'publish',
								'posts_per_page' => 0
								),
							));
					?>

				</div>

			</div>

			<!-- BLOCKS -->
			<!-- ng-show="pwOptions.home.content.primary == 'posts'" -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-grid"></i></span>
					Blocks
				</h3>
				<small>
					Blocks appear in-line the feed, and can be used to place widgets, promotional material, newsletter signups, Facebook like buttons, Twitter tweet buttons, etc.
					Blocks can be added in <b><a href="<?php echo get_admin_url(null,'widgets.php') ?>" target="_blank">Appearance › Widgets</a></b> to the <b>Home Page: Feed Blocks</b> sidebar.
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


	</div>
</div>

