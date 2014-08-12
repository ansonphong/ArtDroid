<?php global $iGlobals; ?>
<div
	class="module menu-main">
	<?
		$menu_walker = new PW_Menu_With_Description;
		$main_menu_id = i_get_obj( $iGlobals, 'options.menus.main' );
		$defaults = array(
			'theme_location'  => '',
			'menu'            => $main_menu_id,
			'container'       => 'div',
			'container_class' => 'menu-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => 'main-menu',
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
				'item_template_path' => dirname( __FILE__ ) . "/main-menu-item.php",	
				),
		);
		if( $main_menu_id )
			wp_nav_menu( $defaults );
	?>

	<?php

	// Show Social Menu
	if( i_get_obj( $iGlobals, 'options.social.in_main_menu' ) == true )
		include locate_template( 'views/menus/menu-social.php' );
	?>
	
	<div class="clearfix"></div>
</div>