<?php 
$show_social_menu = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'menus.primary.show_social' ) );
?>

<?php if( $show_social_menu ): ?>
	
<div
	class="menu-social">
	<div class="inner">
		<?php echo pw_social_menu(
			array(
				'meta' => array(
					'classes'			=>	'',
					'tooltip_placement' => 'bottom',
					)
				)
			);?>
	</div>
</div>

<?php endif ?>
