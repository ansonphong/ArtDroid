<?php

////////// TAXONOMIES ///////////
function i_expanse_taxonomies() {
	
	///// TAXONOMY : FEATURE /////
	$features_tax = "i-feature";
	register_taxonomy(
		$features_tax,
		array( 'post', 'page', 'attachment' ),
			array(
				'hierarchical'=> true,
				'label' => 'Features',
				'rewrite' => array('slug' => 'feature'),
				'labels' => array (
					'name' => 'Features',
					'singular_name' => 'Feature',
					'search_items' => 'Search Features',
					'all_items' => 'All Features',
					'parent_item' => 'Parent Feature',
					'parent_item_colon' => 'Parent Feature',
					'edit_item' => 'Edit Feature', 
					'update_item' => 'Update Feature',
					'add_new_item' => 'Add New Feature',
					'new_item_name' => 'New Feature Name',
					'menu_name' => 'Features'
			)
		)
	);

}

add_action( 'init', 'i_expanse_taxonomies', 10 );


?>