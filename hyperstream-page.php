<?php
/*
 * Template Name: DataStore page
 * Description: Page template that shows a DataStore page header
 */
get_header('hyperstream'); ?>

<div id="divider-wide"></div>

<!-- Start Page Content -->
<div class="row justify-content-center full-width-product-view no-left-margin">
    <div class="container no-left-margin">
        <div class="row justify-content-center">
            <div class="col-lg-5 py-4 py-md-0 push-lg-7 vertical-align">
                <div class="col">
                    <h1>Hypersonic Performance and Developer Productivity</h1>
                    <div class="line-divider-left"></div>
                    <p>Speedment HyperStream goes beyond Speedment Stream with its
                        in-JVM-memory capabilities which boosts application speed by orders of magnitude. This enables exploration of the foreign landscapes of your data with minimum effort.</p>
                </div>
            </div>
            <div class="col-lg-7 pull-lg-5 vertical-align d-none d-lg-block mt-5" data-aos="fade-right">
                <img src="http://speedment.com/wp-content/uploads/2019/07/rocket_zoom2.jpg" alt="Rocket" width="100%" class="size-full wp-image-1509"/>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>


<!-- One-minute video -->
<div id="divider-wide"></div>

<div class="row justify-content-center stars" id="hyperstream-video">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-4 py-md-5 vertical-align">
                <h1>One-minute Demo</h1>
                <div class="d-none d-md-block line-divider-left"></div>
                <p>Watch the one-minute demo to learn how Speedment HyperStream delivers ultra-fast applications and integrates with the database and application layer.</p>
            </div>
            <div class="col-md-8 vertical-align ">
                <iframe class="yt-hd-thumbnail" width="560" height="315" src="https://www.youtube.com/embed/B_cdvPNEhc0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Speedment Architecture -->

<div class="row justify-content-center" id="speedment-architecture">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 style="text-align: center">HyperStream Architecture</h1>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 push-md-5 mx-4 mx-sm-0">
                    <h2 style="margin-top:0px">In-JVM-Memory DataStore</h2>
                    <p>Speedment HyperStream creates a virtual data object within the JVM itself, containing a snapshot of the datasource. Operations are then performed using DataStore, an Off-Heap Storage Engine which has no impact on Garbage Collect (GC) times. This allows data to be retrieved in sub-millisecond time while the underlying database is free to focus solely on storing and validating data.</p>
                    <h2>Java Stream ORM</h2>
                    <p>HyperStream includes the ORM capabilities of Speedment Stream. Hence, developers are equipped with an expressive and type-safe language which minimizes the risk for bugs. <a href="https://speedment.com/stream">Read more here</a>.</p>
                    <h2>Code Generator & Interface</h2>
                    <p>The included toolkit analyses the underlying data sources’ metadata and automatically generates code which reflects the structure (i.e. the “domain model”) of the underlying data sources. This eliminates the need to write boilerplate code or Java Entity Classes.</p>
                    <p>A graphical interface lets the user monitor the process and perform custom configurations and optimizations.</p>
                </div>
                <div class="col-md-5 pull-md-5">
                    <img src="http://speedment.com/wp-content/uploads/2019/07/architecture-vertical.png" width="90%" class="d-none d-md-block">
                    <img src="http://speedment.com/wp-content/uploads/2019/07/architecture-horizontal.png" width="90%" class="d-md-none">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!--Why HyperStream (Large boxes on light green background)-->

<div class="row justify-content-center" id="why-speedment">
    <div class="container full-width-section px-sm-5">
        <div class="row justify-content-center py-5 px-sm-5">
            <div class="col-lg px-lg-4">
                <h2>Reduced Development Time</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>Database queries expressed as standard Java Streams yields short,
                    concise and readable code while the introduced type-safety minimizes
                    the risk for bugs.  Furthermore, all required boilerplate code is
                    automatically generated. </p>
            </div>
            <div class="col-lg px-lg-4">
                <h2>Increased Data Access</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>Use Speedments unique in-JVM-memory management model to provide immediate relief from performance bottlenecks by accelerating application response times orders of magnitude and reducing database load. </p>
            </div>
            <div class="col-lg px-lg-4">
                <h2>Leverage Your Infrastructure</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>The tools coexists nicely with any relational database; Oracle, MySQL, Microsoft SQL Server, PostgreSQL, SQLite, DB2, MariaDB or AS400. It is possible to deploy them in the cloud, standalone, or on an app server.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Connectors -->

<div class="row justify-content-center" id="commercial-connectors">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-4">
            <div class="col-2 d-none d-sm-block"></div>
            <div class="col py-5 px-4 px-sm-0 text-center">
                <h1>Integrates with Any RDBMS</h1>
                <div class="line-divider-center"></div>
                <p>Speedment HyperStream coexists nicely with the current backend and works for any RDBMS;
                    MySQL, DB2, Microsoft SQL Server, Oracle, AS/400, PostgreSQL, MariaDB or SQLite.</p>
                <img src="http://speedment.com/wp-content/uploads/2019/07/database-connectors.png" class="mt-3" width="100%"/>
            </div>
            <div class="col-2 d-none d-sm-block"></div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>
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
                        <a href="https://speedment.com/wp-content/uploads/2019/12/Speedment_HyperStream_Whitepaper.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
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
                <div class="col-md mx-3 my-3 px-4 gray d-md-none d-lg-block" data-aos="fade-up">
                    <div class="col title-area">
                        Webinar
                    </div>
                    <div class="col min-height">
                        <h3>Building Super Fast Data-Driven Apps with Speedment and Vaadin</h3>
                        <p>Building highly scalable and fast applications quickly sound like an oxymoron.
                            And if we throw in the possibility of doing it for your current database and application, it sounds even more like a daydream.
                            But combining two technology stacks that share the goal of great UX through awesome DX we can achieve the impossible.</p>
                    </div>
                    <div class="col center-button">
                        <a href="https://www.youtube.com/watch?v=Ive1fTTxUpU" target="_blank" class="btn btn-secondary">Watch Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<div class="row justify-content-center rocket" id="hyperstream-footer">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-3">
            <div class="col-2 d-none d-md-block"></div>
            <div class="col py-5 px-5 px-md-0">
                <h1>Go Hypersonic with Speedment HyperStream.</h1>
                <div class="line-divider-left"></div>
                <p>HyperStream allows data retrieval at hypersonic speed while decreasing database load and development time. But don’t take our word for it, try Speedment HyperStream today. </p>
                <space></space>
                <a href="http://speedment.com/hazelcast-initializer" class="btn btn-primary">Try for Free</a>
                <a href="https://speedment.github.io/speedment-doc/introduction.html" target="_blank" class="btn btn-secondary-white ml-0 ml-sm-2 mt-3 mt-sm-0">Documentation</a>
                <div id="divider-wide"></div>
                <div id="divider-wide"></div>
            </div>
            <div class="col-2 d-none d-md-block"></div>
        </div>
    </div>
</div>


<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

<script type="text/javascript">
    (function ($) {
        $('iframe.yt-hd-thumbnail').youTubeHDThumbnail({darkenThumbnail: false});
        $('iframe.yt-hd-thumbnail-darken').youTubeHDThumbnail({darkenThumbnail: true});
    })(jQuery);
</script>

<!-- End Page Content -->
<?php get_footer(); ?>
