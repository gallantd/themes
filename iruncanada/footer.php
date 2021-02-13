      <footer class="footer" id="footer">
        <section class="footer-level-1">
          <a href="<?= get_home_url(); ?>">
            <?php single_image(['link' => get_template_directory_uri().'/img/icon.png', 'alt'=> 'I run Canada', 'title' => 'I run Canada', 'class'=> 'site-icon']); ?>
         </a>
          <h3>Connect</h3>
          <p><a href="mailto:info@iruncanada.com">info@iRunCanada.com</a> <span>|</span> Nova Scotia, Canada</p>
        </section>
        <section class="footer-level-2">
          <?php if ( is_active_sidebar( 'footer-level-2' ) ) : ?>
              <?php dynamic_sidebar( 'footer-level-2' ); ?>
      <?php endif; ?>
        </section>
        <section class="footer-level-3">
          <?php if ( is_active_sidebar( 'footer-level-3a' ) ) : ?>
              <?php dynamic_sidebar( 'footer-level-3a' ); ?>
        <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-level-3b' ) ) : ?>
              <?php dynamic_sidebar( 'footer-level-3b' ); ?>
        <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-level-3c' ) ) : ?>
              <?php dynamic_sidebar( 'footer-level-3c' ); ?>
        <?php endif; ?>
        </section>
      </footer>
    </div> <?php /* .site-wrapper */ ?>
    <div class="copyright">&copy; 2020 - <?= date('Y');?>  I run Canada. All Rights Reserved</div>
    </div> <?php /* .wrapper */ ?>

  </body>
</html>
<?php

if(!function_exists('secondary_styles')) {
 function secondary_styles() {?>
   <link rel="stylesheet" href="<?= get_template_directory_uri();?>/css/postload.css">
   <script src="<?= get_template_directory_uri();?>/js/script.js"></script>
<?php }
 add_action( 'wp_footer', 'secondary_styles' );
}
 wp_footer();
?>
