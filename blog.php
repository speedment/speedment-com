<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div id="content">

    <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

    <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

            <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200,220) ); ?></a>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <span class="meta"><?php author_profile_avatar_link(48); ?> <strong><?php the_time('F jS, Y'); ?></strong> / <strong><?php the_author_link(); ?></strong> / <span class="comments"><?php comments_popup_link(__('0 comments','example'),__('1 comment','example'),__('% comments','example')); ?></span></span>

                <?php the_excerpt(__('Continue reading »','example')); ?>

            </div><!-- /#post-<?php get_the_ID(); ?> -->

        <?php endwhile; ?>

        <div class="navigation">
            <span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
        </div><!-- /.navigation -->

    <?php else: ?>

        <div id="post-404" class="noposts">

            <p><?php _e('None found.','example'); ?></p>

        </div><!-- /#post-404 -->

    <?php endif; wp_reset_query(); ?>

</div><!-- /#content -->

<?php get_footer(); ?>
