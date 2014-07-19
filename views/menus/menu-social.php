<?php
	$social_menu_grayscale = i_get_option( array( 'option_name' => 'i-options', 'key' => 'social.in_main_menu_gray' ) );
?>
<div
	class="module menu-social <?php if( $social_menu_grayscale ) echo 'grayscale'; ?>">
	<div class="inner">
	<?php echo i_social_menu( array( 'size' => 32, 'style' => 'default', 'meta' => array( 'tooltip-placement' => 'bottom' ) ) );?>
	</div>
</div>

