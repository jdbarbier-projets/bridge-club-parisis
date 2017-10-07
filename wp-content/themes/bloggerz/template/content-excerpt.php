<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 * @since 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-section' ); ?>>

	<?php bloggerz_post_category(); ?>
	
	<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

	<div class="clearfix post-info">
		<?php bloggerz_post_meta_author(); ?>
		<?php bloggerz_post_meta_date(); ?>
	</div> <!--  .clearfix -->

	<div class="post-img">
		<?php bloggerz_post_thumbnail(); ?>
	</div> <!--  .post-img -->

	<div class="post-detail">
		<?php the_excerpt(); ?>
		<div class="clearfix">
			<?php bloggerz_read_more_link(); ?>
		</div> <!--  .clearfix -->
	</div><!-- .post-detail -->
</div><!--  .post-section -->
