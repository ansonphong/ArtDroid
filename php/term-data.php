<?php
/**
 * Gets term meta data and deposits it into the
 * global $pw array, so that it can be re-used
 * throughout the theme without any redundant queries.
 */
add_filter( 'pw_view_term_meta', 'theme_pw_view_term_meta' );
function theme_pw_view_term_meta( $term ){

	// Get the taxonomy meta array from wp_taxonomymeta table
	$term['meta'] = pw_get_wp_taxonomymeta( array(
		'term_id' => $term['term_id']
		));

	// Get the post array associated with the image ID
	$term_image_id = _get( $term['meta'], 'image-primary' );
	$term['meta']['image_post'] = ( $term_image_id !== false ) ?
		pw_get_post( $term_image_id, 'preview' ) :
		array();

	return $term;
}

/**
 * Add meta data to slider posts which are of type taxonomy
 */
add_filter( 'pw_get_menu_item_taxonomy', 'theme_get_menu_item_taxonomy' );
function theme_get_menu_item_taxonomy( $post ){

	// Get the taxonomy meta array from wp_taxonomymeta table
	$term_meta = pw_get_wp_taxonomymeta( array(
		'term_id' => _get( $post, 'term.term_id' )
		));

	$fields = array(
		'image(x-wide)'
		);

	/**
	 * Get the secondary image
	 * With priority over the primary image
	 */
	if( !empty( $term_meta['image-secondary'] ) ){
		$post['image'] = pw_get_post_image( $term_meta['image-secondary'], $fields, true );
		//pw_log( 'image secondary', $term_meta['image-secondary'] );
	}
	elseif( !empty( $term_meta['image-primary'] ) )
		$post['image'] = pw_get_post_image( $term_meta['image-primary'], $fields, true );

	$post['term_meta'] = $term_meta;

	return $post;

}




?>