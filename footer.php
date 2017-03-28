      <footer>
        <div class="container-fluid" id="footer">
        <div class="row">
          <div class="col-md-2 push-md-2">
            <h3>Solutions</h3>
              <nav class="navbar  navbar-light bg-faded" role="navigation">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <?php wp_nav_menu( array(
                    'menu'              => 'bottom-left-menu',
                    'theme_location'    => 'bottom-left-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_id'      => 'bottom-left-footer',
                    'menu_class'        => 'navbar-nav',
                    'walker'            => new bootstrap_4_walker_nav_menu())
                  ); ?>
              </nav>
          </div>
          <div class="col-md-2 push-md-2">
            <h3>Resources</h3>
            <nav class="navbar  navbar-light bg-faded" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <?php wp_nav_menu( array(
                  'menu'              => 'bottom-right-menu',
                  'theme_location'    => 'bottom-right-menu',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_id'      => 'bottom-right-footer',
                  'menu_class'        => 'navbar-nav',
                  'walker'            => new bootstrap_4_walker_nav_menu())
                ); ?>
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
          <div id="footer-logo">© Speedment 2017</div>
        </div>
      </footer>

    <?php wp_footer(); ?>
  </body>
</html>
