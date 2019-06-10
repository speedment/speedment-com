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
            <h1>Effortless integration with your database</h1>
            <p>Hazelcast Auto Database Integration is a highly efficient, time-saving tool for companies working with databases. It streamlines the development of Hazelcast applications by generating a Java domain model representation (POJOs and more) of the database, allowing companies to be productive with Hazelcast in no time.
        </div>
      </div>
    </div> 
  </div>

  <div class="container" id="divider">
  </div> 


  <div class="row justify-content-center" id="hazelcast-features">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center">
          <h1 style="text-align: center">Industry-Leading Features</h1>    
           <h5>Automatic Generation of Java Domain Model</h5>
           <p>Automatically generates a Java domain model for the given database with POJOs (Portable), SerializationFactories, ClassDefinitions, MapStores, MapLoaders, ClientConfiguration, Ingest, and Index.</p>
            
           <h5>Reduced Maintenance of Java Domain Model</h5>
           <p>Changes in the database schema do not entail manual configurations. Instead, automatic schema migration can be performed to quickly adapt the application to the new schema.</p>
         
           <h5>Initial Data Ingest Support</h5>
           <p>Utility methods for bootstrapping the IMDG from an existing database via a single call are generated. These methods support the parallel loading of tables.</p>
          
           <h5>Hazzel-free Project Configuration and Capacity Expansion</h5>
           <p>The IMDG does not need to have the generated classes on its classpath. New Hazelcast nodes can be added to an existing IMDG with no additional configuration or prior knowledge of existing applications. In addition, new IMDGs can easily be set up using Hazelcast cloud instances, enabling hassle-free initial project configuration.</p>
            
           <h5>Data is Persistent</h5>
           <p>Updates to the grid can easily be propagated into the database using write-through, write-behind or IMDG-only operations. Client-side persistence is also offered with write-through or Hazelcast only updates.</p>
            
           <h5>Familiar Java Stream API</h5>
           <p>As an alternative to the Hazelcast API, customers are given the option to express CRUD operations as standard Java Streams. Using familiar APIs can reduce the learning curve and lower the risk for mistakes.</p>

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
    once: true, 
  }); 
</script>

<!-- End Page Content -->
<?php get_footer(); ?>
 
