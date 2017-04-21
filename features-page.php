<?php
/*
 * Template Name: Features Page
 * Description: Page template with a widget area below the text
 */
get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="gallery">
  <div class="container">
    <!--
        Features Page Content
    -->
    <div class="row justify-content-center features-page">
      <div class="col">
        <?php while (have_posts()) : the_post();
          the_content();
        endwhile; ?>
      </div>
    </div>

  </div>
</div>


<!-- Start Page Content -->
<?php get_footer(); ?>
