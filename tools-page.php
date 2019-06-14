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

<div id="divider"></div>
  
  <div class="container" style="margin-bottom: 3em" id="sql-java">
    <div class="row">
      <div class="col-md margin-right" style="margin-bottom:1em; text-align: center" >
        <div style="margin-top: 1em" class="quote">  
          "Speedment Stream was originally developed by researchers and engineers based in Palo Alto with the purpose to simplify and streamline the development of Java database applications by leveraging the Java Stream API."
        </div>
        <p>- <b>Carina Dreifeldt</b>, founder and CEO</p>
      </div>
    </div>
 </div>

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
