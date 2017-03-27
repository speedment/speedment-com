<?php get_header(); ?>

<h3>Top left menu</h3>
<?php wp_nav_menu(array('menu'=>'top-left-menu'));?>

<h3>Top right menu</h3>
<?php wp_nav_menu(array('menu'=>'top-right-menu'));?>

<h3>Bottom left menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-left-menu'));?>

<h3>Bottom center menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-center-menu'));?>

<h3>Bottom right menu</h3>
<?php wp_nav_menu(array('menu'=>'bottom-right-menu'));?>


<!-- Main hero unit for a primary marketing message or call to action -->
<<<<<<< Updated upstream
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
=======
>>>>>>> Stashed changes
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3"># Tool to Accelereate Existing <br> Database Applications</h1>
    <p class="lead"><form><input type="text"/> <input type="button"/></form></p>
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
<?php get_footer(); ?>
