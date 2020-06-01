<?php
require_once('stripe-php/init.php');

require_once('wp-bootstrap-navwalker.php');
require_once('wp-image-box-widget.php');
require_once('wp-custom-image-widget.php');
require_once('wp-product-widget.php');
require_once('wp-portrait-widget.php');
require_once('wp-youtube-widget.php');
require_once('wp-subscription-widget.php');
require_once('wp-footer-walker.php');
require_once('wp-dimox-breadcrumbs.php');
require_once('wp-stripe-subscription.php');

add_theme_support('custom-header');
add_theme_support('post-thumbnails', array('page'));

function load_tether() {
  wp_register_script('tether', get_template_directory_uri().'/assets/js/tether.min.js');
  wp_enqueue_script('tether');
}

function load_popper() {
  wp_register_script('popper', get_template_directory_uri().'/assets/js/popper.min.js');
  wp_enqueue_script('popper');
}

function load_aos() {
  wp_register_script('aos', get_template_directory_uri().'/assets/js/aos.js');
  wp_enqueue_script('aos');
}

function load_youtube() {
    wp_register_script('aos', get_template_directory_uri().'/assets/js/youtubeHD.js');
    wp_enqueue_script('youtube');
}

function load_animateLogo() {
  wp_register_script('animate-logos', get_template_directory_uri().'/assets/js/animate-logos.js');
  wp_enqueue_script('animate-logos');
}

function load_carosuelVideo() {
  wp_register_script('carousel-to-video', get_template_directory_uri().'/assets/js/carousel-to-video.js');
  wp_enqueue_script('carousel-to-video');
}

function bootstrap_with_jquery_and_tether() {
  wp_register_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery', 'tether'));
  wp_enqueue_script('bootstrap');
}

function load_prism() {
  wp_register_script('clipboard', get_template_directory_uri().'/assets/js/clipboard.min.js');
  wp_register_script('prism', get_template_directory_uri().'/assets/js/prism.js', array('clipboard'));
  wp_enqueue_script('clipboard');
  wp_enqueue_script('prism');
}

function speedment_menues_init() {
    register_nav_menu('top-left-menu',  __( 'Top Left (Blue) Menu'  ));
    register_nav_menu('top-right-menu', __( 'Top Right (White) Menu' ));
    register_nav_menu('top-mobile-menu', __( 'Mobile Menu' ));
    register_nav_menu('footer-menu',    __( 'Footer Menu'    ));
}

function speedment_widgets_init() {
	register_sidebar(array(
		'name'          => 'Home Description',
		'id'            => 'home_description',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

  register_sidebar(array(
		'name'          => 'Big Boxes',
		'id'            => 'big_boxes',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="big_boxes_title">',
		'after_title'   => '</h3>',
	));

  register_sidebar(array(
		'name'          => 'Small Boxes',
		'id'            => 'small_boxes',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	));

  register_sidebar(array(
		'name'          => 'Company Logos',
		'id'            => 'company_logos',
		'before_widget' => '<div class="col display-none" data-info="company-logos">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

  register_sidebar(array(
		'name'          => 'Products',
		'id'            => 'products',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

  register_sidebar(array(
		'name'          => 'Features',
		'id'            => 'features',
		'before_widget' => '<div class="col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

  register_sidebar(array(
		'name'          => 'Portraits',
		'id'            => 'portraits',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

  register_sidebar(array(
		'name'          => 'Videos',
		'id'            => 'videos',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
}

function speedment_options_init($wp_customize) {
  // Front Page Guides Text
  $wp_customize->add_setting('front_page_guides_text', array(
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non arcu a nisl hendrerit mollis sit amet a tortor. Aenean malesuada risus neque, lacinia aliquam nisi lobortis ut.',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'front_page_guides_text_control',
  	array(
  		'label'       => __('Guides Text', 'default'),
        'description' => __('The text to be shown under the "Guides" section on the frontpage.', 'default'),
  		'section'     => 'static_front_page',
  		'settings'    => 'front_page_guides_text',
  		'type'        => 'textarea'
  	)
  );

  // Contact Page reCaptcha code
  $wp_customize->add_section('recaptcha_section', array(
    'title'    => __('ReCaptcha Section', 'default'),
    'priority' => 30,
  ));

  $wp_customize->add_setting('contact_email', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'contact_email_control',
  	array(
  		'label'       => __('Contact Email', 'default'),
        'description' => __('The email adress to which contact form results should be sent.', 'default'),
  		'section'     => 'recaptcha_section',
  		'settings'    => 'contact_email',
  		'type'        => 'email',
  	)
  );

  $wp_customize->add_setting('recaptcha_sitekey', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'recaptcha_sitekey_control',
  	array(
  		'label'       => __('ReCaptcha SiteKey', 'default'),
        'description' => __('The public ReCaptcha sitekey.', 'default'),
  	    'section'     => 'recaptcha_section',
  	    'settings'    => 'recaptcha_sitekey',
  	    'type'        => 'text',
  	)
  );

  $wp_customize->add_setting('recaptcha_secret', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'recaptcha_secret_control',
  	array(
  		'label'       => __('ReCaptcha Secret', 'default'),
        'description' => __('The secret ReCaptcha code.', 'default'),
  	    'section'     => 'recaptcha_section',
  		'settings'    => 'recaptcha_secret',
  		'type'        => 'text',
  	)
  );
  
  // Stripe payment API
  $wp_customize->add_section('stripe_section', array(
    'title'    => __('Stripe Payment Settings', 'default'),
    'priority' => 31,
  ));
  
  $wp_customize->add_setting('stripe_sandbox', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'stripe_sandbox_control',
  	array(
  		'label'       => __('Enable Sandbox', 'default'),
        'description' => __('In sandbox mode, no real money or credit cards will be used.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_sandbox',
  		'type'        => 'checkbox',
  	)
  );
  
  // Stripe Test
  $wp_customize->add_setting('stripe_testSecretKey', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'stripe_testSecretKey_control',
  	array(
  		'label'       => __('Stripe Test Secret Key', 'default'),
        'description' => __('The test secret stripe key.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_testSecretKey',
  		'type'        => 'text',
  	)
  );
  
  $wp_customize->add_setting('stripe_testPublicKey', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'stripe_testPublicKey_control',
  	array(
  		'label'       => __('Stripe Test Public key', 'default'),
        'description' => __('The test public stripe key.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_testPublicKey',
  		'type'        => 'text',
  	)
  );
  
  // Stripe Live
  $wp_customize->add_setting('stripe_secretKey', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'stripe_secretKey_control',
  	array(
  		'label'       => __('Stripe Live Secret Key', 'default'),
        'description' => __('The live secret stripe Key.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_secretKey',
  		'type'        => 'text',
  	)
  );
  
  $wp_customize->add_setting('stripe_publicKey', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
  	'stripe_publicKey_control',
  	array(
  		'label'       => __('Stripe Live Public key', 'default'),
        'description' => __('The live public stripe key.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_publicKey',
  		'type'        => 'text',
  	)
  );
  
  // Stripe Costs
  $wp_customize->add_setting('stripe_monthlyPlan', array('default' => ''));
  $wp_customize->add_setting('stripe_yearlyPlan', array('default' => ''));
  $wp_customize->add_setting('stripe_addonCost', array('default' => ''));
  $wp_customize->add_setting('stripe_addonText', array('default' => ''));

  $wp_customize->add_control(
  	'stripe_monthlyPlan_control',
  	array(
  		'label'       => __('Subscription Plan (Pay Monthly)', 'default'),
        'description' => __('The Stripe Subscription Plan to use if customer wants to pay monthly.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_monthlyPlan',
  		'type'        => 'text',
  	)
  );
  
  $wp_customize->add_control(
  	'stripe_yearlyPlan_control',
  	array(
  		'label'       => __('Subscription Plan (Pay Yearly)', 'default'),
        'description' => __('The Stripe Subscription Plan to use if customer wants to pay yearly.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_yearlyPlan',
  		'type'        => 'text',
  	)
  );
  
  $wp_customize->add_control(
  	'stripe_addonCost_control',
  	array(
  		'label'       => __('Subscription Addon Cost (One Time)', 'default'),
        'description' => __('The cost of the addon option to apply to the first invoice.', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_addonCost',
  		'type'        => 'number',
  	)
  );
  
  $wp_customize->add_control(
  	'stripe_addonText_control',
  	array(
  		'label'       => __('Subscription Addon Text', 'default'),
        'description' => __('Text to show on the customer invoice if addon is selected', 'default'),
  		'section'     => 'stripe_section',
  		'settings'    => 'stripe_addonText',
  		'type'        => 'text',
  	)
  );
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


/**
 * Returns information about the current post's discussion, with cache support.
 */
function get_discussion_data() {
	static $discussion, $post_id;

	$current_post_id = get_the_ID();
	if ( $current_post_id === $post_id ) {
		return $discussion; /* If we have discussion information for post ID, return cached object */
	} else {
		$post_id = $current_post_id;
	}

	$comments = get_comments(
		array(
			'post_id' => $current_post_id,
			'orderby' => 'comment_date_gmt',
			'order'   => get_option( 'comment_order', 'asc' ), /* Respect comment order from Settings » Discussion. */
			'status'  => 'approve',
			'number'  => 20, /* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
		)
	);

	$authors = array();
	foreach ( $comments as $comment ) {
		$authors[] = ( (int) $comment->user_id > 0 ) ? (int) $comment->user_id : $comment->comment_author_email;
	}

	$authors    = array_unique( $authors );
	$discussion = (object) array(
		'authors'   => array_slice( $authors, 0, 6 ),           /* Six unique authors commenting on the post. */
		'responses' => get_comments_number( $current_post_id ), /* Number of responses. */
	);

	return $discussion;
}

/**
 * Determines if post thumbnail can be displayed.
 */
function can_show_post_thumbnail() {
	return apply_filters( 'twentynineteen_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Author box functions
 */

function wpb_author_info_box( $content ) {

	global $post;

// Detect if it is a single post with a post author
	if ( is_single() && isset( $post->post_author ) ) {

// Get author's display name
		$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
		if ( empty( $display_name ) )
			$display_name = get_the_author_meta( 'nickname', $post->post_author );

// Get author's biographical information or description
		$user_description = get_the_author_meta( 'user_description', $post->post_author );

// Get author's website URL
		$user_website = get_the_author_meta('url', $post->post_author);

// Get link to the author archive page
		$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

		if ( ! empty( $display_name ) )

			$author_details = '<p class="author_name">About ' . $display_name . '</p>';

		if ( ! empty( $user_description ) )
// Author avatar and bio

			$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';

		$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';

// Check if author has a website in their profile
		if ( ! empty( $user_website ) ) {

// Display author website link
			$author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';

		} else {
// if there is no author website then just close the paragraph
			$author_details .= '</p>';
		}

// Pass all this info to post content
		$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
	}
	return $content;
}

// Add our function to the post content filter
add_action( 'the_content', 'wpb_author_info_box' );

/** End of author box functions */

/**
 * Custom template tags for this theme
 */

if ( ! function_exists( 'twentynineteen_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function twentynineteen_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			twentynineteen_get_icon_svg( 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'twentynineteen_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function twentynineteen_posted_by() {
		printf(
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			twentynineteen_get_icon_svg( 'person', 16 ),
			__( 'Posted by', 'twentynineteen' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'twentynineteen_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function twentynineteen_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo twentynineteen_get_icon_svg( 'comment', 16 );

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentynineteen' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'twentynineteen_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function twentynineteen_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			twentynineteen_posted_by();

			// Posted on
			twentynineteen_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'twentynineteen' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					twentynineteen_get_icon_svg( 'archive', 16 ),
					__( 'Posted in', 'twentynineteen' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'twentynineteen' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					twentynineteen_get_icon_svg( 'tag', 16 ),
					__( 'Tags:', 'twentynineteen' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			twentynineteen_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'twentynineteen_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function twentynineteen_post_thumbnail() {
		if ( ! twentynineteen_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'twentynineteen_comment_avatar' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function twentynineteen_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, twentynineteen_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'twentynineteen_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function twentynineteen_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				twentynineteen_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if ( ! function_exists( 'twentynineteen_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function twentynineteen_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'twentynineteen_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function twentynineteen_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					twentynineteen_get_icon_svg( 'chevron_left', 22 ),
					__( 'Newer posts', 'twentynineteen' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'twentynineteen' ),
					twentynineteen_get_icon_svg( 'chevron_right', 22 )
				),
			)
		);
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Twenty Nineteen 1.4
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Twenty Nineteen 1.4
		 */
		do_action( 'wp_body_open' );
	}
endif;

// Allow HTML in author bio section
remove_filter('pre_user_description', 'wp_filter_kses');

add_filter('upload_mimes', 'cc_mime_types');
add_action('widgets_init', 'speedment_widgets_init');
add_action('init',         'speedment_menues_init');
add_action('init',         'stripe_subscription_init');

add_action('wp_enqueue_scripts', 'load_prism');
add_action('wp_enqueue_scripts', 'load_tether');
add_action('wp_enqueue_scripts', 'load_aos');
add_action('wp_enqueue_scripts', 'load_youtube');
add_action('wp_enqueue_scripts', 'load_popper');
add_action('wp_enqueue_scripts', 'load_animateLogo');
add_action('wp_enqueue_scripts', 'load_carosuelVideo');
add_action('wp_enqueue_scripts', 'bootstrap_with_jquery_and_tether');
add_action('customize_register', 'speedment_options_init');

// Make sure html on pages are not destroyed by WordPress
remove_filter('the_content', 'wptexturize');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
?>
