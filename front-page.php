<?php get_header('front-page'); ?>

<div class="container-fluid">
  <!--
      Description (Speedment Enables You to Perform... etc.)
  -->
  <div class="row justify-content-center" id="speedment-description">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg">
          <?php if (dynamic_sidebar('home_description')): else: endif; ?>
        </div>
      </div>
    </div>
  </div>

    <!--Speedment products, black boxes-->

    <div class="row justify-content-center" id="speedment-tools">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md px-5 py-3 mx-2 my-2 ml-0 ml-md-5 text-center" id="speedment-stream" onclick="location.href='https://speedment.com/stream/';">
                    <h2>Speedment</br>Stream</h2>
                    <p>Stream ORM for enterprise projects</p>
                    <a href="https://speedment.com/initializer/" class="btn btn-secondary-white">Download Now</a></br>
                    <a href="https://speedment.com/stream/" style="margin-top:0.5em" class="learn-more">Learn More</a>
                </div>
                <div class="col-md py-3 px-5 mx-2 my-2 mr-0 mr-md-5 text-center" id="speedment-hyperstream" onclick="location.href='https://speedment.com/hyperstream/';">
                    <h2>Speedment</br>HyperStream</h2>
                    <p>Accelerate your enterprise application to hypersonic speeds</p>
                    <a href="https://speedment.com/initializer/" class="btn btn-secondary-white">Download Now</a></br>
                    <a href="https://speedment.com/hyperstream/" style="margin-top:0.5em" class="learn-more">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="divider-wide"></div>
    <div class="container" id="divider-wide"></div>

    <div class="row justify-content-center" id="why-speedment-tools">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 py-4 py-md-0 push-lg-6 vertical-align">
                    <div class="col">
                        <h1>Why Speedment?</h1>
                        <div class="line-divider-left"></div>
                        <p>Today’s society requires blazingly fast applications. This, in turn, requires modern agile application development.</p>

                        <p>Speedment offers the possibility to update an existing software monolith to meet these demands without risky and costly migrations. Meanwhile, the application layer is decoupled from the underlying datasource to lower the cost of maintenance and enable total agility.
                    </div>
                </div>
                <div class="col-lg-6 pull-lg-6 vertical-align mt-4 mt-lg-0">
                    <iframe class="yt-hd-thumbnail" width="560" height="315" src="https://www.youtube.com/embed/B_cdvPNEhc0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="divider-wide"></div>

    <!--Why Speedment (Large boxes on light green background)-->

    <div class="row justify-content-center" id="why-speedment">
        <div class="container full-width-section">
            <div class="row justify-content-center">
                <div class="col-lg px-5">
                    <h2>Reduced Development Time</h2>
                    <div class="line-divider-center"></div>
                    <p>Database queries expressed as standard Java Streams yields short,
                        concise and readable code while the introduced type-safety minimizes
                        the risk for bugs.  Furthermore, all required boilerplate code is
                        automatically generated. </p>
                </div>
                <div class="col-lg px-5">
                    <h2>Increased Data Access</h2>
                    <div class="line-divider-center"></div>
                    <p>Use Speedments unique in-JVM-memory management model to provide immediate relief from performance bottlenecks by accelerating application response times orders of magnitude and reducing database load. </p>
                </div>
                <div class="col-lg px-5">
                    <h2>Leverage Your Infrastructure</h2>
                    <div class="line-divider-center"></div>
                    <p>The tools coexists nicely with any relational database; Oracle, MySQL, Microsoft SQL Server, PostgreSQL, SQLite, DB2, MariaDB or AS400. It is possible to deploy them in the cloud, standalone, or on an app server.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="divider-wide"></div>

    <div class="row justify-content-center" id="speedment-next-event">
        <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-lg-7">
                    <h4>Next Conferance Talk</h4>
                    <h2>Become a Master of Java Streams</h2>
                    <p>San Francisco</br>
                        September 15-19, 2019 </p>
                </div>
                <div class="col-lg-5 text-centered">
                    <div class="oracle-frame">
                    <img class="align-vertical" src="http://speedment.com/wp-content/uploads/2019/07/oracle-code-one.png" width="90%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="divider-wide"></div>

    <!-- Related Resources -->

    <div class="row justify-content-center" id="related-resources">
        <div class="container full-width-product-view">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 style="text-align: center">Related Resources</h1>
                    <div class="line-divider-center"></div>
                </div>
                <div class="row">
                    <div class="col-md mx-3 my-3 px-4 gray d-lg-block" data-aos="fade-up">
                        <div class="col title-area">
                            White Paper
                        </div>
                        <div class="col min-height">
                            <h3>Speedment HyperStream</h3>
                            <p>This white paper addresses the performance challenges for existing slow databases and presents a more modern solution – HyperStream, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in-JVM-memory data storage. </p>
                        </div>
                        <div class="col center-button">
                            <a href="https://speedment.com/wp-content/uploads/2019/04/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
                        </div>
                    </div>
                    <div class="col-md mx-3 my-3 px-4 gray" data-aos="fade-up">
                        <div class="col title-area">
                            Article
                        </div>
                        <div class="col min-height">
                            <h3>Database Actions Using Java 8 Stream Syntax Instead of SQL</h3>
                            <p>Why should you need to use SQL when the same semantics can be derived directly from Java 8 streams? This article shows how the resemblance between streams and SQL commands can be used to gain ultra-fast access to data.</p>
                        </div>
                        <div class="col center-button">
                            <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" class="btn btn-secondary">Read Article</a>
                        </div>
                    </div>
                    <div class="col-md mx-3 my-3 px-4 gray" data-aos="fade-up">
                        <div class="col title-area">
                            Webinar
                        </div>
                        <div class="col min-height">
                            <h3>How You Can Quickly and Effortlessly Integrate Your Database with Hazelcast</h3>
                            <p>Hazelcast Auto Database Integration streamlines the development of Hazelcast applications by generating a Java domain model representation (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.</p>
                        </div>
                        <div class="col center-button">
                            <a href="https://www.youtube.com/watch?time_continue=764&v=FRO0XYgCdpM" target="_blank" class="btn btn-secondary">Watch Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="divider"></div>


    <!--
  Oracle Article Link

<?php if (new DateTime() < new DateTime("2018-10-06 00:00:00")) { ?>
<div class="row justify-content-center" id="javaone-promo">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" rel="external">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/JavaMagazine_900px_Margin.png" alt="Oracle Java Magazine Article" width="80%"/>
        </a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
-->


  <!--
      Initializer (Text Area with link and picture on light green background)
  <div class="row justify-content-center" id="guides">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <h3>Initializer</h3>
          <p><?php echo get_theme_mod('front_page_guides_text'); ?></p>
          <a href="https://www.speedment.com/initializer/" rel="Initializer">Start the Initializer <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="col-md-auto hidden-sm-down">
          <a href="https://www.speedment.com/initializer/" rel="Initializer">
            <i class="fa fa-gamepad"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  -->

  <!--
      Company Logos
  -->
  <div class="row justify-content-center" id="company-logos">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2 class="text-center">Companies Using Speedment</h2>
            <div class="line-divider-center"></div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between" data-info="company-logos-wrapper">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>

</div><!-- container-fluid -->

<!--

<div id="leadModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="leadTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="leadTitle">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Thank You for signing up! We have created an online initializer to help you get started.
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary" href="https://www.speedment.com/initializer/" rel="Initializer">Start the Initializer</a>
      </div>
    </div>
  </div>
</div>
-->

<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

<?php get_footer(); ?>
