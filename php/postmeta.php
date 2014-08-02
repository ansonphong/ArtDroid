<?php

global $i_child_postmeta_model;
$i_child_postmeta_model = array(
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
			"show_title"	=>	false,
			"show_excerpt"	=>	false,
			"hotlink"		=>	false,
			"height"		=>	"75%",
			"interval"		=>	"5000",
			"no_pause"		=>	true,
			"transition"	=>	'fade',
			),
		),
	"gallery"	=>	array(
		"template"	=>	"inline",
		"height"	=>	75,
		"x_scroll_distance"	=>	1500,
		"y_scroll_distance"	=>	1000,
		),
	"post_content"	=>	array(
		"columns"	=>	1,
		),
	"icon"	=>	array(
		"class"	=>	"",
		),
	);

?>