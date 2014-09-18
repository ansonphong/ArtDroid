<?php
// Child Postmeta Model
global $i_theme_postmeta_model;
$i_theme_postmeta_model = array(
	"header" => array(
		"type"		=>	"default",
		"image"		=>	array(
			"height"	=>	"50",
			),
		"slider"	=>	array(
			"query_vars"	=> 	array(
				"this_post"			=>	true,	// Include this post
				"this_post_only"	=>	true,	// Include only this post

				"tax_query_taxonomy"=> 	"",
				"tax_query_term_id"	=> 	"",

				"show_children"		=>	false,	// Enables post_parent query for current post

				"include_galleries"	=>	true,	// Show images from all galleries in found posts
				"only_galleries"	=>	false,	// Show only images from galleries
				"hide_galleries"	=>	true,	// Hide galleries in current post (disable gallery shortcode)
				
				"max_posts"			=>	20,		// Alias for posts_per_page
				"has_image"			=>	true,	// Only show posts with an image
				),
			"orderby"		=> 	"",
			"show_title"	=>	true,
			"show_excerpt"	=>	true,
			"hyperlink"		=>	true,
			"height"		=>	"75%",
			"interval"		=>	"5000",
			"no_pause"		=>	true,
			"transition"	=>	'fade',
			),
		),
	"gallery"	=>	array(
		"template"	=>	"inline",
		"width"		=>	100,
		"height"	=>	75,
		"x_scroll_distance"	=>	1500,
		"y_scroll_distance"	=>	1000,
		),
	"post_content"	=>	array(
		"columns"	=> i_get_option( array( 'key' => 'posts.post.post_meta.i_meta.post_content.columns' ) ),	//1,
		),
	"icon"	=>	array(
		"class"	=>	"",
		),
	"image"	=>	array(
		"download"	=>	"default",
		),
	"link_url"	=>	array(
		"label"	=>	array(
			"show"				=>	"default",
			"custom"			=>	"",
			"highlight"			=>	"default",
			"tooltip"	=>	array(
				"show"		=>	"default",
				"custom"	=>	""
				),
			),
		"new_target"	=>	"default",
		),
	);

// Make filter to merge the child model
function i_theme_postmeta_model_filter( $i_postmeta_model ){
	global $i_theme_postmeta_model; 
	$i_postmeta_model = array_replace_recursive( $i_postmeta_model, $i_theme_postmeta_model );
	
	return $i_postmeta_model;
}
add_filter( 'i_postmeta_model', 'i_theme_postmeta_model_filter' );

?>