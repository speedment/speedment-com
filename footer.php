<footer class="container-fluid" id="footer">
    <div class="row justify-content-center">
        <div class="container">
            <div id="divider"></div>
            <div id="divider"></div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10 py-3">
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
    <div id="divider"></div>

    <div class="footer-text px-0 px-md-5">
        <div class="row px-5">
            <div class="col-md-6 copyright">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-md col-md-1 mr-md-2 py-2 py-md-0 d-flex justify-content-center justify-content-md-start">
                        <img src="http://speedment.com/wp-content/uploads/2019/07/ICON-logo-white.png" width="35px" height="38px">
                    </div>
                    <div class="col-md d-flex justify-content-center justify-content-md-start">
                        <p>© 2021 Speedment,&nbsp;Inc. All rights reserved.</br>

                            <a href="<?php echo get_permalink(3); ?>" alt="Read the Speedment Privacy Policy">
                                Privacy&nbsp;Policy</a>&nbsp;|&nbsp;
                            <a href="<?php echo get_permalink(1200); ?>" alt="Read the Speedment Terms of Use">
                                Terms</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex py-3 py-md-0 justify-content-md-end justify-content-center" id="sharing-icons">
                <a href="https://www.facebook.com/Speedment-231234486886756/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/speedment" target="_blank"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
                <a href="https://se.linkedin.com/company/speedment-ab" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
            </div>
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
<script>
    jQuery(function($) {
        var header = $(".navbar");

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 50) {
                header.addClass("scrolled");
            } else {
                header.removeClass("scrolled");
            }
        });

    });
</script>

<?php wp_footer(); ?>

<script src="assets/js/youtubeHD.js"></script>

</body>
</html>


