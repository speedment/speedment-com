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
    <h1 class="display-3">Fluid jumbotron</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
    <h1>Say hello to the new <?php bloginfo('name'); ?></h1>
    <p>
        <?php bloginfo('description'); ?>
    </p>

<!-- Example row of columns -->
<div class="row">
  <div class="span4">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
  <div class="span4">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
 </div>
  <div class="span4">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
</div>
<?php get_footer(); ?>
