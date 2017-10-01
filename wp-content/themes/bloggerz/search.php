<?php
/**
 * Template for Search results pages.
 * Learn more about search.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">

		<h2><?php printf( __( 'Search Results for: %s', 'bloggerz' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'template/content', 'excerpt' );

			endwhile;

			// Display Pagination.
			bloggerz_pagination();

		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bloggerz' ); ?></p>
			<?php
			get_search_form();

		endif; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div

<?php get_footer(); ?>
