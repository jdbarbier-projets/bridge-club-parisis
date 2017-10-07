<?php
/**
 * Template for header.
 *
 * @package Bloggerz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Add your site or application content here -->
	<div class="wrapper">
		<header class="headerWrapper">
			<div class="container">
			<?php bloggerz_site_logo(); ?>
				<button class="menu-btn">
					<span class="bar"></span>
				</button>
					<?php
						// Display Main Navigation
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'container' => false,
							'menu_class' => 'wp-menu',
							'echo' => true,
							'fallback_cb' => 'bloggerz_default_menu',
							)
						);
					?>
			</div><!-- /.container -->
		</header>
