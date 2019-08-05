<?php
/*
 * Template Name: ExtSpeeder page
 * Description: Page template that shows a ExtSpeeder page header
 */
get_header('extspeeder'); ?>

<!-- Start Page Content -->

<div class="container" id="divider"></div>

<!-- Hazelcast Intro  -->
<div class="container full-width-product-view no-right-margin">
    <div class="row justify-content-center">
        <div class="col-lg-4 vertical-align">
            <div class="col">
                <h3>Query your Sencha Ext JS Grid Blazingly Fast </h3>
                <div class="line-divider-left"></div>
                <p>Ext Speeder speeds up any Sencha Ext JS data grid by leveraging Speedment's unique in-memory management model. It automatically generates a REST API from your relational database. No modifications to your client Ext JS application are required and it is deployed stand-alone or in a standard JavaEE server.</p>
            </div>
        </div>
        <div class="col-lg-8">
            <img src="http://speedment.com/wp-content/uploads/2019/08/extspeeder-cropped.jpg" alt="Generator" width="100%" class="d-none d-lg-block size-full wp-image-1509"/>
            <img src="https://speedment.com/wp-content/uploads/2019/08/ExtSpeeder-tool.jpg" alt="" width="100%" class="size-full wp-image-1509 d-lg-none" />
        </div>
    </div>
</div>


<div class="container" id="divider-wide"></div>

<!-- Quote Carina -->

<div class="row justify-content-center stars" id="quote-greg">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-5 text-left">
            <div class="col col-md-6 px-5 px-md-0">
                <h3>”A whole new way to develop blazingly fast cross-platform big data applications”</h3>
                <div id="divider-xsmall"></div>
                <div class="line-divider-left"></div>
                <div class="row">
                    <div class="col">
                        <p><strong>Gautam Agrawal</strong></br>Sr. Director, Product Management at Sencha</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Connectors -->
<div class="row justify-content-center light-blue" id="commercial-connectors">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-4">
            <div class="col-2 d-none d-sm-block"></div>
            <div class="col py-5 px-5 px-md-0 text-center">
                <h1>Integrates with Any RDMBS</h1>
                <div class="line-divider-center"></div>
                <p>ExtSpeeder coexists nicely with the current backend and works for any RDBMS;
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
                        Data Sheet
                    </div>
                    <div class="col min-height">
                        <h3>Hazelcast Auto Database Integration</h3>
                        <p>Speedment offers a handy productivity tool that automates database integration with Hazelcast IMDG. It streamlines the development of Hazelcast applications by generating a Java domain model representation (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.</p>
                    </div>
                    <div class="col center-button">
                        <a href="https://speedment.com/wp-content/uploads/2019/04/Hazelcast_Speedment_Datasheet.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
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
                        <h3>How You Can Quickly and Effortlessly Integrate Your Database with Hazelcast</h3>
                        <p>Hazelcast Auto Database Integration streamlines the development of Hazelcast applications by generating a Java domain model representation (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.</p>
                    </div>
                    <div class="col center-button">
                        <a href="https://www.youtube.com/watch?v=FRO0XYgCdpM" target="_blank" class="btn btn-secondary">Watch Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" id="divider-wide">
</div>

</div>

<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

<!-- End Page Content -->
<?php get_footer(); ?>

