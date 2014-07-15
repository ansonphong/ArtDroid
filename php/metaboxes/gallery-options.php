<img
	style="float:left; margin-right:15px;"
	ng-src="<?php echo get_template_directory_uri(); ?>/images/layouts/galleries/i-gallery-layout-{{ iMeta.galleries.template }}.png">
{{ getSelectedOption('galleries.template').description }}

<hr>

<div ng-show="showView(['horizontal', 'horizontal-inline'])">
	Horizontal
	- Number of pixels on the right before load more images (default: 1500)
	<input type="number" ng-model="iMeta.galleries.x_scroll_distance">
	- Percentage height of the window to size the horizontal scroll gallery
	<input type="number" ng-model="iMeta.galleries.height">
</div>

<div ng-show="showView('vertical')">
	Vertical
	- Number of pixels on the bottom before load more images ( default: 1000 )
	<input type="number" ng-model="iMeta.galleries.y_scroll_distance">
</div>
