<?php
/**
* Template part for displaying video posts
*
* @package Bloggerz
* @since 1.0
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-section singlepost' ); ?>>

	<?php bloggerz_post_category(); ?>

	<?php
	if ( is_single() ) :
		the_title( '<h1 class="h2">', '</h2>' );
	else :
		the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	endif;
	?>
	<div class="clearfix post-info">
		<?php bloggerz_post_meta_author(); ?>
		<?php bloggerz_post_meta_date(); ?>
	</div> <!--  .clearfix -->
	<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$video = false;

	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}

	?>
	<div class="post-img">
		<?php bloggerz_post_thumbnail(); ?>
	</div> <!--  .post-img -->

	<div class="post-detail">
		<?php if ( ! is_single() ) :

			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) :
				foreach ( $video as $video_html ) {
					echo '<div class="bloggerz-video">';
						echo $video_html;
					echo '</div>';
				}
			endif;

		endif;

		if ( is_single() || empty( $video ) ) :

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloggerz' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bloggerz' ),
				'after'  => '</div>',
			) );

		endif;

		comments_template();

		if ( ! is_singular() ) : ?>
			<div class="clearfix">
				<span class="post-comment"><i class="fa fa-comments" aria-hidden="true"></i><?php bloggerz_post_comment_count(); ?></span>
				<?php bloggerz_read_more_link(); ?>
			</div> <!--  .clearfix -->
		<?php endif; ?>
	</div> <!--  .post-detail -->
</div> <!--  .post-section -->

<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) : ?>
	<div class="comment-form-wrapper">
		<?php comment_form( array(
			'title_reply' => '<span>' . __( 'Laisser un commentaire', 'bloggerz' ) . '</span>',
			'comment_notes_after' => ''
			)
		); ?>
	</div> <!--  .comment-formwrapper -->
<?php endif; ?>
