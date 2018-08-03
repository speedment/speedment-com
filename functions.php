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

add_filter('upload_mimes', 'cc_mime_types');

add_action('widgets_init', 'speedment_widgets_init');
add_action('init',         'speedment_menues_init');
add_action('init',         'stripe_subscription_init');

add_action('wp_enqueue_scripts', 'load_prism');
add_action('wp_enqueue_scripts', 'load_tether');
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
