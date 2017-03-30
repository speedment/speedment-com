<?php
/*
 * Template Name: Navigation Page
 * Description: Page template with links to subpages above the text
 */
get_header(); ?>
<!-- Start Page Content -->
<?php while (have_posts()) : the_post();
  the_content();
endwhile; ?>
<!-- Start Page Content -->
<?php get_footer(); ?>
