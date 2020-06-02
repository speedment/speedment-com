<?php get_header('base'); ?>

<!--
    Blogpost Header
-->
<div class="row jumbotron jumbotron-fluid justify-content-md-center" id="subpage-hero">
    <div class="col">
        <div class="container">
            <div class="row justify-content-md-left">
                <div class="col col-sm-auto" id="first-view-text-wrapper">
                    <div class="col-md-auto blogpost-title justify-content-center text-centered">
                        <h1><?php if (is_404()) {echo '404 Page Not found';} else {single_post_title();} ?></h1>
                        <div class="line-divider-center"></div>
                            <div id="author_pic">
                                <?php echo get_avatar( get_the_author_meta('ID', get_post_field( 'post_author', get_queried_object_id())), 70); ?>
                            </div>
                            <p>by <?php echo get_the_author_meta('display_name', get_post_field( 'post_author', get_queried_object_id())); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>