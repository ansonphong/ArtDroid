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
 * Remove extraneous theme customizer options, which are distracting.
 */
add_action( 'customize_register', 'theme_remove_customizer_options', 30 );
function theme_remove_customizer_options( $wp_customize ) {
	$wp_customize->remove_section( 'themes' );
	//$wp_customize->remove_section( 'static_front_page' );
	//$wp_customize->remove_section( 'title_tagline' );
	//$wp_customize->remove_section( 'nav' );
}


/**
 * Clear the LESS cache before and after previewing.
 */
//add_action( 'start_previewing_theme', 'pw_reset_less_php_cache' );
//add_action( 'stop_previewing_theme', 'pw_reset_less_php_cache' );
add_action( 'customize_preview_init', 'pw_reset_less_php_cache' );
add_action( 'customize_save', 'pw_reset_less_php_cache' );
//customize_save


/**
 * Add new Customizer options.
 */
add_action( 'customize_register', 'theme_customize_register' );
function theme_customize_register( $wp_customize ) {

	// Invoke the Postworld Customize Manager
	$postworld_customize = new PW_Customize_Manager();

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
		'priority' => 60,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Header', 'textdomain' ),
		'description' => '',
		//'panel' => 'current_theme',
	) );

	/**
	 * MENU ALIGNMENT
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_THEME',
		'subkey' 			=>	'menus.primary.alignment',
		'label' 			=>	__( 'Menu Position', 'postworld' ),
		'description'		=>	__('Position of the primary menu.', 'postworld'),
		'type'				=>	'select',
		'choices'			=>	array(
									'left'  => 'Left',
									'right' => 'Right',
									),
		));

	// Opacity of the header background in percent, between 0-100%, include (%), ie. 90%

	/**
	 * SHOW SEARCH
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'type'				=>	'checkbox',
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_THEME',
		'subkey' 			=>	'search.show_search',
		'label' 			=> __( 'Show Search', 'postworld' ),
		'description' 		=> __('Show search icon in upper right.', 'postworld'),
		));

	/**
	 * SHOW SOCIAL MENU
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'type'				=>	'checkbox',
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_THEME',
		'subkey' 			=>	'menus.primary.show_social',
		'label' 			=> __( 'Show Social Menu', 'postworld' ),
		'description' 		=> __('Show social media icons (if defined in ArtDroid › Social)', 'postworld'),
		));

	/**
	 * SHOW ICONS AT TOP LEVEL
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'type'				=>	'checkbox',
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_THEME',
		'subkey' 			=>	'menus.primary.show_icons_top',
		'label' 			=> __( 'Show Icons on Top Level', 'postworld' ),
		'description' 		=> __('Show page icons on top level menu items.', 'postworld'),
		));

	/**
	 * SHOW ICONS IN SUBMENUS
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'type'				=>	'checkbox',
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_THEME',
		'subkey' 			=>	'menus.primary.show_icons_sub',
		'label' => __( 'Show Icons in Submenus', 'postworld' ),
		'description' => __('Show page icons in dropdown submenus.', 'postworld'),
		));

	/**
	 * HEADER : BACKGROUND OPACITY
	 */
	$postworld_customize->add_control_setting( $wp_customize, array(
		'type'				=>	'select',
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.header-background-opacity',
		'label' 			=> __( 'Header Background Opacity', 'postworld' ),
		//'description' 		=> __('', 'postworld'),
		'choices'	=>	array(
			'100' => '100%',
			'90' => '90%',
			'80' => '80%',
			'70' => '70%',
			'60' => '60%',
			'50' => '50%',
			'40' => '40%',
			'30' => '30%',
			'20' => '20%',
			'10' => '10%',
			'0' => '0%',
			),
		));

	/**
	 * HEADER : BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.header-background',
		'label' 			=>	__('Header Background Color', 'postworld'),
		//'description'		=>	__('', 'postworld'),
		));

	/**
	 * HEADER : MAIN MENU TEXT
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.main-menu-foreground',
		'label' 			=>	__('Main Menu Text Color', 'postworld'),
		//'description'		=>	__('', 'postworld'),
		));

	/**
	 * HEADER : SUB MENU BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.sub-menu-background',
		'label' 			=>	__('Sub Menu Background Color', 'postworld'),
		'description'		=>	__('Dropdown menu background color.', 'postworld'),
		));

	/**
	 * HEADER : SUB MENU TEXT
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.sub-menu-foreground',
		'label' 			=>	__('Sub Menu Text Color', 'postworld'),
		'description'		=>	__('Dropdown menu text color.', 'postworld'),
		));


	/**
	 * HEADER : SEARCH BUTTON BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.search-button-background',
		'label' 			=>	__('Search Button Background Color', 'postworld'),
		//'description'		=>	__('', 'postworld'),
		));

	/**
	 * HEADER : LOGO BACKGROUND HOVER
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.logo-background-hover',
		'label' 			=>	__('Logo Background Hover Color', 'postworld'),
		'description'		=>	__('Color of the box behind the logo when hovering over it.', 'postworld'),
		));

	/**
	 * HEADER : LINE
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_header',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.header.header-line-color',
		'label' 			=>	__('Header Line Color', 'postworld'),
		'description'		=>	__('Line under the header.', 'postworld'),
		));



	/*****************************************
	 * SECTION : COLORS
	 *****************************************
	 */
	$wp_customize->add_section( 'theme_colors', array(
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Colors', 'textdomain' ),
		'description' => 'Customize the colors for the theme.',
		//'panel' => 'current_theme',
	) );

	/**
	 * BACKGROUND COLOR
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.global-background-color',
		'label' 			=>	__('Background Color', 'postworld'),
		//'description'		=>	__('', 'postworld'),
		));

	/**
	 * FOREGROUND COLOR
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.global-foreground-color',
		'label' 			=>	__('Foreground (Text) Color', 'postworld'),
		//'description'		=>	__('', 'postworld'),
		));

	/**
	 * PRIMARY COLOR
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.primary-color-medium',
		'label' 			=>	__('Primary Color', 'postworld'),
		'description'		=>	__('For primary theme elements.', 'postworld'),
		));

	/**
	 * SECONDARY COLOR
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.secondary-color-medium',
		'label' 			=>	__('Secondary Color', 'postworld'),
		'description'		=>	__('For secondary theme elements.', 'postworld'),
		));

	/**
	 * NEUTRAL COLOR
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.neutral-color-medium',
		'label' 			=>	__('Neutral Color', 'postworld'),
		'description'		=>	__('For neutral theme elements.', 'postworld'),
		));

	/**
	 * HIGHLIGHT : FOREGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.highlight-foreground-color',
		'label' 			=>	__('Hover Foreground (Text) Color', 'postworld'),
		'description'		=>	__('Text color used for highlights, such as mouse hovers.', 'postworld'),
		));

	/**
	 * HIGHLIGHT : BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.highlight-background-color',
		'label' 			=>	__('Hover Background Color', 'postworld'),
		'description'		=>	__('Background color used for highlighted areas, such as mouse hovers.', 'postworld'),
		));

	/**
	 * MODAL : FOREGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.modal-foreground-color',
		'label' 			=>	__('Modal Foreground Color', 'postworld'),
		'description'		=>	__('Text color in modal windows, such as post and gallery image viewers.', 'postworld'),
		));

	/**
	 * MODAL : BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.modal-background-color',
		'label' 			=>	__('Modal Background Color', 'postworld'),
		'description'		=>	__('Background color of modal windows.', 'postworld'),
		));


	/**
	 * MODAL : BACKGROUND
	 */
	$postworld_customize->add_color_setting( $wp_customize, array(
		'section'			=>	'theme_colors',
		'option_definition' =>	'PW_OPTIONS_STYLES',
		'subkey' 			=>	'colors.core.highlight-color-medium',
		'label' 			=>	__('Highlight (Eye Catching) Color', 'postworld'),
		'description'		=>	__('Used for buy now links and email newsletter signup forms.', 'postworld'),
		));


}
