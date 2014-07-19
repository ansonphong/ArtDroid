<?php  

function i_activate_expanse($oldname, $oldtheme=false) {

	///// ADD FEATURE TERMS /////
	$features_tax = "i-feature";
	$feature_terms = array(
		array(
			"term"	=>	"Home Page",
			"meta"	=>	array(
				'description'=> 'Home Page Features',
				'slug' => 'home-page',
				),
			"children"	=>	array(

				array(
					"term"	=>	"Home Page Slider",
					"meta"	=>	array(
						'description'=> 'Home Page Slider appears at the top of the Home Page',
						'slug' => 'home-page-slider',
						),
					),

				array(
					"term"	=>	"Home Page Features",
					"meta"	=>	array(
						'description'=> 'Home Page Features appear beneath the Home Page Slider',
						'slug' => 'home-page-feature',
						),
					),

				),
			),
		);

	$terms = i_add_terms( $feature_terms, $features_tax );

}

//add_action("after_switch_theme", "i_activate_expanse", 10 ,  2);  

?>