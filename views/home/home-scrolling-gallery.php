<?php
$gallery_post_id = pw_grab_option( PW_OPTIONS_THEME, 'home.content.post_id' );
if( !empty($gallery_post_id) ){
	$pw_post = pw_get_post( $gallery_post_id, array(
		'ID',
		'post_title',
		'gallery(ids,posts)',
		) );
}
?>

<script>
	postworld.controller('homeGallery', function($scope,$_){
		$scope.post = <?php echo json_encode($pw_post) ?>;
	});
</script>

<div id="home-gallery" class="post" ng-controller="homeGallery">

	<?php if( !is_mobile() ): ?>
		<!-- HORIZONTAL GALLERY -->
		<div
			pw-include="galleries/gallery-horizontal"
			include-post="post"
			include-enable="true"
			class="full-page-width"></div>
	<?php else: ?>
		<!-- VERTICAL GALLERY -->
		<div
			pw-include="galleries/gallery-vertical"
			include-post="post"
			include-enable="true"
			include-vars="{yScrollContainer:'window'}"
			class=""></div>
	<?php endif ?>

</div>
