<?php
/*
 * Template Name: DataStore page
 * Description: Page template that shows a DataStore page header
 */
get_header('datastore'); ?>

<!-- Start Page Content -->

  <div class="row justify-content-center" id="compatability">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center">
          <h1 style="text-align: center">Use any RDBMS</h1>
          <img src="https://www.speedment.com/wp-content/uploads/2019/03/any-database.png" alt="" width="90%" class="aligncenter size-full wp-image-1470" />
        </div>
      </div>
    </div> 
  </div>

  <div class="row justify-content-center" id="datastore-resources">
    <div class="container full-width">
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

<!-- End Page Content -->
<?php get_footer(); ?>
