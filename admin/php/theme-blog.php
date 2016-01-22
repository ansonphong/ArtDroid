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

			<div ng-show="pwOptions.blog.enable">
				
				<div class="well">
					<h3>
						<span class="icon-md"><i class="pwi-globe-o"></i></span>
						URL Base
					</h3>
					<i><?php echo get_site_url(); ?></i>/<input type="text" ng-model="pwOptions.blog.settings.post_type.base">
					<a ng-href="<?php echo get_site_url(); ?>/{{pwOptions.blog.settings.post_type.base}}" target="_blank">
						Check it out <i class="icon pwi-external-link"></i>
					</a>
					<br>
					<small>The base url for blog posts. Changing this may cause offsite links to break.</small>
				</div>

				<div class="well">
					<h3>
						<span class="icon-md"><i class="pwi-triangle-down-medium"></i></span>
						Names
					</h3>

					<input type="text" ng-model="pwOptions.blog.settings.post_type.name">
					<b>name</b>
					<small>: Alternatives to blog might be 'Journal', 'News', 'Current Events'</small>
					<hr class="thin">

					<input type="text" ng-model="pwOptions.blog.settings.post_type.item_name">
					<b>item name</b>
					<small>: The name of one {{pwOptions.blog.settings.post_type.name}} entry.</small>
					<hr class="thin">

					<input type="text" ng-model="pwOptions.blog.settings.post_type.item_name_plural">
					<b>item name plural</b>
					<small>: The name of multiple {{pwOptions.blog.settings.post_type.name}} entries.</small>
					<hr class="thin">

				</div>

				<div class="well">
					<h3>
						<span class="icon-md"><i class="pwi-th"></i></span>
						Feed
					</h3>

					<input type="number" ng-model="pwOptions.blog.settings.feed.preload" class="short">
					<b>preload</b><small>: Number of {{pwOptions.blog.settings.post_type.name}} posts to preload.</small>
					<hr class="thin">

					<input type="number" ng-model="pwOptions.blog.settings.feed.load_increment" class="short">
					<b>scroll increment</b><small>: Number of {{pwOptions.blog.settings.post_type.name}} posts to load on each infinite scroll.</small>
					
				</div>

				<div class="well">
					<h3>
						<span class="icon-md"><i class="pwi-image"></i></span>
						Header Image
					</h3>

					<?php
						echo pw_select_setting(array(
							'setting' => 'height',
							'ng_model' => 'pwOptions.blog.settings.views.full.header.height',
							'methods' => array('window-percent','pixels','proportion'),
							));
						?>
					
				</div>

				<hr class="thin">

			</div>

		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
		
		<div class="well" ng-show="pwOptions.blog.enable">
			<h3>
				<span class="icon-md"><i class="pwi-cube-o"></i></span>
				{{ pwOptions.blog.settings.post_type.name }}
				<?php _ex('Main Page', 'main page of the blog', 'postworld') ?>
			</h3>

			<label>
				<input type="checkbox" ng-model="pwOptions.blog.settings.main_page.show_header">
				<b><?php _ex('Show header', 'header of the blog', 'postworld') ?></b>
				<small>: <?php _ex('Show a header above the main blog page', 'self-explanitory', 'postworld') ?></small>
			</label>

			<div class="well" ng-show="pwOptions.blog.settings.main_page.show_header">
				<h3>
					<span class="icon-md"><i class="pwi-image"></i></span>
					<?php _ex('Main Page Header', 'settings heading', 'postworld') ?>
				</h3>
				
				<?php
					echo pw_select_image_id( array( 
						'ng_model'		=>	'pwOptions.blog.settings.main_page.cover_image.attachment_id',
						'slug'			=>	'blog_cover_image',
						'label'			=>	'Cover Image',
						'width'			=>	'400px',
					 	));?>
				<hr class="thin">

				<?php
					echo pw_select_icon_options(
						array(
							'ng_model' => 'pwOptions.blog.settings.main_page.icon',
							)); ?>
				<hr class="thin">

				<input type="text" ng-model="pwOptions.blog.settings.main_page.title">
				<b><?php _ex('title', 'title of the blog', 'postworld') ?></b>
				<small>: <?php _ex('The title of your blog', 'self-explanitory', 'postworld') ?></small>
				<hr class="thin">

				<input type="text" ng-model="pwOptions.blog.settings.main_page.subtitle">
				<b><?php _ex('subtitle','postworld') ?></b>
				<small>: <?php _ex('The subtitle of your blog', 'self-explanitory', 'postworld') ?></small>
				<hr class="thin">

				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.blog.settings.main_page.header.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>


			</div>
		</div>

	</div>

</div>