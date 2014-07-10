
infinite.directive( 'artPost', [ function( $scope ){
	return {
		restrict: 'AE',
		controller: 'artPostCtrl',
		link: function( $scope, element, attrs ){
			// OBSERVE Attribute
			//attrs.$observe('postRequiredFields', function( value ) {
			//	$scope.postRequiredFields = $scope.$eval( value );
			//});
		}
	};
}]);


infinite.controller( 'artPostCtrl',
	[ '$scope', '$log', '_', '$pw', 'pwData', 'pwPosts',
	function( $scope, $log, $_, $pw, $pwData, $pwPosts ){

	$scope.views = [ 'loading', 'image', 'gallery', 'embed', 'standard' ];





}]);

