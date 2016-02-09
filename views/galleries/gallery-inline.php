<!-- POSTWORLD INLINE GALLERY : <?php echo $vars['instance']; ?> -->
<script>
	postworld.controller( '<?php echo $vars['instance']; ?>',
		[ '$scope', '$_', '$pw', 'pwImages', 'pwPosts', 'pwModal', 'pwData',
		function( $scope, $_, $pw, $pwImages, $pwPosts, $pwModal, $pwData ){
		var instance = "<?php echo $vars['instance']; ?>";
		var galleryInstance = "gallery-" + instance;
		var galleryPosts = <?php echo json_encode( $vars['posts'] ); ?>;
		$pwData.insertFeed( galleryInstance, { posts: galleryPosts } );
		$scope.feed = $pwData.getFeed( galleryInstance );
	}]);
	pwRegisterController( "<?php echo $vars['instance']; ?>" );
</script>

<div
	class="pw-gallery-shortcode"
	ng-cloak
	ng-controller="<?php echo $vars['instance']; ?>">
	<masonry
		column-width=".grid-width-controller"
		masonry-options='{ "gutter": 0, "transitionDuration":0 }'
		class="grid-columns-<?php echo $vars['columns']; ?>">
		<div
			pw-grid
			pw-modal-access>
			<div class="grid-width-controller"></div>
			<div
				class="gallery-post masonry-brick"
				ng-repeat="galleryPost in feed.posts"
				ng-class="setGridClass( galleryPost.image.tags )"
				ng-click="openModal({ mode:'feed', post:galleryPost })">

				<div class="overlay">
					<h2>{{ galleryPost.post_title }}</h2>
				</div>

				<div
					class="gallery-image"
					pw-smart-image="::galleryPost.image">
				</div>
			</div>
		</div>
	</masonry>
</div>