<?php get_header('base'); ?>

<!--
    Blogpost Header
-->
<div class="row jumbotron jumbotron-fluid justify-content-md-center" id="subpage-hero">
    <div class="col">
        <div class="container">
            <div class="row justify-content-md-left">
                <div class="col col-sm-auto">
                    <div class="col-md-auto blogpost-title justify-content-center" id="first-view-text-wrapper">
                        <h2><?php if (is_404()) {echo '404 Page Not found';} else {single_post_title();} ?></h2>
                        <p>This article was written by <?php get_the_author(get_the_ID()); ?></p>
                        <div class="line-divider-left"></div>
                        <?php
                        if (is_singular()) {
                            $post = get_post();
                            $autor_fn = get_the_author_meta('first_name',$post->post_author);
                            $autor_ln = get_the_author_meta('last_name',$post->post_author);
                            if (!empty($autor_fn) && !empty($autor_ln)) {
                                ?>
                                <meta name="author" content="<?php echo "$autor_fn $autor_ln"; ?>">
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>