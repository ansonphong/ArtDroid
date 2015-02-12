<div
	class="menu-main">
	<?php
		$menu_walker = new PW_Menu_With_Description;
		$primary_menu = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'menus.primary' ) );

		$primary_menu_settings = array(
			'theme_location'  => '',
			'menu'            => $primary_menu['id'],
			'container'       => 'div',
			'container_class' => 'menu-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => 'main-menu-container',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => $menu_walker,
			'walker_vars'	  => array(
				'item_template_path'=> dirname( __FILE__ ) . "/menu-walker-item.php",
				'show_icons_top'	=>	$primary_menu['show_icons_top'],
				'show_icons_sub'	=>	$primary_menu['show_icons_sub'],
				),
		);
		if( $primary_menu['id'] )
			wp_nav_menu( $primary_menu_settings );
	?>
	<?php
	// Show Social Menu
	if( pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'menus.primary.show_social' ) ) )
		include locate_template( 'views/theme/menu-social.php' );
	?>
	
	<div class="clearfix"></div>
</div>