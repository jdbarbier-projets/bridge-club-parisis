<?php
/**
* Bloggerz Method
*
* This file contain the methods that are used to show specific contant.
*
* @package Bloggerz
**/

if ( ! function_exists( 'bloggerz_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function bloggerz_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'bloggerz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for site title tag.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );

		// Register Navigation Menu.
		register_nav_menu( 'primary', __( 'Main Navigation', 'bloggerz' ) );

		// Add Image Size for Widget thumbnail for recent posts.
		add_image_size( 'bloggerz-widget-thumb', 40, 40, true );
		add_image_size( 'bloggerz-thumbnail-medium', 628, 234, true );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bloggerz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Enable support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'Bloggerz', 'Best Theme for Blogs' ),
		) );

		// Enable support for HTML5.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

		$header_img_args = array(
		  'flex-width'    => true,
		  'width'         => 1263,
		  'flex-height'   => true,
		  'height'        => 381,
			'default-text-color'     => '',
		  'default-image' => get_template_directory_uri() . '/img/banner_img_home.jpg',
	 	);

		add_theme_support( 'custom-header', $header_img_args );

		add_editor_style( 'css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'bloggerz_setup' );
if ( ! function_exists( 'bloggerz_home_banner' ) ) :
	/**
	* Display the Customize Banner content
	*/
	function bloggerz_home_banner() {

		$home_banner = get_theme_mod( 'bloggerz_theme_header_image_1', get_template_directory_uri() . '/img/banner_img_home.jpg' );
		$bannerh1 = get_theme_mod( 'bloggerz_theme_header_h1_1', __( 'WE DO STUFF & THINGS', 'bloggerz' ) );
		$banner_desc = get_theme_mod( 'bloggerz_theme_header_p_1', __( 'Lorem Ipsum has been the industry\'s standard dummy text ever, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bloggerz' ) );

		echo '<img src="' . esc_url( $home_banner ) . '" alt=""><div class="banner-txt-section"><h1>' . esc_html( $bannerh1 ) . '</h1></div>';
	}
endif;

if ( ! function_exists( 'bloggerz_home_Image' ) ) :
	/**
	* Display the Customize Banner content
	*/
	function bloggerz_home_Image() {

		$home_banner = get_header_image() ? get_header_image() : get_template_directory_uri() . '/img/banner_img_home.jpg';

		$bannerh1 = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : __( 'WE DO STUFF & THINGS', 'bloggerz' );
		$banner_desc = get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : __( 'Lorem Ipsum has been the industry\'s standard dummy text ever, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bloggerz' );

		if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) {
			$meta = '<div class="banner-txt-section"><h1>' . esc_html( $bannerh1 ) . '</h1></div>';
		} else {
			$meta = '';
		}
		echo '<img src="' . esc_url( $home_banner ) . '" alt="">' . $meta;
	}
endif;

if ( ! function_exists( 'bloggerz_single_banner' ) ) :
	/**
	* Display the Customize Single Page Banner content
	*/
	function bloggerz_single_banner() {

		$single_banner = get_theme_mod( 'bloggerz_theme_header_image_2', get_template_directory_uri() . '/img/banner_img_single_blog.jpg' );
		$s_bannerh1 = get_theme_mod( 'bloggerz_theme_header_h1_2', __( 'Blogger', 'bloggerz' ) );
		$s_banner_desc = get_theme_mod( 'bloggerz_theme_header_p_2', __( 'keep your memories alive', 'bloggerz' ) );

		// if ( 1 === get_theme_mod( 'bloggerz_theme_post_default_header', 1 ) ) :
		echo '<img src="' . esc_url( $single_banner ) . '" alt=""><div class="banner-txt-section"><h1>' .  esc_html( $s_bannerh1 ) . '</h1></div>';
		// endif;
	}
endif;

if ( ! function_exists( 'bloggerz_site_logo' ) ) :
	/**
	* Displays the site logo in the header area
	*/
	function bloggerz_site_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :

			the_custom_logo();

		else :
			if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) : ?>
			<div class="logo-container">
				<h1 class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo  esc_html( get_bloginfo( 'description' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>
			</div>
			<?php endif;
		endif;

	}
endif;

if ( ! function_exists( 'bloggerz_default_menu' ) ) :

	/**
	* Display default page as navigation if no custom menu.
	*
	* @since 1.0
	*/
	function bloggerz_default_menu() {

		echo '<ul id="" class="wp-menu"><li class="page_item"><a href="/">Accueil</a></li><li class="page_item"><a href="/?post_type=forum">Recherche partenaire</a></li>'. wp_list_pages( 'title_li=&echo=0' ) .'</ul>';

	}
endif;

if ( ! function_exists( 'bloggerz_layout' ) ) :
	/**
	* Add full width content css
	*/
	function bloggerz_layout() {

		'fullwidth' === get_theme_mod( 'bloggerz_theme_layout_style' ) ?
		$bloggerz_layout = 'full-width-content' : $bloggerz_layout = '';

		echo $bloggerz_layout;
	}
endif;

if ( ! function_exists( 'bloggerz_sidebar' ) ) :
	/**
	* Add SideBar into Theme
	*/
	function bloggerz_sidebar() {

		if ( 'sidebar' === get_theme_mod( 'bloggerz_theme_layout_style' , 'sidebar' ) ) :
			echo get_sidebar();
		endif;
	}
endif;

if ( ! function_exists( 'bloggerz_post_meta_author' ) ) :
	/**
	* Displays the post author
	*/
	function bloggerz_post_meta_author() {

		$author_string = "";

	echo wp_kses( $author_string, array( 'a' => array( 'href' => array(), 'class' => array(), 'title' => array(), 'rel' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ) ) );

}
endif;

if ( ! function_exists( 'bloggerz_post_meta_date' ) ) :
	/**
	* Displays the post date
	*/
	function bloggerz_post_meta_date() {

		$time_string = sprintf( '<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date published updated" datetime="%3$s"><a href="%1$s">%4$s</a></time></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	echo wp_kses( $time_string, array( 'span' => array( 'class' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ), 'time' => array( 'class' => array( 'entry-date', 'published', 'updated' ), 'datetime' => array() ), 'a' => array( 'href' => array() ) ) );

}
endif;

if ( ! function_exists( 'bloggerz_post_meta_category' ) ) :
	/**
	* Displays the category of posts
	*/
	function bloggerz_post_category() {

		
	}
endif;

if ( ! function_exists( 'bloggerz_post_meta_tag' ) ) :
	/**
	* Displays the category of posts
	*/
	function bloggerz_post_meta_tag() {
		echo '<span class="categories">' . get_the_tag_list( '', ', ' ) . '</span>';
	}
endif;

if ( ! function_exists( 'bloggerz_author_fullname' ) ) :

	/**
	* Display Author Full Name
	*/
	function bloggerz_author_fullname() {
		$author_fname = strtoupper( esc_html( get_the_author_meta( 'first_name' ) ) );
		$author_lname = strtoupper( esc_html( get_the_author_meta( 'last_name' ) ) );
		if ( $author_fname and $author_lname ) {
			$author_fullname = $author_fname . ' ' . $author_lname;
		} else {
			$author_fullname = strtoupper( esc_html( get_the_author_meta( 'display_name' ) ) );
		}
		echo '<h2>' . $author_fullname . '</h2>';
	}
endif;

if ( ! function_exists( 'bloggerz_author_bio' ) ) :

	/**
	* Display Author Avatar and Description
	*/
	function bloggerz_author_bio() {
		$bloggerz_auth_avat = get_avatar( sanitize_email( get_the_author_meta( 'user_email' ) ), 64 );
		$bloggerz_auth_desc = esc_html( get_the_author_meta( 'description' ) );

		$bloggerz_auth_bio = '<div class="authorimg">' . $bloggerz_auth_avat . '</div>';
		if ( ! empty( $bloggerz_auth_desc ) ) :
			$bloggerz_auth_bio .= ' <div class="author-meta-data">';
			$bloggerz_auth_bio .= '</h6>' .__( 'About Author', 'bloggerz' ) . '</h6>';
			$bloggerz_auth_bio .= '<p>' . wp_kses_post( $bloggerz_auth_desc ) . '</p></div>';
		endif;

		echo wp_kses( $bloggerz_auth_bio, array( 'div' => array( 'class' => array() ), 'p' => array( 'class' => array() ), 'h6' => array(), 'img' => array( 'src' => array(), 'srcset' => array(), 'class' => array(), 'alt' => array(), 'height' => array(), 'width' => array() ) ) );

	}
endif;

if ( ! function_exists( 'bloggerz_short_about_author' ) ) :

	/**
	* Widget about Author on sidebar.
	*
	*  @since 1.0
	*/
	function bloggerz_short_about_author() {
		$author_fname 	= strtoupper( esc_html( get_the_author_meta( 'first_name' ) ) );
		$author_lname 	= strtoupper( esc_html( get_the_author_meta( 'last_name' ) ) );
		if ( $author_fname and $author_lname ) {
			$author_fullname = $author_fname . ' ' . $author_lname;
		} else {
			$author_fullname = strtoupper( esc_html( get_the_author_meta( 'display_name' ) ) );
		}
		$author_image 	= get_avatar( sanitize_email( get_the_author_meta( 'user_email' ) ), 64 );

		$author_shabout  = get_the_author_meta( 'description' ) ? get_the_author_meta( 'description' ) : __( 'Add Short Descriptiop From Users > Your Profile > Biographical Info', 'bloggerz' );
		if ( get_theme_mod( 'bloggerz_theme_admin_widget', true ) ||
		checked( get_theme_mod( 'bloggerz_theme_admin_widget' ), true, false ) ) :
		$author_about_wid = '<div class="widget-box widget">';
		$author_about_wid .= '<h5>' . __( 'About Author', 'bloggerz' ) . '</h5>';
		$author_about_wid .= '<div class="authorinfo">';
		$author_about_wid .= '<div class="authorimg">';
		$author_about_wid .= $author_image;
		$author_about_wid .= '</div>';
		$author_about_wid .= '<h3>' . $author_fullname . '</h3>';

		$author_about_wid .= '<p>' . esc_html( $author_shabout ) . '</p>';
		$author_about_wid .= '</div></div>';

		echo wp_kses( $author_about_wid, array( 'div' => array( 'class' => array() ), 'h5' => array(), 'h3' => array(), 'ul' => array( 'class' => array() ), 'li' => array(), 'a' => array( 'href' => array(), 'class' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ), 'p' => array(), 'img' => array( 'src' => array(), 'srcset' => array(), 'class' => array(), 'alt' => array(), 'height' => array(), 'width' => array() ) ) );
	endif;
}
endif;

if ( ! function_exists( 'bloggerz_read_more_link' ) ) :
	/**
	* Bloggerz Read More Link.
	*
	* @since 1.0
	*/
	function bloggerz_read_more_link() {

		$bloggerz_postlink = '<a href="' . esc_url( get_permalink() ) . '" class="more-btn">' . __( 'En savoir plus', 'bloggerz' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i></a>';

		echo wp_kses( $bloggerz_postlink, array( 'a' => array( 'href' => array(), 'class' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ) ) );
	}
endif;
if ( ! function_exists( 'bloggerz_post_thumbnail' ) ) :
	/**
	* [bloggerz_post_thumbnail description]
	*
	* @since 1.0
	*/
	function bloggerz_post_thumbnail() {
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'bloggerz-thumbnail-medium' );
		endif;
	}

endif;
if ( ! function_exists( 'bloggerz_post_comment_count' ) ) :
	/**
	* Bloggerz Post Comments Count.
	*
	* @since 1.0
	*/
	function bloggerz_post_comment_count() {
		echo comments_number( __( 'Soyez le premier à poster un commentaire', 'bloggerz' ), __( '1 commentaire', 'bloggerz' ), __( '% commentaires', 'bloggerz' ) );
	}
endif;

if ( ! function_exists( 'bloggerz_pagination' ) ) :

	/**
	* Bloggerz pagination function [Display the pagination]
	*
	* @since 1.0
	**/
	function bloggerz_pagination() {

		the_posts_pagination( array(
		    'mid_size' 	=> 2,
		    'prev_text' => '&laquo',
		    'next_text' => '&raquo;'
			) );
	}
endif;


/* Add Placehoder in comment Form Fields (Name, Email, Website) */

add_filter( 'comment_form_default_fields', 'bloggerz_comment_placeholders' );
function bloggerz_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="Votre Nom*"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="Votre Email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="Site internet"',
        $fields['url']
    );
    return $fields;
}

/* Add Placehoder in comment Form Field (Comment) */
add_filter( 'comment_form_defaults', 'bloggerz_textarea_placeholder' );

function bloggerz_textarea_placeholder( $fields )
{

        $fields['comment_field'] = str_replace(
            '<textarea',
            '<textarea placeholder="Votre commentaire*"',
            $fields['comment_field']
        );


    return $fields;
}

/**
* Bloggerz footer Text
*/
function bloggerz_footer_text() {
	$bloggerz_developed_by .= '<p class="copy-pgh"> ' . sprintf( __( 'Copyright %1$s %2$s %3$s : ', 'bloggerz' ), '&#169;', date("Y"), '&#183;' ). '<a href="'. esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) )  . '</a></p></div>';

	echo wp_kses( $bloggerz_developed_by, array( 'div' => array( 'class' => array() ), 'p' => array( 'class' => array() ), 'a' => array( 'href' => array() ) ) );
}
add_action( 'bloggerz_footer_text', 'bloggerz_footer_text' );

if ( ! function_exists( 'bloggerz_widgets_init' ) ) :

	/**
	* Register widget areas and custom widgets.
	*
	* @link http://codex.wordpress.org/Function_Reference/register_sidebar
	*/
	function bloggerz_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Bloggerz Sidebar', 'bloggerz' ),
			'id' => 'bloggerz-sidebar',
			'description' => __( 'Appears on posts and pages except the full width template.', 'bloggerz' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
	}
endif;
add_action( 'widgets_init', 'bloggerz_widgets_init' );

?>
