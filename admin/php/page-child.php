<?php
	// Enable Media Library
	wp_enqueue_media();
	///// GET OPTIONS /////
	// TODO : Make API for setting default option values per infinite global and child theme
	// Logo Image
	$i_options = get_option('i-options', array() );
?>
<script>
	var optionsDataCtrl = function( $scope ){
		$scope.iOptions = <?php echo $i_options; ?>;
		$scope['images'] = {};
	}
</script>

<div
	i-admin-options
	ng-controller="optionsDataCtrl">

	<h3>Select Transparent Logo</h3>
	<?php include locate_template('admin/modules/select-image-logo-transparent.php'); ?>
	<hr>

	<h3>Select Default Header Image</h3>
	<?php include locate_template('admin/modules/select-image-header.php'); ?>
	<hr>

	<!--///// MENUS /////-->
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
	

	<hr>

	<?php i_save_option_button('i-options','iOptions'); ?>

	<hr>

	<!--///// HOME /////-->
	<h1><i class="icon-home"></i> Home Page</h1>
	<h3>Secondary Menu</h3>
	<?php
		i_select_menus( array(
			'options_model'	=>	'options.menus',
			'ng_model'	=>	'iOptions.home.secondary_menu',
			'null_option'	=>	'No Menu',
			));
	?>
	<?php i_save_option_button('i-options','iOptions'); ?>
	<hr>

	<h3>Slider</h3>
	<b>Menu</b>
	<?php
		i_select_menus( array(
			'options_model'	=>	'options.menus',
			'ng_model'	=>	'iOptions.home.slider.menu',
			'null_option'	=>	'No Menu',
			));
	?>
	The pages and posts on the selected menu will be used as slides.
	<hr>
	<b>Settings</b>
	<hr>
	<?php
		i_select_slider_settings( array(
			'ng_model' 	=>	'iOptions.home.slider',
			'show'		=>	array( 'height', 'interval', 'no_pause' ),
			'defaults'	=>	array(
					'interval'		=>	5000,
					'mode'			=>	'menu',
					'no_pause'		=>	true,
					),
			) );
	?>


	



	<pre>iOptions: {{ iOptions | json }}</pre>

</div>