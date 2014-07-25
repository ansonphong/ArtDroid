<script>
	postworld.controller( '<?php echo $instance; ?>', [ '$scope', function( $scope ){
		$scope.vars = <?php echo json_encode($vars); ?>;
   		$scope.termsFeed = <?php echo json_encode($terms_feed); ?>;

   		///// IMAGE FUNCTIONS /////
		$scope.backgroundImage = function( imageUrl, properties ){

			// Set the Image URL
			//var imageUrl = $scope.post.image[imageHandle].url;
			var style = { 'background-image': "url(" + imageUrl + ")" };

			// Add additional properties
			if( !_.isUndefined( properties ) ){
				angular.forEach( properties, function(value, key){
					style[key] = value;
				});
			}
			return style;
		}

	}]);
</script>

<div class="terms-feed pw-shortcode" ng-controller="<?php echo $instance; ?>">

	<div
		class="feed-term"
		ng-repeat="feedTerm in termsFeed">

		<div class="feed-term-posts">
			<div
				class="feed-term-post"
				ng-repeat="post in feedTerm.posts"
				ng-style="backgroundImage( post.image.sizes.thumbnail.url )">
			</div>
		</div>
		

		<a ng-href="{{feedTerm.term.url}}">
			<h2>
				{{ feedTerm.term.name }} <span class="number">{{ feedTerm.term.count }}</span>
			</h2>
		</a>
		
	</div>
</div>

<div class="clearfix"></div>
<hr>