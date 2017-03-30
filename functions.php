<?php
require_once('wp-bootstrap-navwalker.php');
require_once('wp-image-box-widget.php');
require_once('wp-footer-walker.php');

add_theme_support('custom-header');

function load_tether() {
  wp_register_script('tether', get_template_directory_uri().'/assets/js/tether.min.js');
  wp_enqueue_script('tether');
}
function load_animateLogo() {
  wp_register_script('animate-logos', get_template_directory_uri().'/assets/js/animate-logos.js');
  wp_enqueue_script('animate-logos');
}

function bootstrap_with_jquery_and_tether() {
  wp_register_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery', 'tether'));
  wp_enqueue_script('bootstrap');
}

function speedment_menues_init() {
    register_nav_menu('top-left-menu',  __( 'Top Left (Blue) Menu'  ));
    register_nav_menu('top-right-menu', __( 'Top Right (White) Menu' ));
    register_nav_menu('footer-menu',    __( 'Footer Menu'    ));
}

function speedment_widgets_init() {
	register_sidebar(array(
		'name'          => 'Home Description',
		'id'            => 'home_description',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

  register_sidebar(array(
		'name'          => 'Big Boxes',
		'id'            => 'big_boxes',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="big_boxes_title">',
		'after_title'   => '</h3>',
	));

  register_sidebar(array(
		'name'          => 'Small Boxes',
		'id'            => 'small_boxes',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	));

  register_sidebar(array(
		'name'          => 'Company Logos',
		'id'            => 'company_logos',
		'before_widget' => '<div class="col display-none" data-info="comapny-logos">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_action( 'widgets_init', 'speedment_widgets_init' );
add_action( 'init',         'speedment_menues_init' );

add_action('wp_enqueue_scripts', 'load_tether');
add_action('wp_enqueue_scripts', 'load_animateLogo');
add_action('wp_enqueue_scripts', 'bootstrap_with_jquery_and_tether');
?>
