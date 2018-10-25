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
          <h4> </h4>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
      </div>
    </div>
  </div>

      <!--
    Oracle Article Link
  -->
  <?php if (new DateTime() < new DateTime("2018-10-06 00:00:00")) { ?>
  <div class="row justify-content-center" id="javaone-promo">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <a href="http://www.javamagazine.mozaicreader.com/MayJune2017/Default/34/0#&pageSet=34&page=34" target="_blank" rel="external">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/JavaMagazine_900px_Margin.png" alt="Oracle Java Magazine Article" width="80%"/>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  
  <!--
      Initializer (Text Area with link and picture on light green background)
  -->
  <div class="row justify-content-center" id="guides">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <h3>Initializer</h3>
          <p><?php echo get_theme_mod('front_page_guides_text'); ?></p>
          <a href="https://www.speedment.com/initializer/" rel="Initializer">Start the Initializer <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="col-md-auto hidden-sm-down">
          <a href="https://www.speedment.com/initializer/" rel="Initializer">
            <i class="fa fa-gamepad"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!--
    Video
  -->
  <div id="front-page-video">
   <div class="row justify-content-center">
     <div class="container">
       <div class="row">
         <div class="col-12">
           <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/B_cdvPNEhc0" frameborder="0" allowfullscreen></iframe>
          </div>
         </div>  
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

</div><!-- container-fluid -->

<div id="leadModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="leadTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="leadTitle">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Thank You for signing up! We have created an online initializer to help you get started.
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary" href="https://www.speedment.com/initializer/" rel="Initializer">Start the Initializer</a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
