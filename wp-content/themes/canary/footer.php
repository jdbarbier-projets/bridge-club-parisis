<?php /**
 * Canary footer file
 *
 * @category WordPress
 * @package  Canary
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/canary/
 *
 */
?>

<div class="clear"></div>
</div>
<footer id="colophon" class="site-footer " role="contentinfo">
  <div class="wrapper">
    <?php
    if (has_nav_menu('footer')) {
         wp_nav_menu(
             array( 
             'theme_location' => 'footer', 
             'container' => false, 
             'menu_id' => 'footer-nav', 
             'menu_name' => 'footer_nav', 
             'menu_class' => 'footer-nav ', 
             'link_before' => '<span>', 
             'link_after' => '</span>',
             'fallback_cb'=>false,
             'depth'=>1
             )
         );
    }?>
    <div class="site-info centertext footer-copy">
      <?php if( $footer_html=get_theme_mod('footer_text')){ 
      echo esc_html($footer_html);
    }else{?>
      <p class="no-margin"> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><span>&copy;&nbsp;</span><?php echo esc_html(date('Y'));?><span>&nbsp;</span>
        <?php bloginfo('name'); ?>
        <span><span>.&nbsp;</span></span></a><a href="<?php echo esc_url('https://wordpress.org/'); ?>">
        <?php esc_html_e('Proudly powered by WordPress.', 'canary'); ?>
        </a><a href="<?php echo esc_url('https://linesh.com/projects/canary/'); ?>">
        <?php esc_html_e('Canary', 'canary'); ?>
        </a><span>, &nbsp;</span><a href="<?php echo esc_url('https://linesh.com/'); ?>">
        <?php esc_html_e('Theme by Linesh Jose', 'canary'); ?>
        <span>.</span></a></p>
      <?php } ?>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body></html>