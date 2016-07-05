postworld.directive( 'themeTermFeed',
	function( $pw, $_, $log ){
	return{
		link: function( $scope, element, attrs ){
			$scope.rootTerms = function(){
				var rootTerms = $_.deepWhere( $scope.termFeed, 'term.parent', '0' );
				$log.debug( 'ROOT TERMS : ', rootTerms );
				console.log( 'ROOT TERMS : ', $scope.termFeed );
				return rootTerms;
			}
			$scope.subTerms = function( parentId ){
				// Return subTerms if parentId term is selected, or is parent 
				if( $_.get( $pw.view, 'term.term_id' ) === parseInt( parentId ) ||
					$_.get( $pw.view, 'term.parent.term_id' ) === parseInt( parentId ) )
					return $_.deepWhere( $scope.termFeed, 'term.parent', parentId );
			}
			$scope.termClass = function( feedTerm ){
				// Detect if the current term is selected and return 'selected' class
				var currentContext = $_.get( $pw.view, 'context' );
				if( $_.inArray( 'archive-taxonomy', currentContext ) ){
					var currentTerm = $_.get( $pw.view, 'term' );
					if( feedTerm.term.term_id == currentTerm.term_id )
						return 'selected';
				}
				return false;
			}
		}
	}
});

postworld.directive( 'themeHeader',
	function( $pwData, $pw, $log, $_, $window ){
	return {
		restrict: 'AE',
		link: function( $scope, element, attrs ){
			// Only enable for desktop devices
			if( !$pw.device.is_desktop )
				return false;
			// Default variables
			var yScroll = 0,
				minHeight = 64,
				maxHeight = $pw.options.style.header_height_expand;
			// Resize the header
			var update = function(){
				yScroll = window.scrollY || ((window.pageYOffset || document.body.scrollTop) - (document.body.clientTop || 0));
				headerHeight = Math.max( maxHeight - yScroll/2, minHeight );
				element[0].style.height = parseInt(headerHeight)+'px';
			}
			angular.element($window).bind("scroll", update);
			update();
		}
	};
});

postworld.directive( 'artPost', function(){
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
});

postworld.controller( 'artPostCtrl',
	function( $scope, $log, $_, $pw, $pwData, $pwPosts, $timeout ){

	/**
	 * @todo Replace artdroid_meta with $pw.define.PW_POSTMETA_KEY
	 */

	//$scope.views = [ 'loading', 'image', 'gallery', 'embed', 'standard' ];
	$scope.showView = function( view ){
		/**
		 * @todo Optimize this so on Modal view, it's not being called as frequently
		 * $log.debug( 'showView', view ); // See how frequently it occurs
		 */

		// LOADING
		var loading = ( $scope.status == 'loading' ) ?
			true : false;

		// GALLERY
		var galleryTemplate = $_.get( $scope, 'post.post_meta.artdroid_meta.gallery.template' );
		var hasGallery = ( !_.isEmpty( $_.get( $scope, 'post.gallery.posts' ) ) );
		var galleryInline = ( galleryTemplate == 'inline' || galleryTemplate == false );
		var galleryHorizontal = ( galleryTemplate == 'horizontal' );
		var galleryVertical = ( galleryTemplate == 'vertical' );
		var galleryFrame = ( galleryTemplate == 'frame' );
		var isGallery = ( galleryHorizontal || galleryFrame || galleryVertical );

		// HEADER
		var header = $_.get( $scope, 'post.post_meta.artdroid_meta.header.type' );
		var headerDefault = ( header == 'default' || header == false );
		var headerImage = ( header == 'featured_image' );
		var headerSlider = ( header == 'headerSlider' );

		// EMBED
		var hasEmbed = (
			$_.get( $scope, 'post.post_meta.artdroid_link_format' ) == 'video' ||
			$_.get( $scope, 'post.post_meta.artdroid_link_format' ) == 'audio' ) ?
			true : false;

		// IMAGE
		var hasImage = ( $_.objExists( $scope, 'post.image.sizes' ) );
		var hasImageAndNoEmbed = ( !hasEmbed && hasImage );
		var hasImageAndNoGallery = ( !hasGallery && hasImage );

		// BLOG
		var fiDisplay = $_.get($scope.post,'post_meta.artdroid_meta.featured_image.display');

		var singleImage = function(){
			return	( ( hasImageAndNoEmbed && !isGallery ) ||
					( headerImage && hasImage && !isGallery ) );
		}

		///// SWITCH : VIEWS : LOGIC /////
		switch( view ){
			case 'loading':
				if( loading )
					return true;
				break;

			case 'singleImage':		// For use in Single Post View
				if(singleImage())
					return true;
				break;

			case 'fiDisplay--slice':		// For use in Blog Full View
				if( hasImageAndNoEmbed && fiDisplay === 'slice' )
					return true;
				break;

			case 'fiDisplay--full':		// For use in Blog Full View
				if( hasImageAndNoEmbed && fiDisplay === 'full' )
					return true;
				break;

			case 'modalImage': 		// For use in Modal Viewer
				if( hasImageAndNoEmbed && !galleryVertical && !galleryHorizontal && !galleryFrame )
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

			case 'downloadSingleImage':
				if( singleImage() && $_.get( $scope.post, 'post_meta.artdroid_meta.image.download' ) )
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
		".post .color-overlay":{
			"background-color":"{{ hex('dynamic.50') }}",
		},
		"header#header": {
			"border-bottom-color":"{{ hex('dynamic.50') }} !important",
		},
		".menu-social .icon": {
			"color":"{{ hex('dynamic.40') }} !important",
		},
		".menu-social .icon:hover": {
			"color":"{{ hex('dynamic.100') }} !important",
		},
		"a .menu-icon":{
			"color": "{{ hex('dynamic.50') }} !important",
		},
		".modal .modal-head button.transparent":{
			"color":"{{ hex('dynamic.75') }}"
		},
		".share-social .icon, .post .icon, .post a, .modal-head .icon, .post .callout": {
			"color": "{{ hex('dynamic.75') }} !important",
			//background: "{{ rgba('dynamic.0',.8) }} !important",
		},
		".post .post-title a":{
			"color": "{{ hex('dynamic.100') }} !important",
		},
		".post .taxonomy a.term":{
			"border-bottom": "1px solid {{hex('dynamic.50')}}"
		},
		".post .post-head .time time":{
			"color": "{{hex('dynamic.50')}}"
		},
		".post .taxonomy a.term.category":{
			"background": "{{hex('dynamic.10')}}",
			"color": "{{hex('dynamic.100')}}",
		},
		".post-content ul li":{
			"border-top-color": "{{rgba('dynamic.50',.33)}}"
		},
		"body .highlight-color a": {
			"background":"{{hex('dynamic.0')}}",
			"color":"{{hex('dynamic.100')}} !important"
		},
		".sidebar .sidebar-widget h3.sidebar-title":{
			"color": "{{hex('dynamic.75')}}",
			"background": "{{hex('dynamic.0')}}"
		},
		".modal .nav-btn-area button.btn-next, .modal .nav-btn-area button.btn-previous":{
			"color": "{{hex('dynamic.75')}}"
		},
		".modal .nav-btn-area button.btn-next:hover, .modal .nav-btn-area button.btn-previous:hover":{
			"border-color": "{{hex('dynamic.75')}}",
		},
		".media-viewer": {
			"border-bottom-color": "{{hex('dynamic.0')}}"
		},
		".image-info":{
			"background":"{{ rgba('dynamic.0',.8) }}"
		},
		"::-webkit-scrollbar-track": {
			"background": "{{ hex('dynamic.0') }} !important",
		},
		"::-webkit-scrollbar-thumb": {
			"background": "{{ hex('dynamic.50') }} !important",
		},
		/*
		".post.view--grid:hover .link-format-indicator.standard button, .post.view--grid:hover .link-format-indicator.video button, .post.view--grid:hover .link-format-indicator.audio button":{
			"color":"{{hex('dynamic.100')}}",
			"background":"{{hex('dynamic.100')}}"
		}
		*/
	};
});

postworld.directive( 'artFeed', function(){
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
});


postworld.controller( 'artFeedCtrl',
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


});

/**
 * Handles the header image classes/styles for the Post Header
 * Such as is used on the Blog
 */
postworld.directive( 'themePostHeader', function( $timeout ){
	return {
		restrict: 'AE',
		scope:{
			themePostHeader:"="
		},
		link: function( $scope, element, attrs ){
			var init = function(settings){
				if( _.isEmpty(settings) )
					return false;
				if( !settings.proportion )
					element.css('height', settings.height+'vh');
				else{
					settings.proportion = String(settings.proportion);
					settings.proportion = settings.proportion.replace('.','_');
					element.addClass('proportion proportion-'+settings.proportion);
				}
			}
			$scope.$watch( 'themePostHeader', function(settings){
				init(settings);
			});
		}
	};
});

/**
 * Places the image in the modal header, if specified.
 * If no image specified, element is hidden.
 */
postworld.directive('themeModalHeaderImage',
	function ( $pw, $_, $log, $pwData ) {
	return {
		restrict: 'A',
		link: function( $scope, element, attrs ){

			var imageId = $pw.options.theme.modals.header.image.attachment_id;
			if( imageId == 0 || imageId == false || imageId == null ){
				$log.debug( 'themeModalHeaderImage : REMOVED' );
				element.remove();
				return false;
			}

			var imagePost = $pwData.findPost( { ID: imageId } );
			$scope.modalHeaderImage = imagePost;
			$log.debug( 'themeModalHeaderImage : imagePost', imagePost );
			$log.debug('themeModalHeaderImage : imageId', imageId );

		}
	};
});
