<?php
/*
 * Template Name: Hazelcast page
 * Description: Page template that shows a Hazelcast page header
 */
get_header('hazelcast'); ?>

<!-- Start Page Content -->
  <div class="row justify-content-center" id="datastore-about">
    <div class="container full-width-product-view">
      <div class="row">
        <div class="col-md-5">  
        </div>
        <div data-aos="fade-up" class="col-md-5">     
            <h1> Write Database Applications While Remaining in a Pure Java World</h1>
            <p>Speedment is a Java Stream ORM toolkit and runtime. The toolkit analyzes the metadata of an existing SQL database and automatically creates a Java representation of the data model. This powerful ORM enables you to create scalable and efficient Java applications using standard Java Streams with no need to type SQL or use any new API.</p>
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

  <div class="row justify-content-center" id="datastore-extras">
    <div class="container full-width-product-view">
      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col">
          <h1 style="text-align: center">Related Resources</h1>
        </div>
        <div class="row">
<div class="col-md mx-3 my-3 px-4 gray">
          <div class="col title-area"> 
            Datasheet
          </div>
          <div class="col min-height">
            <h3>Hazelcast Auto Database Integration</h3>
            <p>Speedment offers a handy productivity tool that automates database integration with Hazelcast IMDG. 
              It streamlines the development of Hazelcast applications by generating a Java domain model representation 
              (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.</p>
          </div>
          <div class="col center-button">
            <a href="http://35.232.42.240/wp-content/uploads/2019/04/Hazelcast_Speedment_Datasheet.pdf" target="_blank" class="btn btn-secondary">Read Now</a>
          </div>
        </div>
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
        <div class="col-md mx-3 my-3 px-4 gray d-md-none d-lg-block">
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
        </div>
      </div>
    </div>
  </div>

  <div class="container" id="divider">
  </div>

  <div class="row justify-content-center hazelcast-gradient" id="gradient-footer">
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

<!-- End Page Content -->
<?php get_footer(); ?>
 