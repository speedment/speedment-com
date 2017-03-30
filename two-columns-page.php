<?php
/*
 * Template Name: Two Columns Page
 * Description: Page template that shows text on left and the cover image to the right
 */
get_header(); ?>
<!-- Start Page Content -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- Start Page Content -->
<?php get_footer(); ?>
