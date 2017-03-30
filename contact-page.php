<?php
/*
 * Template Name: Contact Page
 * Description: Page template with a Contact Us form below the text
 */
get_header(); ?>
<!-- Start Page Content -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- Start Page Content -->
<?php get_footer(); ?>
