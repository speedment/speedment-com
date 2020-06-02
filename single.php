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
                    /*
                                    if ( is_singular( 'attachment' ) ) {
                                        // Parent post navigation.
                                        athe_post_navigation(
                                            array(
                                                /* translators: %s: parent post link */
                    /*'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
                )
            );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation(
                array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
                        '<span class="post-title">%title</span>',
                )
            );
        }
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
                    */

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


