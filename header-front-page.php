<?php get_header('base'); ?>

  <!--
      Main Hero (#1 Tool to Accelerate Existing Database Applications)
  -->
  <div class="row jumbotron jumbotron-fluid" id="first-view" style="background-image: url('<?php header_image(); ?>');">
    <div class="col">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 px-5 pull-lg-2
                      col-md-8 pull-md-1
                      col-sm-9 pull-sm-0" id="first-view-text-wrapper">
            <h1><?php echo get_bloginfo('description'); ?></h1>
              <div class="row">
                <div class="col" id="first-view-button-area">
                  <a href="http://speedment.com/initializer?tryForFree" class="btn btn-primary">Try For Free</a>
                </div>
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
