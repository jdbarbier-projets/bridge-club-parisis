<?php
/**
* Single posts Content Template used by page.php
*
* @package Bloggerz
* @since 1.0
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-section singlepost'); ?>>

	<?php the_title( '<h1 class="h2">', '</h2>' ); ?>

		<div class="post-img">
			<?php bloggerz_post_thumbnail(); ?>
		</div> <!--  .post-img -->

		<div class="post-detail">

			<?php the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloggerz' ),
				'after'  => '</div>',
				) );?>

			</div> <!--  .post-detail -->



		</div> <!--  .post-section -->
		
