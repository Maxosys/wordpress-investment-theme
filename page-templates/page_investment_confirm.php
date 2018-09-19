<?php /* template name: _Investment Confirm */ ?>

<?php 

get_header(); 
 $current_user_id= get_current_user_id();
?>

<?php if(isset($_POST['submit'])){
	
                          	global $wpdb;
                          	
                          	 $customer_totalprice = $_POST["totalpricehidn"];
                          	 $customer_userid = $_POST["customeridhidn"];
                          	 $customer_email = $_POST["customeremail"];
                          	 $customer_transactionid = $_POST["transactionid"];
                          	 $customer_agree = $_POST["status"];
                          	 $customer_productid = $_POST["productsid"];
                          	 $customer_fundamt = $_POST["fundhidn"];
                          	 $customer_quantity = $_POST["buy_quantity"];
                          	 $customer_transfees = $_POST["transactionfeehidn"];
                             $customer_producttitle = $_POST["productstitle"];
                             $customer_name = $_POST["customername"];
                             $customer_producttype = $_POST["product_type"];
                          	
                             $inserted = $wpdb->insert( 'wpor_buybrick_payment',
                                 array(
                                    'purchage_amount'=>$customer_totalprice,
                                    'user_id'=>$customer_userid,
                                    'customer_email'=>$customer_email,
                                    'transactions_id'=> $customer_transactionid,
                                		'status'=> $customer_agree,
                                		'product_id'=> $customer_productid,
                                		'product_quantity'=> $customer_quantity,
                                		'transaction_fees'=> $customer_transfees,
                                		'customer_fund'=> $customer_fundamt,
                                    'property_name'=> $customer_producttitle,
                                    'product_type'=> $customer_producttype,

                                  )
                                 
                             );
 
                             if( $inserted == true ){
                                        
                                        $to = "nanowebtech87@gmail.com, ".$customer_email."";
                                        $subject = "Customer Purchage Development";
                                        $message = "<html><body>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='center' valign='top' bgcolor='#838383' style='background-color:#838383;'><br>
    <br>
    <table width='600' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td align='left' valign='top'><img src='https://investmentssquared.com.au/wp-content/uploads/2018/04/img-55393b605e0dc.png' width='600' height='177' style='display:block;'></td>
      </tr>
      <tr>
        <td align='center' valign='top' bgcolor='#d3be6c' style='background-color:#d3be6c; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000000; padding:0px 15px 10px 15px;'>
          <div><img src='https://investmentssquared.com.au/wp-content/uploads/2018/03/divider.png' width='517' height='10'></div>
          <div style='font-size:48px; color:#838383;'><b>INVESTMENTSQUARED</b></div>
          <div><img src='https://investmentssquared.com.au/wp-content/uploads/2018/03/divider.png' width='517' height='10'></div>
          <div style='font-size:18px; color:#555100;'><br>
            Hi ".$customer_name.", <br>
            InvestmentsSquared Buy Development<br>
Thanks For The Buying Investment Development!</div>
          <div><br>
          <table class='table table-striped'>
                                                  <thead>
                                                    <tr>
                                                      <th>Person Name</th>
                                                      <th>Buy Development</th>
                                                      <th>Purchage Amount</th>
                                                      <th>Product Type</th>
                                                      <th>Development Quaninty</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr style='background-color: #f9f9f9;'>
                                                      <td>".$customer_name."</td>
                                                      <td>".$customer_producttitle."</td>
                                                      <td>".$customer_totalprice."</td>
                                                      <td>".$customer_producttype."</td>
                                                      <td>".$customer_quantity."</td>

                                                    </tr>
                                                   </tbody>
                                                </table><br><br>
                Happy Investing!<br>
                The INVESTMENTSQUARED Team</div></td>
      </tr>
      <tr>
        <td align='left' valign='top'><img src='https://investmentssquared.com.au/wp-content/uploads/2018/03/bot.png' width='600' height='18' style='display:block;'></td>
      </tr>
  </table>
    <br>
    <br></td>
  </tr>
</table>
</body><html>";
         //print_r($message);die('hello');

                                               $header = "From:".$customer_email." \r\n";
                                               $header .= "MIME-Version: 1.0\r\n";
                                               $header .= "Content-type: text/html\r\n";
                                               
                                               $retval = mail ($to,$subject,$message,$header);
                                               //print_r($retval);exit;
                                            if( $retval == true ) {
                                                $success = '<div class="alert alert-success" role="alert">
                                                    Email Sent Successfully... Please Save the TFN Number.
                                                  </div>';
                                            }
                                            }
                                             else{
                                                $successtfn = '<div class="alert alert-success" role="alert">
                                                    The TFN is a success!
                                                  </div>';
                                                 }

                                      }
                                     
                                      //echo $current_user_id;
                                      if(isset($_POST['submit'])){  
                                                 $customer_tfnnumber = $_POST["tfn"];
                                                $updatetfn = $wpdb->query( "UPDATE `wpor_buybrick_payment` SET tfn = '$customer_tfnnumber' WHERE user_id = $current_user_id" );
                                             if( $updatetfn == true ){
                                                 /*$successtfn = '<div class="alert alert-success" role="alert">
                                                    The TFN is a success!
                                                  </div>';*/
                                             }else{
                                                $successtfn = '<div class="alert alert-danger" role="alert">
                                                  The TFN is not success!
                                                </div>';
                                             }
                                      }?>
<div class="banner innerbanner">
    <div class="live-stats">
    
      <div class="container">

        <div class="property-name">
          <span class="property-code"><?php echo $customer_producttitle; ?></span>
          <span class="property-address"><?php the_content(); ?></span>
        </div>

        <div class="properties-info">
         
          <span class="brick-price hidden-xs">
            <i class="fa fa-tag"></i>
            <span class="hidden-sm hidden-xs">Price :</span>
            <span class="badge-price">$<?php echo $customer_totalprice; ?></span>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="conftimationdiv">
    <div class="container">

      <div class="confrimcontent">
      	<?php
        if (isset($success)){ echo "<div style='text-align:center' width:50%;>" . $success . "</div>";}
        if (isset($successtfn)){ echo "<div style='text-align:center' width:50%;>" . $successtfn . "</div>";}
        ?>
        <img src="<?php echo get_template_directory_uri();?>/images/stamp.png">
        <h3>congratulations you now own <b><?php echo $customer_quantity; ?> Unit in enmol.</b></h3>
        
      </div>


    </div>


  </div>
<div class="property-form">
    <div class="container">
      <div class="confrim">
        <div class="default-head__button-container">
          <a class="button" href="https://investmentssquared.com.au/properties/">All Properties</a>
          <!--<a class="button  dark-outline-button" href="#" >back to  <?php //the_title(); ?></a>-->
          <input type="button" class="button back" value="back to  <?php the_title(); ?>" onclick="history.back(-1)" />
        </div>

        <div id="tfn-panel">
          <div class="form-row">
            <div class="col-md-2 col-sm-3">
              <label for="tfn"> Please provide your Tax File Number (TFN)</label>
            </div>
            <div class="col-sm-5 col-md-offset-1 col-sm-push-4 col-md-push-4">
              <div class="settings-blue-notification undefined">
                  <div class="col-info-icon">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                  </div>
                  <div class="col-info-description"> Please enter your TFN to receive your full distributions. If you choose not to provide your TFN, Development is required to withhold tax at the highest marginal rate which is currently  49% </div>
              </div>
            </div>
            <div class="col-sm-4 form-input col-sm-pull-5 col-md-pull-6">
              <form role="form" method="post">
                <input type="text" id="tfn" name= "tfn" value="" maxlength="9" placeholder="Enter your TFN" required="">
                <input type="submit" name="submit" class="button submit-tfn" value="Save">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>