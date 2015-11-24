<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// COLORS /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<i class="pwi-brush"></i>
				Colors
			</h2>
			<!-- DYNAMIC COLORS -->
			<div class="well">
				<h3>
					Dynamic Colors
				</h3>
				<small>
					Dynamic colors use the colors of the post's featured image to color the post styles.
				</small>
				<hr class="thin">
				<label>
					<input type="checkbox" ng-model="pwOptions.colors.views.single.dynamic_colors">
					<b>Single Posts</b>
					<small>Use dynamic colors when viewing single posts.</small>
				</label>
				<hr class="thin">
				<label>
					<input type="checkbox" ng-model="pwOptions.colors.views.grid.dynamic_colors">
					<b>Grid Feeds</b>
					<small>Use dynamic colors when viewing grid feed.</small>
				</label>
			</div>
		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
		
	</div>
</div>

