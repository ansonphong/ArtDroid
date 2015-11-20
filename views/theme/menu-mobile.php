<div
	id="mobile-menu"
	class="mobile-menu
		<?php if( is_admin_bar_showing() ) echo 'admin-bar-showing' ?>">
	<div id="mobile-menu-wrapper">
		<div id="mobile-menu-inner">
			<div class="mobile-menu-row">
				<div class="mobile-menu-col-primary">
					<div class="menu-main">
						<?php include locate_template( 'views/theme/menu-primary.php' ); ?>
					</div>
				</div>
				<div class="mobile-menu-col-secondary">
					<?php include locate_template( 'views/theme/menu-social.php' ) ?>

					<div class="widget-area--touch-menu">
						<?php
						/**
						 * Touch Menu Widgets
						 */
						global $pw;
						pw_log( 'context', $pw['view']['context'] );
						if( in_array( 'single', $pw['view']['context'] ) )
							$widget_context = 'post';
						else if( in_array( 'page', $pw['view']['context'] ) )
							$widget_context = 'page';
						else if( in_array( 'archive', $pw['view']['context'] ) )
							$widget_context = 'archive';

						if( isset( $widget_context ) )
							pw_print_widgets( array(
								'sidebar'		=>	'touch-menu-'.$widget_context,
								'before'		=>	'<div class="sidebar">',
								'after'			=>	'</div>',
								'echo'			=>	true,
								'show_empty'	=>	false,
								'include_meta'	=>	true,
								));
						?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>