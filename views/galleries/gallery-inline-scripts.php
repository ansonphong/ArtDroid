<script>
	postworld.controller( '<?php echo $vars['instance']; ?>', function( $scope, $pwData ){
		var galleryInstance = "gallery-<?php echo $vars['instance']; ?>";
		var galleryPosts = <?php echo json_encode( $vars['posts'] ); ?>;
		$pwData.insertFeed( galleryInstance, { posts: galleryPosts } );
		$scope.feed = $pwData.getFeed( galleryInstance );
	});
	pwRegisterController( "<?php echo $vars['instance']; ?>" );
</script>