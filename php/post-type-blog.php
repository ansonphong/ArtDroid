<?php
/**
 * Tell whether or not the blog post type is enabled.
 * @return boolean
 */
function theme_blog_enabled(){
	return pw_get_option( array(
		'option_name' => PW_OPTIONS_THEME,
		'key' => 'blog.enable'
		));
}

if( theme_blog_enabled() )
	add_action( 'init', 'theme_register_blog_post_type' );

function theme_register_blog_post_type(){

	$blog_settings = pw_get_option( array(
		'option_name' => PW_OPTIONS_THEME,
		'key' => 'blog.settings'
		));

	///// POST TYPE : BLOG /////
	$blog_labels = array(
		'name' => 'Blog',
		'singular_name' => 'Blog',
		'add_new' => 'New Blog Post',
		'add_new_item' => 'New Blog Post',
		'edit_item' => 'Edit Blog',
		'new_item' => 'New Blog',
		'all_items' => 'All Blogs',
		'view_item' => 'View Blog',
		'search_items' => 'Search Blogs',
		'not_found' =>  'No Blogs found',
		'not_found_in_trash' => 'No Blogs found in Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Blog'
	);
	
	$blog_args = array(
		'labels' => $blog_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array( 'slug' => $blog_settings['base'] ),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'post-formats' ),
		'taxonomies' => array( 'post_tag' ),
		'menu_icon' => '',
	);
	
	register_post_type( 'blog', $blog_args );

}



function theme_add_menu_icons_styles(){
?>
<style>
/* https://developer.wordpress.org/resource/dashicons/ */
/* EVENT */
#adminmenu .menu-icon-event div.wp-menu-image:before {
  content: '\f145';
}
/* BLOG */
#adminmenu .menu-icon-blog div.wp-menu-image:before {
  content: "\f119";
}
/* ART */
#adminmenu .menu-icon-art div.wp-menu-image:before {
  content: "\f309";
}
/* SHOP */
#adminmenu .menu-icon-shop div.wp-menu-image:before {
  content: "\f105";
}

</style>
<?php
}
add_action( 'admin_head', 'theme_add_menu_icons_styles' );

?>