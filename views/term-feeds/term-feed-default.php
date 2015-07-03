<script>
	postworld.controller( '<?php echo $instance; ?>', [ '$scope', function( $scope ){
		$scope.vars = <?php echo json_encode($vars); ?>;
   		$scope.termFeed = <?php echo json_encode($term_feed); ?>;

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
<div class="term-feed grid pw-shortcode" ng-controller="<?php echo $instance; ?>">
	<div class="terms-row">
		<div class="terms-col" ng-repeat="feedTerm in termFeed">
			<div
				class="feed-term">
				<a ng-href="{{feedTerm.term.url}}">
					<div class="feed-term-posts">
						<div
							class="feed-term-post"
							ng-repeat="post in feedTerm.posts"
							ng-style="backgroundImage( post.image.sizes.thumbnail.url )">
						</div>
					</div>
					<h2>
						{{ feedTerm.term.name }} <span class="number">{{ feedTerm.term.count }}</span>
					</h2>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>