<?php get_header(); ?>

<h3>Top left menu</h3>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" role="navigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php wp_nav_menu( array(
      'menu'              => 'top-left-menu',
      'theme_location'    => 'top-left-menu',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'navbarNavAltMarkup',
      'menu_class'        => 'navbar-nav',
      'walker'            => new bootstrap_4_walker_nav_menu())
    ); ?>
</nav>


<!-- Main hero unit for a primary marketing message or call to action -->
  <div class="jumbotron jumbotron-fluid" id="first-view">
  <div class="row justify-content-md-center">
    <div class="col-4 pull-2 col-md-auto">
      <div class="col-md-auto" id="first-view-text-wrapper">
        <h4 class="d-inline-flex"># Tool to Accelereate Existing <br> Database Applications</h4>
        <form class="lead d-inline-flex">
          <label class="sr-only" for="inlineFormInput">Name</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0"
          id="inlineFormInput" placeholder="Enter your work email">
          <button type="submit" class="btn btn-success">Try For Free</button>
        </form>
     </div>
    </div>
</div>
</div>

<!-- Start-->
<div id="mainbg_container">
		<div id="mainbg"><div id="vc_content" class="tab-ct"></div></div>
		<form id="signup_form" class="form-vertical signup" action="javascript:;" novalidate="novalidate">
			<div id="vc_title" class="tab-ct-text" data-id="vc">
				<h2>#1 Video Conferencing and Web Conferencing Service</h2>
			</div>
			<div id="signup_form_body" class="form-group vc">
				<label for="email" class="sr-only">Enter your work email</label>
				<div class="controls">
					<input type="email" id="email" name="email" class="form-control email" placeholder="Enter your work email" onclick="ga('send', 'event', 'product', 'type-home-free-email', 'Homepage Free Signup Email Form');" aria-label="Enter your work email">
					<button class="btn btn-primary btn-home submit" onclick="ga('send', 'event', 'freesignup', 'click-home-free-button', 'Homepage Free Signup Orange Button');" role="button">Sign Up Free</button>
				</div>
				<div class="new-released"><a href="http://bit.ly/2jvcnFU" target="_blank">Zoom Partners with Sequoia in $100 Million Funding Round &amp; Releases Zoom 4.0</a></div>
			</div>
		</form>
	</div>
<!-- End -->





<div class="container-fluid">
  <div id="info-one">
    Speedment enables you to perform database actions using Java 8
    <div class="row">
      <div class="col-sm-4">
        <h4>Open Source</h4>
      </div>
      <div class="col-sm-4">
        <h4>Enterprise</h4>
      </div>
      <div class="col-sm-4">
        <h4>Customized</h4>
      </div>
    </div>
  </div>
  <div class="row" id="why-speedment">
    <div class="col-sm-4">
      <div class="text-center">
          <img src="http://icons.iconarchive.com/icons/icons8/android/512/Measurement-Units-Speed-icon.png" class="rounded" alt="Speed">
      </div>
      <h4>It´s Pure Java</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
    <div class="col-sm-4">
      <div class="text-center">
          <img src="http://icons.iconarchive.com/icons/icons8/android/512/Measurement-Units-Speed-icon.png" class="rounded" alt="Speed">
      </div>
      <h4>Super Fast</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
    <div class="col-sm-4">
      <div class="text-center">
          <img src="http://icons.iconarchive.com/icons/icons8/android/512/Measurement-Units-Speed-icon.png" class="rounded" alt="Speed">
      </div>
      <h4>Run Anywhere</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
  </div>
  <div class="row information">
    <div class="col-sm-6">
      <h6>Guides</h6>
      <p>Whether you´r an export or newcomer our task-focused Gettin Started. Guides and tutorials are designed to get your productive with Spring as Quckly as possible.
    </div>
    <div class="col-sm-4">
      <img src="http://www.freeiconspng.com/uploads/book-icon--icon-search-engine-6.png"/>
    </div>
  </div>
  </div>
</div> <!-- /container -->
<?php get_footer(); ?>
