<?php get_header(); ?>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-fluid" id="first-view" style="
  background-image: url('<?php header_image(); ?>');">
    <div class="row justify-content-md-center">
      <div class="col-7 pull-2 col-md-auto">
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

<div class="container-fluid">
  <div class="row justify-content-center" id="speedment-description">
    <div class="col-lg-6">
      <?php if (dynamic_sidebar('home_description')): else: endif; ?>
    </div>
  </div>
  <div class="row justify-content-center" id="why-speedment">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('big_boxes')): else: endif; ?>
      </div>
    </div>
  </div>
  <div class="row justify-content-center" id="small-boxes">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
      </div>
    </div>
  </div>
  <div class="row justify-content-center" id="company-logos">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
