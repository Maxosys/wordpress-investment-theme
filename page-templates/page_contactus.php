<?php 
	/**
    * Template Name: ContactUs Page
    */
get_header();
?>
<?php
$error = "";
if(isset($_POST['submit'])) {
      
      //print_r($_POST['submit']);die();
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "nanowebtech87@gmail.com";
    $email_subject = "InvestmentsSquared Customer Subscribe";
 
    /*function died($error) {
        // your error code can go here
        $error = "We are very sorry, but there were error(s) found with the form you submitted. ";
        $error = "These errors appear below.<br /><br />";
        //echo $error."<br /><br />";
        $error =  "Please go back and fix these errors.<br /><br />";
        die();
    }*/
 
 
    // validation expected data exists
    if(!isset($_POST['investor']) ||
      !isset($_POST['fname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['resident']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $investor = $_POST['investor']; // required
    $first_name = $_POST['fname']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['phone']; // not required
    $resident = $_POST['resident']; // required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
    $email_message .= "Investor: ".clean_string($investor)."\n";
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($telephone)."\n";
    $email_message .= "Resident: ".clean_string($resident)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

 
  /**include your own success html here**/
 
$error = '<div class="alert alert-success" role="alert"> Thank you for contacting us. We will be in touch with you very soon.</div>';
 

 
}
?>
<div class="account-settings">
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane active" id="home">
        <div class="perosnal-details contact">
          <h3 class="head text-center">Contact Us</h3>
          <?php if (isset($error)){ echo "<div style='text-align:center' width:50%;>" . $error . "</div>";}?>
          <div class="col-md-6">
			      <?php //echo do_shortcode('[contact-form-7 id="189" title="Contact Us"]');?>
            <form method="post" action="">
              <div class="row form-input">
                <div class="col-md-4 input-label">Are you a Investments Squared Investor?</div>
                <div class="col-md-8">
                  <label><input type="radio" value="Yes" id="is-investor" name="investor" required=""> Yes </label>
                  <label><input type="radio" value="No" id="not-investor" name="investor">No </label>
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label">Name:</div>
                <div class="col-md-8">
                  <input type="text" id="name" value="" name="fname" placeholder="John" required="">
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label">Email:</div>
                <div class="col-md-8">
                  <input type="email" id="email" value="" name="email" placeholder="john@gmail.com" required="">
                  <div class="form-message__item error-email"></div>
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label">Phone number:</div>
                <div class="col-md-8">
                  <input type="text" id="phone" value="" name="phone" placeholder="0412 345 678">
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label">Message type:</div>
                <div class="col-md-8">
                  <div class="select-box">
                    <select name="resident" id="messageType" required="">
                      <option value="">SELECT ONE</option>
                      <option value="general">General</option>
                      <option value="registration">Registration</option>
                      <option value="specific property">Specific Property</option>
                      <option value="buying units">Buying Units</option>
                      <option value="my account">My Account</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label">Message:</div>
                <div class="col-md-8">
                  <textarea name="message" id="message" rows="5"  placeholder="Explain your question, and how we will be able to help you."></textarea>
                </div>
              </div>
              <div class="row form-input">
                <div class="col-md-4 input-label"></div>
                <div class="col-md-8">
                  <input class="button orange-button right-arrow-button" name="submit" type="submit" value="Send message" />
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-6 contct-bg">
            <div class="sub-contact-us">If you have any questions, we'd be happy to help...</div>
            <div class="row">
              <div class="col-sm-4 col-xs-12">
                <div class="contact-box">
                  <div class="title">
                    <span class="fa fa-comment"></span>Chat with us
                  </div>
                  <p>Monday - Friday</p><p>8:30am 6:00pm (AEST)</p>
                </div>
              </div>

              <div class="col-sm-4 col-xs-12">
                <div class="contact-box">
                  <div class="title">
                    <span class="fa fa-envelope"></span>Email us
                  </div><p>info@investmentssquared.com</p>
                </div>
              </div>

              <div class="col-sm-4 col-xs-12">
                <div class="contact-box">
                  <div class="title">
                    <span class="fa fa-phone"></span>Call us
                  </div>
                  <p>02 8766 0566</p>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>