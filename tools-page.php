<?php
/*
 * Template Name: Speedment Tools page
 * Description: Page template that shows a Tools page header
 */
get_header('tools'); ?>

<!-- Start Page Content -->
<div id="divider"></div>
<div id="divider"></div>

<div id="tools-page">  

<button class="js-gitter-toggle-chat-button" data-gitter-toggle-chat-state="true">Open Gitter Chat</button> 
 
   <div class="container full-width-product-view oss-feature-gradient" style="margin-bottom: 3em" id="sql-java">
    <div class="row">
      <div class="col-md margin-right" style="margin-bottom:1em; text-align: center" >
         <p> Speedment is a software tool for enterprises that run Java applications and relational databases, which can increase the data access by order of magnitudes and reduce development time by 50%. It works by creating a virtual data object, retrieving only the data the application needs when it needs it.</p>
      </div>
    </div>
 </div>
 
 <div id="divider"></div>
 
  <div class="row justify-content-center" id="datastore-extras">
    <div class="container full-width-product-view">
      <div class="row justify-content-center">
        <div class="row">
         <div class="col-md mx-3 my-3 px-4 gray" data-aos="fade-up" style="text-align: center">
          <div class="col title-area"> 
          </div>
          <div class="col min-height">
            <h2>Speedment </br>Stream</h2>
            <p>Express queries as standard Java Streams.</p>
          </div>
          <div class="col center-button">
            <a href="http://speedment.com/wp-content/uploads/2019/04/Hazelcast_Speedment_Datasheet.pdf" target="_blank" class="btn btn-secondary">Learn more</a>
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Download</a>
          </div>
        </div>
        <div class="col-md mx-3 my-3 px-4 gray" data-aos="fade-up" style="text-align: center">
          <div class="col title-area"> 
          </div>
          <div class="col min-height">
            <h2>Speedment </br>HyperStream</h2>
            <p>Designed for commercial deployments where security, availability, and performance cannot be compromized.</p>  
          </div>
          <div class="col center-button">
            <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" class="btn btn-secondary">Learn More</a>
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Download</a>
          </div>
        </div>
        <div class="col-md mx-3 my-3 px-4 gray d-md-none d-lg-block" data-aos="fade-up" style="text-align: center">
          <div class="col title-area"> 
          </div>
          <div class="col min-height">
            <h2>Speedment </br>Open Source</h2>
            <p>Speedment Stream limited for use with Open Source databases.</p>
          </div>
          <div class="col center-button">
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Learn More</a>
            <a href="https://speedment.com/wp-content/uploads/2017/03/Speedment-White-Paper_2017.pdf" target="_blank" class="btn btn-secondary">Download</a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container" style="margin-bottom: 3em" id="sql-java">
    <div class="row">
      <div class="col-md margin-right" style="margin-bottom:1em; text-align: center" >
        <div style="margin-top: 1em" class="quote">  
          "Speedment was originally developed by researchers and engineers based in Palo Alto with the purpose to simplify and streamline the development of Java database applications by leveraging the Java Stream API."
        </div>
        <p>- <b>Carina Dreifeldt</b>, founder and CEO</p>
      </div>
    </div>
 </div>

<div id="divider"></div>

  <!--
      Company Logos
  -->
  <div class="row justify-content-center" id="company-logos">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2 class="text-center">Companies Using Speedment</h2>
        </div>
        <div id="divider"></div>
      </div>
      <div class="row align-items-center justify-content-between" data-info="company-logos-wrapper">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>

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
