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

	<!-- DEV -->
	<pre>{{ iMeta | json }}</pre>

</div>