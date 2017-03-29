<?php get_header(); ?>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-fluid" id="first-view" style="
  background-image: url('<?php header_image(); ?>');">
    <div class="row justify-content-md-center">
      <div class="col-7 pull-2 col-md-auto">
        <div class="col-md-auto" id="first-view-text-wrapper">
          <h4># Tool to Accelereate Existing <br> Database Applications</h4>
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

<div class="row">
  <?php if (dynamic_sidebar('home_description')): else: endif; ?>
</div>
<div class="row justify-content-md-center" id="why-speedment">
  <?php if (dynamic_sidebar('big_boxes')): else: endif; ?>
</div>
<div class="row justify-content-md-center">
  <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
</div>
<div class="row justify-content-md-center">
  <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
</div>
<?php get_footer(); ?>
