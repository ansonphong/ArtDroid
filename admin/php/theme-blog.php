<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions', array('flush_permalinks')); ?></div>
			<label>
				<input type="checkbox" ng-model="pwOptions.blog.enable">
				<b>Enable Blog</b>
				<small>
					: Enables 'blog' post type which allows the blog to be a seperate stream from the normal posts.
				</small>
			</label>

			<div
				class="well"
				ng-show="pwOptions.blog.enable">
				
				<b>URL base</b>
				<small>: The base url for blog posts. Changing this may cause offsite links to break.</small>
				<br>
				<i><?php echo get_site_url(); ?></i>/<input type="text" ng-model="pwOptions.blog.settings.base">

				<hr class="thin">

				<input type="number" ng-model="pwOptions.blog.settings.feed.preload" class="short">
				<b>preload</b><small>: Number of blog posts to preload.</small>

				<hr class="thin">

				<input type="number" ng-model="pwOptions.blog.settings.feed.load_increment" class="short">
				<b>scroll increment</b><small>: Number of blog posts to load on each infinite scroll.</small>

				<hr class="thin">

				<select
					pw-feed-options
					ng-model="pwOptions.blog.settings.feed.view.current"
					ng-options="value for value in feedOptions.view">
				</select>

				<b>view</b>
				<small>: How to display the blog feed.</small>

			</div>

		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
		
	</div>
</div>