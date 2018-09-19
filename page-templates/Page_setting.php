<?php 
	/**
    * Template Name: Setting Page
    */
get_header();
?>
<div class="account-settings seeting">
  <div class="container">
    <div class="main-heading"><h3>My Settings</h3></div>
    <?php $current_user_id= get_current_user_id();
    //echo $current_user_id;
    if(isset($_POST['Submit'])){  
    $customer_actname = $_POST["accountName"];
    $customer_bsbact = $_POST["bsb"];
    $customer_actnumber = $_POST["accountNumber"];

    $updatetwdth = $wpdb->query("UPDATE wpor_depoist_fund SET account_holder_name = '$customer_actname', bsb = '$customer_bsbact',account_number = '$customer_actnumber' WHERE customer_id = $current_user_id" );
    //print_r($updatetwdth);die();
     if( $updatetwdth ){
         $successtwdth = '<div class="alert alert-success" role="alert">
      The TFN is a success!
    </div>';
     }else{
        $successtwdth = '<div class="alert alert-danger" role="alert">
      The TFN is not success!
    </div>';
     }
    }

    $customer_information = $wpdb->get_results("SELECT * FROM `wpor_depoist_fund` where customer_id = $current_user_id" );
    $fname= $customer_information[0]->first_name;
    $lname= $customer_information[0]->last_name;
    $email= $customer_information[0]->customer_email;
    $moblile= $customer_information[0]->moblie;
    $address= $customer_information[0]->resident_address;
    $bsb= $customer_information[0]->bsb;
    $account_number= $customer_information[0]->account_number;
    ?>
    <div class="form-row">
      <div class="row">
        <div class="col-md-2 col-sm-3">
          <label>Bank details for withdrawals</label>
          <?php
          if (isset($successtwdth)){ echo "<div style='text-align:center' width:50%;>" . $successtwdth . "</div>";}
          ?>
        </div>

        <form method="post" action="">
          <div class="col-sm-4">
            <div class="form-group"><input type="text" maxlength="254" name="accountName" class="account-name" placeholder="Account Holder's Name" id="id_accountName" required=""></div>
            <div class="form-group"><input type="text" maxlength="6" name="bsb" class="account-bsb" placeholder="BSB" id="id_bsb" required=""></div>
            <div class="form-group"><input type="text" maxlength="10" name="accountNumber" class="account-number" placeholder="Acct number" id="id_accountNumber" required=""></div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-3"></div>
            <div class="col-sm-4"><input type="submit" name="Submit" class="submit-account-details" value="Save"></div>
          </div>
        </form>
      </div>

      <div class="row form-row">
        <div class="col-sm-2"><label>My Details</label></div>
        <div class="col-sm-5 col-sm-push-5 col-md-push-5">
          <div class="settings-blue-notification undefined">
            <div class="col-info-icon">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
            </div>
            <div class="col-info-description">  To enter your details, <a href="/depoist-fund">click here</a></div>
          </div>
        </div>

        <div class="col-sm-5 col-sm-pull-4 col-md-pull-5">
          <table class="details-table table">
            <tbody>
              <tr>
                <td>First name</td>
                <td class="given-name"><?php echo $fname; ?></td>
              </tr>

              <tr>
                <td>Last name</td>
                <td class="family-name"><?php echo $lname; ?></td>
              </tr>

              <tr>
                <td>E-mail</td>
                <td class="email"><?php echo $email; ?></td>
              </tr>

              <tr>
                <td>Mobile</td>
                <td class="mobile-phone"><?php echo $moblile; ?></td>
              </tr>

              <tr>
                <td>Address</td>
                <td class="address"><?php echo $address; ?></td>
              </tr>

              <tr>
                <td>Date of birth</td>
                <td><span class="date-of-birth">Provided</span></td>
              </tr>

              <tr>
                <td>TFN</td>
                <td class="tfn-provided">Provided</td>
              </tr>

              <tr>
                <td>BSB</td>
                <td class="tfn-provided"><?php echo $bsb; ?></td>
              </tr>

              <tr>
                <td>Account number</td>
                <td class="tfn-provided"><?php echo $account_number; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    

      <div class="row form-row">
        <div class="col-md-2 col-sm-3">
          <label>Change password</label>
        </div>
        <div class="col-md-10 col-sm-9">
          <a class="submit-account-details" data-test-reference="settings__change-password-button" href="https://investmentssquared.com.au/change-password">Change Password</a>
        </div>
      </div>
  </div>
</div>
<?php get_footer();?>