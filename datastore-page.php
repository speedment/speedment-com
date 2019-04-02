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
        <div class="col-md mx-3" id="datastore-documentation">
          <p>Webinar | 1 hour</p>
          <h3>Five Java Features You Didn't Know About</h3>
          <p> The JVM is a remarkable piece of software that can do seemingly magical things with your code. Understanding these things is key to mastering the art of Java development allowing better and faster code that is easier to understand, test, and maintain. In this session, you will learn how to allocate standard Java objects on the stack rather than on the Java heap, how you should test code performance, how to short-circuit Java Streams and gain massive performance and more.</p>
        </div>
        <div class="col-md mx-3" id="datastore-documentation">
          <p>White Paper | 3 pages</p>
          <h3>Speedment the Java Stream ORM</h3>
          <p>This whitepaper addresses the performance challenges for existing slow databases and presents a more modern solution – Speedment, a Stream ORM Java Toolkit and Runtime with extreme capabilities using an in JVM-memory data store. </p>
        </div>
        <div class="col-md mx-3" id="datastore-documentation">
          <p>Article in Oracle Java Magazine | 8 pages</p>
          <h3>Database Actions Using Java 8 Stream Syntax Instead of SQL</h3>
          <p>Why should you need to use SQL when the same semantics can be derived directly from Java 8 streams? This article shows how the resemblance between streams and SQL commands can be used to gain ultra-fast access to data. </p>
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
