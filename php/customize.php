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
add_action( 'customize_register', 'theme_customize_register' );
function theme_customize_register( $wp_customize ) {

	/**
	 * PANELS
	 */
	/*
	$wp_customize->add_panel( 'current_theme', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'ArtDroid Theme', 'textdomain' ),
	    'description' => __( 'Customize the theme.', 'textdomain' ),
	) );
	*/
	

	/*****************************************
	 * SECTION : HEADER
	 *****************************************
	 */
	$wp_customize->add_section( 'theme_header', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Header', 'textdomain' ),
	    'description' => '',
	    //'panel' => 'current_theme',
	) );

	/**
	 * MENU ALIGNMENT
	 */
	$subkey = 'menus.primary.alignment';
	$wp_customize->add_setting( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'default' => pw_grab_option( PW_OPTIONS_THEME, $subkey ),
		'type' => 'postworld',
		'capability' => 'edit_theme_options',
		'transport' => '',
		//'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'PW_OPTIONS_THEME['.$subkey.']', array(
	    'type' => 'select',
	    'priority' => 10,
	    'section' => 'theme_header',
	    'label' => __( 'Menu Position', 'postworld' ),
	    'description' => __('Position of the primary menu.', 'postworld'),
	    'choices'  => array(
			'left'  => 'Left',
			'right' => 'Right',
			)
	) );


	/**
	 * SHOW SEARCH
	 */
	$subkey = 'search.show_search';
	$wp_customize->add_setting( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'default' => pw_grab_option( PW_OPTIONS_THEME, $subkey ),
		'type' => 'postworld',
		'capability' => 'edit_theme_options',
		'transport' => '',
		//'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'theme_header',
		'label' => __( 'Show Search', 'postworld' ),
		'description' => __('Show search icon in upper right.', 'postworld'),
	) );


	/**
	 * SHOW SOCIAL MENU
	 */
	$subkey = 'menus.primary.show_social';
	$wp_customize->add_setting( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'default' => pw_grab_option( PW_OPTIONS_THEME, $subkey ),
		'type' => 'postworld',
		'capability' => 'edit_theme_options',
		'transport' => '',
		//'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'theme_header',
		'label' => __( 'Show Social Menu', 'postworld' ),
		'description' => __('Show social media icons (if defined in ArtDroid › Social)', 'postworld'),
	) );


	/**
	 * SHOW ICONS AT TOP LEVEL
	 */
	$subkey = 'menus.primary.show_icons_top';
	$wp_customize->add_setting( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'default' => pw_grab_option( PW_OPTIONS_THEME, $subkey ),
		'type' => 'postworld',
		'capability' => 'edit_theme_options',
		'transport' => '',
		//'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'theme_header',
		'label' => __( 'Show Icons on Top Level', 'postworld' ),
		'description' => __('Show page icons on top level menu items.', 'postworld'),
	) );

	/**
	 * SHOW ICONS IN SUBMENUS
	 */
	$subkey = 'menus.primary.show_icons_sub';
	$wp_customize->add_setting( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'default' => pw_grab_option( PW_OPTIONS_THEME, $subkey ),
		'type' => 'postworld',
		'capability' => 'edit_theme_options',
		'transport' => '',
		//'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'PW_OPTIONS_THEME['.$subkey.']', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'theme_header',
		'label' => __( 'Show Icons in Submenus', 'postworld' ),
		'description' => __('Show page icons in dropdown submenus.', 'postworld'),
	) );


	





	/*
	$wp_customize->add_setting( 'email_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'email_field_id', array(
	    'type' => 'email',
	    'priority' => 10,
	    'section' => 'theme_header',
	    'label' => __( 'Email Field', 'textdomain' ),
	    'description' => '',
	) );
	*/


}




