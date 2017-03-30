<?php get_header(); ?>
<!-- Start Posts Section -->
<?php while ( have_posts() ) : the_post();
  the_content();
endwhile; ?>
<!-- End Posts Section -->
<?php get_footer(); ?>
