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
      <div class="row">
        <?php if (dynamic_sidebar('big_boxes')): else: endif; ?>
      </div>
    </div>
  </div>
  <div class="row justify-content-center" id="small-boxes">
    <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
  </div>
  <div class="row justify-content-center" id="company-logos">
    <?php if (dynamic_sidebar('company_logos')): else: endif; ?>
  </div>
</div>
<?php get_footer(); ?>



<div class="row justify-content-center" id="why-speedment">
<div class="container">
<div class="row">
<div class="col">
					<div class="text-center">
				<i class="ionicons ion-coffee widget-icon" aria-hidden="true"></i>
			</div>
					<h3>IT’S PURE JAVA</h3>			<span>Single language in the entire application. No need to learn SQL or an ORM API</span>
		</div>
				<div class="col">
					<div class="text-center">
				<i class="ionicons ion-speedometer widget-icon" aria-hidden="true"></i>
			</div>
					<h3>SUPERFAST</h3>			<span>In JVM-memory Acceleration gives database load reduction and ultra low latency</span>
		</div>
				<div class="col">
					<div class="text-center">
				<i class="fa fa-question-circle-o widget-icon" aria-hidden="true"></i>
			</div>
					<h3>RUN ANYWHERE</h3>			<span>Speedment based application can be deployed anywhere, standalone, in and app server or on a Cloud</span>
		</div>
		  </div>
    </div>
</div>
