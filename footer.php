    <footer class="container-fluid" id="footer">
      <div class="row justify-content-center">
        <div class="container">
          <div class="row">
            <div class="col-md-4"> 
              <img src="http://35.232.42.240/wp-content/uploads/2019/04/ICON-logo-White-3-3.png" class="footer-brand">
                <p>470 Ramona Street</p>
                <p>Palo Alto</p>
                <p>USA</p>
            </div>
            <div class="col-md-8"> 
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
            </div>
          </div>
        </div>
      </div>
      <div id="sharing-icons" class="d-flex justify-content-end">
        <a href="https://www.facebook.com/Speedment-231234486886756/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/speedment" target="_blank"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
        <a href="https://www.linkedin.com/company-beta/5217517/?pathWildcard=5217517" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
      </div>
      <div class="footer-text">
        <div class="copyright">
          Copyright © 2019 Speedment,&nbsp;Inc. All rights reserved.
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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-22241293-1', 'auto');
      ga('send', 'pageview');
    </script>
    <?php wp_footer(); ?>
  </body>
</html>
