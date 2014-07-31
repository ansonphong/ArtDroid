<?php
	global $pw;
	$pwInject = $pw['inject'];
?>

<div ng-controller="iMetaboxOptionsCtrl">
	
	<?php
		if( is_home() )
			echo "IS HOME";
	?>

	<!-- HEADER -->
	<h2 class="left"><b>Header</b></h2>
	<div class="btn-group">
		<label
			ng-repeat="type in options.header.type"
			class="btn" ng-model="iMeta.header.type" btn-radio="type.slug">
			{{ type.name }}
		</label>
	</div>
	
	<div ng-show="iMeta.header.type == 'featured_image'">
		<div class="well">
			<h3>Featured Image Options</h3>
			<?php echo i_select_featured_image_options( array( 'ng_model' => 'iMeta.header.image' ) ); ?>
		</div>
	</div>

	<div ng-show="iMeta.header.type == 'slider'">
		<div class="well">
			<h3>Slider Options</h3>
			<?php echo i_admin_slider_options(); ?>
		</div>
	</div>
	<hr>

	<!-- GALLERIES -->
	<h2 class="left"><b>Galleries</b></h2>
	<div class="btn-group">
		<label
			ng-repeat="template in options.gallery.template"
			class="btn" ng-model="iMeta.gallery.template" btn-radio="template.slug">
			{{ template.name }}
		</label>
	</div>
	<div class="well">
		<h3>Gallery Options</h3>
		<?php include 'options-gallery.php'; ?>
		<div style="clear:both;"></div>
	</div>
	<hr>


	<!-- POST CONTENT -->
	<h2 class="left"><b>Post Content</b></h2>
	<div class="btn-group">
		<label
			ng-repeat="option in options.post_content.columns"
			class="btn" ng-model="iMeta.post_content.columns" btn-radio="option.value">
			{{ option.name }}
		</label>
	</div>
	<hr>

	<!-- ICON -->
	<h2 class="left"><b>Icon</b></h2>
	<div class="btn-group btn-lg">
		<label
			class="btn" ng-model="iMeta.icon.class" btn-radio="''">
			None
		</label>

		<?php ///// ICON X /////
		if( in_array( 'icon-x', $pwInject ) ){ ?>
			<label
				ng-repeat="option in options.icon.iconx"
				class="btn" ng-model="iMeta.icon.class" btn-radio="option.class">
				<i class="{{ option.class }}"></i>
			</label>
		<?php } ?>

		<?php ///// GLYPICONS /////
		if( in_array( 'glyphicons-halflings', $pwInject ) ){ ?>
			<label
				ng-repeat="option in options.icon.glyphicons"
				class="btn" ng-model="iMeta.icon.class" btn-radio="option.class">
				<i class="{{ option.class }}"></i>
			</label>
		<?php } ?>


	</div>
	<hr>


	<!-- DEV -->
	<hr>
	<pre>{{ iMeta | json }}</pre>

</div>