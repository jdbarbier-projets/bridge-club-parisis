<?php
/**
 * The template for displaying search results pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Treville
 */

get_header(); ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :  ?>

			<header class="page-header">

				<h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'treville' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<div class="search-form-wrap"><?php get_search_form(); ?></div>

			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post();

				if ( 'post' === get_post_type() ) :

					get_template_part( 'template-parts/content' );

				else :

					get_template_part( 'template-parts/content', 'search' );

				endif;

			endwhile;

			treville_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>