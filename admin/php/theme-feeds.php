<div class="row">
	<div class="col-lg-6 pad-col-lg">


		<!--///// FEEDS /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
			<h2><i class="pwi-th-list"></i> Feeds</h2>

			<!-- LOADING ICONS -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-circle-medium"></i></span>
					<?php ___('feeds.settings.loading_icon') ?>
				</h3>
				<?php
					$loading_icon_options = theme_get_loading_icon_options();
					echo pw_select_icon_options(
						array(
							'ng_model' => 'pwOptions.feeds.loading.icon',
							'icons'	=>	$loading_icon_options,
							'icon_spin' => true,
							)); ?>
			</div>

			<!-- SETTINGS -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-gear"></i></span>
					Settings
				</h3>

				<input
					type="number"
					class="short"
					ng-model="pwOptions.feeds.settings.preload">
				preload : <small>number of posts to preload on page load</small>

				<hr class="thin">
				<input
					type="number"
					class="short"
					ng-model="pwOptions.feeds.settings.load_increment">
				load increment : <small>number of posts to load each infinite scroll</small>				
			</div>

		</div>



	</div>
	<div class="col-lg-6 pad-col-lg">
		
	</div>
</div>