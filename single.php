<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header('blogpost');
?>

<div class="row justify-content-center" id="blogPost">
    <div class="container">
        <!--
            Default Page Content
        -->
        <div class="row justify-content-center">
            <div class="col">
                <!-- Start Page Content -->

                <?php

                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content/content', 'single' );
        }
        /*
        //If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }*/
                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center" id="related-resources">
    <div class="container full-width-product-view">
        <div class="row justify-content-center">
            <div class="col">
                <h1 style="text-align: center">Most Recent Posts</h1>
                <div class="line-divider-center"></div>
                <?php echo do_shortcode("[post_grid id='2045']"); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


