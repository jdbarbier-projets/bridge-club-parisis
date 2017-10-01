<?php
/**
 * [bloggerz_customize_options description]
 *
 * @param  [array] $wp_customize [description].
 * @return [type]               [description].
 */
function bloggerz_customize_options( $wp_customize ) {

	/**
	 * [bloggerz_sanitize_text] > Sanitize Input Text
	 *
	 * @param  [text] $input [description].
	 * @return [text]        [description].
	 */
	function bloggerz_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	/**
	 * Sanitize Checkboxes.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function bloggerz_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	/**
	 * Sanitize Alignment.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function bloggerz_sanitize_align( $input ) {
    $valid = array(
			'sidebar' 		=> __( 'Sidebar', 'bloggerz' ),
			'fullwidth' 	=> __( 'Full Width', 'bloggerz' ),
		);

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
	}

	/**
	 * Sanitize Alignment.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function bloggerz_sanitize_exc( $input ) {
    $valid = array(
			'excerpt' 		=> __( 'The Excerpt', 'bloggerz' ),
			'fullcontent' => __( 'Full Content', 'bloggerz' ),
		);

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
	}

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'bloggerz' );
	// $wp_customize->get_section( 'header_image' )->title     = __( 'Header Image', 'bloggerz' );

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'bloggerz_options_panel', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Theme Options', 'bloggerz' ),
		'description'    => __( 'This panel allow you to customize your Theme.', 'bloggerz' ),
	) );

		/*
	  * Create Sections
	  */
	$wp_customize->add_section( 'bloggerz_theme_header_bg_1' , array(
		'title'     => __( 'Home Page Banner', 'bloggerz' ),
		'priority'  => 5,
		'panel' 		=> 'bloggerz_options_panel',
	) );
	$wp_customize->add_section( 'bloggerz_theme_header_bg_2' , array(
		'title'     => __( 'Single Post Banner', 'bloggerz' ),
		'priority'  => 10,
		'panel' 		=> 'bloggerz_options_panel',
	) );

	$wp_customize->add_section( 'bloggerz_theme_layout' , array(
		'title'     => __( 'Theme layout', 'bloggerz' ),
		'priority'  => 20,
		'panel' 		=> 'bloggerz_options_panel',
	) );

		// Declear Variables for Customizer.
	$bloggerz_default_header = array(
		get_template_directory_uri() . '/img/banner_img_home.jpg',
		get_template_directory_uri() . '/img/banner_img_single_blog.jpg',
		);
	$bloggerz_header_bg = array(
		__( 'Home Page Header BG', 'bloggerz' ),
		__( 'Single Post Header BG', 'bloggerz' ),
		);
	$bloggerz_header_h1title = array(
		__( 'Home Page Heading Title', 'bloggerz' ),
		__( 'Single Post Heading Title', 'bloggerz' ),
		);
	$bloggerz_headerh1 = array(
		__( 'WE DO STUFF & THINGS', 'bloggerz' ),
		__( 'BLOGGER', 'bloggerz' ),
		);
	$bloggerz_header_ptitle = array(
		__( 'Home Page Heading Short Description', 'bloggerz' ),
		__( 'Single Post Heading Short Description', 'bloggerz' ),
		);
	$bloggerz_headerp = array(
		__( 'Lorem Ipsum has been the industry\'s standard dummy text ever, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bloggerz' ),
		__( 'keep your memories alive', 'bloggerz' ),
		);
	$bloggerz_admin_social = array(
		__( 'Facebook', 'bloggerz' ),
		__( 'LinkedIn', 'bloggerz' ),
		__( 'Twitter', 'bloggerz' ),
		__( 'Google+', 'bloggerz' ),
		);

	$i = 1;
	while ( $i < 2 ) : $i++;

		// BackGround upload.
		$wp_customize->add_setting( "bloggerz_theme_header_image_{$i}", array(
			'default' 					=> $bloggerz_default_header[ intval( $i ) -1 ],
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "bloggerz_theme_header_image_{$i}", array(
			'label' 		=> $bloggerz_header_bg[ intval( $i ) -1 ],
			'section' 	=> "bloggerz_theme_header_bg_{$i}",
			'settings'	=> "bloggerz_theme_header_image_{$i}",
			'priority'	=> 5,
		) ) );

		// Change Heading.
		$wp_customize->add_setting( "bloggerz_theme_header_h1_{$i}", array(
			'default' 					=> $bloggerz_headerh1[ intval( $i ) -1 ],
			'sanitize_callback' => 'bloggerz_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "bloggerz_theme_header_h1_{$i}", array(
			'label'			=> $bloggerz_header_h1title[ intval( $i ) -1 ],
			'section'		=> "bloggerz_theme_header_bg_{$i}",
			'settings'	=> "bloggerz_theme_header_h1_{$i}",
			'type'			=> 'text',
			'priority' 	=> 10,
		) ) );

		// Change Description.
		$wp_customize->add_setting( "bloggerz_theme_header_p_{$i}", array(
			'default' 					=> $bloggerz_headerp[ intval( $i ) -1 ],
			'sanitize_callback' => 'bloggerz_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "bloggerz_theme_header_p_{$i}", array(
			'label'			=> $bloggerz_header_ptitle[ intval( $i ) -1 ],
			'section'		=> "bloggerz_theme_header_bg_{$i}",
			'settings'	=> "bloggerz_theme_header_p_{$i}",
			'type'			=> 'textarea',
			'priority' 	=> 15,
		) ) );

	    // =============================
	    // = Checkbox                  =
	    // =============================
		// Header Search Field.
		$wp_customize->add_setting( "bloggerz_theme_header_bgColor_{$i}", array(
			'default' 					=> true,
			'sanitize_callback' => 'bloggerz_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "bloggerz_theme_header_bgColor_{$i}", array(
			'label'			=> __( 'Display Banner Overlay', 'bloggerz' ),
			'section'		=> "bloggerz_theme_header_bg_{$i}",
			'settings'	=> "bloggerz_theme_header_bgColor_{$i}",
			'type'			=> 'checkbox',
			'priority' 	=> 20,
		) ) );

	endwhile;

	// Header Search Field.
		$wp_customize->add_setting( 'bloggerz_theme_admin_widget', array(
			'default' 					=> true,
			'sanitize_callback' => 'bloggerz_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloggerz_theme_admin_widget', array(
			'label'			=> __( 'Display the Admin Widget?', 'bloggerz' ),
			'section'		=> 'bloggerz_theme_layout',
			'settings'	=> 'bloggerz_theme_admin_widget',
			'type'			=> 'checkbox',
			'priority' 	=> 5,
		) ) );

		// Site Layout.
		$wp_customize->add_setting( 'bloggerz_theme_layout_style', array(
			'default' 					=> 'sidebar',
			'sanitize_callback' => 'bloggerz_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloggerz_theme_layout_style', array(
			'type'			=> 'radio',
			'label' 		=> __( 'Layout Style', 'bloggerz' ),
			'section' 	=> 'bloggerz_theme_layout',
			'choices' 	=> array(
			'sidebar' 		=> __( 'Sidebar', 'bloggerz' ),
			'fullwidth' 	=> __( 'Full Width', 'bloggerz' ),
			),
			'priority' 	=> 10,
		) ) );

		// Categories on blog posts.
		$wp_customize->add_setting( 'bloggerz_categories_on_blog', array(
			'default' 					=> true,
			'sanitize_callback' => 'bloggerz_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloggerz_categories_on_blog', array(
			'label'			=> __( 'Display categories on blog posts?', 'bloggerz' ),
			'section'		=> 'bloggerz_theme_layout',
			'settings'	=> 'bloggerz_categories_on_blog',
			'type'			=> 'checkbox',
			'priority' 	=> 15,
		) ) );

		// Categories on Single posts.
		$wp_customize->add_setting( 'bloggerz_categories_on_single', array(
			'default' 					=> true,
			'sanitize_callback' => 'bloggerz_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloggerz_categories_on_single', array(
			'label'			=> __( 'Display categories on single blog post?', 'bloggerz' ),
			'section'		=> 'bloggerz_theme_layout',
			'settings'	=> 'bloggerz_categories_on_single',
			'type'			=> 'checkbox',
			'priority' 	=> 20,
		) ) );

		// excerpts.
		$wp_customize->add_setting( 'bloggerz_theme_content_type', array(
			'default' 					=> 'excerpt',
			'sanitize_callback' => 'bloggerz_sanitize_exc',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloggerz_theme_content_type', array(
			'type'			=> 'radio',
			'label' 		=> __( 'Show content type on blog', 'bloggerz' ),
			'section' 	=> 'bloggerz_theme_layout',
			'choices' 	=> array(
			'excerpt' 		=> __( 'The Excerpt', 'bloggerz' ),
			'fullcontent' => __( 'Full Content', 'bloggerz' ),
			),
			'priority' 	=> 25,
		) ) );
}

add_action( 'customize_register', 'bloggerz_customize_options' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloggerz_customize_preview_js() {
	wp_enqueue_script( 'bloggerz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bloggerz_customize_preview_js' );
?>
