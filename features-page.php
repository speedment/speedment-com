<?php
/*
 * Template Name: Features Page
 * Description: Page template with a widget area below the text
 */
get_header(); ?>
<!-- Start Page Content -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- Start Page Content -->
<?php get_footer(); ?>
