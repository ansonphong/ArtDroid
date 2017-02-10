<div class="row">
	<div class="col-lg-6 pad-col-lg">

		<!--///// POSTS /////-->
		<div class="well">
			
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
			
			<h2>
				<i class="pwi-pushpin"></i>
				Posts
			</h2>

			<!-- COLUMNS -->
			<div class="well">
				<small>New posts will be created with default: </small>
				<hr class="thin">
				<?php echo pw_content_columns_option( array( "context" => "siteAdmin" ) ); ?>
			</div>

			<!-- DOWNLOAD IMAGE -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-arrow-down-thin"></i></span>
					Download Image
				</h3>
				<?php echo pw_download_image_option( array( "context" => "siteAdmin" ) ); ?>
			</div>

			<!-- LINK URL -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-link"></i></span>
					Link Label
				</h3>
				<?php echo pw_link_url_options( array(
					'context' => 'siteAdmin',
					'show_options' => array( 'icon', 'label', 'new_target' ),
					)); ?>
				<div style="clear:both"></div>
			</div>

			<!-- GALLERIES -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-images"></i></span>
					Default Gallery Settings
				</h3>

				<?php
					echo pw_gallery_options(
						theme_gallery_options(
							array(
								'ng_model' => 'pwOptions.posts.post.post_meta.'.PW_POSTMETA_KEY.'.gallery'
								))); ?>

				<div style="clear:both"></div>
			</div>

		</div>


	</div>
	<div class="col-lg-6 pad-col-lg">
		
		
		<!--///// MEDIA EMBEDS /////-->
		<div class="well">
			<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME,'pwOptions'); ?></div>
			<h2><i class="pwi-embed"></i> Media Embeds</h2>

			<!-- GENERAL -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-gear"></i></span>
					General
				</h3>

				<select
					ng-options="val.value as val.name for val in options.general.doubleSwitch"
					ng-model="pwOptions.embeds.autoplay">
				</select>
				autoplay
				<small>
					: play the media automatically
				</small>

			</div>

			<!-- YOUTUBE -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-play-youtube"></i></span>
					YouTube
				</h3>

				<select
					ng-model="pwOptions.embeds.youtube.theme">
					<option value="dark">Dark</option>
					<option value="light">Light</option>
				</select>
				theme
				<small> : the backdrop of the player controls</small>

				<hr class="thin">

				<select
					ng-model="pwOptions.embeds.youtube.color">
					<option value="red">Red</option>
					<option value="white">White</option>
				</select>
				color
				<small> : used to highlight the video progress</small>

				<hr class="thin">

				<select
					ng-model="pwOptions.embeds.youtube.controls">
					<option value="0">Hide controls, show title</option>
					<option value="1">Show controls, show title</option>
					<option value="2">Hide controls, hide title</option>
				</select>
				controls
				<small> : before playing the video</small>

			</div>

		</div>





		<!-- MEDIA -->
		<div class="well">
			<h3>
				<span class="icon-md"><i class="pwi-image"></i></span>
				Media Height
			</h3>
			<small>Set the height of the viewing area for various types of media and contexts.</small>

			<div class="well">
				<h3>Single Images</h3>
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.posts.images.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
			</div>

			<div class="well">
				<h3>Video & Audio Embeds</h3>
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.posts.embeds.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
			</div>

			<div class="well">
				<h3>Horizontal Gallery</h3>
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.posts.galleries.x_gallery.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
			</div>

			<div class="well">
				<h3>Frame Gallery</h3>
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.posts.galleries.frame_gallery.height',
						'methods' => array('window-base','window-percent','pixels','proportion'),
						));
				?>
			</div>

			<div class="well">
				<h3>Page List</h3>
				<?php
					echo pw_select_setting(array(
						'setting' => 'height',
						'ng_model' => 'pwOptions.posts.pagelist.height',
						'methods' => array('window-percent','pixels','proportion'),
						));
				?>
			</div>

			<div style="clear:both"></div>
		</div>


	</div>
</div>
