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


postworld.directive( 'artPost', [ function( $scope ){
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


postworld.controller( 'artPostCtrl',
	[ '$scope', '$log', '_', '$pw', 'pwData', 'pwPosts', '$timeout',
	function( $scope, $log, $_, $pw, $pwData, $pwPosts, $timeout ){

	//$scope.views = [ 'loading', 'image', 'gallery', 'embed', 'standard' ];

	$scope.showView = function( view ){

		// LOADING
		var loading = ( $scope.status == 'loading' ) ?
			true : false;

		// GALLERY
		var galleryTemplate = $_.get( $scope, 'post.post_meta.pw_meta.gallery.template' );
		var hasGallery = ( !_.isEmpty( $_.get( $scope, 'post.gallery.posts' ) ) );
		var galleryInline = ( galleryTemplate == 'inline' || galleryTemplate == false );
		var galleryHorizontal = ( galleryTemplate == 'horizontal' );
		var galleryVertical = ( galleryTemplate == 'vertical' );
		var galleryFrame = ( galleryTemplate == 'frame' );

		// HEADER
		var header = $_.get( $scope, 'post.post_meta.pw_meta.header.type' );
		var headerDefault = ( header == 'default' || header == false );
		var headerImage = ( header == 'featured_image' );
		var headerSlider = ( header == 'headerSlider' );

		// EMBED
		var hasEmbed = (
			$_.get( $scope, 'post.link_format' ) == 'video' ||
			$_.get( $scope, 'post.link_format' ) == 'audio' ) ?
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
				if( ( hasImageAndNoEmbed && !galleryHorizontal && !galleryFrame ) ||
					( headerImage && hasImage && !galleryHorizontal && !galleryFrame ) )
					return true;
				break;

			case 'modalImage': 		// For use in Modal Viewer
				if( hasImageAndNoEmbed && !galleryHorizontal && !galleryFrame )
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
				if( galleryVertical ) // && hasGallery
					return true;
				break;

			case 'galleryFrame':
				if( galleryFrame ) // && hasGallery
					return true;
				break;
	
		}

		return false;

	};

	$scope.imageFormat = function( post ){
		var ratio = $_.get( post, 'image.stats.ratio' );
		if( !ratio )
			return false;
		if( Number( ratio ) > 3 )
			return 'panorama';
		else
			return 'standard';
	}

	///// WATCH : POST ID /////
	// When the post ID changes, run this function
	$scope.$watch( 'post.post_content', function( newVal, oldVal ){

		// Refresh Instagram Widgets
		$timeout( function(){
			if( !_.isUndefined( window.instgrm ) )
				window.instgrm.Embeds.process();
		}, 100 );
		
	});

	/**
	 * Custom dynamic style definitions which change
	 * According to the current post colors.
	 */
	$scope.colorStyles = {
		"#header-border": {
			"border-bottom-color":"{{ hex('dynamic.50') }} !important",
		},
		"a .menu-icon":{
			"color": "{{ hex('dynamic.50') }} !important",
		},
		".modal .modal-head button.transparent":{
			"color":"{{ hex('dynamic.25') }}"
		},
		".share-social .icon, .post .icon, .post a, .modal-head .icon, .post .callout": {
			"color": "{{ hex('dynamic.25') }} !important",
			//background: "{{ rgba('dynamic.0',.8) }} !important",
		},
		".post .post-title a":{
			"color": "{{ hex('dynamic.0') }} !important",
		},
		".post .taxonomy a.term":{
			"border-bottom": "1px solid {{hex('dynamic.50')}}"
		},
		".sidebar .sidebar-widget h3.sidebar-title":{
			"color": "{{hex('dynamic.25')}}",
			"background": "{{hex('dynamic.100')}}"
		},
		".modal .nav-btn-area button.btn-next, .modal .nav-btn-area button.btn-previous":{
			"color": "{{hex('dynamic.25')}}"
		},
		".modal .nav-btn-area button.btn-next:hover, .modal .nav-btn-area button.btn-previous:hover":{
			"border-color": "{{hex('dynamic.25')}}",
		},
		".media-viewer": {
			"border-bottom-color": "{{hex('dynamic.100')}}"
		},
		".image-info":{
			"background":"{{ rgba('dynamic.100',.8) }}"
		},
		"::-webkit-scrollbar-track": {
			"background": "{{ hex('dynamic.100') }} !important",
		},
		"::-webkit-scrollbar-thumb": {
			"background": "{{ hex('dynamic.50') }} !important",
		},
	};

}]);

postworld.directive( 'artFeed', [ function( $scope ){
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


postworld.controller( 'artFeedCtrl',
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


