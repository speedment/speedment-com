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

<h3>Top right menu</h3>
<?php wp_nav_menu(array('menu'=>'top-right-menu'));?>

<h3>Bottom left menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-left-menu'));?>

<h3>Bottom center menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-center-menu'));?>

<h3>Bottom right menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-right-menu'));?>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
  <h1>Hello, <?php bloginfo('name'); ?>!</h1>
  <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
  <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
</div>

  <nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="developer-navbar">
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
      </div>
    </div>
  </nav>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3"># Tool to Accelereate Existing <br> Database Applications</h1>
    <p class="lead"><form><input type="text"/> <input type="button"/></form></p>
  </div>
</div>
<div class="row">
  <?php if (dynamic_sidebar('home_description')): else: endif; ?>
</div>
<div class="row" id="why-speedment">
  <?php if (dynamic_sidebar('big_boxes')): else: endif; ?>
</div>
<div class="row">
  <?php if (dynamic_sidebar('small_boxes')): else: endif; ?>
</div>
<?php get_footer(); ?>
