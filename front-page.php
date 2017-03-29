<?php get_header(); ?>

<!--
    Main Hero (#1 Tool to Accelerate Existing Database Applications)
-->
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
  <!--
      Description (Speedment Enables You to Perform... etc.)
  -->
  <div class="row justify-content-center" id="speedment-description">
    <div class="col-lg-6">
      <?php if (dynamic_sidebar('home_description')): else: endif; ?>
    </div>
  </div>

  <!--
      Why Speedment (Large boxes on green background)
  -->
  <div class="row justify-content-center" id="why-speedment">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('big_boxes')): else: endif; ?>
      </div>
    </div>
  </div>

  <!--
      Buzzwords (Small boxes on white background)
  -->
  <div class="row justify-content-center" id="small-boxes">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
      </div>
    </div>
  </div>

  <!--
      Guides (Text Area with link and picture on light green background)
  -->
  <div class="row justify-content-center" id="guides">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h3>Guides</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non arcu a nisl hendrerit mollis sit amet a tortor. Aenean malesuada risus neque, lacinia aliquam nisi lobortis ut.</p>
          <a href="<?php echo get_permalink(26); ?>">Browse the Guides <i class="ionicons ion-ios-arrow-right"></i></a>
        </div>
        <div class="col-md-4">
          <i class="fa fa-book" style="font-size:1000%"></i>
        </div>
      </div>
    </div>
  </div>

  <!--
      Company Logos
  -->
  <div class="row justify-content-center" id="company-logos">
    <div class="container">
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>

</div><!-- container-fluid -->

<?php get_footer(); ?>
