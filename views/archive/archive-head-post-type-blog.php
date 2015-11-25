<?php
$blog = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'blog.settings' ) );

$cover_image_id = $blog['cover_image']['attachment_id'];
$has_cover_image = !empty( $cover_image_id );
$wrapper_class = ( $has_cover_image ) ? "has-cover-image" : "";

if( $has_cover_image ):
	$cover_image_post = pw_get_post( $cover_image_id, 'image' );
	?>
<script type="text/javascript">
	postworld.controller('blogCoverImageCtrl', function($scope){
		$scope.blogCoverImage = <?php echo json_encode($cover_image_post); ?>;
	});
</script>
<?php endif ?>

<div class="blog-head-wrapper <?php echo $wrapper_class ?>">
	
	<?php if( $has_cover_image ): ?>
	<div
		ng-controller="blogCoverImageCtrl"
		style="height:35vh; background-size:cover; background-position:center;"
		pw-smart-image="blogCoverImage.image">
		
	</div>
	<?php endif ?>

	<div class="archive-head">
		<?php if( !empty( $blog['title'] ) ) : ?>
			<a href="<?php echo get_post_type_archive_link( _get($pw,'view.post_type.name') ); ?>">
				<h1>
					<?php if( !empty( $blog['icon'] ) ) : ?>
						<i class="icon <?php echo $blog['icon'] ?>"></i>
					<?php endif ?>
					<?php echo $blog['title']?>
				</h1>
			</a>
		<?php endif ?>
		<div class="share-social pull-right">
			<?php echo pw_social_share(); ?>
		</div>
		<div class="pull-right">
			<?php include locate_template( 'views/theme/menu-archive-years.php' ); ?>
		</div>
		<div class="clearfix"></div>
	</div>

</div>