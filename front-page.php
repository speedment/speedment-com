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
      <div class="row align-items-center justify-content-between" data-info="company-logos-wrapper">
        <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
      </div>
    </div>
  </div>

  <!--
      Videos
  -->
  <div class="row justify-content-center">
    <div class="container-fluid">
        <div class="row align-items-center">
          <div id="front-page-video-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://130.211.229.25/wp-content/uploads/2017/03/Hello-Speedment.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <a data-toggle="modal" data-target="#front-page-video-modal" data-whatever="@getbootstrap"
                  data-video="https://www.youtube.com/embed/tDpwKZbeDuU">
                    <i class="fa fa-play-circle" aria-hidden="true"></i></p>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://130.211.229.25/wp-content/uploads/2017/03/bigstock-handshake-isolated-on-business-42882616-1500x630.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <a data-toggle="modal" data-target="#front-page-video-modal" data-whatever="@getbootstrap"
                  data-video="https://www.youtube.com/embed/QJs3yjInlKI">
                    <i class="fa fa-play-circle" aria-hidden="true"></i></p>
                  </a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#front-page-video-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#front-page-video-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
         </div>
      </div>
    </div>
  </div>

<div class="modal fade " id="front-page-video-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

</div><!-- container-fluid -->

<?php get_footer(); ?>
