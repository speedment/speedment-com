<?php get_header('base'); ?>

  <!--
      Main Hero (#1 Tool to Accelerate Existing Database Applications)
  -->
  <div class="row jumbotron jumbotron-fluid" id="first-view" style="background-image: url('<?php header_image(); ?>');">
    <div class="col">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 pull-lg-2
                      col-md-8 pull-md-1
                      col-sm-9 pull-sm-0" id="first-view-text-wrapper">
            <h1><?php echo get_bloginfo('description'); ?></h1>
            <form class="lead" id="leadForm" action="#">
              <label class="sr-only" for="inlineFormInput">Name</label>
              <input type="email" name="email" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Enter your work email" required="required">
              <button type="submit" class="btn btn-success" onclick="submitLead();">Try For Free</button>
              <script>
              jQuery(document).ready(function($) {
                function submitLead() {
                  $('#leadForm').validate({
                    rules: {
                      email: {
                        required: true,
                        email: true
                      }
                    },
                    highlight: function (element) {
                      $(element).closest('.control-group').removeClass('success').addClass('error');
                    },
                    success: function (element) {
                      $('#leadModal').modal('show');
                    }
                  });
                }
              });
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
