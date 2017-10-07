<?php
/**
 * Archive pages template.
 *
 * Learn more about archive.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">

			<div class="author-section">
				<h2><?php the_archive_title( '<span>', '</span>' );?></h2>
			</div>
			
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				get_template_part( 'template/content', get_post_format() ); ?>

				<?php endwhile;

				// Display Pagination.
				bloggerz_pagination();

		endif; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div>

<?php get_footer(); ?>
