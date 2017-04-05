<?php get_header('base'); ?>

  <!--
      Main Hero (#1 Tool to Accelerate Existing Database Applications)
  -->
  <div class="row jumbotron jumbotron-fluid justify-content-md-center" id="subpage-hero">
    <div class="col">
      <div class="container">
        <div class="row justify-content-md-left">
          <div class="col-md-7 col-md-auto">
            <div class="col-md-auto" id="first-view-text-wrapper">
              <h2><?php if (is_404()) {echo '404 Page Not found';} else {single_post_title();} ?></h2>
              <div class="breadcrumb"><?php dimox_breadcrumbs(); ?></div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
