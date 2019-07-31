<?php
/*
 * Template Name: Speedment Stream page
 * Description: Page template that shows a Stream page header
 */
get_header('stream'); ?>

<!-- Start Page Content -->
<div id="divider-wide"></div>

<div class="row justify-content-center" id="oss-connectors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-7 py-4 py-md-0 push-md-6 push-lg-5 vertical-align">
                <div class="col">
                    <h1>Write Database Applications While Remaining in a Pure Java World</h1>
                    <div class="line-divider-left"></div>
                    <p>Speedment Stream is a Java ORM toolkit and runtime which fills the void of a modern alternative to Hibernate. The toolkit analyzes the metadata of an existing SQL database and automatically creates a Java representation of the data model. Queries are then expressed as standard Java Streams instead of a sequences of SQL constructs.</p>
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

<div id="divider-wide"></div>

<div class="row justify-content-center stars" id="quote-carina">
    <div class="container full-width-product-view" >
        <div class="row justify-content-center py-5 text-left">
            <div class="col col-md-6">
                <h3>”Speedment was originally developed by researchers and engineers based in Palo Alto with the purpose to simplify and streamline the development of Java database applications by leveraging the Java Stream API.”</h3>
                <div id="divider-xsmall"></div>
                <div class="line-divider-left"></div>
                <div class="row">
                    <div class="col-2 col-md-3 col-lg-2 vertical-align">
                        <img src="http://speedment.com/wp-content/uploads/2019/07/carina-circle.png" class="w-100">
                    </div>
                    <div class="col vertical-align">
                        <p><strong>Carina Dreifeldt</strong></br>Founder and CEO of Speedment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Generate Code -->
<div class="container full-width-product-view no-right-margin">
    <div class="row justify-content-center">
        <div class="col-lg-4 vertical-align">
            <div class="col">
                <h3>Powerful Code Generator</h3>
                <div class=container" id="divider-xsmall"></div>
                <p>Speedment Stream analyses the underlying data sources’ metadata and automatically creates code which directly reflects the structure (i.e. the “domain model”) of the underlying data sources.</p>
                <p>The graphical interface allows many custom configurations and optimizations.</p>
            </div>
        </div>
        <div class="col-lg-8">
            <img src="http://speedment.com/wp-content/uploads/2019/07/tool-generate-cropped.png" alt="Generator" width="100%" class="d-none d-lg-block size-full wp-image-1509"/>
            <img src="https://speedment.com/wp-content/uploads/2019/06/tool-generate.png" alt="" width="100%" class="size-full wp-image-1509 d-lg-none" />
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Code Examples-->

<div class="row justify-content-center" id="sql-java-examples">
    <div class="container full-width-product-view">
        <div class="row justify-content-center">
            <div class="col">
                <h1 style="text-align: center">Queries Expressed as Standard Java Streams</h1>
                <div class="line-divider-center"></div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col px-5">
                <div class="row px-5">
                    <div class="col px-5">
                        <p>Speedment leverages the standard Java Stream API to enable database querying using lambdas without a single line of SQL. A custom delegator is used to optimize the resulting SQL queries for reduced database load, latency, and network load.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="divider"></div>
        <div class="row justify-content-center">
            <div class="col text-center">
                <div class="tab">
                    <button id="defaultTab" class="tablinks" onclick="openCity(event, 'Count')">Count</button>
                    <button class="tablinks" onclick="openCity(event, 'Limit')">Limit</button>
                    <button class="tablinks" onclick="openCity(event, 'Select')">Select</button>
                    <button class="tablinks" onclick="openCity(event, 'Where')">Where</button>
                    <button class="tablinks" onclick="openCity(event, 'Join')">Join</button>
                    <button class="tablinks" onclick="openCity(event, 'OrderBy')">Order By</button>
                </div>
            </div>
        </div>
        <div id="divider-small"></div>
        <div class="row justify-content-center">
            <!-- Count Tab -->
            <div id="Count" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    COUNT(*)
FROM
   (
       SELECT
           `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
           `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
       FROM
           `sakila`.`film`
       WHERE
           (`sakila`.`film`.`length` > ?)
    ) AS A, values:[120]
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
long noLongFilms = films.stream()
    .filter(Film.LENGTH.greaterThan(120))
    .count();
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Limit Tab -->
            <div id="Limit" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
    `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
FROM
    `sakila`.`film`
ORDER BY
    `sakila`.`film`.`title` ASC
LIMIT
    ?, values:[10]
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
films.stream()
    .sorted(Film.TITLE)
    .limit(3)
    .forEachOrdered(System.out::println);
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Select Tab -->
            <div id="Select" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
    `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
FROM
    `sakila`.`film`
ORDER BY
    `sakila`.`film`.`title` ASC
LIMIT
    ?, values:[10]
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
films.stream()
    .sorted(Film.TITLE)
    .limit(3)
    .forEachOrdered(System.out::println);
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Where Tab -->
            <div id="Where" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
    `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
FROM
    `sakila`.`film`
WHERE
    (`sakila`.`film`.`length` > ?), values:[120]
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
films.stream()
    .filter(Film.LENGTH.greaterThan(120))
    .forEachOrdered(System.out::println);
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Join Tab -->
            <div id="Join" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
    `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
FROM
    `sakila`.`film`
ORDER BY
    `sakila`.`film`.`title` ASC
LIMIT
    ?, values:[10]
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
films.stream()
    .sorted(Film.TITLE)
    .limit(3)
    .forEachOrdered(System.out::println);
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order By Tab -->
            <div id="OrderBy" class="tabcontent">
                <div class="row justify-content-center">
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>SQL query</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">
                                    <pre><code class="language-java">
SELECT
    `film_id`,`title`,`description`,`release_year`,`language_id`,`original_language_id`,
    `rental_duration`,`rental_rate`,`length`,`replacement_cost`,`rating`,`special_features`,`last_update`
FROM
    `sakila`.`film`
ORDER BY
    `sakila`.`film`.`length` ASC
                                        </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 mx-2 my-2 dark-gray">
                        <div class="row code-title">
                            <div class="col px-3">
                                <h5>Corresponding Java Stream</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col px-3 py-3">

                                   <pre><code class="language-java">
List<Film> filmsInLengthOrder = films.stream()
    .sorted(Film.LENGTH)
    .collect(Collectors.toList());
                                       </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Type-Safety -->
<div class="container full-width-product-view no-right-margin">
    <div class="row justify-content-center">
        <div class="col-lg-4 vertical-align">
            <div class="col">
                <h3>Full Type-safety</h3>
                <div class=container" id="divider-xsmall"></div>
                <p>The generated code that reflects the data source in combination with Java as the query language enables full type-safety. Syntax errors are discovered in real time rather than weeks into the testing phase or even worse, in production.</p>
            </div>
        </div>
        <div class="col-lg-8">
            <img src="http://speedment.com/wp-content/uploads/2019/07/Example-2.png" alt="Type-safety" width="100%" class="size-full wp-image-1509"/>
        </div>
    </div>
</div>

<div id="divider"></div>

<!-- Utilize Tab Completion -->
<div class="container full-width-product-view no-right-margin">
    <div class="row justify-content-center">
        <div class="col-lg-4 vertical-align">
            <div class="col">
                <h3>Utilize Tab Completion</h3>
                <div class=container" id="divider-xsmall"></div>
                <p>Unsure what tables or columns that are available in the data source? You can trust tab-completion to fill in any gaps.</p>
            </div>
        </div>
        <div class="col-lg-8">
            <img src="http://speedment.com/wp-content/uploads/2019/07/Example-1.png" alt="Tab Completion" width="100%" class="size-full wp-image-1509"/>
        </div>
    </div>
</div>

<div id="divider-wide"></div>

<!-- Connectors -->

<div class="row justify-content-center light-blue" id="commercial-connectors">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-4">
            <div class="col-2 d-none d-sm-block"></div>
            <div class="col py-5 text-center">
                <h1>Integrates with Any RDMBS</h1>
                <div class="line-divider-center"></div>
                <p>Speedment Stream coexists nicely with the current backend and works for any RDBMS;
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
                        <h3>Speedment HyperStream: The Java Stream ORM</h3>
                        <p>This whitepaper addresses the performance challenges for existing slow databases and presents a more modern solution – Speedment HyperStream, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in JVM-memory data store. </p>
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

<div id="divider-wide"></div>

<div class="row justify-content-center dark-gray" id="stream-footer">
    <div class="container full-width-product-view">
        <div class="row justify-content-center py-3">
            <div class="col-2 d-none d-md-block"></div>
            <div class="col py-5">
                <h1>Stop Hibernating.</h1>
                <div class="line-divider-left"></div>
                <p>We claim that Hibernate has passed its expiration date. Hence, it’s time to leverage the modern features of the Java language to build reliable and scalable applications with minimum effort. </p>
                <space></space>
                <a href="http://speedment.com/initializer" class="btn btn-primary">Try for Free</a>
                <a href="https://speedment.github.io/speedment-doc/introduction.html" class="btn btn-secondary-white ml-2">Documentation</a>
            </div>
            <div class="col-2 d-none d-md-block"></div>
        </div>
    </div>
</div>

<button class="js-gitter-toggle-chat-button" data-gitter-toggle-chat-state="true">Open Gitter Chat</button>

<script type="text/javascript">
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


<script>
    ((window.gitter = {}).chat = {}).options = {
        room: 'speedment/speedment',
        activationElement: 'false'
    };
</script>

<script>
    document.getElementById("defaultTab").click();
</script>

<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>

<!-- End Page Content -->
<?php get_footer(); ?>
