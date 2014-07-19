<?php
	// Enable Media Library
	wp_enqueue_media();
	///// GET OPTIONS /////
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
	<!-- Show Social Menu -->
	<input type="checkbox" ng-model="iOptions.social.in_main_menu" id="social_menu">
	<label for="social_menu">Show Social Menu in Main Menu</label>

	<div ng-show="iOptions.social.in_main_menu" style="margin-left:20px;">
		<hr>
		<input type="checkbox" ng-model="iOptions.social.in_main_menu_gray" id="social_menu_gray">
		<label for="social_menu_gray">Show Main Menu Social Menu in Grayscale</label>
	</div>
	

	<hr>

	<?php i_save_option_button('i-options','iOptions'); ?>

	<hr>

	<!--///// HOME /////-->
	<h1><i class="icon-home"></i> Home Page</h1>
	<h3>Home Page Secondary Menu</h3>
	<?php
		i_select_menus( array(
			'options_model'	=>	'options.menus',
			'ng_model'	=>	'iOptions.menus.home',
			'null_option'	=>	'No Menu',
			));
	?>
	<?php i_save_option_button('i-options','iOptions'); ?>



	<hr>


	<pre>iOptions: {{ iOptions | json }}</pre>

</div>