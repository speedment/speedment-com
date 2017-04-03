<?php get_header('base'); ?>

  <!--
      Main Hero (#1 Tool to Accelerate Existing Database Applications)
  -->
  <div class="jumbotron jumbotron-fluid" id="first-view" style="
    background-image: url('<?php header_image(); ?>');">
      <div class="row justify-content-md-center">
        <div class="col">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-md-7 pull-md-2 col-md-auto">
                <div class="col-md-auto" id="first-view-text-wrapper">
                  <h1><?php echo get_bloginfo('description'); ?></h1>
                  <form class="lead">
                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0"
                    id="inlineFormInput" placeholder="Enter your work email">
                    <button type="submit" class="btn btn-success">Try For Free</button>
                  </form>
               </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</header>
