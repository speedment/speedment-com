<?php
/*
 * Template Name: Default Page
 * Description: Page template for the most simple page types
 */
get_header(); ?>
<!-- Start Posts Section -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- End Posts Section -->
<?php get_footer(); ?>
