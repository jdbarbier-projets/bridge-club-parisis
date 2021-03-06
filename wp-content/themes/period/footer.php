<?php do_action( 'main_bottom' ); ?>
</section> <!-- .main -->
<?php get_sidebar( 'primary' ); ?>
<?php do_action( 'after_main' ); ?>
</div><!-- .max-width -->
</div><!-- .primary-container -->

<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="max-width">
        <?php do_action( 'footer_top' ); ?>
    </div>
    <div class="design-credit">
        <span>
            <?php
            $footer_text = sprintf( __( '<a href="%1$s">%2$s WordPress Theme</a> by Compete Themes.', 'period' ), 'https://www.competethemes.com/period/', wp_get_theme( get_template() ) );
            $footer_text = apply_filters( 'ct_period_footer_text', $footer_text );
            echo wp_kses_post( $footer_text );
            ?>
        </span>
    </div>
</footer>
</div><!-- .overflow-container -->

<?php do_action( 'body_bottom' ); ?>

<?php wp_footer(); ?>

</body>
</html>