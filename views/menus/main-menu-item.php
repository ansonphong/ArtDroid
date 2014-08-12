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
	if( $depth == 0 ){ ?>
		<i class="main-menu-icon symbol-target"></i>
	<?php } ?>

	<?php
	///// LABEL /////
		echo $link_meta['label'] ?>

	<?php
	///// DESCRIPTION /////
	if( $link_meta['description'] && $depth == 0 ){ ?>
		<div class="main-menu-item-description">
			<?php echo $link_meta['description']; ?>
		</div>
	<?php } ?>

</a>