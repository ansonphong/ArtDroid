///// GOOGLE FONTS /////
WebFontConfig = {
google: { families: [ 'Roboto:100,300,400,700,300italic:latin' ] }
};
(function() {
var wf = document.createElement('script');
wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
wf.type = 'text/javascript';
wf.async = 'true';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wf, s);
})();



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

		// HEADER
		var header = $_.getObj( $scope, 'post.post_meta.i_meta.header.type' );
		var headerDefault = ( header == 'default' || header == false );
		var headerImage = ( header == 'featured_image' );
		var headerSlider = ( header == 'headerSlider' );

		// EMBED
		var hasEmbed = (
			$_.getObj( $scope, 'post.link_format' ) == 'video' ||
			$_.getObj( $scope, 'post.link_format' ) == 'audio' ) ?
			true : false;

		// IMAGE
		var hasImage = ( $_.objExists( $scope, 'post.image.sizes' ) );
		var hasImageAndNoEmbed = ( !hasEmbed && hasImage );
		var hasImageAndNoGallery = ( !hasGallery && hasImage );


		///// SWITCH : VIEWS : LOGIC /////
		switch( view ){
			case 'loading':
				if( loading )
					return true;
				break;

			case 'singleImage':		// For use in Single Post View
				if( ( hasImageAndNoEmbed && !galleryHorizontal ) || ( headerImage && hasImage && !galleryHorizontal ) )
					return true;
				break;

			case 'modalImage': 		// For use in Modal Viewer
				if( hasImageAndNoEmbed && !galleryHorizontal )
					return true;
				break;

			case 'horizontalScrollImage': 	// When is single image with horizontal gallery
				if( hasImageAndNoGallery && galleryHorizontal )
					return true;
				break;

			case 'singleEmbed': 	// For use in Single Post View
				if( hasEmbed )
					return true;
				break;

			case 'modalEmbed': 		// For use in Modal Viewer
				if( hasEmbed )
					return true;
				break;

			case 'autoplayEmbed':
				if( hasEmbed && !galleryHorizontal )
					return true;
				break;

			case 'galleryHorizontal':
				if( galleryHorizontal )
					return true;
				break;

			case 'galleryVertical':
				if( galleryVertical && hasGallery )
					return true;
				break;
	

		}

		return false;

	};


}]);



infinite.directive( 'artFeed', [ function( $scope ){
	return {
		restrict: 'AE',
		controller: 'artFeedCtrl',
		link: function( $scope, element, attrs ){
			// OBSERVE Attribute
			//attrs.$observe('postRequiredFields', function( value ) {
			//	$scope.postRequiredFields = $scope.$eval( value );
			//});
		}
	};
}]);


infinite.controller( 'artFeedCtrl',
	[ '$scope', '$log', '_', '$pw', 'pwData', 'pwPosts',
	function( $scope, $log, $_, $pw, $pwData, $pwPosts ){

	///// UNIVERSALS /////
	$scope.customTagMapping = [
    	{
    		name: 'square',
    		width: 1,
    		height: 1,
    	},
    	{
    		name: 'wide',
    		width: 1,
    		height: 1,
    	},
    	{
    		name: 'x-wide',
    		width: 2,
    		height: 1,
    	},
    	{
    		name: 'tall',
    		width: 1,
    		height: 1,
    	},
    	{
    		name: 'x-tall',
    		width: 1,
    		height: 2,
    	},
    ];


}]);


