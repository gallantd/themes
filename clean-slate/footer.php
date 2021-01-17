<footer class="footer" id="footer">
  <section class="footer--container">
    <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>


  <?php if ( is_active_sidebar( 'footer-area' ) ) : ?>
  	<div class="primary-sidebar footer-widget-area" role="complementary">
  		<?php dynamic_sidebar( 'footer-area' ); ?>
  	</div><!-- #primary-sidebar -->
  <?php endif; ?>
    </section>
    <section class="contact">
      <h3>Connect</h3>
      <p><a href="mailto:info@iruncanada.com">info@iRunCanada.com</a> <span>|</span> Nova Scotia, Canada</p>
    </section>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
