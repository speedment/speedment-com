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
        <div class="col-md mx-4" id="datastore-documentation">
          <h1>Five Java Features You Didn't Know About</h1>
        </div>
        <div class="col-md mx-4" id="datastore-documentation">
          <h1>Speedment the Java Stream ORM</h1>
        </div>
        <div class="col-md mx-4" id="datastore-documentation">
          <h1>Database Actions Using Java 8 Stream Syntax Instead of SQL</h1>
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
