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
		<div class="clearfix post-info">
			<?php bloggerz_post_meta_author(); ?>
			<?php bloggerz_post_meta_date(); ?>
		</div> <!--  .clearfix -->

		<div class="post-img">
			<?php bloggerz_post_thumbnail(); ?>
		</div> <!--  .post-img -->

		<div class="post-detail">

			<?php the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloggerz' ),
				'after'  => '</div>',
				) );
				comments_template();?>

			</div> <!--  .post-detail -->



		</div> <!--  .post-section -->
		<?php if( comments_open() && get_option( 'thread_comments' ) ) : ?>
		<div class="comment-form-wrapper">
			<?php comment_form( array(
				'title_reply' => '<span>' . esc_html__( 'Laisser un commentaire', 'bloggerz' ) . '</span>',
				'comment_notes_after' => ''
				)
			); ?>
		</div> <!--  .comment-formwrapper -->
	<?php endif; ?>
