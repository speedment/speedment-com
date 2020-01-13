<?php
/*
 * Template Name: Live Data Agent page
 * Description: Page template that shows information about Live Data Agent
 */
get_header('livedataagent'); ?>

<div id="divider-wide"></div>

<!-- Exposes Data in Near Real-time -->

<div class="row justify-content-center" id="commercial-connectors">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-4">
            <div class="col-2 d-none d-sm-block"></div>
            <div class="col py-5 px-4 px-sm-0 text-center">
                <h1>Fast, Reliable, and Scalable Access to Live Data</h1>
                <div class="line-divider-center"></div>
                <p>Live Data Agent is a data extract tool for organizations using IBM Order Management on Cloud which allows business users to glean important insights in near real-time by accessing order management data as Kafka Topics, Java Streams, via a REST API or in a target database.</p>
                <img src="https://speedment.com/wp-content/uploads/2020/01/data-outputs.png" class="mt-3" width="100%" data-aos="fade-up"/>
            </div>
            <div class="col-2 d-none d-sm-block"></div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- One-minute video -->
<div id="divider-wide"></div>

<div class="row justify-content-center dark-blue-bg" id="ibm-video">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-4 py-md-5 vertical-align">
                <h1>One-minute Demo</h1>
                <div class="d-none d-md-block line-divider-left"></div>
                <p>Watch the one-minute demo to learn how Live Data Agent can free your IBM order management data.</p>
            </div>
            <div class="col-md-8 vertical-align ">
                <iframe class="yt-hd-thumbnail" width="560" height="315" src="https://www.youtube.com/embed/Cqmqy20_ZsE?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
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
                <h1 style="text-align: center">Architecture</h1>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 push-lg-5 mx-4 mx-sm-0">
                    <h2 style="margin-top:0px">Data Extract Configuration Service</h2>
                    <p>IMB's standard APIs are used to configure what data is being fed to the Live Data Agent.</p>
                    <h2>Live Data Agent</h2>
                    <p>The Live Data Agent replaces IBM's Data Extract Agent which currently exposes data from a backup database in CSV-format over FTP. Instead, Live Data Agent delivers data straight from the source through four different reliable outputs.
                </div>
                <div class="col-lg-5 pull-lg-5 text-center">
                    <img src="https://speedment.com/wp-content/uploads/2020/01/live-data-agent-architecture.jpg" width="90%" class="d-none d-lg-block">
                    <img src="https://speedment.com/wp-content/uploads/2020/01/live-data-agent-architecture.jpg" width="80%" class="mt-4 d-lg-none">
                </div>
                <div class="text-center">
                    <a href="https://speedment.com/wp-content/uploads/2020/01/live-data-agent-glossy.pdf" class="mt-5 btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>


<div class="row justify-content-center stars" id="quote-carina">
    <div class="container full-width-product-view" >
        <div class="row justify-content-center py-5 text-left">
            <div class="col col-md-6 px-5 px-md-0">
                <h3>”Live Data Agent is tailor-made for IBM OMoC to finally allow customers to get at the critical transaction data, quickly, efficiently, and with little to no impact on their production system. ”</h3>
                <div id="divider-xsmall"></div>
                <div class="line-divider-left"></div>
                <div class="row">
                    <div class="col vertical-align">
                        <p><strong>Phil Tympanick</strong></br>Omni-Channel Solution Architect at IBM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Tailor Made for IBM OMoC -->

<div class="row justify-content-center" id="commercial-connectors">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-4">
            <div class="col-2 d-none d-sm-block"></div>
            <div class="col py-5 px-4 px-sm-0 text-center">
                <h1>Tailor-made for IBM Order Management on Cloud</h1>
                <div class="line-divider-center"></div>
                <p>OMoC Live Data Agent is simple to configure and deploy since the solution utilizes
                    the same configuration tables that are used to set up the IBM Data
                    Extract Agent. This means organizations can use existing IBM API’s
                    to configure what is fed to the OMoC Agent.
                </p>
                <img src="https://speedment.com/wp-content/uploads/2019/12/speedment-cloud.png" class="mt-3" width="50%" data-aos="fade-up"/>
            </div>
            <div class="col-2 d-none d-sm-block"></div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!--Why HyperStream (Large boxes on light green background)-->

<div class="row justify-content-center" id="why-speedment">
    <div class="container full-width-section px-sm-5">
        <div class="row justify-content-center py-5 px-sm-5">
            <div class="col-lg px-lg-4">
                <h2>Fetch Historical Data</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>Supports IBM’s Data Extracts’ First Run to allow historical data from
                    any number of days up to the current data/time to be synched.</p>
            </div>
            <div class="col-lg px-lg-4">
                <h2>Hypersonic Analytics</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>Can be configured with in-memory
                    capabilities to allow data to be
                    analyzed with ultra-low latency.</p>
            </div>
            <div class="col-lg px-lg-4">
                <h2>Any Reporting Tools</h2>
                <div class="line-divider-center"></div>
                <div id="divider"></div>
                <p>Connect your data to established enterprise reporting tools or easily build live custom reports of your own. The choice is yours.
                </p>
            </div>
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
                        Datasheet
                    </div>
                    <div class="col min-height">
                        <h3>Live Data Agent for IBM OMoC</h3>
                        <p>Learn how Live Data Agent is tailor made for IBM OMoC to finally allow quick and efficient retrieval of the critical transaction data with little to no impact on the customers’ production systems.</p>
                    </div>
                    <div class="col center-button">
                        <a href="https://speedment.com/wp-content/uploads/2020/01/live-data-agent-glossy.pdf" target="_blank" class="btn btn-secondary">Read Datasheet</a>
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
                            And if we throw in the possibility of doing it for your OMoC data, it sounds even more like a daydream.
                            By combining two technology stacks that share the goal of great UX through awesome DX we can achieve the impossible.</p>
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
                <p>Live Data Agent for IBM OMoC is shipped with all the computing power of Speedment's product suite. Leverage HyperStream's unique memory manager to explore the foreign landscapes of your order management data.</p>
                <space></space>
                <a href="http://speedment.com/contact" class="btn btn-primary">Contact Sales</a>
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
