<?php
	global $pw;
	$pwInject = $pw['inject'];
?>
<div ng-controller="iMetaboxOptionsCtrl" class="pw-metabox">

	<!-- HEADER -->
	<div class="option-title">Header</div>
	<div class="btn-group">
		<label
			ng-repeat="type in options.header.type"
			class="btn" ng-model="iMeta.header.type" btn-radio="type.slug">
			{{ type.name }}
		</label>
	</div>
	
	<!-- FEATURED IMAGE -->
	<div ng-show="iMeta.header.type == 'featured_image'">
		<div class="well">
			<h3>Featured Image Options</h3>
			<?php echo i_select_featured_image_options( array( 'ng_model' => 'iMeta.header.image' ) ); ?>
		</div>
	</div>

	<!-- SLIDER -->
	<div ng-show="iMeta.header.type == 'slider'">
		<div class="well">
			<h3>Slider Options</h3>
			<?php echo i_admin_slider_options(); ?>
		</div>
	</div>
	<hr>

	<!-- GALLERIES -->
	<div class="option-title">Galleries</div>
	<?php echo i_gallery_options( array( 'context' => 'postAdmin' ) ); ?>
	<div style="clear:both"></div>
	<hr>

	<!-- POST CONTENT -->
	<div class="option-title">Post Content</div>
	<?php echo i_content_columns_option( array( 'context' => 'postAdmin' ) ); ?>
	<div style="clear:both"></div>
	<hr>

	<!-- LINK URL -->
	<div class="option-title">Link Label</div>
	<?php echo i_link_url_options( array( 'context' => 'postAdmin' ) ); ?>
	<div style="clear:both"></div>
	<hr>

	<!-- DOWNLOAD IMAGE -->
	<?php echo i_download_image_option( array( 'context' => 'postAdmin' ) ); ?>
	<div style="clear:both"></div>
	<hr>

	<!-- ICON -->
	<div class="option-title">Icon</div>
	<?php echo i_select_icon_options( array( 'ng_model' => 'iMeta.icon.class' ) ); ?>
	<div style="clear:both"></div>
	<hr>
	
	<!-- DEV 
	<hr><hr>
	<pre>{{ iMeta | json }}</pre>
	-->
	
</div>