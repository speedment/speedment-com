<?php
/*
 * Template Name: Hazelcast page
 * Description: Page template that shows a Hazelcast page header
 */
get_header('hazelcast'); ?>

<!-- Start Page Content -->

<div class="container" id="divider"></div>

<!-- Hazelcast Intro  -->
<div class="container full-width-product-view no-right-margin">
    <div class="row justify-content-center">
        <div class="col-lg-4 vertical-align">
            <div class="col">
                <h3>Effortless Integration with Your Database</h3>
                <div class="line-divider-left"></div>
                <p>Hazelcast Auto Database Integration is a highly efficient, time-saving tool for companies working with databases. It streamlines the development of Hazelcast applications by generating a Java domain model representation (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.
            </div>
        </div>
        <div class="col-lg-8">
            <img src="http://speedment.com/wp-content/uploads/2019/07/generate-cropped.png" alt="Generator" width="100%" class="d-none d-lg-block size-full wp-image-1509"/>
            <img src="https://speedment.com/wp-content/uploads/2019/04/generate.png" alt="" width="100%" class="size-full wp-image-1509 d-lg-none" />
        </div>
    </div>
</div>

<div class="container" id="divider"></div>


<div class="row justify-content-center" id="hazelcast-features">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Features</h1>
                <div class="line-divider-center"></div>
                <div class="row">
                    <div class="col-md px-5 px-md-0">
                        <h3>Automatic Generation of Java Domain Model</h3>
                        <div class="line-divider-small"></div>
                        <p>Automatically generates a Java domain model for the given database with POJOs (Portable), SerializationFactories, ClassDefinitions, MapStores, MapLoaders, ClientConfiguration, Ingest, and Index.</p>
                    </div>
                    <div class="col-md px-5 px-md-0">
                        <h3>Reduced Maintenance of Java Domain Model</h3>
                        <div class="line-divider-small"></div>
                        <p>Changes in the database schema do not entail manual configurations. Instead, automatic schema migration can be performed to quickly adapt the application to the new schema.</p>
                    </div>
                    <div class="col-md px-5 px-md-0">
                        <h3>Easy Project Config and Capacity Expansion</h3>
                        <div class="line-divider-small"></div>
                        <p>The IMDG does not need the generated classes on its classpath. New Hazelcast nodes can be added to an existing IMDG with no additional configuration or prior knowledge of existing applications.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md px-5 px-md-0">
                        <h3>Initial Data Ingest Support</h3>
                        <div class="line-divider-small"></div>
                        <p>Utility methods for bootstrapping the IMDG from an existing database via a single call are generated. These methods support the parallel loading of tables.</p>
                    </div>
                    <div class="col-md px-5 px-md-0">
                        <h3>Data is Persistent</h3>
                        <div class="line-divider-small"></div>
                        <p>Updates to the grid can easily be propagated into the database using write-through, write-behind or IMDG-only operations. Client-side persistence is also offered with write-through or Hazelcast only updates.</p>
                    </div>
                    <div class="col-md px-5 px-md-0">
                        <h3>Familiar Java Stream API</h3>
                        <div class="line-divider-small"></div>
                        <p>As an alternative to the Hazelcast API, developers are given the option to express CRUD operations as standard Java Streams. Using familiar APIs can reduce the learning curve and lower the risk for mistakes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="divider-wide"></div>

<!-- Quote Carina -->

<div class="row justify-content-center stars" id="quote-greg">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-5 text-left">
            <div class="col col-md-6 px-5 px-md-0">
                <h3>”This partnership automates some of the tedious intricacies of deployments and reduces the potential for errors, which could cut maintenance costs.”</h3>
                <div id="divider-xsmall"></div>
                <div class="line-divider-left"></div>
                <div class="row">
                    <div class="col">
                        <p><strong>Greg Luck</strong></br>CTO of Hazelcast</p>
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
                <p>Hazelcast Auto DBI coexists nicely with the current backend and works for any RDBMS;
                    MySQL, DB2, Microsoft SQL Server, Oracle, AS/400, PostgreSQL, MariaDB, SQLite or Informix.</p>
                <img src="http://speedment.com/wp-content/uploads/2020/02/db-connectors-2.png" class="mt-3" width="100%"/>
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

<div class="row justify-content-center dark-gray" id="stream-footer">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-3">
            <div class="col-2 d-none d-md-block"></div>
            <div class="col py-5 px-5 px-md-0">
                <h1>Streamline Your Hazelcast Application Today</h1>
                <div class="line-divider-left"></div>
                <p>Hazelcast Auto Database Integration will drastically change the way you develop and maintain Hazelcast applications. Start today by downloading a free trial.</p>
                <space></space>
                <a href="http://speedment.com/hazelcast-initializer" class="btn btn-primary">Try for Free</a>
                <a href="https://speedment.com/contact" target="_blank" class="btn btn-secondary-white ml-0 ml-sm-2 mt-3 mt-sm-0">Contact Sales</a>
            </div>
            <div class="col-2 d-none d-md-block"></div>
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

<!-- End Page Content -->
<?php get_footer(); ?>
 
