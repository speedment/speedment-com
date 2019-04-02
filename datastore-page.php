<?php
/*
 * Template Name: DataStore page
 * Description: Page template that shows a DataStore page header
 */
get_header('datastore'); ?>

<!-- Start Page Content -->

  <div class="row justify-content-center" id="datastore-about">
    <div class="container full-width-product-view">
      <div class="row">
        <div class="col-md-5">  
          <img data-aos="fade-up" src="https://www.speedment.com/wp-content/uploads/2019/03/speedment-properties-2.png" alt="" width="90%" class="aligncenter size-full wp-image-1470" />
        </div>
        <div data-aos="fade-up" class="col-md-5">     
            <h1> Write Database Applications While Remaining in a Pure Java World</h1>
            <p>Speedment is a Java Stream ORM toolkit and runtime. The toolkit analyzes the metadata of an existing SQL database and automatically creates a Java representation of the data model. This powerful ORM enables you to create scalable and efficient Java applications using standard Java Streams with no need to type SQL or use any new API.</p>
        </div>
      </div>
    </div> 
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

  <div class="row justify-content-center" id="datastore-resources">
    <div class="container full-width-product-view">
      <div class="row no-gutters justify-content-center">
        <div class="col-lg-6" id="datastore-documentation">
          <h1 style="text-align: center">Documentation</h1>
        </div>
        <div class="col-lg-6" id="datastore-download">
          <h1 style="text-align: center">Download</h1>
        </div>
      </div>
    </div>
  </div>


  <div class="row justify-content-center" id="datastore-resources">
    <div class="container">
      <div class="row justify-content-center">
      </div>
    </div>
  </div>

  <div class="row justify-content-center" id="datastore-extras">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md mx-2 my-3 px-0 gray">
          <div class="col title-area px-3"> 
            Article
          </div>
          <div class="col px-3 min-height">
            <h3>Database Actions Using Java 8 Stream Syntax Instead of SQL</h3>
            <p>Why should you need to use SQL when the same semantics can be derived directly from Java 8 streams? This article shows how the resemblance between streams and SQL commands can be used to gain ultra-fast access to data. </p>  
          </div>
          <div class="col px-3 center-button">
            <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" class="btn btn-secondary">Read Article</a>
          </div>
        </div>
        <div class="col-md mx-2 my-3 px-0 gray">
          <div class="col title-area px-3"> 
            White Paper
          </div>
          <div class="col px-3 min-height">
            <h3>Speedment the Java Stream ORM</h3>
            <p>This whitepaper addresses the performance challenges for existing slow databases and presents a more modern solution – Speedment, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in JVM-memory data store. </p>
          </div>
          <div class="col px-3 center-button">
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Read Paper</a>
          </div>
        </div>
        <div class="col-md mx-2 my-3 px-0 gray d-md-none d-lg-block">
          <div class="col title-area px-3"> 
            Webinar
          </div>
          <div class="col px-3 min-height">
            <h3>Building Super Fast Data-Driven Apps with Speedment and Vaadin</h3>
            <p>Building highly scalable and fast applications quickly sound like an oxymoron. 
              And if we throw in the possibility of doing it for your current database and application, it sounds even more like a daydream. 
              But combining two technology stacks that share the goal of great UX through awesome DX we can achieve the impossible.</p>
          </div>
          <div class="col px-3 center-button">
            <a href="https://www.youtube.com/watch?v=Ive1fTTxUpU" target="_blank" class="btn btn-secondary">Watch Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  AOS.init({
    duration: 1200,
  }); 
</script>

<!-- End Page Content -->
<?php get_footer(); ?>
