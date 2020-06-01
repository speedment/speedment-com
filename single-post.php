<?php

/*
* The template for displaying single blog posts
*/ 

get_header(); ?>

	<div id=primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?> 

				<?php get_template_part( 'get_template_parts/content', 'single'); ?>

				<?php the_post_navigation(); ?>

				<?php

						if (comments_open() || get_comments_number() ); 
							comments_template(); 
						endif; 

				?>


		<?php endwhile; ?> 

		</main>
	</div>

<?php_get_footer(); ?>