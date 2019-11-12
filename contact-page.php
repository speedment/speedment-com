<?php
/*
 * Template Name: Contact Page
 * Description: Page template with a Contact Us form below the text
 */
$my_email         = "";
$my_text          = "";
$my_email_error   = false;
$my_captcha_error = false;
$my_success       = false;
$secret = get_theme_mod('recaptcha_secret');
$ip = null;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if (isset($_POST['myEmail'])): $my_email = trim($_POST['myEmail']); endif;
if (isset($_POST['myText'])):  $my_text  = trim($_POST['myText']);  endif;
if (isset($_POST['g-recaptcha-response'])) {
    $url  = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret'   => $secret,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $ip);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result  = file_get_contents($url, false, $context);
    if ($result === false || !boolval(json_decode($result, true)['success'])) {
        $my_captcha_error = "Error! Failed to identify you as a human.";
    } else {
        if ($my_email != "" && $my_text != "") {
            $subject = 'New Message From ' . esc_html($my_email);
            if (!wp_mail(get_theme_mod('contact_email'), $subject,
                '<!DOCTYPE html><html><head><title>' . $subject . '</title></head>' .
                '<body>' .
                '<p><b>Email:</b> ' . esc_html($my_email) . '</p>' .
                '<p><b>Message:</b> ' . esc_html($my_text) . '</p>' .
                '<hr />' .
                '<small>This email was generated automatically using a form on the "www.speedment.com"-website.</small>' .
                '</body></html>',
                array(
                    'Content-Type: text/html; charset=UTF-8',
                    'From: speedment.com <noreply@speedment.com>',
                    "Reply-To: <$my_email>"
                )
            )) {
                $my_email_error = "Error! Make sure specified address '$my_email' is correct.";
            } else {
                $my_success = true;
            }
        }
    }
}
get_header(); ?>
<!-- Start Page Content -->
<div class="justify-content-center" id="contact">
    <div class="container">
        <!--
            Contact Page Content
        -->
        <div class="row justify-content-center product-page">
            <div class="col">
                <!-- Start Page Content -->
                <?php while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
            </div>
        </div>
        <!--
            Contact Widget Area
        -->
        <div class="row justify-content-center product-page">
            <div class="col-lg contact-form">
                <h3>Contact Form</h3>
                <p>Have a question? Need some information or a quote? Use the contact form below.</p>
                <p><i>All fields marked * are required</i></p>
                <?php if ($my_success) { ?>
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="alert alert-success" role="alert">
                                <strong>Thank you!</strong> Your message has been sent. We will get back to you as soon as we can.
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <form action="?" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group<?php if ($my_email_error) echo ' has-danger'; ?>">
                                    <label for="myEmail">Email*</label>
                                    <input name="myEmail" type="email" class="form-control<?php if ($my_email_error) echo ' form-control-danger'; ?>" id="myEmail" placeholder="Enter email address" value="<?php echo $my_email; ?>">
                                    <?php if ($my_email_error) { ?><div class="form-control-feedback"><?php echo $my_email_error; ?></div><?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="myText">Message*</label>
                                    <textarea name="myText" class="form-control" id="myText" rows="6" placeholder="Enter your message here..."><?php echo $my_text; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group<?php if ($my_captcha_error) echo ' has-danger'; ?>">
                            <div class="g-recaptcha<?php if ($my_captcha_error) echo ' form-control-danger'; ?>" data-sitekey="<?php echo get_theme_mod('recaptcha_sitekey'); ?>"></div>
                            <?php if ($my_captcha_error) { ?><div class="form-control-feedback"><?php echo $my_captcha_error; ?></div><?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php } ?>
            </div>
            <div class="col-lg-4 mb-4 mt-4 mt-lg-0">
                <h3>Technical Questions</h3>
                <p>If you have a technical question, one of our developers will be happy to assist you.
                    You can get in direct contact with them in our Gitter Chatroom.</p>
                <img src="https://speedment.com/wp-content/uploads/2019/06/gitter_logo.png" width="30px"><a href="https://gitter.im/speedment/speedment" target="_blank"><h5>gitter.im/speedment</h5></a>
            </div>
        </div>
    </div>
</div>
<!-- Start Page Content -->
<?php get_footer(); ?>
