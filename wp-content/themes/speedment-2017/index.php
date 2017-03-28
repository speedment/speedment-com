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
  <div class="row justify-content-md-center" id="why-speedment">
    <div class="col-sm-3">
      <div class="text-center">
          <img src="http://www.iconsdb.com/icons/preview/white/speedometer-xxl.png" class="rounded" alt="Speed">
      </div>
      <h4>IT`S PURE JAVA</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
    <div class="col-sm-3">
      <div class="text-center">
        <img src="http://www.iconsdb.com/icons/preview/white/speedometer-xxl.png" class="rounded" alt="Speed">

      </div>
      <h4>SUPER FAST</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
    <div class="col-sm-3">
      <div class="text-center">
        <img src="http://www.iconsdb.com/icons/preview/white/speedometer-xxl.png" class="rounded" alt="Speed">
      </div>
      <h4>RUN ANYWHERE</h4>
      <span>Single language in the entire applicaton. No need to learn SQL or an ORM API.</span>
    </div>
  </div>
  <div class="row information justify-content-md-center">
    <div class="col-md-7">
      <h3>Guides</h3>
      <p>Whether you´r an export or newcomer our task-focused Gettin Started. Guides and tutorials are designed to get your productive with Spring as Quckly as possible.</p>
      <a class="offset-feature--link" href="/guides">
          Browse the Guides
          <i class="icon-chevron-right"></i>
      </a>
    </div>
    <div class="col-md-2 align-middle center-text">
      <img src="http://www.freeiconspng.com/uploads/book-icon--icon-search-engine-6.png"/>
    </div>
  </div>
  </div>
</div> <!-- /container -->
<?php get_footer(); ?>
