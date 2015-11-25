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

if( theme_blog_enabled() ){
	// Registers blog post type and taxonomy
	add_action( 'init', 'theme_register_blog_post_type' );
	// Allows custom taxonomies to share the same slug as custom post types
	add_filter('generate_rewrite_rules', 'pw_taxonomy_slug_rewrite');
}

function theme_register_blog_post_type(){

	$settings = pw_get_option( array(
		'option_name' => PW_OPTIONS_THEME,
		'key' => 'blog.settings'
		));

	///// POST TYPE : BLOG /////
	$blog_labels = array(
		'name' => $settings['post_type']['name'],
		'singular_name' => $settings['post_type']['name'],
		'add_new' => 'New '.$settings['post_type']['name'].' Post',
		'add_new_item' => 'New '.$settings['post_type']['name'].' Post',
		'edit_item' => 'Edit '.$settings['post_type']['name'],
		'new_item' => 'New '.$settings['post_type']['item_name'],
		'all_items' => 'All '.$settings['post_type']['item_name_plural'],
		'view_item' => 'View '.$settings['post_type']['item_name'].' Post',
		'search_items' => 'Search '.$settings['post_type']['item_name_plural'],
		'not_found' =>  'Nothing found',
		'not_found_in_trash' => 'No '.$settings['post_type']['item_name_plural'].' found in Trash', 
		'parent_item_colon' => '',
		'menu_name' => $settings['post_type']['name']
	);
	
	$blog_args = array(
		'labels' => $blog_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array( 'slug' => $settings['post_type']['base'] ),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' ),
		'taxonomies' => array( 'post_tag' ),
		'menu_icon' => '',
	);
	register_post_type( 'blog', $blog_args );

	///// TAXONOMY : BLOG SECTION /////
	register_taxonomy(
		"blog_category",
		array( 'blog' ),
			array(
				'label' => $settings['post_type']['name'].' : Categories',
				'hierarchical'=> true,
				'public' => true,
				'rewrite' => array( 'slug' => $settings['post_type']['base'] ),
				'labels' => array (
					'name' => $settings['post_type']['name'].' : Categories',
					'singular_name' => $settings['post_type']['name'].' Category',
					'search_items' => 'Search '.$settings['post_type']['name'].' Categories',
					'all_items' => 'All '.$settings['post_type']['name'].' Categories',
					'parent_item' => 'Parent '.$settings['post_type']['name'].' Category',
					'parent_item_colon' => 'Parent '.$settings['post_type']['name'].' Category',
					'edit_item' => 'Edit '.$settings['post_type']['name'].' Category', 
					'update_item' => 'Update '.$settings['post_type']['name'].' Category',
					'add_new_item' => 'Add New '.$settings['post_type']['name'].' Category',
					'new_item_name' => 'New '.$settings['post_type']['name'].' Category Name',
					'menu_name' => $settings['post_type']['name'].' Categories'
			)
		)
	);

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