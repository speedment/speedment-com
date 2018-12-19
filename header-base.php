<!doctype html>
<head lang="en">
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="keywords" content="Java,Database,Stream,Pure,ORM">
  <meta name="author" content="Speedment, Inc.">
  
  <script src="snowstorm.js"></script>
  <script>
     snowStorm.autoStart = 'true';   // blue-ish snow!?
     snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
     snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
  </script>


  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php
    wp_enqueue_script("jquery");

    if (basename(get_page_template()) == 'contact-page.php') {
      echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    }

    wp_head();
  ?>
</head>
<body>
  <header class="container-fluid">
    <div id="nav-bar-wrapper"<?php echo is_user_logged_in() ? ' class="logged-in"' : ''; ?>>
      <nav class="navbar-toggleable-md navbar-light bg-faded hidden-md-down" role="navigation">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#developer-navbar" aria-controls="developer-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Brand and toggle get grouped for better mobile display -->
          <?php wp_nav_menu(array(
            'menu'              => 'top-right-menu',
            'theme_location'    => 'top-right-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse justify-content-end',
            'container_id'      => 'developer-navbar',
            'menu_class'        => 'navbar-nav',
            'walker'            => new bootstrap_4_walker_nav_menu())
          ); ?>
      </nav>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded hidden-md-down" role="navigation">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#speedment-navbar" aria-controls="speedment-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <a class="navbar-brand" href="/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/brand/cross.svg" width="30" height="30" class="d-inline-block align-top" alt="Speedment">
            Speedment
          </a>

          <!-- Brand and toggle get grouped for better mobile display -->
          <?php wp_nav_menu(array(
            'menu'              => 'top-left-menu',
            'theme_location'    => 'top-left-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'speedment-navbar',
            'menu_class'        => 'navbar-nav',
            'walker'            => new bootstrap_4_walker_nav_menu())
          ); ?>
      </nav>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded hidden-lg-up" role="navigation">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-controls="mobile-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <a class="navbar-brand" href="/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/brand/cross.svg" width="30" height="30" class="d-inline-block align-top" alt="Speedment">
            Speedment
          </a>

          <!-- Brand and toggle get grouped for better mobile display -->
          <?php wp_nav_menu(array(
            'menu'              => 'top-mobile-menu',
            'theme_location'    => 'top-mobile-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'mobile-navbar',
            'menu_class'        => 'navbar-nav',
            'walker'            => new bootstrap_4_walker_nav_menu())
          ); ?>
      </nav>
    </div>
