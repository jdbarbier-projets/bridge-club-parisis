<?php
/* ------------------------------------------------------------------------- *
 *  Admin panel functions
/* ------------------------------------------------------------------------- */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }


add_action( 'admin_init' , 'zoom_admin_style' );
add_action( 'wp_before_admin_bar_render', 'zoom_admin_bar_help_button' );

function zoom_admin_style() {
	
	wp_enqueue_style( 'zoom-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/zoom-admin.css', array(), wp_get_theme()->get( 'Version' ) );
	
}

function zoom_admin_bar_help_button() {
	
	if ( ! get_theme_mod( 'misc_admin_topbar', true ) ) return;
	
	if ( ! current_user_can( 'edit_theme_options' ) ) return;
	
	global $wp_admin_bar;
	
	$wp_admin_bar->add_menu( array(
			'parent' => 'top-secondary',
     		'id' => 'tc-zoom-help' ,
     		'title' =>  __( 'Help' , 'zoom-lite' ),
     		'href' => admin_url( 'themes.php?page=zoom-lite-welcome&tab=support' ),
     		'meta'   => array(
        	'title'  => __( 'Need help with the Zoom theme?', 'zoom-lite' ),
      		),
   		));
	
}


function zoom_post_formats_script_handle( $hook ) {
	
	// Only load on posts, pages
    if ( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) return;
	
    wp_enqueue_script( 'zoom-post-formats', get_template_directory_uri() . '/inc/admin/assets/js/post-formats.js', array( 'jquery' ) );
	
	$localized_array = array( 'gallery_count' => zoom_gallery_count() );
	
	// Check first before Enqueue WP Pointer
    $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

    if ( ! in_array( 'zoom_post_format_pointer', $dismissed ) ) {
		
        wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
		
		$localized_array['is_rtl'] = is_rtl();
		$localized_array['title'] = esc_html__( 'ZOOM Theme' , 'zoom-lite' );
		$localized_array['content'] = esc_html__( 'The following Post Formats will make you more easily to display image gallery, video or music player.' , 'zoom-lite' );
			
	}
	
	wp_localize_script( 'zoom-post-formats', 'zomm_lclz', $localized_array );
	
}

add_action( 'admin_enqueue_scripts', 'zoom_post_formats_script_handle');

function zoom_gallery_count() {
	
	$g_id = get_post_meta( get_the_ID(), 'post_gallery', true );
	$g_id = explode( ',', $g_id );
	
	if ( array_filter( $g_id, 'zoom_isNumber' ) ) {
		return 'gallery-edit';
	}
	else {
		return 'gallery';
		}

}

function zoom_isNumber( $arr ) {
	return is_numeric( $arr );
}