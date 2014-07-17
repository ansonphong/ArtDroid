
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
		var galleryTemplate = $_.getObj( $scope, 'post.post_meta.i_meta.gallery.template' );

		var hasGallery = ( !_.isEmpty( $_.getObj( $scope, 'post.gallery.posts' ) ) );
		
		var galleryInline = ( galleryTemplate == 'inline' || galleryTemplate == false );
		var galleryHorizontal = ( galleryTemplate == 'horizontal' );
		var galleryVertical = ( galleryTemplate == 'vertical' );

		// EMBED
		var hasEmbed = (
			$_.getObj( $scope, 'post.link_format' ) == 'video' ||
			$_.getObj( $scope, 'post.link_format' ) == 'audio' ) ?
			true : false;

		// IMAGE
		var hasImage = ( $_.objExists( $scope, 'post.image.sizes' ) );

		var hasImageAndNoGallery = ( hasImage && !galleryHorizontal );

		var hasImageAndNoMedia = ( !hasEmbed && hasImage && !galleryHorizontal );


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
				if( !loading && hasImageAndNoMedia )
					return true;
				break;

			case 'standard':
				if( !loading && !hasGallery && !hasEmbed && !hasImage )
					return true;
				break;

			case 'mediaViewer':
				if( hasImage || hasGallery || hasEmbed  )
					return true;
				break;

			case 'galleryHorizontal':
				if( hasGallery && galleryHorizontal )
					return true;
				break;

			case 'galleryVertical':
				if( hasGallery && galleryVertical )
					return true;
				break;
		}

		return false;

	};


}]);

