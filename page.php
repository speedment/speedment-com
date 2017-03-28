<?php
get_header();

if (have_posts()):
  while (have_posts()): the_post();
    echo '<h2>' . the_title() . '</h2>';
    echo '<div>'. the_content() . '</div>';
  endwhile;
endif;

get_footer();
?>
