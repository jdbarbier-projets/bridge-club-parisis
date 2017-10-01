<?php
/**
 * Template Name: Full Width Page
 *
 * This is the template file that shows all pages by default.
 * Learn more about page.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>
	<div class="banner-section <?php if ( 1 === get_theme_mod( 'bloggerz_theme_header_bgColor_2', 1 ) ) : echo 'banner-bgc';
endif; ?>">
	</div><!-- /.banner-section -->

	<div class="container main-section">
		<div class="left-section full-width-content">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template/content', 'page' );

			endwhile; ?>

		</div> <!--  .left-section -->

	</div> <!--  .container main-section -->
<?php get_footer(); ?>
