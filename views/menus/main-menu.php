<div
	class="module menu-main">
	<?
		$main_menu_id = i_get_option( array( 'option_name' => 'i-options', 'key' => 'menus.main' ) );
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
			'walker'          => ''
		);
		wp_nav_menu( $defaults );
	?>

	<?php

	// Show Social Menu
	if( i_get_option( array( 'option_name' => 'i-options', 'key' => 'social.in_main_menu' ) ) )
		include locate_template( 'views/menus/menu-social.php' );

	?>
	
	<div class="clearfix"></div>
</div>