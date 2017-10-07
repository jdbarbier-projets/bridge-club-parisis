<div class="">

	<h1 class=""><?php esc_html_e( 'No matches', 'bloggerz' ); ?></h1>

	<div class="">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bloggerz' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bloggerz' ); ?></p>
			<?php
				get_search_form();

		endif; ?>

	</div>

</div>
