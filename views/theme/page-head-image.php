<?php
	global $post;
	$image_instance = pw_random_string();
	$image_proportion = _get( $header_meta, 'image.proportion' );
	if( (bool) $image_proportion )
		$image_proportion = str_replace( '.', '_', (string) $image_proportion );
?>
<script>
	postworld.controller('<?php echo $image_instance ?>', function($scope){
		$scope.headerImage = <?php echo json_encode( pw_get_post( $post->ID, 'image' ) );?>;
	});
</script>
<div ng-controller="<?php echo $image_instance ?>">
	<?php if( !$image_proportion ) : ?>
		<div
			id="header-image"
			style="height:<?php echo $header_meta['image']['height']; ?>vh">
			<div
				pw-smart-image="::headerImage.image"
				pw-parallax
				parallax-depth="1.5">
			</div>
		</div>
	<?php else: ?>
		<div
			id="header-image"
			class="proportion proportion-<?php echo $image_proportion ?>">
			<div
				pw-smart-image="::headerImage.image"
				pw-parallax
				parallax-depth="1.5"
				parallax-median="proportional">
			</div>
		</div>
	<?php endif ?>
</div>