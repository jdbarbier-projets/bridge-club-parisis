<?php
/**
 * Template for Pages.
 *
 * This is the template file that shows all pages by default.
 * Learn more about page.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template/content', 'page' );

			endwhile; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div> <!--  .container main-section -->
<?php get_footer(); ?>
