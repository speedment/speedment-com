<?php
/*
 * Template Name: Gallery Page
 * Description: Page template that shows a gallery of pictures below the content.
 */
get_header(); ?>
<!-- Start Page Content -->

<div class="row justify-content-center" id="gallery">
  <div class="container">
    <!--
        Products Page Content
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
        Products Widget Area
    -->
    <div class="row justify-content-center row-eq-height">
      <?php if (dynamic_sidebar('portraits')): else: endif; ?>
    </div>
  </div>
</div>

<!-- Start Page Content -->
<?php get_footer(); ?>
