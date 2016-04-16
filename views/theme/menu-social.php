
<?php if( pw_grab_option( PW_OPTIONS_THEME, 'menus.primary.show_social' ) ): ?>
		
	<div
		class="menu-social">
		<div class="inner">
			<?php echo pw_social_menu(
				array(
					'meta' => array(
						'classes'			=>	'icon',
						'tooltip_placement' => 'bottom',
						)
					)
				);?>
		</div>
	</div>

<?php endif ?>
