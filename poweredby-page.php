<?php
/*
 * Template Name: Powered By Speedment page
 * Description: Page template that shows Powered by Speedment Header
 */
get_header('poweredby'); ?>

<!-- Start Page Content -->
<div id="tools-page">

    <div id="divider-wide"></div>


    <!-- Start Page Content -->
    <div class="row justify-content-center full-width-product-view no-left-margin" id="why-speedment-tools">
        <div class="container no-left-margin">
            <div class="row justify-content-center">
                <div class="col-lg-5 py-4 py-md-0 push-lg-7 vertical-align">
                    <div class="col">
                        <h1>Why Speedment?</h1>
                        <div class="line-divider-left"></div>
                        <p>Today’s society requires blazingly fast applications. This, in turn, requires modern agile application development.</p>

                        <p>Speedment offers the possibility to update an existing software monolith to meet these demands without risky and costly migrations. Meanwhile, the application layer is decoupled from the underlying datasource to lower the cost of maintenance and enable total agility.
                    </div>
                </div>
                <div class="col-lg-7 pull-lg-5 vertical-align d-none d-lg-block mt-5" data-aos="fade-right">
                    <img src="http://speedment.com/wp-content/uploads/2019/07/rocket_zoom2.jpg" alt="Rocket" width="100%" class="size-full wp-image-1509"/>
                </div>
            </div>
        </div>
    </div>

    <div id="divider-wide"></div>
    <!--Speedment products, black boxes-->

    <div class="row justify-content-center" id="speedment-tools">
        <div class="container full-width-section">
            <div class="row justify-content-center">
                <div class="col-md px-5 py-3 mx-2 my-2 text-center" id="hazelcast" onclick="location.href='https://speedment.com/hazelcast/';">
                    <h2>Hazelcast Auto DB Integration</h2>
                    <p>The industry's most efficient database integration tool for data grids</p>
                    <a href="https://speedment.com/hazelcast-initializer/" class="btn btn-secondary-white">Download Now</a></br>
                    <a href="https://speedment.com/hazelcast/" style="margin-top:0.5em" class="learn-more">Learn More</a>
                </div>
                <div class="col-md py-3 px-5 mx-2 my-2 text-center" id="ibm-oms">
                    <h2>Live Data Agent for IBM OMoC</h2>
                    <p>Free your IBM OMoC production data to your business users</p>
                    <p><i><strong>Coming Soon</strong></i></p>
                </div>
                <div class="col-md py-3 px-5 mx-2 my-2 text-center" id="ext-speeder" onclick="location.href='https://speedment.com/ext-speeder/';">
                    <h2>Sencha</br>Ext Speeder</h2>
                    <p>Build a superfast Sencha Ext JS grid back-end in minutes</p>
                    <a href="https://speedment.com/initializer/" class="btn btn-secondary-white">Download Now</a></br>
                    <a href="https://speedment.com/ext-speeder/" style="margin-top:0.5em" class="learn-more">Learn More</a>
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
                            <a href="https://www.youtube.com/watch?time_continue=764&v=FRO0XYgCdpM" target="_blank" class="btn btn-secondary">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
        Company Logos
    -->
    <div class="row justify-content-center" id="company-logos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center">Companies Using Speedment</h2>
                </div>
            </div>
            <div class="line-divider-center"></div>
            <div class="row align-items-center justify-content-between" data-info="company-logos-wrapper">
                <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

<script>
    jQuery(function($) {
        $('[data-toggle="popover"]').popover()
    })
</script>

<!-- End Page Content -->
<?php get_footer(); ?>
