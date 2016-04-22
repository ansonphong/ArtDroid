<?php
// Enable Media Library
wp_enqueue_media();

pw_print_ng_controller(array(
	'app' => 'postworldAdmin',
	'controller' => 'themeOptionsDataCtrl',
	'vars' => array(
		'pwOptions' => pw_get_option( array( 'option_name' => PW_OPTIONS_THEME ) ),
		'images' => array( '_' => 0 ),
		'fontOptions' => theme_get_font_options(),
		),
	));

?>

<div
	pw-admin-options
	ng-controller="themeOptionsDataCtrl"
	class="theme postworld">

	<div class="theme-brand">
		<div class="row">
			<div class="col-md-6">
				<h1>
					<span class="artdroid-brand">
						<i class="pwi-merkaba"></i>
						<a href="//artdroid.phong.com" target="_blank">
							ArtDroid
						</a> 
					</span>
					<span class="subhead">
						Theme Settings
					</span>
					<span class="theme-version">
						v<?php echo $GLOBALS['theme_version'] ?>
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

	<div class="pw-cloak">

		<uib-tabset>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-nav"></i> Header & Footer
				</uib-tab-heading>
				<?php include 'theme-header-footer.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-quill"></i> Fonts
				</uib-tab-heading>
				<?php include 'theme-fonts.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-pushpin"></i> Posts
				</uib-tab-heading>
				<?php include 'theme-posts.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-blog"></i> Blog
				</uib-tab-heading>
				<?php include 'theme-blog.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-home"></i> Home Page
				</uib-tab-heading>
				<?php include 'theme-home-page.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-droplet"></i> Colors
				</uib-tab-heading>
				<?php include 'theme-colors.php' ?>
			</uib-tab>

			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-spinner-3"></i> Loading
				</uib-tab-heading>
				<?php include 'theme-loading.php' ?>
			</uib-tab>

			<?php /*
			<uib-tab>
				<uib-tab-heading>
					<i class="icon pwi-database"></i> Archives
				</uib-tab-heading>
				<?php include 'theme-archives.php' ?>
			</uib-tab>
			*/ ?>

		</uib-tabset>

	</div>

	<?php if( pw_dev_mode() ) : ?>
		<hr class="thick">		
		<div class="well">
			<h3>$scope.pwOptions</h3>
			<pre><code>{{ pwOptions | json }}</code></pre>
		</div>
	<?php endif; ?>
	
</div>