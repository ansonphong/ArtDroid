<?php
global $post;
$pw_post = pw_get_post($post->ID, array(
	'ID',
	'post_title',
	'post_meta('.PW_POSTMETA_KEY.')',
	'parent_post(preview)',
	));
$icon_class = _get( $pw_post, 'post_meta.'.PW_POSTMETA_KEY.'.icon.class' );
$image_instance = pw_random_string();

pw_print_ng_controller(array(
	'controller' => $image_instance,
	'vars' => array(
		'headerImage' => pw_get_post( $post->ID, 'image' )
		),
	));
?>

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
						&rsaquo;
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