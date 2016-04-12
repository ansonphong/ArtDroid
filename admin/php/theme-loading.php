<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// FEEDS /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
			<h2>
				<i class="pwi-th-list"></i>
				<?php _e( 'Feeds', 'postworld' ) ?>
			</h2>

			<!-- LOADING ICONS -->
			<div class="well">
				<h3>
					<?php _e( 'Loading Icon', 'postworld' ) ?>
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


			<!-- LOAD INCREMENT -->
			<div class="well">
				<h3>
					<?php _e( 'Load Increment', 'postworld' ) ?>
				</h3>
				
				<label>
					<input type="number" class="short" ng-model="pwOptions.feeds.settings.load_increment">
					<b><?php _e('Posts','postworld') ?></b>
					<small>: <?php _e( 'Load this many posts at a time when infinite scrolling.', 'postworld' ) ?></small>
				</label>

			</div>



			

		</div>

	</div>
	<div class="col-lg-6 pad-col-lg">
		

		<!--///// PAGES /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
			<h2>
				<i class="pwi-file"></i>
				<?php _e( 'Site', 'postworld' ) ?>
			</h2>
			<div class="well">
				<h3>
					<?php _e( 'Loading Screen', 'postworld' ) ?>
				</h3>
				
				<label>
					<input type="checkbox" ng-model="pwOptions.loading.show_loading">
					<b><?php _e( 'Show Loading Overlay', 'postworld' ) ?></b>
					<small>: <?php _e( 'Show an overlay spinner on the page while it\'s loading.', 'postworld' ) ?></small>
				</label>

			</div>

		</div>



	</div>
</div>
