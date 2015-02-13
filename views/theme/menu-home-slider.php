<div
	class="slider-bottom-bar-inner">
	<?php
		$defaults = array(
			'theme_location'  => '',
			'menu'            => $home_menu_id,
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
			'walker'          => ''
		);
		wp_nav_menu( $defaults );
	?>
	<div class="clearfix"></div>
</div>