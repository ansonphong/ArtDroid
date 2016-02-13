<?php // Filter $vars with : add_filter( PW_TERM_FEED . 'term-feed-list', 'function' ); ?>
<script>
	postworld.controller( '<?php echo $instance; ?>',
		function( $scope, $pw, $_, $log ){

		$scope.vars = <?php echo json_encode($vars); ?>;
   		$scope.termFeed = <?php echo json_encode($term_feed); ?>;

   		$scope.rootTerms = function(){
   			var rootTerms = $_.deepWhere( $scope.termFeed, 'term.parent', '0' );
   			$log.debug( 'ROOT TERMS : ', rootTerms )
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

	});
</script>

<div class="term-feed list pw-shortcode" ng-controller="<?php echo $instance; ?>" ng-cloak>
	<div ng-repeat="feedTerm in ::rootTerms()">
		<a ng-href="{{ ::feedTerm.term.url }}">
			<div
				ng-class="::termClass(feedTerm)"
				class="feed-term">
			
				<div class="overlay"></div>
				<div class="feed-term-posts">
					<div
						class="feed-term-post"
						ng-repeat="post in ::feedTerm.posts"
						pw-smart-image="::post.image">
					</div>
				</div>
				<h2>
					{{ ::feedTerm.term.name }}
				</h2>
				<span class="number">{{ ::feedTerm.term.count }}</span>
			</div>
		</a>
			<div
				class="sub-term"
				ng-class="::termClass( subTerm )"
				ng-repeat="subTerm in ::subTerms( feedTerm.term.term_id )">
				<span class="number">{{ ::subTerm.term.count }}</span>
				<a
					ng-href="{{ ::subTerm.term.url }}">
					{{ ::subTerm.term.name }}
				</a>
			</div>
	</div>
</div>
<div class="clearfix"></div>