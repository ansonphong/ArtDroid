<?php
global $pw;
extract($vars);

$theme_print_post = $post;
unset($theme_print_post['post_content']);

pw_print_ng_controller(array(
	'controller' => 'singlePost',
	'vars' => array(
		'post' => $theme_print_post
		),
	));
?>

<div pw-globals="pw">
<article
	ng-controller="singlePost"
	pw-post
	art-post
	pw-modal-access
	class="post <?php echo $post_class ?> view-full"
	pw-ui
	ng-cloak
	pw-device-class>

	<?php if( $post['post_type'] == 'post' ): ?>
		<?php if( _get( $theme_options, 'colors.views.single.dynamic_colors' ) ): ?>
			<style
				pw-style-colors="colorStyles"
				color-profiles="post.image.colors">
			</style>
		<?php endif ?>
	<?php endif ?>

	<?php if( $gallery_template == 'frame' ): ?>
		<!-- FRAME GALLERY -->
		<div
			pw-include="galleries/gallery-frame"
			include-post="post"
			include-vars="{keybind:showView('galleryFrame')}"
			ng-show="::showView('galleryFrame')"
			class="full-page-width">
		</div>
	<?php endif ?>

	<?php if( $gallery_template == 'horizontal' ): ?>
		<!-- HORIZONTAL GALLERY -->
		<div
			pw-include="galleries/gallery-horizontal"
			include-post="post"
			include-enable="::showView('galleryHorizontal')"
			class="full-page-width"></div>
	<?php endif ?>

	<div class="clearfix"></div>


	<?php if( !$immersive_gallery ): ?>

		<?php if( !empty( $post['link_url'] ) ): ?>
			<!-- EMBED -->
			<div
				class="media-viewer"
				pw-height="<?php echo _get($pw,'options.theme.posts.embeds.height.method') ?>"
				height-value="<?php echo _get($pw,'options.theme.posts.embeds.height.value') ?>"
				ng-show="::showView('singleEmbed')">
				<div class="view-embed">
					<div
						class="o-embed"
						o-embed="<?php echo $post['link_url'] ?>"
						embed-run="::showView('singleEmbed')">
					</div>
				</div>
			</div>
		<?php endif ?>


		<?php if( in_array( $post['post_type'], array('post','attachment') ) ): ?>
		
			<!-- IMAGE -->
			<div
				class="media-viewer post-image full-page-width"
				ng-class="imageFormat(post)"

				pw-height="<?php echo _get($pw,'options.theme.posts.embeds.height.method') ?>"
				height-value="<?php echo _get($pw,'options.theme.posts.embeds.height.value') ?>"

				ng-show="::showView('singleImage')"
				pw-x-scroll-status>

				<?php if( $post['post_type'] === 'post' ): ?>
					<!-- SHOW DYNAMIC SIZE FOR POSTS -->
					<div
						ng-show="imageFormat(post) == 'standard'"
						class="view-image"
						pw-smart-image="post.image"
						smart-image-dynamic>
					</div>
					<!-- SCROLL INDICATOR -->
					<div
						class="scroll-indicator"
						pw-device-class>
						<div class="message-scroll">
							<span class="text">Scroll</span>
							<i class="icon pwi-arrow-right-thin"></i>
						</div>
						<div class="message-slide">
							<i class="icon pwi-arrow-left-thin"></i>
							<span class="text">Slide</span>
						</div>
					</div>
					<img
						ng-show="imageFormat(post) == 'panorama'"
						class="view-image"
						pw-smart-image="post.image"
						smart-image-dynamic>
				<?php endif ?>

				<?php if( $post['post_type'] === 'attachment' ): ?>
					<!-- SHOW FULL SIZE IMAGE FOR ATTACHMENTS -->
					<div
						class="view-image"
						pw-background-image="post.image.sizes.full.url">
					</div>
				<?php endif ?>

			</div>

		<?php endif ?>

		<?php if( $post['post_type'] === 'blog' ): ?>
			<div
				pw-include="panels/featured-image--slice"
				include-vars="{themeOptions:pw.options.theme,postImage:post.image}"
				include-enable="::showView('fiDisplay--slice')">
			</div>
			<div
				pw-include="panels/featured-image--full"
				include-vars="{themeOptions:pw.options.theme,postImage:post.image}"
				include-enable="::showView('fiDisplay--full')">
			</div>
		<?php endif ?>

		<?php
			/**
			 * Do not show the header on pages which are set to 'featured image'
			 * as they already display a header.
			 */
			$is_page_header_image = ( $header_meta['type'] === 'featured_image' && $post['post_type'] === 'page' );

			// Boolean, whether the header is switched off.
			$header_type_none = ($header_meta['type'] == 'none');

			// Conditionally Show the header
			if( !$is_page_header_image && !$header_type_none ):
				include 'post-single--header.php';
			endif;
		?>

		<?php if( !empty($post['post_content']) ): ?>
			<!-- CONTENT -->
			<div class="post-content pad-x-lg columns-<?php echo _get($post,'post_meta.pw_meta.post_content.columns') ?>">
				<?php echo $post['post_content'] ?>
				<div class="clearfix"></div>
			</div>
		<?php else: ?>
			<?php if( !empty($post['post_excerpt']) ): ?>
				<!-- CONTENT FROM EXCERPT -->
				<div class="post-content pad-x-lg columns-<?php echo _get($post,'post_meta.pw_meta.post_content.columns') ?>">
					<?php echo $post['post_excerpt'] ?>
				</div>
			<?php endif ?>
		<?php endif ?>

	<?php endif ?>


	<?php if( $gallery_template == 'vertical' ): ?>
		<!-- VERTICAL GALLERY -->
		<div
			pw-include="galleries/gallery-vertical"
			include-post="post"
			include-enable="::showView('galleryVertical')"
			include-vars="{yScrollContainer:'window'}"
			class=""></div>
	<?php endif ?>

	<?php if( !$immersive_gallery ): ?>


		<?php if( $device['is_mobile'] ): ?>
			<?php if( $post['post_type'] !== 'page' ): ?>
				<?php if( !empty( $post['taxonomy']['post_tag'] ) ): ?>
					<div class="taxonomy-footer pad-x-lg">
						<!-- TAGS -->
						<div class="taxonomy tags">
							<i class="icon pwi-tags"></i>
							<span ng-repeat="term in post.taxonomy.post_tag">
							    <a pw-href="term.url" class="term tag">
									<span ng-bind="::term.name"></span>
								</a>
							</span>
							<div class="clearfix"></div>
							<div class="space-4"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endif ?>
			<?php endif ?>
		<?php endif ?>

		<?php include 'post-single--social-footer.php' ?>

		<?php if( $wordpress_comments_enabled ): ?>
			<div class="comments-wordpress pad-x-lg">
				<?php comments_template( '/comments.php', false ) ?>
			</div>
		<?php endif ?>

		<?php if( !$device['is_mobile'] ): ?>
			<?php if( $post['post_type'] !== 'page' ): ?>
				<?php if( !empty($comments_thirdparty) ): ?>
					<div class="comments-thirdparty pad-x-lg">
						<?php echo $comments_thirdparty ?>
					</div>
				<?php endif ?>
			<?php endif ?>
		<?php endif ?>

	<?php endif ?>

</article>
</div>