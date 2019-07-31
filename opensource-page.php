<?php
/*
 * Template Name: Open Source page
 * Description: Page template that shows a Open Source page header
 */
get_header('opensource'); ?>

<div class="container" id="divider-wide"></div>

<!-- Second set of features-->

<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-7 py-4 py-md-0 push-md-6 push-lg-5 vertical-align">
                <div class="col">
                    <h1>Write Database Applications While Remaining in a Pure Java World</h1>
                    <div class="line-divider-left"></div>
                    <p>Speedment Open Source is the equivalent of Speedment Stream limited to use with Open Source databases. Like Stream, it analyzes the metadata of an existing SQL database and automatically creates a Java representation of the data model. Queries are then expressed as standard Java Streams instead of a sequences of SQL constructs. </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 pull-md-6 pull-lg-7 vertical-align" data-aos="fade-right">
                <div class="col gray" id="sql-java-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><h5>SQL</h5></th>
                            <th><h5>JAVA STREAM</h5></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><c>FROM</c></td>
                            <td><c>stream()</c></td>
                        </tr>
                        <tr>
                            <td><c>COUNT</c></td>
                            <td><c>count()</c></td>
                        </tr>
                        <tr>
                            <td><c>LIMIT</c></td>
                            <td><c>limit()</c></td>
                        </tr>
                        <tr>
                            <td><c>SELECT</c></td>
                            <td><c>map()</c></td>
                        </tr>
                        <tr>
                            <td><c>WHERE</c></td>
                            <td><c>filter()</c> (before collecting)</td>
                        </tr>
                        <tr>
                            <td><c>HAVING</c></td>
                            <td><c>filter()</c> (after collecting)</td>
                        </tr>
                        <tr>
                            <td><c>JOIN<c/></td>
                            <td><c>flatmap()</c></td>
                        </tr>
                        <tr>
                            <td><c>UNION</c></td>
                            <td><c>concat(s0, s1).distinct()</c></td>
                        </tr>
                        <tr>
                            <td><c>ORDER BY</c></td>
                            <td><c>sorted()</c></td>
                        </tr>
                        <tr>
                            <td><c>OFFSET</c></td>
                            <td><c>skip()</c></td>
                        </tr>
                        <tr>
                            <td><c>GROUP BY</c></td>
                            <td><c>collect(groupingBY())</c></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="divider-wide"></div>


<!-- First set of features-->

<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 py-4 py-md-0 vertical-align text-left text-md-right">
                <div class="col">
                    <h1>View Database Tables as Standard Java Streams</h1>
                    <div class="container" id="divider-small"></div>
                    <p><strong>Pure Java</strong> - Stream API instead of SQL eliminates the need of a query language</p>
                    <div class="container" id="divider-xsmall"></div>
                    <p><strong>Dynamic Joins</strong> - Ability to perform joins as Java streams on the application side</p>
                    <div class="container" id="divider-xsmall"></div>
                    <p><strong>Parallel Streams</strong> - Workload can automatically be divided over several threads</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 vertical-align">
                <img src="http://speedment.com/wp-content/uploads/2019/04/stream-api-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
            </div>
        </div>
    </div>
</div>

<div class="container d-none d-md-block" id="divider-wide"></div>

<!-- Second set of features-->

<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 py-4 py-md-0 push-md-4 push-lg-6 vertical-align">
                <div class="col">
                    <h1>Lazy Evaluation for Increased Performance</h1>
                    <div class="container" id="divider-small"></div>
                    <p><strong>Streams are Lazy</strong> - Content from the database is pulled as elements are needed and consumed</p>
                    <div class="container" id="divider-xsmall"></div>
                    <p><strong>Pipeline Introspection</strong> - Optimized performance by short circuiting of stream operations</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 pull-md-8 pull-lg-6 vertical-align">
                <img src="http://speedment.com/wp-content/uploads/2019/04/lazy-evaluation-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
            </div>
        </div>
    </div>
</div>

<div class="container d-none d-md-block" id="divider-wide"></div>

<!-- Third set of features-->

<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 py-4 py-md-0  vertical-align text-left text-md-right">
                <div class="col">
                    <h1>Short and Concise Type-safe Code</h1>
                    <div class="container" id="divider-small"></div>
                    <p><strong>Code Generation</strong> - Automatic generation of a Java representation of the database eliminates boilerplate code and the need of manually writing Java Entity classes</p>
                    <div class="container" id="divider-xsmall"></div>
                    <p><strong>Null Protection</strong> - The risk involved with database null values is eliminated by use of Java Optionals</p>
                    <div class="container" id="divider-xsmall"></div>
                    <p><strong>Enum Integration</strong> - Mapping of String columns to Java Enums increases memory efficiency and type-safety </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 vertical-align">
                <img src="http://speedment.com/wp-content/uploads/2019/04/type-safety-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
            </div>
        </div>
    </div>
</div>

<div class="container d-none d-md-block" id="divider-wide"></div>

<!-- Connectors -->
<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 push-md-5 py-4 py-md-0 vertical-align">
                <div class="col">
                    <h1>Integrate with an Open Source RDBMS</h1>
                    <div class="container" id="divider-xsmall"></div>
                    <p>Speedment Open Source currently supports
                        SQLite, MariaDB, PostgreSQL and MySQL. </p>
                </div>
            </div>
            <div class="col-md-5 pull-md-5">
                <img src="http://localhost/wordpress/wp-content/uploads/2019/06/os-connectors.png" alt="" width="90%" class="size-full wp-image-1470" />
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
                        <h3>Speedment the Java Stream ORM</h3>
                        <p>This whitepaper addresses the performance challenges for existing slow databases and presents a more modern solution – Speedment, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in JVM-memory data store. </p>
                    </div>
                    <div class="col center-button">
                        <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
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

<div class="container" id="divider-wide"></div>

<div class="row justify-content-center" id="oss-footer">
    <div class="container">
        <div class="row justify-content-start py-4">
            <div class="col col-md-7 py-5 px-5 px-md-0">
                <h1>Contribute to Speedment OSS</h1>
                <div class="container" id="divider"></div>
                <p>The Speedment Open Source project is available under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank" class="bold-link">Apache 2.0 License</a>.
                    We gladly welcome, and encourage contributions from the community.
                    If you have something to add, need to file an issue or simply want to browse the source code,
                    pay the project a visit on <a href="https://www.github.com/speedment/speedment" target="_blank" class="bold-link">GitHub</a>.</p>
                <div class="container" id="divider"></div>
                <a href="http://github.com/speedment/speedment" target="_blank" class="btn btn-primary">View on GitHub <i class="fab fa-github-alt"></i></a>
            </div>
        </div>
    </div>
</div>
</div>

<button class="js-gitter-toggle-chat-button" data-gitter-toggle-chat-state="true">Open Gitter Chat</button>

<script>
    ((window.gitter = {}).chat = {}).options = {
        room: 'speedment/speedment',
        activationElement: 'false'
    };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>

<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true
    });
</script>

<!-- End Page Content -->
<?php get_footer(); ?>
