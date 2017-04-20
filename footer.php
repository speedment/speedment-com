    <footer class="container-fluid" id="footer">
      <div class="row justify-content-center">
        <div class="container">
          <nav class="row justify-content-center" role="navigation">
              <?php wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu'           => 'footer-menu',
                'theme_location' => 'footer-menu',
                'container'      => false,
                'depth'          => 2,
                'items_wrap'     => '%3$s',
                'walker'         => new Footer_Menu_Walker()
              )); ?>
          </nav>
        </div>
      </div>
      <div id="sharing-icons" class="d-flex justify-content-end">
        <a href="https://www.facebook.com/Speedment-231234486886756/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href="https://twitter.com/speedment" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a href="https://www.linkedin.com/company-beta/5217517/?pathWildcard=5217517" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
      </div>
      <div class="footer-text">
        <div class="copyright">
          Copyright © 2017 Speedment,&nbsp;Inc. All rights reserved.
        </div>
        <div class="links">
          <a href="<?php echo get_permalink(170); ?>" alt="Read the Speedment Privacy Policy">
            Privacy&nbsp;Policy
          </a>&nbsp;|&nbsp;<a href="<?php echo get_permalink(172); ?>" alt="Read the Speedment Terms of Use">
            Terms
          </a>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
