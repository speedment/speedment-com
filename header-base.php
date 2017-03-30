<!doctype html>
<head lang="en">
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="keywords" content="Java,Database,Stream,Pure,ORM">
  <meta name="author" content="Speedment, Inc.">

  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>
<body>
  <nav class="navbar-toggleable-md navbar-light bg-faded hidden-sm-down" role="navigation">
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
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded hidden-sm-down" role="navigation">
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
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded hidden-md-up" role="navigation">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#speedment-navbar" aria-controls="speedment-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="/">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/brand/cross.svg" width="30" height="30" class="d-inline-block align-top" alt="Speedment">
        Speedment Mobile
      </a>

      <!-- Brand and toggle get grouped for better mobile display -->
      <?php wp_nav_menu(array(
        'menu'              => 'top-mobile-menu',
        'theme_location'    => 'top-mobile-menu',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'speedment-navbar',
        'menu_class'        => 'navbar-nav',
        'walker'            => new bootstrap_4_walker_nav_menu())
      ); ?>
  </nav>
