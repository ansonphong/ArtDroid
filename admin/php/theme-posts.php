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
				<?php echo pw_link_url_options( array( 'context' => 'siteAdmin' ) ); ?>
				<div style="clear:both"></div>
			</div>


			<!-- MODALS -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-layers-2"></i></span>
					Modals
				</h3>
				<small>
					Modals hover above the page, to view a sequence of posts without leaving the page.
				</small>
				<hr class="thin">
				<label>
					<input
						type="checkbox"
						ng-model="pwOptions.modals.header.show">
					Show Header
				</label>
				<div style="clear:both"></div>
			</div>

			<!-- MEDIA -->
			<div class="well">
				<h3>
					<span class="icon-md"><i class="pwi-image"></i></span>
					Media & Galleries
				</h3>

				<label>
					<h4>Images & Media</h4>
					<input
						type="number"
						class="short"
						ng-model="pwOptions.posts.media.style.height"> % 
					Height
					<small>
						How tall to size the images and embedded media (audio/videos).
					</small>
				</label>

				<label>
					<h4>Horizontal Gallery</h4>
					<input
						type="number"
						class="short"
						ng-model="pwOptions.posts.galleries.style.x_gallery_height"> % 
					Height
					<small>
						How tall to size horizontal galleries.
					</small>
				</label>

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
								'ng_model' => 'pwOptions.posts.post.post_meta.pw_meta.gallery'
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


	</div>
</div>





