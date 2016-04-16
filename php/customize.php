<?php
/**
 * @todo 	Add custom Logo : https://make.wordpress.org/core/2016/03/10/custom-logo/
 * 			Reconcile with existing proprietary logo uploading. 
 */
function theme_add_theme_support() {
	add_theme_support( 'custom-logo', array(
		'width' => 750,
		'height' => 250,
		'flex-height' => true,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'theme_add_theme_support' );


/**
 * Remove all previewable devices, since this theme uses
 * RESS (Responsive with Server Side component) to detect
 * the device on page request it won't show accurate results.
 */
add_action( 'customize_previewable_devices', 'theme_previewable_devices_filter' );
function theme_previewable_devices_filter( $devices ){
	return array();
}


/**
 * Remove extraneous theme customizer options which don't work properly.
 */
add_action( 'customize_register', 'theme_remove_customizer_options', 30 );
function theme_remove_customizer_options( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'themes' );
	//$wp_customize->remove_section( 'title_tagline' );
	//$wp_customize->remove_section( 'nav' );
}


/**
 * Add new Customizer options.
 */
add_action('customize_register','theme_customize_register');
function theme_customize_register( $wp_customize ) {

	/*
	$wp_customize->add_panel();
	$wp_customize->get_panel();
	$wp_customize->remove_panel();

	$wp_customize->add_section();
	$wp_customize->get_section();
	$wp_customize->remove_section();

	$wp_customize->add_setting();
	$wp_customize->get_setting();
	$wp_customize->remove_setting();

	$wp_customize->add_control();
	$wp_customize->get_control();
	$wp_customize->remove_control();
	*/

}
