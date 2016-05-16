<?php if( $vars['tag'] == 'siblings' ) : ?>
	<?php
		global $post;
		$post_parent_id = $post->post_parent;
		$post_parent = pw_get_post( $post_parent_id, 'micro' );
	?>
	<a href="<?php echo $post_parent['post_permalink'] ?>">
	<h2>
		<?php echo $post_parent['post_title'] ?> &rsaquo;
	</h2>
	</a>
<?php endif ?>

<div class="pw-shortcode subpages feed <?php echo $vars['size'] ?> <?php echo $vars['class'] ?>">
	<?php
		/**
		 * If the view is a standard supported view, make a regular feed.
		 * Otherwise, do a print feed.
		 */
		$supported_views = pw_config( 'post_views.supported' );
		if( in_array( $vars['view'], $supported_views  ) ){
			pw_feed( array(
				'aux_template' => 'seo-list',
				'feed' => array(
					'query' => $vars['feed']['query'],
					'view' => array(
						'current' => $vars['feed']['view']
						),
					),
				));
		}
		else
			echo pw_print_feed( $vars['feed'] );	
	?>
</div>