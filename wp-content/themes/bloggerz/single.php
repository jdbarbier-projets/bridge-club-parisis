<?php
/**
 * Template for Single posts.
 *
 * @package Bloggerz
 */

get_header(); ?>

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">
		<?php while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */

			get_template_part( 'template/content', get_post_format() );
			?>

		   <!--  .comment-formwrapper -->
			<?php

		endwhile; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div> <!--  .container main-section -->
<?php get_footer(); ?>
