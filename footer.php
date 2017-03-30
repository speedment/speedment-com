    <footer>
      <div class="container-fluid" id="footer">
      <div class="row">
        <nav class="navbar  navbar-light bg-faded" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php wp_nav_menu( array(
              'menu'           => 'footer-menu',
              'theme_location' => 'footer-menu',
              'depth'          => 2,
              'walker'         => new Footer_Menu_Walker())
            ); ?>
        </nav>
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
