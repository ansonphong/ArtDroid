<?php
	// Enable Media Library
	wp_enqueue_media();
	///// GET OPTIONS /////
	// Logo Image
	$i_options = get_option('i-options', array() );
?>
<script>
	var optionsDataCtrl = function( $scope ){
		$scope['i_options'] = <?php echo $i_options; ?>;
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

	<pre>i_options: {{ i_options | json }}</pre>

</div>