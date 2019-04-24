<?php
/*
 * Template Name: Open Source page
 * Description: Page template that shows a Open Source page header
 */
get_header('opensource'); ?>

<div class="container" id="divider">
</div>

<!-- Start Page Content -->
  <div class="row justify-content-center" id="oss-features">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h1 style="text-align: center">Features</h1>
          <hr></hr>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-5">  
            <img data-aos="fade-right" src="http://35.232.42.240/wp-content/uploads/2019/04/stream-api-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
          </div>
          <div data-aos="fade-left" class="col-md-5 px-2 py-2">     
              <h1>View Database Tables as Standard Java Streams</h1>
              <p>Pure Java - Stream API instead of SQL eliminates the need of a query language</br>
                 Dynamic Joins - Ability to perform joins as Java streams on the application side</br>
                 Parallel Streams - Workload can automatically be divided over several threads
              </p>
          </div>
          <div class="col-md-1"></div>
        </div>
        <div class="container" id="divider">
        </div>
        <div class="row" style="text-align:right">
          <div class="col-md-1"></div>
          <div data-aos="fade-right" class="col-md-5 px-2 py-2">     
              <h1>Short and Concise Type Safe Code</h1>
              <p>Code Generation - Automatic Java representation of the latest state of your database eliminates boilerplate code and the need of manually writing Java Entity classes while minimizing the risk for bugs</br>
                 Null Protection - Minimizes the risk involved with database null values by wrapping to Java Optionals</br>
                 Enum Integration - Mapping of String columns to Java Enums increases memory efficiency and type safety
              </p>
          </div>
          <div class="col-md-5">  
            <img data-aos="fade-left" src="http://35.232.42.240/wp-content/uploads/2019/04/type-safety-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
          </div>
          <div class="col-md-1"></div>
        </div>
        <div class="container" id="divider">
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-5">  
            <img data-aos="fade-right" src="http://35.232.42.240/wp-content/uploads/2019/04/lazy-evaluation-oss.png" alt="" width="100%" class="aligncenter size-full wp-image-1470" />
          </div>
          <div data-aos="fade-left" class="col-md-5 px-2 py-2">     
              <h1>Lazy Evaluation for Increased Performance</h1>
              <p>Streams are Lazy - Content from the database is pulled as elements are needed and consumed</br>
                 Pipeline Introspection - Optimized performance by short circuiting of stream operations</p>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div> 
  </div>

<div class="container" id="divider">
</div>

  <div class="row justify-content-center" id="compatability">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center">
          <h1 style="text-align: center">Use any RDBMS</h1>
          <img  data-aos="fade-up" src="https://www.speedment.com/wp-content/uploads/2019/03/any-database.png" alt="" width="90%" class="aligncenter size-full wp-image-1470" />
        </div>
      </div>
    </div> 
</div>

<div class="container" id="divider">
</div>

<div class="row justify-content-center" id="datastore-">
    <div class="container full-width-product-view">
      <div class="row justify-content-center">
        <div class="col-md mx-3 my-3 px-4 lightgray">
          <div class="col">
            <h3>Get Free Trial</h3>
            <p>This whitepaper addresses the performance challenges for existing slow databases and presents a more modern solution – Speedment, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in JVM-memory data store. </p>
          </div>
          <div class="col center-button">
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
          </div>
        </div>
        <div class="col-md mx-3 my-3 px-4 lightgray">
          <div class="col">
            <h3>Documentation</h3>
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

<div class="container" id="divider">
</div>

  <div class="row justify-content-center" id="datastore-extras">
    <div class="container full-width-product-view">
      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col">
          <h1 style="text-align: center">Related Resources</h1>
        </div>
        <div class="row">
        <div class="col-md mx-3 my-3 px-4 gray">
          <div class="col title-area"> 
            Article
          </div>
          <div class="col min-height">
            <h3>Database Actions Using Java 8 Stream Syntax Instead of SQL</h3>
            <p>Why should you need to use SQL when the same semantics can be derived directly from Java 8 streams? This article shows how the resemblance between streams and SQL commands can be used to gain ultra-fast access to data. </p>  
          </div>
          <div class="col center-button">
            <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" class="btn btn-secondary">Read Article</a>
          </div>
        </div>
        <div class="col-md mx-3 my-3 px-4 gray">
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
        <div class="col-md mx-3 my-3 px-4 gray d-md-none d-lg-block">
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

  <div class="container" id="divider">
  </div>

  <div class="row justify-content-center oss-gradient" id="gradient-footer">
    <div class="container full-width-product-view">
      <div class="row justify-content-center">
        <div class="col-2 d-none d-sm-block"></div>
        <div class="col py-5">
          <h1>Contribute to Speedment OSS</h1>
          <space></space>
          <p>The Speedment Open Source project is available under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache 2.0 License</a>. 
            We gladly welcome, and encourage contributions from the community. 
            If you have something to add, need to file an issue or simply want to browse the source code, 
            pay the project a visit on <a href="https://www.github.com/speedment/speedment" target="_blank">GitHub</a>.</p>
          <space></space>
          <a href="http://github.com/speedment/speedment" target="_blank" class="btn btn-secondary">View on GitHub <i class="fab fa-github-alt"></i></a>
          </div>
          <div class="col-2 d-none d-sm-block"></div>
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
