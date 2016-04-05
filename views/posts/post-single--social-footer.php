<div class="social-footer pad-x-lg">

		<?php if( $social_share ): ?>
			<!-- SOCIAL SHARE -->
			<div class="share-social">
				<div class="share-social--label">
					<i class="icon pwi-share"></i>
					<?php echo __('Share','postworld') ?>
				</div>
				<div class="share-social--buttons">
					<?php echo $social_share ?>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php endif ?>

		<?php if( !$device['is_mobile'] ): ?>
			<!-- SOCIAL WIDGETS -->
			<div class="social-widgets">
				<?php echo $social_widgets ?>
			</div>
			<div class="clearfix"></div>
		<?php endif ?>
		<div class="clearfix"></div>
	</div>