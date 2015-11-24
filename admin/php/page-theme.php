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

<div
	pw-admin-options
	ng-controller="optionsDataCtrl"
	ng-cloak
	class="theme postworld">

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


	<tabset>

		<tab>
			<tab-heading>
				<i class="icon pwi-nav"></i> Header & Menus
			</tab-heading>
			<?php include 'theme-header-menus.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-quill"></i> Fonts
			</tab-heading>
			<?php include 'theme-fonts.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-pushpin"></i> Posts
			</tab-heading>
			<?php include 'theme-posts.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-blog"></i> Blog
			</tab-heading>
			<?php include 'theme-blog.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-home"></i> Home Page
			</tab-heading>
			<?php include 'theme-home-page.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-droplet"></i> Colors
			</tab-heading>
			<?php include 'theme-colors.php' ?>
		</tab>

		<tab>
			<tab-heading>
				<i class="icon pwi-th-list"></i> Feeds
			</tab-heading>
			<?php include 'theme-feeds.php' ?>
		</tab>

	</tabset>

	<?php if( pw_dev_mode() ) : ?>
		<hr class="thick">		
		<div class="well">
			<h3>$scope.pwOptions</h3>
			<pre><code>{{ pwOptions | json }}</code></pre>
		</div>
	<?php endif; ?>
	
</div>