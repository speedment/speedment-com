<?php
/*
Template Name: Blog
*/
get_header(); ?>

<?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

<?php if( have_posts() ): ?>

<!-- Start Page Content -->
    <?php while (have_posts()) : the_post(); ?>
        <h1>the_title();</h1>
        <div class="justify-content-center"><?php the_content(); ?></div>
    <?php endwhile; ?>

    <div class="navigation">
        <span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
    </div><!-- /.navigation -->

<?php endif; wp_reset_query(); ?>

<!-- Start Page Content -->
<?php get_footer(); ?>
