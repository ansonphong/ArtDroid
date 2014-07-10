
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

	$scope.showView = function( view ){

		// LOADING
		var loading = ( $scope.status == 'loading' ) ?
			true : false;

		// GALLERY
		var hasGallery = ( !_.isEmpty( $_.getObj( $scope, 'post.gallery.posts' ) ) ) ?
			true : false;

		// EMBED
		var hasEmbed = (
			$_.getObj( $scope, 'post.link_format' ) == 'video' ||
			$_.getObj( $scope, 'post.link_format' ) == 'audio' ) ?
			true : false;

		// IMAGE
		var hasImage = ( $_.objExists( $scope, 'post.image.sizes' ) ) ?
			true : false;


		// SWITCH VIEWS
		switch( view ){

			case 'loading':
				if( loading )
					return true;
				break;

			case 'gallery':
				if( !loading && hasGallery )
					return true;
				break;

			case 'embed':
				if( !loading && hasEmbed )
					return true;
				break;

			case 'image':
				if( !loading && !hasGallery && !hasEmbed && hasImage )
					return true;
				break;

			case 'standard':
				if( !loading && !hasGallery && !hasEmbed && !hasImage )
					return true;
				break;

		}

		return false;

	};


}]);

