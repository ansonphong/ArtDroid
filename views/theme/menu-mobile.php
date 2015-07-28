<div
	id="mobile-menu"
	class="mobile-menu
		<?php if( is_admin_bar_showing() ) echo 'admin-bar-showing' ?>">
	<div id="mobile-menu-wrapper">
		<div id="mobile-menu-inner">
			<div class="mobile-menu-row">
				<div class="mobile-menu-col-primary">
					<div class="menu-main">
						<?php include locate_template( 'views/theme/menu-primary.php' ); ?>
					</div>
				</div>
				<div class="mobile-menu-col-secondary">
					<?php include locate_template( 'views/theme/menu-social.php' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>