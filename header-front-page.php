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
              <button type="submit" class="btn btn-success">Try For Free</button>
              <script>
                jQuery(document).ready(function($) {
                  $('#leadForm').submit(function(ev) {
                    console.log("Submit form");

                    $.ajax({
                      type: 'POST',
                      url: 'https://us12.api.mailchimp.com/3.0/lists/8b4824028c/members/',
                      dataType: 'jsonp',
                      contentType: 'application/json; charset=utf-8',
                      beforeSend: function(xhr) {
                        xhr.setRequestHeader(
                          'Authorization', 'Basic ' + btoa('api:ba6d0463678b4fb804e9ed05049aea2c-us12')
                        );
                      },
                      async: false,
                      data: JSON.stringify({
                        email: $('#leadForm input[name="email"]').val(),
                        status: 'subscribed'
                      })
                    });

                    $('#leadModal').modal('show');
                    ev.preventDefault();
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
