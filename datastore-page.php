<?php
/*
 * Template Name: DataStore page
 * Description: Page template that shows a DataStore page header
 */
get_header('datastore'); ?>

<!-- Start Page Content -->

  <div class="row justify-content-center" id="speedment-description">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg">
          <?php if (dynamic_sidebar('home_description')): else: endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center" id="speedment-description">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg">
          <?php if (dynamic_sidebar('home_description')): else: endif; ?>
        </div>
      </div>
    </div>
  </div>

<!-- End Page Content -->
<?php get_footer(); ?>
