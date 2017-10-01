<?php

/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class Zoom_Multiple_Checkbox_Customizer {

	/**
	 * Zoom_Slider_Customizer constructor.
	 *
	 * @param string $theme_slug
	 *
	 * @access public
	 * @since  1.1
	 * @return void
	 */
	public function __construct() {

		add_action( 'customize_register', array( $this, 'include_controls' ) );

	}

	/**
	 * Include Custom Controls
	 *
	 * Includes all our custom control classes.
	 *
	 * @param WP_Customize_Manager $wp_customize
	 *
	 * @access public
	 * @since  1.1
	 * @return void
	 */
	public function include_controls( $wp_customize ) {
		
		require_once get_template_directory() . '/inc/customizer/controls/multiple-checkbox/controls/multiple-checkbox-control.php';

		$wp_customize->register_control_type( 'Zoom_Multiple_Checkbox_Control' );

	}

}

new Zoom_Multiple_Checkbox_Customizer();