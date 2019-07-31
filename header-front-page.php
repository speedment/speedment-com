<?php get_header('base'); ?>

  <!--
      Main Hero (#1 Tool to Accelerate Existing Database Applications)
  -->
  <div class="row jumbotron jumbotron-fluid" id="first-view" style="background-image: url('<?php header_image(); ?>');">
    <div class="col">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col" id="first-view-text-wrapper">
            <h1><?php echo get_bloginfo('description'); ?></h1>
              <div class="row" id="first-view-button-area">
                  <a href="https://speedment.com/tools" class="btn btn-primary col-sm col-md-4 col-lg-3">Learn More</a>
                  <a href="https://speedment.com/initializer" class="btn btn-secondary-white col-sm col-md-4 col-lg-3 ml-0 ml-sm-2 mt-3 m-sm-0">Start Now</a>
              </div>
            <form class="lead" id="leadForm" action="#">
              <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="email" name="email" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Enter your work email" required="required">
                  <button type="submit" class="btn btn-success">Try For Free</button>
                  <script>
                 jQuery(document).ready(function($) {
                   $('#leadForm').submit(function(ev) {
                     console.log("Submit form");
 
                     $.ajax({
                       type: 'POST',
                       url: 'https://api.speedment.com:9010/lead/curious/' + encodeURIComponent($('#leadForm input[name="email"]').val()),
                       success: function() {
                         $('#leadModal').modal('show');
                       },
                       error: function(msg) {
                        console.err('Error sending lead to server.', msg); 
                       }
                     });
 
                     ev.preventDefault();
                     return false;
                   });
                 });
               </script>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
