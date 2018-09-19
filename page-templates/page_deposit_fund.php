<?php /* template name: _Deposit Fund */ ?>

<?php 

get_header(); 

?>

<?php if(isset($_POST['submit'])){
	
	global $wpdb;
	
	$customer_resident = $_POST["resident"];
	$customer_citizen = $_POST["citizen"];
	$customer_fname = $_POST["fname"];
	$customer_lname = $_POST["lname"];
	$customer_dobday = $_POST['dobday']."-". $_POST['dobmonth']."-".$_POST['dobyear'];
	$customer_address = $_POST["address"];
	$customer_mobile = $_POST["mobile"];
	$customer_tfnnumber = $_POST["tfnnumber"];
	$customer_terms = $_POST["terms"];
	$customer_dstamt = $_POST["depositfund"];
  $format_number = number_format($customer_dstamt, 2, '.', '');
  $customer_id = $_POST["customer_id"];
	
	$inserted = $wpdb->insert( 'wpor_temp_depoist_fund',
     array(
        'resident'=>$customer_resident,
        'citizen'=>$customer_citizen,
        'first_name'=>$customer_fname,
        'last_name'=> $customer_lname,
		'date_of_birth'=> $customer_dobday,
		'resident_address'=> $customer_address,
		'moblie'=> $customer_mobile,
		'tax_file_number'=> $customer_tfnnumber,
		'terms'=> $customer_terms,
    'deposit_ammount'=> $format_number,
	'customer_id'=> $customer_id,
      )
     
 );
 //print_r($inserted);exit;
 if( $inserted ){
  
    $Id = $wpdb->insert_id;


  $_SEESION['deposit_ammount_id'] = $Id;

$url = 'https://investmentssquared.com.au/deposit/?amount=".$format_number."&userid=".$customer_id."&lastid=".$Id';
 wp_redirect($url);


	 $success = '<div class="alert alert-success" role="alert">
  The Information is a success!
</div>';
 }else{
    $success = '<div class="alert alert-danger" role="alert">
  The Information is not success!
</div>';
 }

}


$amount = $format_number;

if($_GET['amount'])
{
  $amount = $_GET['amount'];
}

$depostelatid = $Id;

if($_GET['lastid'])
{
  $depostelatid = $_GET['lastid'];
}
$useerid = $customer_id;

if($_GET['userid'])
{
  $useerid = $_GET['userid'];
}

$amount =  $amount * 100;

?>


 
<div class="sub-header">
  <div class="container">
    <div class="board">
      <div class="board-inner">
        <ul class="nav nav-tabs" id="myTab">
          <li class="">
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

          <li class="active">
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
                <div class="board-text">Buy Units</div>
                <div class="borad-title">you're set to go</div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div> 
  </div>
</div>

<?php
  if (isset($success)){ echo "<div style='text-align:center' width:50%;>" . $success . "</div>";}

?>

<div class="tab-pane" id="funds">
  <div class="perosnal-details">
    <h3 class="head text-center">Deposit Funds</h3> 
    <form action="/deposit-thankyou/" method="POST"> 
      <div class="form-row">
          <div class="col-md-4 col-md-offset-3">
            <!--<span class="dollar-input">
            <input type="text" id="text1" placeholder="Enter a valid amount (minimum $75)" required>
  				  <input type="hidden" id="text2" value=" ">
            <input type="hidden" value="<?php //echo $lastInsertId; ?>">
  				  </span>
  				  <span class="msgg" style="color:red;padding:3px">-->
            <input type="hidden" id="depostelatid" name="depostelatid" value="<?php echo $depostelatid; ?>">
            <input type="hidden" id="useerid" name="useerid" value="<?php echo $useerid; ?>">
            <input type="hidden" id="deposteamt" name="deposteamt" value="<?php echo $amount; ?>">
          </div>
          <div class="col-md-12 paybutton">
            <button id="continue-deposit-button" src="https://checkout.stripe.com/checkout.js" class="button orange-button right-arrow-button button-continue-deposit">Pay with Card</button>
          </div>
      </div>

      <?php $sourece = $_POST['depostelatid'];
        $cusmid = $_POST['useerid'];
        $amt = $_POST['deposteamt'];
      ?>
      <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_X1J6EKrqmMLZ3ObHVIQJPqlP"
          data-amount="<?php echo $amount; ?>"
          data-name="Investmentsquared"
          data-currency="USD"
          data-description="Deposit fund"
          data-image="https://investmentssquared.com.au/wp-content/uploads/2018/02/icon.png"
          data-locale="auto"

          data-zip-code="fasle">
          "source" => $sourece,
          "source" => $cusmid,
          "source" => $amt,
      </script>
  
        <!--<div class="row payment-options">
          <div class="col-md-4 col-md-offset-2 payment-option poli-option">
            <input type="radio" id="poli-input" name="paymentMethod" value="" class="poli" required="">
            <label for="poli-input">Immediate Funds (Poli)</label>
          </div>
          <div class="col-md-4 payment-option bpay-option">
            <input type="radio" id="bpay-input" name="paymentMethod" value="" class="bpay" required="">
            <label for="bpay-input">Bank Transfer (BPAY)</label>
          </div>
          <div class="col-md-4 col-md-offset-2 payment-option poli-option-learn-more">
            <div class="learn-more-about-payment">
              <img src="<?php //echo get_template_directory_uri();?>/images/poli_logo.png">
              <div class="estimate-arrival"> ESTIMATED ARRIVAL: <span>INSTANT</span></div>
                <ul>
                  <li>Access your funds immediately*</li>
                  <li>Quick and easy to pay online</li>
                  <li>No registration needed</li>
                  <li>No fees</li>
                </ul>
              </div>
          </div>
          <div class="col-md-4 payment-option bpay-option">
				  <div class="learn-more-about-payment"><img src="<?php //echo get_template_directory_uri();?>/images/bpay_logo.png"><div class="estimate-arrival"><!-- react-text: 1126 --><!--ESTIMATED ARRIVAL: <!-- /react-text --><!--<span>Wed 24 Jan</span></div><ul><li>BPAY details provided on the next page</li><li>Funds delivered in 1-2 business days</li><li>No registration needed</li><li>No fees</li></ul></div>
				</div>
        <div class="col-md-8 col-md-offset-2 poli-disclaimer">*Up to $20,000. Remaining funds delivered after your transfer is received (1-2 business days).</div></div>-->
    </form>
  </div>
</div>


<style>
  input.input-error {color: #ff0000; border: 1px solid #ff0000; box-shadow: 0 0 5px #ff0000; }
  button.stripe-button-el {display: none; }
  .Checkout.is-desktop .Header-logoBevel {border: medium none !important; box-shadow: none !important; }
  .Checkout.is-desktop .Header-logoBorder {border: 3px solid #ddd !important; box-shadow: none !important; }
</style>
		

<?php get_footer(); ?>