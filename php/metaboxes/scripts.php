<script>
	///// CONTROLLER /////
	infiniteMetabox.controller('iMetaboxHeaderCtrl',
		['$scope', 'pwPostOptions', 
			function( $scope, $pwPostOptions ) {
			//$scope.iMeta = <?php echo json_encode($i_meta); ?>;
			
			// Get tax outline by AJAX
			$pwPostOptions.getTaxTerms( $scope, 'tax_terms' );

			// Define Options
			$scope['options'] = {
				'slider':{
					'transition':[
						{
							slug: false,
							name: 'No Transition',
						},
						{
							slug: 'fade',
							name: 'Fade',
						},
						{
							slug: 'slide',
							name: 'Slide',
						},
					]
				},
			};

	}]);
</script>