<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// ARCHIVES /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			<h2>
				<i class="pwi-tag"></i>
				Term Archives
			</h2>
			<!-- HEADER -->
			<div class="well">
				<h3>Header Image</h3>
				<label>
					<input type="checkbox" ng-model="pwOptions.archives.taxonomy.header.background_image.show_title">
					Show Image Title
				</label>
				<hr class="thin">
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.archives.taxonomy.header.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
			</div>
		</div>
		
	</div>
</div>