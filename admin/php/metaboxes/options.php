<?php
	global $pw;
	global $post;
	$pwInject = $pw['inject'];
?>
<div ng-controller="pwMetaboxOptionsCtrl" class="postworld pw-metabox pw-cloak">
	<table>

		<?php if( $post->post_type == 'blog' && 1 == 0 ): ?>
			BLOG
		<?php endif ?>

		<?php if( $post->post_type == 'page' ): ?>
			<!-- HEADER -->
			<tr>
				<th class="label" valign="top">
					Header
				</th>
				<td>
					<div class="btn-group">
						<label
							ng-repeat="type in options.header.type"
							class="btn"
							ng-model="pwMeta.header.type"
							uib-btn-radio="type.slug">
							{{ type.name }}
						</label>
					</div>
					
					<!-- FEATURED IMAGE -->
					<div ng-show="pwMeta.header.type == 'featured_image'">
						<div class="well">
							<h3>Featured Image Options</h3>
							<?php
								echo pw_select_setting(array(
									'setting' => 'height',
									'ng_model' => 'pwMeta.header.featured_image.height',
									'methods' => array('window-base','window-percent','pixels','proportion'),
									));
							?>
						</div>
					</div>

					<!-- SLIDER -->
					<div ng-show="pwMeta.header.type == 'slider'">
						<div class="well">
							<h3>Slider Options</h3>
							<?php echo pw_admin_slider_options( array( 'ng_model' => 'pwMeta.header.slider' ) ); ?>
						</div>
					</div>
					<hr class="thin">
				</td>
			</tr>
		<?php endif; ?>

		<!-- GALLERIES -->
		<tr>
			<th class="label" valign="top">
				Galleries
			</th>
			<td>
				<?php echo pw_gallery_options( theme_gallery_options() ); ?>

				<hr class="thin">

			</td>
		</tr>
		<!-- POST CONTENT -->
		<tr>
			<th class="label" valign="top">
				Post Content
			</th>
			<td>
				<?php echo pw_content_columns_option( array( 'context' => 'postAdmin' ) ); ?>
				<hr class="thin">
			</td>
		</tr>

		<?php if( $post->post_type == 'post' ): ?>
			<!-- LINK URL -->
			<tr>
				<th class="label" valign="top">
					Link Label
				</th>
				<td>
					<?php echo pw_link_url_options( array(
						'context' => 'postAdmin',
						'show_options' => array( 'icon', 'label', 'new_target' ),
						)); ?>
					<hr class="thin">
				</td>
			</tr>
			<!-- DOWNLOAD IMAGE -->
			<tr>
				<th class="label" valign="top">
					Download Image
				</th>
				<td>
					<?php echo pw_download_image_option( array( 'context' => 'postAdmin' ) ); ?>
					<hr class="thin">
				</td>
			</tr>
		<?php endif ?>


		<!-- ICON -->
		<tr>
			<th class="label" valign="top">
				Icon
			</th>
			<td>
				<?php echo pw_select_icon_options( array( 'ng_model' => 'pwMeta.icon.class' ) ); ?>
			</td>
		</tr>

	</table>
	<!-- DEV 
	<hr><hr>
	<pre>{{ pwMeta | json }}</pre>
	-->
</div>