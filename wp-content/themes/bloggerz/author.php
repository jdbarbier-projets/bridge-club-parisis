<?php
/**
 * Author pages template.
 *
 * Learn more about author.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>

<div class="container main-section">
	<div class="left-section <?php bloggerz_layout(); ?>">
		<div class="author-section">

			<?php bloggerz_author_fullname(); ?>

			<div class="author-data clearfix">
				<?php bloggerz_author_bio(); ?>
			</div>
		</div> <!--  .about-section -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template/content', get_post_format() ); ?>


			<?php endwhile;

			// Display Pagination.
			bloggerz_pagination();

		endif; ?>
	</div><!--  .left-section -->
	<?php bloggerz_sidebar(); ?>
</div>
<?php get_footer(); ?>
