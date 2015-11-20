<?php
	global $post;
	$image_instance = pw_random_string();
	$image_proportion = _get( $pw_meta_header, 'image.proportion' );
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
			style="height:<?php echo $pw_meta_header['image']['height']; ?>vh"
			pw-smart-image="::headerImage.image">
		</div>
	<?php else: ?>
		<div
			id="header-image"
			class="proportion proportion-<?php echo $image_proportion ?>"
			pw-smart-image="::headerImage.image">
		</div>
	<?php endif ?>
</div>