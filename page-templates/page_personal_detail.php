<?php /* template name: _Personal Detail */ ?>

<?php get_header(); ?>
<?php global $current_user; wp_get_current_user(); ?>
<?php if ( is_user_logged_in() ) { 
   $username = $current_user->display_name;
   $userid = $current_user->ID;
   } 

$information = $wpdb->get_results("SELECT * FROM `wpor_depoist_fund` where customer_id = $userid" );

$australian_resident = $information[0]->resident;
$Citizen= $information[0]->citizen;
$Surname= $information[0]->last_name;
$dateofbirth= $information[0]->date_of_birth;
$dbdatearr  =  explode("-",$dateofbirth);
//print_r($dbdatearr);
$d = $dbdatearr[0];
$m = $dbdatearr[1];
$y = $dbdatearr[2];

$residential_address= $information[0]->resident_address;
$mobile= $information[0]->moblie;
$tax_filenumber= $information[0]->tax_file_number;
   ?>
  <div class="sub-header">
    <div class="container">
      <div class="board">
        <div class="board-inner">
          <ul class="nav nav-tabs" id="myTab">
            <li class="active">
              <a href="" data-toggle="tab" title="welcome">
                <div class="stepss">
                  <div class="circles">
                    <div class="circle--inner"></div>
                  </div>
                  <div class="borad-title">Step 1 of 3</div>
                  <div class="board-text">personal deatils</div>
                </div>
              </a>
            </li>
            <div class="bar bar-1"></div>

             <li class="">
              <a href="" data-toggle="tab" title="welcome">
                <div class="stepss">
                  <div class="circles">
                    <div class="circle--inner"></div>
                  </div>
                  <div class="borad-title">Step 2 of 3</div>
                  <div class="board-text">depoist funds</div>
                </div>
              </a>
            </li>
            <div class="bar bar-2"></div>

             <li class="">
              <a href="" data-toggle="tab" title="welcome">
                <div class="stepss">
                  <div class="circles">
                    <div class="circle--inner"></div>
                  </div>
                  <div class="borad-title">you're set to go</div>
                  <div class="board-text">Buy Units</div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div> 
    </div>
  </div>

  <div class="account-settings">
    <div class="container">
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <div class="perosnal-details">
            <h3 class="head text-center">enter your personal details</h3>
		        <form action="/deposit/" method="post" id="v_form" name="personal-details" onsubmit="return validateForm()">
              <div class="form-row">
                <div class="col-md-3 input-label">are you an australian resident for tax ourposes?</div>
                <div class="col-md-3">
			            <span class="erro1" style="color:red;padding:3px"></span>
                  <div class="select-box">
                    <select name="resident" id="messageType">
                      <option value="">SELECT ONE</option>
                      <option value="general" <?php if($australian_resident == 'general'){?> selected <?php } ?>>General</option>
                      <option value="registration"<?php if($australian_resident == 'registration'){?> selected <?php } ?>>Registration</option>
                      <option value="specific property"<?php if($australian_resident == 'specific property'){?> selected <?php } ?>>Specific Property</option>
                      <option value="buying bricks"<?php if($australian_resident == 'buying bricks'){?> selected <?php } ?>>Buying Units</option>
                      <option value="my account"<?php if($australian_resident == 'my account'){?> selected <?php } ?>>My Account</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 input-label">are you a US citizen</div>
                <div class="col-md-3">
                  <div class="select-box">
  				          <span class="erro2" style="color:red;padding:3px"></span>
                    <select name="citizen" id="messageType">
                      <option value="">SELECT ONE</option>
                      <option value="yes" <?php if($Citizen=='yes') { ?>  selected   <?php  } ?> >yes</option>
                      <option value="no" <?php if($Citizen=='no') { ?>  selected   <?php  } ?> >no</option>
                    </select>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row depost-fnd">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-xs-1"><div class="tick"><i class="fa fa-check-circle"></i> </div></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left"><label for="givenNameField">First Name</label></div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
  				            <span class="erro3" style="color:red;padding:3px"></span>
                      <input type="text" id="givenNameField" name="fname" class="input-success" value="<?php echo $username; ?>" placeholder="Enter your given name">
                      <div class="form-message__item"></div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left">
                      <label for="familyNameField">Surname</label>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
                      <input type="text" id="familyNameField" class="input-error" name="lname" value="<?php echo $Surname; ?>" placeholder="Enter your family name">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-1"><div class="tick"><i class="fa fa-check-circle"></i> </div></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left">
                      <label>Date of birth</label>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
                      <div class="date-of-birth-fieldset">
                        <div class="select-box">
                          <select name="dobday" id="dobDayField" class="">
                            <option value="0">DD</option>
                            <?php 
                            for($ij=1;$ij<=31;$ij++)
                              {
                            ?>
                            <option value="<?php echo $ij; ?>"<?php if($ij==$d) { ?> selected <?php } ?>> <?php echo $ij; ?> </option>

                            <?Php } ?>
                          </select>
                        </div>
                        <div class="select-box">
                          <select name="dobmonth" id="dobMonthField" class="">
                            <option value="0">MM</option>
                            <?php 
                            for($ik=1;$ik<=12;$ik++)
                              {
                            ?>
                           
                           <option value="<?php echo $ik; ?>"<?php if($ik==$m) { ?> selected <?php } ?>> <?php echo $ik; ?> </option>

                            <?Php } ?>
                          </select>
                        </div>

                        <div class="select-box">
                          <select name="dobyear" id="dobYearField" class="">
                            <option value="0">YYYY</option>
                            <?php 
                            for($il=1907;$il<=2018;$il++)
                              {
                            ?>
                           
                            <option value="<?php echo $il; ?>"<?php if($il==$y) { ?> selected <?php } ?>> <?php echo $il; ?> </option>

                            <?Php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left">
                      <label for="addressField">Residential address</label>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1 address-container">
  				           <span class="erro4" style="color:red;padding:3px"></span>
                      <input type="text" name="address" id="autocomplete" onFocus="geolocate()" class="input-success" placeholder="42 Wallaby Way, Sydney" value="<?php echo $residential_address; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left"><label for="mobileField">Mobile</label></div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
    				          <span class="erro5" style="color:red;padding:3px"></span>
                      <input type="text" id="mobileField" name="mobile" pattern="[1-9]{1}[0-9]{9}" class="input-success" value="<?php echo $mobile; ?>" placeholder="0412000000"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left"><label for="mobileField">Deposit Fund Amount(minimum $75)</label></div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
                        <span class="erro6" style="color:red;padding:3px"></span>
                        <input type="number" name="depositfund" class="input-success" placeholder="Enter a valid amount (minimum $75)" min="75" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="settings-blue-notification undefined">
                      <div class="col-info-icon">
                        <i aria-hidden="true" class="fa fa-info-circle"></i>
                      </div>
                      <div class="col-info-description"> Please ensure you enter your correct name, date of birth, and address in order to successfully verify your identity. If you can't see your address in the list of suggestions pick "I Can't See My Address".</div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-4 col-sm-11 col-xs-10 col-no-padding-left">
                      <label for="tfnField">Tax File Number</label>
                      <br>(Optional)
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-1">
                      <input type="text" name="tfnnumber" id="tfnField" class="input-success" value="<?php echo $tax_filenumber; ?>" placeholder="123456789">
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="settings-blue-notification undefined">
                      <div class="col-info-icon">
                        <i aria-hidden="true" class="fa fa-info-circle"></i>
                      </div>
                      <div class="col-info-description"> You can enter your TFN later, but if you choose not to provide your TFN, Development is required to withhold tax on monthly distributions at the highest marginal rate which is currently 49%.</div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-7">
                  <div class="row depost-fnd">
                    <div class="col-xs-1"><span class="icn"></span></div>
                    <div class="col-md-11 col-no-padding-left">
  				            <span class="erro7" style="color:red;padding:3px"></span>
                      <div class="checkbox checkbox-primary">
  					            <input type="hidden" name="customer_id" id="" value="<?php echo $userid; ?>">
                        <input type="checkbox" name="terms" id="checkbox3" value="yes">
                        <label for="checkbox3">
  					  
                          <span class="terms-content"> I am authorised to provide the personal details presented and I consent to my information being disclosed to a credit reporting agency or my information being checked with the document issuer or official record holder for the purposes of verifying my identity in accordance with the AML/CTF Act (see <a href="/terms" class="" target="">Terms and Conditions</a><!-- react-text: 1016 --> for further information).</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="settings-blue-notification undefined">
                      <div class="col-info-icon">
                        <i aria-hidden="true" class="fa fa-info-circle"></i>
                      </div>
                      <div class="col-info-description">We verify the identity of all Development investors in accordance with our AML/CTF obligations, using our trusted partner, VEDA.</div>
                  </div>
                </div>
              </div>

              <hr>
              <!--<input class="button" type="button" id="submit_form" name="submit" value="CONTINUE TO DEPOSIT ">-->
  			      <input type="submit" id="depositfund" name="submit" value="Countinue Deposit">
			     </form>
          </div> 
        </div>

      </div>
    </div>
  </div>
<?php get_footer(); ?>