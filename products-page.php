<?php
/*
 * Template Name: Products Page
 * Description: Page template with a widget area below the text
 */
get_header(); ?>

<div class="justify-content-center" id="products">
  <div class="container">
    <!--
        Products Page Content
    -->
    <div class="row justify-content-center product-page">
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
      <?php if (dynamic_sidebar('products')): else: endif; ?>
    </div>
  </div>
</div>

<!-- Start Page Content -->
<?php get_footer(); ?>
