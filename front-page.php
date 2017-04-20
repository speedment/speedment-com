<?php get_header('front-page'); ?>

<div class="container-fluid">
  <!--
      Description (Speedment Enables You to Perform... etc.)
  -->
  <div class="row justify-content-center" id="speedment-description">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg">
          <?php if (dynamic_sidebar('home_description')): else: endif; ?>
        </div>
      </div>
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
        <div class="col">
          <h2 class="text-center">Why Speedment?</h2>
        </div>
      </div>
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
          <p><?php echo get_theme_mod('front_page_guides_text'); ?></p>
          <a href="<?php echo get_permalink(26); ?>">Browse the Guides <i class="fa fa-arrow-right"></i></a>
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2 class="text-center">Companies Using Speedment</h2>
        </div>
      </div>
      <div class="row align-items-center justify-content-between" data-info="company-logos-wrapper">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>
  <!--
    VIDEO
  -->
  <div id="company-video">
    <div class="row justify-content-center">
          <div class="col">
            <h2 class="text-center">Speedment At Java One</h2>
          </div>
    </div>
   <div class="row justify-content-center">
     <div class="col col-md-8">
         <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9OhoW4xy-kA" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
   </div>
  </div>  
</div><!-- container-fluid -->

<?php get_footer(); ?>
