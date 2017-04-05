<?php
/*
 * Template Name: Contact Page
 * Description: Page template with a Contact Us form below the text
 */

$my_email   = "";
$my_name    = "";
$my_text    = "";
$my_error   = false;
$my_success = false;

if (isset($_POST['myEmail'])): $my_email = trim($_POST['myEmail']); endif;
if (isset($_POST['myName'])):  $my_name  = trim($_POST['myName']);  endif;
if (isset($_POST['myText'])):  $my_text  = trim($_POST['myText']);  endif;

if ($my_email != "" && $my_name != "" && $my_text != "") {
  $subject = 'New Message From ' . esc_html($my_name);
  if (!wp_mail('info@speedment.com', $subject,
    '<!DOCTYPE html><html><head><title>' . $subject . '</title></head>' .
    '<body>' .
      '<p><b>From:</b> ' . esc_html($my_name) . '</p>' .
      '<p><b>Email:</b> ' . esc_html($my_email) . '</p>' .
      '<p><b>Message:</b> ' . esc_html($my_message) . '</p>' .
      '<hr />' .
      '<small>This email was generated automatically using a form on the "www.speedment.com"-website.</small>' .
    '</body></html>',
    array(
      'Content-Type: text/html; charset=UTF-8',
      'From: speedment.com <noreply@speedment.com>',
      "Reply-To: $my_name <$my_email>"
    )
  )) {
    $my_error = "Error! Make sure specified address '$my_email' is correct.";
  } else {
    $my_success = true;
  }
}

get_header(); ?>
<!-- Start Page Content -->

<div class="row justify-content-center" id="contact">
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
          <div class="col-md-6">
            <div class="form-group">
              <label for="myName">Name</label>
              <input name="myName" type="text" class="form-control" id="myName" placeholder="Enter name" value="<?php echo $my_name; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group<?php if ($my_error) echo ' has-danger'; ?>">
              <label for="myEmail">Email</label>
              <input name="myEmail" type="email" class="form-control<?php if ($my_error) echo ' form-control-danger'; ?>" id="myEmail" placeholder="Enter email" value="<?php echo $my_email; ?>">
              <?php if ($my_error) { ?><div class="form-control-feedback"><?php echo $my_error; ?></div><?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="myText">Message</label>
              <textarea name="myText" class="form-control" id="myText" rows="6" placeholder="Enter message here"><?php echo $my_text; ?></textarea>
            </div>
         </div>
       </div>
      
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6LdamhsUAAAAAJmGlLANew3Q4Kw-lZ3e54iTfwBa"></div>
            </div>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary float-md-right">Submit</button>
          </div>
        </div>
      </div>
      </form>
    <?php } ?>
  </div>
</div>

<!-- Start Page Content -->
<?php get_footer(); ?>
