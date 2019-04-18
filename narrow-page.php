
<?php
/*
 * Template Name: Narrower Page
 * Description: Page template for a more narrow page (suitable for text)
 */
get_header(); ?>

<div class="row justify-content-center" id="narrowPage">
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