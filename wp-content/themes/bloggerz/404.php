<?php
/**
 * The template page for display 404 Pages.
 *
 * @package Bloggerz
 * @since 1.0
 */

get_header(); ?>


				<div class="page404">
					<div class="container">
						<h1><?php esc_html_e( '404', 'bloggerz' ); ?></h1>
						<p><?php esc_html_e( 'This isn&#39;t good. Seems like...', 'bloggerz' ); ?></p>
						<h3><?php esc_html_e( 'You got lost .... Maybe try a search the links below?', 'bloggerz' ); ?></h3>
						<?php get_search_form(); ?>
					</div> <!--  .container -->
				</div>

<?php get_footer(); ?>
