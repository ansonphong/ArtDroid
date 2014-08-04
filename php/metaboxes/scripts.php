<script>
	///// CONTROLLER /////
	infiniteMetabox.controller('iMetaboxOptionsCtrl',
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
							name: 'Default',
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
				'gallery':{
					'template':[
						{
							slug: 'inline',
							name: 'Inline',
							description: 'Galleries appear inline with the post content as a grid of images.',
						},
						{
							slug: 'horizontal',
							name: 'Horizontal',
							description: 'All galleries in the post are merged into a single horizontal infinite scrolling gallery.',
						},
						{
							slug: 'vertical',
							name: 'Vertical',
							description: 'All galleries in the post are merged into a single vertical infinite scrolling gallery.',
						},
					],
				},
				'post_content':{
					columns:[
						{
							value: 1,
							name: '1 Column',
						},
						{
							value: 2,
							name: '2 Columns',
						},
						{
							value: 3,
							name: '3 Columns',
						},
					],
				},
				'icon':{
					'iconx':[
						{
							class: "icon-x-merkaba",
						},
						{
							class: "icon-x-cloud",
						},
						{
							class: "icon-x-home",
						},
						{
							class: "icon-x-globe",
						},
						{
							class: "icon-x-atom",
						},
						{
							class: "icon-x-seedoflife",
						},
						{
							class: "icon-x-lightbulb",
						},
						{
							class: "icon-x-group",
						},
						{
							class: "icon-x-info",
						},
						{
							class: "icon-x-mail",
						},
						{
							class: "icon-x-stream",
						},
						{
							class: "icon-x-location3d",
						},
					],
					'glyphicons':[
						{
							class: "glyphicon glyphicon-star",
						},
						{
							class: "glyphicon glyphicon-film",
						},
						{
							class: "glyphicon glyphicon-cog",
						},
						{
							class: "glyphicon glyphicon-home",
						},
						{
							class: "glyphicon glyphicon-file",
						},
						{
							class: "glyphicon glyphicon-time",
						},
						{
							class: "glyphicon glyphicon-flag",
						},
						{
							class: "glyphicon glyphicon-tag",
						},
						{
							class: "glyphicon glyphicon-tags",
						},
						{
							class: "glyphicon glyphicon-book",
						},
						{
							class: "glyphicon glyphicon-bookmark",
						},
						{
							class: "glyphicon glyphicon-camera",
						},
						{
							class: "glyphicon glyphicon-font",
						},
						{
							class: "glyphicon glyphicon-picture",
						},
						{
							class: "glyphicon glyphicon-facetime-video",
						},
						{
							class: "glyphicon glyphicon-tint",
						},
						{
							class: "glyphicon glyphicon-screenshot",
						},
						{
							class: "glyphicon glyphicon-gift",
						},
						{
							class: "glyphicon glyphicon-calendar",
						},
						{
							class: "glyphicon glyphicon-eye-open",
						},
						{
							class: "glyphicon glyphicon-fire",
						},
						{
							class: "glyphicon glyphicon-leaf",
						},
						{
							class: "glyphicon glyphicon-globe",
						},
						{
							class: "glyphicon glyphicon-bell",
						},
						{
							class: "glyphicon glyphicon-bullhorn",
						},
						{
							class: "glyphicon glyphicon-link",
						},
						{
							class: "glyphicon glyphicon-pushpin",
						},
						{
							class: "glyphicon glyphicon-phone",
						},
						{
							class: "glyphicon glyphicon-usd",
						},
						{
							class: "glyphicon glyphicon-gbp",
						},
						{
							class: "glyphicon glyphicon-flash",
						},
						{
							class: "glyphicon glyphicon-stats",
						},
						{
							class: "glyphicon glyphicon-tree-conifer",
						},
						{
							class: "glyphicon glyphicon-tree-deciduous",
						},
						{
							class: "glyphicon glyphicon-warning-sign",
						},
					],
				},
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
					case 'vertical' :
						if( $scope.iMeta.gallery.template == view )
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