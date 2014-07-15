<script>
	///// CONTROLLER /////
	infiniteMetabox.controller('iMetaboxPostOptionsCtrl',
		['$scope', 'pwPostOptions', '_',
			function( $scope, $pwPostOptions, $_ ) {
			//$scope.iMeta = <?php echo json_encode($i_meta); ?>;
			
			// Get tax outline by AJAX
			$pwPostOptions.getTaxTerms( $scope, 'tax_terms' );

			// Define Options
			$scope['options'] = {
				'header':{
					'type':[
						{
							slug: 'default',
							name: 'Default Image',
						},
						{
							slug: 'featured_image',
							name: 'Featured Image',
						},
						{
							slug: 'slider',
							name: 'Slider',
						},
					],
				},
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
				'galleries':{
					'template':[
						{
							slug: 'inline',
							name: 'Inline Grid',
							description: 'Galleries appear inline with the post content as a grid of images.',
						},
						{
							slug: 'horizontal',
							name: 'Horizontal Infinite',
							description: 'All galleries in the post are merged into a single horizontal infinite scrolling gallery.',
						},
						{
							slug: 'horizontal-inline',
							name: 'Inline Horizontal Infinite',
							description: 'Galleries appear inline with the post content as horizontal infinite scroll.',
						},
						{
							slug: 'vertical',
							name: 'Veritical Infinite',
							description: 'All galleries in the post are merged into a single vertical infinite scrolling gallery.',
						},
					],
				}
			};

			$scope.getSelectedOption = function( objectPath ){
				/* objectPath = 'galleries.template'
				 * Checks the current value of the given object path in iMeta
				 * And returns the option value from $scope.options with the same slug
				 */
				 // Get the value of the selected option
				 var selectedOptionSlug = $_.getObj( $scope.iMeta, objectPath );
				 // Get the array of options
				 var options = $_.getObj( $scope['options'], objectPath );
				 // Return the option where the slug equals the selected value
				 return _.findWhere( options, { slug: selectedOptionSlug } );
			};

			$scope.viewSwitcher = function( view ){
				switch( view ){
					case 'inline' :
					case 'horizontal' :
					case 'horizontal-inline' :
					case 'vertical' :
						if( $scope.iMeta.galleries.template == view )
							return true;
						break;
				}
				return false;
			}

			$scope.showView = function( view ){
				// ARRAY VALUES
				if( _.isArray( view ) ){
					var switcher = false;
					var show = false;
					// Iterate through each array value
					angular.forEach( view, function( thisView ){
						switcher = $scope.viewSwitcher( thisView );
						// If any one of the values return true, show the view
						if( switcher == true )
							show = true;
					} );
					return show;
				}
				// STRING VALUES
				if( _.isString( view ) ){
					return $scope.viewSwitcher( view );
				}
				// DEFAULT
				return false;
			}

	}]);

</script>