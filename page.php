<?php
/*
 * Template Name: Default Page
 * Description: Page template for the most simple page types
 */
get_header(); ?>

<div class="row justify-content-center">
  <div class="container">
    <!--
        Default Page Content
    -->
    <div class="row justify-content-center">
      <div class="col">
        <!-- Start Page Content -->
        <?php while (have_posts()) : the_post();
          the_content();
        endwhile; ?>
      </div>
    </div>
  </div>
</div>

<!-- End Posts Section -->
<?php get_footer(); ?>
