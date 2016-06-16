<?php
pw_print_ng_controller(array(
		'controller' => $vars['instance'],
		'vars' => array(
			'termFeed' => $term_feed,
			),
		));
?>
<div class="term-feed term-feed--grid pw-shortcode" ng-controller="<?php echo $instance; ?>">
	<div class="terms-row">
		<div class="terms-col" ng-repeat="feedTerm in termFeed">
			<div
				class="feed-term">
				<a ng-href="{{feedTerm.term.url}}">
					<div class="feed-term-posts">
						<div class="gradient-overlay"></div>
						<div
							class="feed-term-post"
							ng-repeat="post in feedTerm.posts"
							pw-smart-image="::post.image">
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