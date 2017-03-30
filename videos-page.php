<?php
/*
 * Template Name: Videos Page
 * Description: Page template that shows video thumbnails in a grid
 */
get_header(); ?>
<!-- Start Page Content -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- Start Page Content -->
<?php get_footer(); ?>
