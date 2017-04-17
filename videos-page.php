<?php
/*
 * Template Name: Videos Page
 * Description: Page template that shows video thumbnails in a grid
 */
get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="videos">
  <div class="container">
    <!--
        Videos Page Content
    -->
    <div class="row justify-content-center gallery-page">
      <div class="col">
        <!-- Start Page Content -->
        <?php while (have_posts()) : the_post();
          the_content();
        endwhile; ?>
      </div>
    </div>

    <!--
        Videos Widget Area
    -->
    <div class="row justify-content-center row-eq-height">
      <?php if (dynamic_sidebar('videos')): else: endif; ?>
    </div>
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
