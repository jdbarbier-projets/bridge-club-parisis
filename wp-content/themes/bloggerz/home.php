<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>
	<div class="banner-section <?php if ( get_theme_mod( 'bloggerz_theme_header_bgColor_1', true ) ||
	checked( get_theme_mod( 'bloggerz_theme_header_bgColor_1' ), true, false )
	) : echo 'banner-bgc';
endif; ?>">
		<?php bloggerz_home_Image(); ?><!--  .banner_txt_section -->

	</div><!-- /.banner-section -->
	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template/content', get_post_format() ); ?>


				<?php endwhile;

				// Display Pagination.
				bloggerz_pagination();

			endif; ?>
		</div> <!--  .left-section -->


		<?php bloggerz_sidebar(); ?>
	</div> <!--  .container main-section -->
<?php get_footer(); ?>
