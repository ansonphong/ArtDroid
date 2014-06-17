<div ng-controller="iMetaboxHeaderCtrl">
	
	<h2 class="left">Header</h2>

	<div class="btn-group">
		<label class="btn" ng-model="iMeta.header.type" btn-radio="'default'">Default Image</label>
		<label class="btn" ng-model="iMeta.header.type" btn-radio="'featured_image'">Featured Image</label>
		<label class="btn" ng-model="iMeta.header.type" btn-radio="'slider'">Slider</label>
	</div>

	<div ng-show="iMeta.header.type == 'slider'">
		<div class="well">
			<h3>Slider Options</h3>
			<?php include 'slider-options.php'; ?>
		</div>
	</div>

</div>