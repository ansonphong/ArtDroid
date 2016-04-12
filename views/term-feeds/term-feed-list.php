<?php
pw_print_ng_controller(array(
	'controller' => $instance,
	'vars' => array(
		'termFeed' => $term_feed
		),
	));
?>

<div
	theme-term-feed
	ng-controller="<?php echo $instance; ?>"
	class="term-feed term-feed--list pw-shortcode"
	ng-cloak>
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