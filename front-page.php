<?php get_header(); ?>

<h3>Top left menu</h3>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" role="navigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php wp_nav_menu(array(
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

<h1>Hello, Github!</h1>

<h3>Top right menu</h3>
<?php wp_nav_menu(array('menu'=>'top-right-menu'));?>

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
