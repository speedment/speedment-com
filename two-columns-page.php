<?php
/*
 * Template Name: Two Columns Page
 * Description: Page template that shows text on left and the cover image to the right
 */
get_header(); ?>

<div class="container-fluid" id="two-column-layout">
  <div class="justify-content-center">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
      <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 left-side">
          <?php the_content(); ?>
        </div>
        <div class="col-md-4 col-sm-12 right-side">
          <?php the_post_thumbnail('medium_large'); ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
