<?php
	global $pw;
	global $post;
	$pwInject = $pw['inject'];
?>
<div ng-controller="pwMetaboxOptionsCtrl" class="pw-metabox">

	<table>

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
							class="btn" ng-model="pwMeta.header.type" btn-radio="type.slug">
							{{ type.name }}
						</label>
					</div>
					
					<!-- FEATURED IMAGE -->
					<div ng-show="pwMeta.header.type == 'featured_image'">
						<div class="well">
							<h3>Featured Image Options</h3>
							<?php echo i_select_featured_image_options( array( 'ng_model' => 'pwMeta.header.image' ) ); ?>
						</div>
					</div>

					<!-- SLIDER -->
					<div ng-show="pwMeta.header.type == 'slider'">
						<div class="well">
							<h3>Slider Options</h3>
							<?php echo i_admin_slider_options(); ?>
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
				<?php echo pw_gallery_options( array( 'context' => 'postAdmin' ) ); ?>
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
		<!-- LINK URL -->
		<tr>
			<th class="label" valign="top">
				Link Label
			</th>
			<td>
				<?php echo pw_link_url_options( array( 'context' => 'postAdmin' ) ); ?>
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