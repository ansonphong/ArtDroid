<?php
	// Enable Media Library
	wp_enqueue_media();
	///// GET OPTIONS /////
	// TODO : Make API for setting default option values per infinite global and child theme
	// Logo Image
	$i_options = get_option('i-options', array() );
?>
<script>
	var optionsDataCtrl = function( $scope, iOptionsData ){

		$scope.iOptions = <?php echo $i_options; ?>;
		$scope['images'] = {};
		$scope['options'] = iOptionsData['options'];

	}
</script>

<div
	id="poststuff"
	i-admin-options
	ng-controller="optionsDataCtrl"
	ng-cloak>
	<div class="postworld">

		<?php /*
		<hr class="thick">
		<h3>Select Transparent Logo</h3>
		<?php include locate_template('admin/modules/select-image-logo-transparent.php'); ?>
		
		<hr class="thick">
		<h3>Select Default Header Image</h3>
		<?php include locate_template('admin/modules/select-image-header.php'); ?>
		*/ ?>


		<!--///// POSTS /////-->
		<hr class="thick">
		<div class="save-right"><?php i_save_option_button('i-options','iOptions'); ?></div>
		<h1><i class="icon-pushpin"></i> Posts</h1>

		<!-- Columns Option -->
		New posts will be created with default: <br>
		<?php i_post_content_columns_option( 'siteAdmin' ); ?>
		<hr>
		<!-- Download Image Option -->
		<?php i_download_image_option( 'siteAdmin' ); ?>

		<!--///// MENUS /////-->
		<hr class="thick">
		<div class="save-right"><?php i_save_option_button('i-options','iOptions'); ?></div>
		<h1><i class="icon-cog"></i> Menus</h1>
		<h3>Main Menu</h3>
		<!-- Main Menu -->
		<input type="checkbox" ng-model="iOptions.social.in_main_menu" id="social_menu">
		<label for="social_menu">Show Social Menu</label>

		<div ng-show="iOptions.social.in_main_menu" style="margin-left:20px;">
			<hr>
			<input type="checkbox" ng-model="iOptions.social.in_main_menu_gray" id="social_menu_gray">
			<label for="social_menu_gray">Grayscale Icons</label>
		</div>
		
		
		<!--///// HOME /////-->
		<hr class="thick">
		<div class="save-right"><?php i_save_option_button('i-options','iOptions'); ?></div>
		<h1><i class="icon-home"></i> Home Page</h1>
		<b>Secondary Menu</b> - <small>This menu will appear under the slider.</small>
		<br>
		<span class="icon-md"><i class="icon-th-list"></i></span>
		<?php
			i_select_menus( array(
				'options_model'	=>	'options.menus',
				'ng_model'	=>	'iOptions.home.secondary_menu',
				'null_option'	=>	'No Menu',
				));
		?>
		<hr>

		<h3>Slider</h3>
		<b>Menu</b> - <small>The pages and posts on the selected menu will be used as slides.</small>
		<br>
		<span class="icon-md"><i class="icon-th-list"></i></span>
		<?php
			i_select_menus( array(
				'options_model'	=>	'options.menus',
				'ng_model'	=>	'iOptions.home.slider.menu',
				'null_option'	=>	'No Menu',
				));
		?>

		<hr>
		<b>Settings</b>
		<hr>
		<?php
			i_select_slider_settings( array(
				'ng_model' 	=>	'iOptions.home.slider',
				'show'		=>	array( 'height', 'interval', 'no_pause', 'hyperlink', 'show_title', 'show_excerpt' ),
				'defaults'	=>	array(
						'interval'		=>	5000,
						'mode'			=>	'menu',
						'no_pause'		=>	true,
						),
				) );
		?>


		<hr class="thick">

		<pre>iOptions: {{ iOptions | json }}</pre>
	</div>
</div>