<!-- POSTWORLD INLINE GALLERY : <?php echo $vars['instance']; ?> -->
<?php
	/** 
	 * Include Javascript definitions
	 * Various methods of including the data are done differently
	 * Depending on which context they appear in.
	 */
	// Shown in Modal Window / Dynamically
	if( (defined( 'JSON_REQUEST' ) && JSON_REQUEST) ||
		(defined( 'DOING_AJAX' ) && DOING_AJAX) )
		echo pw_ob_include_template( 'views/galleries/gallery-inline-scripts.php', $vars );
	// Shown on static single pages
	else
		pw_ob_footer_script( 'views/galleries/gallery-inline-scripts.php', $vars );
?>

<div
	class="pw-gallery-shortcode"
	ng-cloak
	ng-controller="<?php echo $vars['instance']; ?>">
	<masonry
		column-width=".grid-width-controller"
		masonry-options='{ "gutter": 0, "transitionDuration":0 }'
		class="grid-columns-<?php echo $vars['columns']; ?>">
		<div
			pw-grid
			pw-modal-access>
			<div class="grid-width-controller"></div>
			<div
				class="gallery-post masonry-brick"
				ng-repeat="galleryPost in feed.posts"
				ng-class="setGridClass( galleryPost.image.tags )"
				ng-click="openModal({ mode:'feed', post:galleryPost })">

				<div class="overlay">
					<h2>{{ galleryPost.post_title }}</h2>
				</div>

				<div
					class="gallery-image"
					pw-smart-image="::galleryPost.image"
					smart-image-dynamic>
				</div>
			</div>
		</div>
	</masonry>
</div>
