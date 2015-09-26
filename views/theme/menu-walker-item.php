<?php
	//pw_log( $item );
	if( $args->walker_vars['show_icons_top'] && $depth == 0 ||
		$args->walker_vars['show_icons_sub'] && $depth >= 1 ){
		// Get icon for Posts
		if( $item->type == 'post_type' ){
			if( is_numeric( $item->ID ) )
				$icon = pw_get_wp_postmeta( array(
					'post_id'	=>	$item->object_id,
					'meta_key'	=>	PW_POSTMETA_KEY,
					'sub_key'	=>	'icon.class',
					));
		}
		// Get icon for Taxonomy Terms
		elseif( $item->type == 'taxonomy' ){
			$term_meta = pw_get_wp_taxonomymeta( array( 'term_id' => $item->object_id ) );
			$icon = _get( $term_meta, 'icon' );
			
		}
	}
	else
		$icon = false;

?>
<a <?php
		// Print Attributes
		pw_print_html_attr( 'title', $link_attr['title'], "" );
		pw_print_html_attr( 'target', $link_attr['target'], "" );
		pw_print_html_attr( 'rel', $link_attr['rel'], "" );
		pw_print_html_attr( 'href', $link_attr['href'], "" );
	?>
	>
	<?php
	///// ICON /////
	if( !empty($icon) ){ ?>
		<i class="icon symbol-target menu-icon <?php echo $icon ?>"></i>
	<?php } elseif( $depth == 0 && !empty( $classes[0] ) ){ ?>
		<i class="icon symbol-target menu-icon"></i>
	<?php } ?>

	<span class="menu-label">
		<?php echo $link_meta['label'] ?>
	</span>

	<?php
	///// DESCRIPTION /////
	/*
	if( $link_meta['description'] && $depth == 0 ){ ?>
		<div class="main-menu-item-description">
			<?php echo $link_meta['description']; ?>
		</div>
	<?php } */
	?>

</a>