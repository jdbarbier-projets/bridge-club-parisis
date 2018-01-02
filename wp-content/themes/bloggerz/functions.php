<?php
/**
* Bloggerz functions and definitions
*
* @package Bloggerz
*/


function custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
* Retrieve the register Google Fonts
*/
function bloggerz_google_font_url() {

	// Set Font Family.
	$font_families = array( 'Lato:400,400italic,700,700italic' );

	// Build Fonts URL.
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
* Enqueue Google Fonts on Front End
*
* @since Bloggerz 1.0
*/
function bloggerz_scripts_styles() {
	wp_enqueue_style( 'bloggerz-fonts', bloggerz_google_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'bloggerz_scripts_styles' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Bloggerz 1.0
*/
function bloggerz_custom_header_fonts() {
	wp_enqueue_style( 'bloggerz-fonts', bloggerz_google_font_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'bloggerz_custom_header_fonts' );

/**
* Sets the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*
* @since Bloggerz 1.0
*/
function bloggerz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloggerz_content_width', 900 );
}
add_action( 'after_setup_theme', 'bloggerz_content_width', 0 );

/**
* Enqueue Scripts
*
* @since Bloggerz 1.0
*/

if ( ! function_exists( 'bloggerz_enqueue_scripts' ) ) {

	/** Function bloggerz_enqueue_scripts */
	function bloggerz_enqueue_scripts() {

		// Enqueue Style.
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', false, '3.0.3' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', false, '4.6.3' );
		wp_enqueue_style( 'bloggerz-style', get_stylesheet_uri(), false, '1.0.7' );

		$bloggerz_header_clr = esc_html( get_theme_mod( 'header_textcolor', '4a88c2' ) );
    $_bloggerz_header_clr = "
            .logo a, .wp-menu > li > a{
                    color: #{$bloggerz_header_clr};
            }";
    wp_add_inline_style( 'bloggerz-style', $_bloggerz_header_clr );

		// Register and enqueue navigation.js.
		wp_enqueue_script( 'bloggerz-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0' );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', false, '2.8.3', true );
		wp_enqueue_script( 'bloggerz-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.7', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'bloggerz_enqueue_scripts' );

require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/bloggerz-method.php';
require get_template_directory() . '/inc/recent-posts-thumbnail-widget.php';

function bloggerz_recent_post_widget() {
	register_widget( 'Bloggerz_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'bloggerz_recent_post_widget');


// Theme Required plugins section
// TGM Activation Class

require_once get_template_directory() . '/inc/bloggerz-plugin-activation.php';

function bloggerz_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Google analytics dashboard for WordPress',
			'slug'      => 'wp-analytify',
			'required'  => false,
		),
		array(
			'name'      => 'LoginPress | Login Page Customizer',
			'slug'      => 'loginpress',
			'required'  => false,
		),
		array(
			'name'      => 'Maintenance Mode',
			'slug'      => 'under-construction-maintenance-mode',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'bloggerz',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'bloggerz' ),
			'menu_title'                      => __( 'Install Plugins', 'bloggerz' ),
			'installing'                      => __( 'Installing Plugin: %s', 'bloggerz' ),
			'updating'                        => __( 'Updating Plugin: %s', 'bloggerz' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'bloggerz' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'bloggerz'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'bloggerz'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'bloggerz'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'bloggerz'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'bloggerz'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'bloggerz'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'bloggerz'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'bloggerz'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'bloggerz'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'bloggerz' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'bloggerz' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'bloggerz' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'bloggerz' ),
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'bloggerz' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'bloggerz' ),
			'dismiss'                         => __( 'Dismiss this notice', 'bloggerz' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'bloggerz' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'bloggerz' ),
			'nag_type'                        => 'updated',
		),
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'bloggerz_register_required_plugins' );
?>
