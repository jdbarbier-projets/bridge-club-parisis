<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 * @since 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-section' ); ?>>

	<?php bloggerz_post_category(); ?>

	<?php
	if ( is_single() ) :
		the_title( '<h1 class="h2">', '</h2>' );
	else :
		the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	endif;
	?>

	<div class="post-img">
		<?php bloggerz_post_thumbnail(); ?>
	</div> <!--  .post-img -->

	<div class="post-detail">
		<?php
		if ( is_single() ) :
			the_content();
		else :
			if ( checked( get_theme_mod( 'bloggerz_theme_content_type', 'excerpt' ), 'excerpt', false ) ) :
				the_excerpt();
			else :
				the_content();
			endif;
		endif;

		/* translators: %s: Name of current post */
		// the_content( sprintf(
		// 	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloggerz' ),
		// 	get_the_title()
		// ) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'bloggerz' ),
			'after'  => '</div>',
		) );

		comments_template();

		if ( ! is_singular( ) ) : ?>
			<div class="clearfix">
				<?php bloggerz_read_more_link(); ?>
			</div> <!--  .clearfix -->
		<?php endif; ?>
	</div><!-- .post-detail -->
</div><!--  .post-section -->
<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) : ?>
	<div class="comment-form-wrapper">
		<?php comment_form( array(
			'title_reply' => '<span>' . __( 'Laisser un commentaire', 'bloggerz' ) . '</span>',
			'comment_notes_after' => ''
			)
		); ?>
	</div> <!--  .comment-formwrapper -->
<?php endif; ?>
