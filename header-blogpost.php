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
                        <p>This article was written by <?php the_author(); ?></p>
                        <div class="line-divider-left"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>