    <footer class="container-fluid" id="footer">
      <nav class="row" role="navigation">
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
