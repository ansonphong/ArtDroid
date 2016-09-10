<?php
/**
 * Renders the Blog feed.
 */
$blog_settings = pw_grab_option( PW_OPTIONS_THEME, 'blog.settings' );


pw_feed(array(
	'aux_template'	=>	'seo-list',
	'feed' => array(
		'view' => array(
			'current' => 'full'
			),
		'query' => array(
			'post_type' => 'blog',
			'post_status' => 'publish',
			'posts_per_page' => $blog_settings['page_template']['query']['posts_per_page'],
			),
		)
	));

if( $blog_settings['page_template']['show_more_link'] ): ?>

	<div class="blog-page">
		<a href="<?php echo get_site_url( null, $blog_settings['post_type']['base'], 'relative' ) ?>">
			<button class="btn-full-primary-neutral">
				<?php if( !empty( $blog_settings['main_page']['icon'] ) ): ?>
					<i class="icon <?php echo $blog_settings['main_page']['icon'] ?>"></i>
				<?php endif ?>
				All <?php echo $blog_settings['post_type']['item_name_plural'] ?>
			</button>
		</a>
	</div>

<?php
endif;

