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
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        <i class="fa fa-twitter-square" aria-hidden="true"></i> <br/>
      </div>
      <div class="d-flex justify-content-end">
        <div id="footer-logo">Copyright ©2017 Speedment, Inc. All rights reserved. Privacy Policy | Terms</div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
