<?php
	global $pw;
	$term_meta = _get( $pw, 'view.term.meta' );
	// Boolean if term has image
	$has_image = !empty($term_meta['image-primary']);
	// Get theme settings for taxonomy archives
	$tax_archives = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'archives.taxonomy' ) )
?>
<script>
	postworld.controller( 'themeTermMetaCtrl',
		[ '$scope', '_', function( $scope, $_ ){
		$scope.termMeta = <?php echo json_encode( $term_meta ); ?>;
	}]);
</script>
<div
	class="archive-head <?php if( $has_image ) echo 'term-has-image' ?>"
	ng-controller="themeTermMetaCtrl"
	pw-ui>
	<div
		class="term-bg"
		<?php if( $has_image ) : ?>
			pw-height="<?php echo $tax_archives['header']['height']['method'] ?>"
			height-value="<?php echo $tax_archives['header']['height']['value'] ?>"
		<?php endif ?>
		>

		<?php if( $has_image ) : ?>
			<div
				pw-parallax
				parallax-depth="1.33"
				pw-smart-image="::termMeta.image_post.image"
				>
			</div>
		<?php endif ?>

		<div class="term-info">
			<h1>
				<?php if( _get( $term_meta, 'icon' ) ) : ?>
					<i class="icon <?php echo $term_meta['icon'] ?>"></i> 
				<?php elseif( $pw['view']['taxonomy']['name'] == 'post_tag' ) : ?>
					<i class="icon pwi-tag" tooltip="tag" tooltip-placement="bottom"></i> 
				<?php endif; ?>
				<a href="<?php echo $pw['view']['term']['url'] ?>">
					<?php echo $pw['view']['term']['name'] ?>
				</a>
			</h1>
		</div>
		
		<?php if( is_desktop() ): ?>
			<!-- SHARE SOCIAL -->
			<div class="share-social">
				<div class="share-social--buttons">
					<?php echo pw_social_share(); ?>
				</div>
			</div>
		<?php endif ?>

		<?php if( _get( $tax_archives, 'header.background_image.show_title' ) ): ?>
			<div class="header-image-title">
				<?php
					$image_link = _get( $term_meta['image_post'], 'link_url' );
					if( empty( $image_link ) )
						$image_link = _get( $term_meta['image_post'], 'post_permalink' );
				?>
				<a
					href="<?php echo $image_link ?>"
					target="_blank"
					class="header-image-title-unit">
					{{termMeta.image_post.post_title}}
				</a>
			</div>
		<?php endif; ?>

	</div>

	<!-- TERM DESCRIPTION -->
	<?php
	$term_description = _get( $pw, 'view.term.description' );
	$term_rich_description = get_term_meta( $pw['view']['term']['term_id'], 'rich_description', true );
	
	if( !empty( $term_rich_description ) )
		$term_description = apply_filters( 'the_content', $term_rich_description);
	
	if( !empty( $term_description ) ) : ?>
		<div class="term-description post-content">
			<?php echo $term_description ?> 
		</div>
	<?php endif; ?>

	<div class="clearfix"></div>

</div>
<div class="clearfix"></div>
