<?php get_header('front-page'); ?>

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
      <div class="row align-items-center">
        <div class="col">
          <h3>Guides</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non arcu a nisl hendrerit mollis sit amet a tortor. Aenean malesuada risus neque, lacinia aliquam nisi lobortis ut.</p>
          <a href="<?php echo get_permalink(26); ?>">Browse the Guides <i class="ionicons ion-ios-arrow-right"></i></a>
        </div>
        <div class="col-md-auto hidden-sm-down">
          <i class="fa fa-book" style="font-size:1000%; opacity: 0.5;"></i>
        </div>
      </div>
    </div>
  </div>

  <!--
      Company Logos
  -->
  <div class="row justify-content-center" id="company-logos">
    <h2>Companys that using Speedment</h2>
    <div class="container">
      <div class="row align-items-center justify-content-between" data-tag="company-logos-wrapper">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>

</div><!-- container-fluid -->

<?php get_footer(); ?>
