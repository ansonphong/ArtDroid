<?php
	global $post;
	$pw_post = pw_get_post($post->ID, array(
		'ID',
		'post_title',
		'post_meta(pw_meta)',
		'parent_post(preview)',
		));
	$icon_class = _get( $pw_post, 'post_meta.pw_meta.icon.class' );
	$image_instance = pw_random_string();
?>
<script>
	postworld.controller('<?php echo $image_instance ?>', function($scope){
		$scope.headerImage = <?php echo json_encode( pw_get_post( $post->ID, 'image' ) );?>;
	});
</script>
<div class="page-head page-head--featured-image" ng-controller="<?php echo $image_instance ?>">
	<div
		id="header-image"
		class="theme-header"
		pw-height="<?php echo $header_meta['featured_image']['height']['method']; ?>"
		height-value="<?php echo $header_meta['featured_image']['height']['value']; ?>">
		<div class="gradient-overlay">
			
		</div>
		<div
			pw-smart-image="::headerImage.image"
			pw-parallax
			parallax-depth="1.5">
		</div>
		<div class="data-overlay pad-x-lg">
			<?php if( !empty( $pw_post['parent_post'] ) ) : ?>
				<h3 class="parent-title">
					<a href="<?php echo $pw_post['parent_post']['post_permalink'] ?>">
						<?php echo $pw_post['parent_post']['post_title'] ?>
						›
					</a>
				</h3>
			<?php endif ?>
			<h1 class="post-title">
				<?php if( !empty( $icon_class ) ): ?>
					<i class="icon <?php echo $icon_class ?>"></i>
				<?php endif ?>
				<?php echo $pw_post['post_title'] ?>
			</h1>
		</div>
	</div>
</div>