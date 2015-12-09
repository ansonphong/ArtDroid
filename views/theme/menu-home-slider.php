<div
	class="slider-bottom-bar-inner">
	<?php
	$menu_walker = new PW_Menu_With_Description;
	$secondary_menu = array(
		'theme_location'  => $menu_theme_location,
		//'menu'            => $home_menu_id,
		'container'       => 'div',
		'container_class' => 'menu-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => 'secondary-menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'	  	  => $menu_walker,
		'walker_vars'	  => array(
			'item_template_path'=> dirname( __FILE__ ) . "/menu-walker-item.php",
			//'show_icons_top'	=>	true, //$primary_menu['show_icons_top'],
			//'show_icons_sub'	=>	true, //$primary_menu['show_icons_sub'],
			),
	);
	wp_nav_menu( $secondary_menu );
	?>
	<div class="clearfix"></div>
</div>
