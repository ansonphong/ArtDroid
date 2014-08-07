<table>
	<tr>
		<td valign="top">
			<img
				style="float:left; margin-right:15px;"
				ng-src="<?php echo get_template_directory_uri(); ?>/images/layouts/galleries/i-gallery-layout-{{ iMeta.gallery.template }}.png">
		</td>
		<td>
			{{ getSelectedOption('gallery.template').description }}
			
			<!-- X SCROLL OPTIONS -->
			<div ng-show="showView('horizontal')">
				<hr>
				<span class="icon-md"><i class="icon-long-arrow-right"></i></span>
				<input type="text" size="4" ng-model="iMeta.gallery.x_scroll_distance" id="horizontal-scroll-distance">
				<label for="horizontal-scroll-distance"><b>horizontal scroll distance</b></label>
				<small> - Number of pixels on the right before load more images <i>(default: 1500)</i></small>
				<hr>
				<span class="icon-md"><i class="icon-resize-vertical"></i></span>
				<input type="text" size="3" ng-model="iMeta.gallery.height" id="gallery-height">
				<label for="gallery-height"><b>% height</b></label>
				<small> - Percentage height of the window to size the horizontal scroll gallery</small>
				<!--
				- Include the Featured Image as the first image in the gallery (default : false)
				-->
			</div>

			<!-- Y SCROLL OPTIONS -->
			<div ng-show="showView('vertical')">
				<hr>
				<span class="icon-md"><i class="icon-long-arrow-down"></i></span>
				<input type="text" size="4" ng-model="iMeta.gallery.y_scroll_distance" id="vertical-scroll-distance">
				<label for="vertical-scroll-distance"><b>vertical scroll distance</b></label>
				<small> - Number of pixels on the bottom before load more images <i>(default: 1000)</i></small>
				<hr>
				<span class="icon-md"><i class="icon-resize-horizontal"></i></span>
				<input type="text" size="3" ng-model="iMeta.gallery.width" id="gallery-width">
				<label for="gallery-width"><b>% width</b></label>
				<small> - Percentage width of the window to size the vertical scroll gallery</small>
				
			</div>

		</td>
	</tr>	
</table>

