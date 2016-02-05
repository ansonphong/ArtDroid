<script>

	///// CONTROLLER /////
	postworldAdmin.controller('pwMetaboxOptionsCtrl',
		['$scope', 'pwPostOptions', '_', 'pwOptionsData',
			function( $scope, $pwPostOptions, $_, $pwOptionsData ) {

			// Get tax outline by AJAX
			$pwPostOptions.taxTerms( $scope, 'tax_terms' );

			// Define Options
			$scope['options'] = $pwOptionsData['options'];

			$scope.getSelectedOption = function( objectPath ){
				/* objectPath = 'galleries.template'
				 * Checks the current value of the given object path in pwMeta
				 * And returns the option value from $scope.options with the same slug
				 */
				 // Get the value of the selected option
				 var selectedOptionSlug = $_.getObj( $scope.pwMeta, objectPath );
				 // Get the array of options
				 var options = $_.getObj( $scope['options'], objectPath );
				 // Return the option where the slug equals the selected value
				 return _.findWhere( options, { slug: selectedOptionSlug } );
			};

			$scope.viewSwitcher = function( view ){
				switch( view ){
					case 'inline' :
					case 'horizontal' :
					case 'vertical' :
						if( $scope.pwMeta.gallery.template == view )
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