<?php
require_once('wp-bootstrap-navwalker.php');

function load_tether() {
  wp_register_script('tether', get_template_directory_uri().'/assets/js/tether.min.js');
  wp_enqueue_script('tether');
}

function bootstrap_with_jquery_and_tether() {
  wp_register_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery', 'tether'));
  wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'load_tether');
add_action('wp_enqueue_scripts', 'bootstrap_with_jquery_and_tether');
?>
