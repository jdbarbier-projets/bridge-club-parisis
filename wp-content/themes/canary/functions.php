<?php
/**
 * Main Functions file
 *
 * @category WordPress
 * @package  Canary
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/canary/
 *
 */

// canary- setup --------------->
add_action( 'after_setup_theme', 'canary_setup' );
function canary_setup() 
{
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;

	load_theme_textdomain( 'canary', get_template_directory() . '/languages' );

	add_theme_support('automatic-feed-links' );
	add_theme_support('title-tag' );
	add_theme_support('post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );
	add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption'	) );
	add_theme_support('customize-selective-refresh-widgets' );
	add_theme_support('post-thumbnails' );
		set_post_thumbnail_size( 150, 150,true ); 
		add_image_size('canary-post-medium', 400, 250, true );
		add_image_size('canary-post-big', 850,300, true );
		add_image_size('canary-post-single', 800,0, false );
		add_image_size('canary-post-wide', 1200,500, true );

	add_theme_support( 'custom-logo', array());
	add_theme_support( "custom-header", array(
		'width'        => 1600,
		'default-image'  => '',
		'height'        => 600,
		'header-text' => true,
		'video'              => true,
		'video-active-callback' => '',
		'default-text-color' => '#FFFFFF',
	));
	add_theme_support( "custom-background",  array(
		'default-color' => '#EFEFEF',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu','canary' ),
		'social'  => __( 'Social Menu','canary' ),
		'footer'  => __( 'Footer Menu','canary' ),
	) );
}// canary_setup

// canary sidebarsetup --------------->
function canary_sidebars(){
	$sidebars=array(
			array(
			'name'          => __( 'Canary Widget Area', 'canary' ),
			'id'            => 'canary_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'canary' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) 	
	);
	return $sidebars;
}
add_action( 'widgets_init', 'canary_widgets_init' );
function  canary_widgets_init() {
	foreach(canary_sidebars() as $sidebar){
		register_sidebar($sidebar);
	}
}


// Customizer settings ----------->
function canary_customize_partial_blogname() {bloginfo( 'name' );}
function canary_customize_partial_blogdescription() {bloginfo( 'description' );}
add_action( 'customize_register', 'canary_customize_register', 11 );
function canary_customize_register( $wp_customize ) 
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname', array(
            'selector' => '.site-title a',
            'container_inclusive' => false,
            'render_callback' => 'canary_customize_partial_blogname',
            ) 
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription', array(
            'selector' => '.site-description',
            'container_inclusive' => false,
            'render_callback' => 'canary_customize_partial_blogdescription',
            ) 
        );
    }

	// Canary settings ---------------->
	$colors_array =array(
			'header_background_color'=>array(
					'title'=>__('Header Background Color', 'canary' ),
					'default'           => '#E68E00',
			),
			'footer_bg_color'=>array(
					'title'=>__('Footer Background Color', 'canary' ),
					'default'  => '#E0E0E0',
			),
			'wt_bg_color'=>array(
					'title'=>__('Widget Title Background Color', 'canary' ),
					'default'  => '#E68E00',
			),
			'bt_bg_color'=>array(
					'title'=>__('Button Background color', 'canary' ),
					'default'  => '#555555',
			),
			'wt_color'=>array(
					'title'=>__('Widget Title Color', 'canary' ),
					'default'  => '#FFFFFF',
			),
			'footer_color'=>array(
					'title'=>__('Footer Text Color', 'canary' ),
					'default'  => '#686868',
			),
			'bt_color'=>array(
					'title'=>__('Button Text Color', 'canary' ),
					'default'  => '#FFFFFF',
			),
			'link_color'=>array(
					'title'=>__('Link color', 'canary' ),
					'default'  => '#B57000',
			),
		);

	foreach($colors_array as $index=>$color){
		$wp_customize->add_setting( $index, array(
			'default'           => $color['default'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $index, array(
			'label'       => __('Canary', 'canary' ) .' - '.$color['title'],
			'section'     => 'colors',
		)));
	}

	//  Fotter text ----------------------->
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('footer_text', array(
		'label'       => 'Canary - Footer Text ',
		'section'     => 'title_tagline',
		'type' => 'textarea',
	));

}

// Adding scripts and CSS --------------->
	add_action( 'wp_enqueue_scripts', 'canary_scripts' );
	function canary_scripts() {
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), null,'all');
		wp_enqueue_style( 'canary-style', get_stylesheet_uri(), array() ,null,'all');
		wp_enqueue_style( 'canary-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null,'all');
		if(is_rtl()){
			wp_enqueue_style( 'canary-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), null,'all');
		}

		// Inline css ---------------->
		$custom_css ='';
		if (!display_header_text() ) {
		 $custom_css .= '.site-branding, .site-branding .site-title, .site-description {
				 clip: rect(1px, 1px, 1px, 1px)!important;
				 position: absolute!important;
				 margin:0px !important;
			}';
		}
		$image=(array)get_custom_header();
		$custom_css .= '#masthead{
				background-image:url(\''.esc_url($image['url']).'\') !important;
				background-size:cover;
				background-color:'.esc_attr(get_theme_mod('header_background_color')).'
			}
			#masthead, #masthead a,#masthead .site-header-menu ul li a {
			 	color: #'.esc_attr(get_header_textcolor()).';
			}
			#secondary.sidebar .widget .widget-title { 
				background:'.esc_attr(get_theme_mod('wt_bg_color')).';
				color:'.esc_attr(get_theme_mod('wt_color')).' ;
			}
			button, .button, input[type="submit"],input[type="reset"] {
				background-color:'.esc_attr(get_theme_mod('bt_bg_color')).'; 
				color:'.esc_attr(get_theme_mod('bt_color')).';
			}
			#content a{ 
				color:'.esc_attr(get_theme_mod('link_color')).';
			}
			#colophon{
				background-color:'.esc_attr(get_theme_mod('footer_bg_color')).'; 
			}
			#colophon,
			#colophon a{
				color:'.esc_attr(get_theme_mod('footer_color')).'; 
			}
		';

        wp_add_inline_style( 'canary-style', $custom_css );

		
        // Scripts ---------------->
		if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); }
		wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/assets/js/html5.js', array( 'jquery' ), NULL, false );
    	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'canary-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), NULL, false );
	}

	add_action( 'customize_preview_init', 'canary_customize_preview_js' );
	function canary_customize_preview_js() {
		wp_enqueue_script( 'canary-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), NULL, true );
	}

//require (get_template_directory() . '/inc/customizer-custom-controls/theme-customizer.php');
require (get_template_directory() . '/inc/main-funtions.php');
?>