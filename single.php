<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
?>

<?php
////////// PAGE ////////// ?>

<?php
////////// HEAD //////////
if( is_page() )
	include locate_template( 'views/modules/page-head.php' ); 
else if( is_single() ){
	include locate_template( 'views/modules/post-head.php' ); 

}
?>
<?php
////////// CONTENT ////////// ?>
<div class="page-bounds">
	
	<?php	
		////////// PRINT THE POST IN TEMPLATE //////////
		// Set Globals
		global $post;
		// Social Media Widgets
		global $social_settings;
		$social_settings['meta']['url'] = get_permalink();

		$fields = array(
			'ID',
			'post_id',
			'post_type',
			'post_status',
			'post_title',
			'post_content',
			'post_excerpt',
			'post_name',
			'post_permalink',
			'post_date',
			'post_date_gmt',
			'post_timestamp',
			'post_class',
			'post_format',
			'link_format',
			'link_url',
			'related_post',
			'post_parent',
			'image(all)',
			'image(tags)',
			'image(stats)',
			'time_ago',
			'taxonomy(all)',
			'post_meta(all)',
			'gallery(ids,posts)'
			);

		///// PRINT POST /////
		$post_settings = array(
			'post_id'	=>	$post->ID,
			'fields'	=>	$fields,
			'view'		=>	'full-h2o',
			//'template'	=>	pw_get_post_template ( $post->ID, 'full-h2o', 'dir', true ),
			'vars'	=> array(
				'social_widgets'	=>	pw_social_widgets($social_settings),
				),
			'js_vars'	=>	array('post'),
			);

		// Get and Print the Post in Template
		$post_html = pw_print_post( $post_settings );

	?>

	<?php
		///////// INFINITE LAYOUT /////////
		// Callback function for the page content (optional)
		function page_content_function(){
			global $post;
			///// EMBED MEDIA /////
			//$embed_link_url = pw_embed_link_url( $post->ID );
		}
		///// MAIN LAYOUT /////
		global $iGlobals;
		$layout_args = array(
			'layout'			=>	$iGlobals['layout']['layout'],
			'function'			=>	'page_content_function',
			'content'			=>	$post_html, //apply_filters( 'the_content', $post->post_content ),
			//'before_content' 	=>	'<div>',
			//'after_content' 	=>	'</div>',
			
			);
		i_print_layout( $layout_args );
	?>
</div>


<!-- INFINITE FOOTER -->
<?php i_footer(); ?>