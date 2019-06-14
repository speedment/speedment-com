<?php
/*
 * Template Name: Speedment Tools page
 * Description: Page template that shows a Tools page header
 */
get_header('tools'); ?>

<!-- Start Page Content -->

<div class="container" style="margin-bottom: 3em" id="sql-java">
  <div class="row">
    <div class="col-md margin-right" style="margin-bottom:1em">
<h1>Write Database Applications While Remaining in a Pure Java World</h1>
<p style="font-size: 1.1em; margin-top: 1em">Speedment is a Java Stream ORM toolkit and runtime. The toolkit analyzes the metadata of an existing SQL database and automatically creates a Java representation of the data model. This powerful ORM enables you to create scalable and efficient Java applications using standard Java Streams with no need to type SQL or use any new API.</p>
</p><em>Speedment was originally developed by researchers and engineers based in Palo Alto with the purpose to simplify and streamline the development of Java database applications by leveraging the Java Stream API.</em></p>
      <div class="row" style="text-align: center">
        <div class="col">
          <a href="http://speedment.com/initializer" class="btn btn-primary">Start Now</a>
        </div>
      </div>
    </div>
    <div class="col-lg-5 gray" id="sql-java-table">
<table class="table table-striped">
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

<div class="container" id="type-safe">
  <div class="row">
    <div class="col">
      <h3>Queries Expressed as Standard Java Streams</h3>
<p>Speedment leverages the Stream API to enable database querying using lamdas without a single line of SQL. A custom delegator is used to optimize the resulting SQL queries for reduced database load, latency, and network load. The examples below illustrate the expressiveness of the stream queries.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8" style="margin: 0.5em 0em">
      <pre><code class="language-java">
FilmApplication app = new FilmApplicationBuilder()
    .withPassword("...") // Needs to match the database
    .build();

// FilmManager represents a table with films and is generated automatically
FilmManager films = app.getOrThrow(FilmManager.class);
      </code></pre>
    </div>
    <div class="col-lg-4" style="margin: 0.5em 0em">
      <h5>NEW APPLICATION</h5>
Setting up a Speedment application requires only a few lines of code. For the sake of this simple demo, an open film database provided by MySQL is used. At this point, we are ready to query. 
  </div>
  </div>
  <div class="row">
    <div class="col-lg-8" style="margin: 0.5em 0em">
      <pre><code class="language-java">
// Searches are optimized in the background!
Optional&lt;Film&gt; longFilm = films.stream()
    .filter(Film.LENGTH.greaterThan(120))
    .findAny();
      </code></pre>
    </div>
    <div class="col-lg-4" style="margin: 0.5em 0em">
      <h5>BASE CASE</h5>
Let's find a film with a length greater than 120 minutes. Such a query only requires a simple filter. 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8" style="margin: 0.5em 0em">
      <pre><code class="language-java">
Join&lt;Tuple2&lt;Film, Language&gt;&gt; join = joinComponent
    .from(FilmManager.IDENTIFIER)
    .innerJoinOn(Language.LANGUAGE_ID).equal(Film.LANGUAGE_ID)
    .build(Tuples::of);
      </code></pre>
    </div>
    <div class="col-lg-4" style="margin: 0.5em 0em">
      <h5>JAVA JOINS</h5>
Interested in knowing what language is spoken? A join will take care of that in a second.
   </div>
  </div>
</div>  

<div class="container" style="margin: 3em 0em"> 
  <div class="row">
    <div class="col-lg-3" style="margin-bottom: 1em">
      <h3>Powerful Code Generator</h3>
Speedment analyses the underlying data sources’ metadata and automatically creates code which directly reflects the structure (i.e. the “domain model”) of the underlying data sources.
</br>
</br>
The graphical interface allows custom configurations and optimizations in a jiffy. 
</br>
</br>
<a href="https://www.youtube.com/watch?v=7co9Fszz5Rg&t=73s" target="_blank" class="btn btn-primary" rel="noopener noreferrer">Watch a demo</a>
    </div>
    <div class="col-lg-9">
       <img src="https://speedment.com/wp-content/uploads/2019/06/tool-generate.png" alt="" width="100%" class="aligncenter size-full wp-image-1509" />
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col" style="text-align: center">
      <h3 style="text-align: center">Use any Database</h3>
      <img src="https://speedment.com/wp-content/uploads/2019/06/any-database.png" alt="" width="90%" class="aligncenter size-full wp-image-1470" />
    </div>
  </div>
</div> 

<div class="container" id="type-safe" style="margin-top: 3em">
  <div class="row">
    <div class="col">
      <h3>Enjoy Full Type-Safety</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8" style="margin: 0.5em 0em">
<img src="https://speedment.com/wp-content/uploads/2019/06/left-join.png" alt="" width="100%" class="aligncenter size-full wp-image-1500" />
    </div>
    <div class="col-lg-4" style="margin: 0.5em 0em">
      <h5>JAVA GOT YOUR BACK</h5>
      Generated code that reflects the data source in combination with Java as the query language enables full type-safety. Syntax errors are discovered in real time rather than weeks into the testing phase or even worse, in production!
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8" style="margin: 0.5em 0em">
<img src="https://speedment.com/wp-content/uploads/2019/06/classify-films.png" alt="" width="100%" class="aligncenter size-full wp-image-1501" />
    </div>
    <div class="col-lg-4" style="margin: 0.5em 0em">
      <h5>UTILIZE TAB COMPLETION</h5>
        Unsure what tables or columns that are available in the data source? You can trust tab-completion to fill in any gaps. 
    </div>
  </div>
</div>  

<div id="try-for-free">
  <div class="row justify-content-center"> 
    <div class="col-xl-3">
 <a href="http://speedment.com/initializer" class="btn btn-primary">Try For Free Now</a>
    </div>
    <div class="col-xl-3" style="padding: 1em">
<a href="https://speedment.github.io/speedment-doc/introduction.html" target="_blank" rel="noopener noreferrer">Read The User Guide</a>
    </div>
  </div>
</div>

<div id="contribute" style="margin-top: 3em">
  <div class="row">
    <div class="col lightgray">
    <h4>Contribute</h4>
    The Speedment Open Source project is available under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank" rel="noopener noreferrer">Apache 2.0 License</a>. We gladly welcome, and encourage contributions from the community. If you have something to add, need to file an issue or simply want to browse the source code, pay the project a visit on <a href="http://www.github.com/speedment/speedment" target="_blank" rel="noopener noreferrer">GitHub</a>. 
    </div>
  </div>
</div> 

<button class="js-gitter-toggle-chat-button" data-gitter-toggle-chat-state="true">Open Gitter Chat</button>

<div id="divider"></div>

  <div class="row justify-content-center datastore-gradient" id="gradient-footer">
    <div class="container full-width-product-view">
      <div class="row justify-content-center">
        <div class="col-2 d-none d-sm-block"></div>
        <div class="col py-5">
          <h1>Streamline Your Hazelcast Development Today</h1>
          <space></space>
          <p>Building highly scalable and fast applications quickly sound like an oxymoron. 
              And if we throw in the possibility of doing it for your current database and application, it sounds even more like a daydream. 
              But combining two technology stacks that share the goal of great UX through awesome DX we can achieve the impossible.</p>
          <space></space>
          <a href="http://speedment.com/hazelcast-initializer" class="btn btn-secondary">Try for Free</a>
          </div>
          <div class="col-2 d-none d-sm-block"></div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  AOS.init({
    duration: 1200,
  }); 
</script>

<script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'speedment/speedment',
    activationElement: 'false'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>

<!-- End Page Content -->
<?php get_footer(); ?>
