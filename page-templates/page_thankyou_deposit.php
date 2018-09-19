<?php /* template name: _Deposit Thankyou */ ?>

<?php get_header(); ?>
<?php

$lastid = $_POST['depostelatid'];
//echo $lastid;
$transid = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];
$userid  = $_POST['useerid'];

$allposts = $wpdb->get_results("SELECT * FROM `wpor_temp_depoist_fund` WHERE customer_id = $userid ORDER BY id = $lastid DESC limit 1" );
//print_r($allposts); exit('hello');
      $customer = $allposts[0]->customer_id;
      $resident = $allposts[0]->resident;
      $citizen = $allposts[0]->citizen;
      $first_name = $allposts[0]->first_name;
      $last_name = $allposts[0]->last_name;
      $date_of_birth = $allposts[0]->date_of_birth;
      $resident_address = $allposts[0]->resident_address;
      $moblie = $allposts[0]->moblie;
      $tax_file_number = $allposts[0]->tax_file_number;
      $terms = $allposts[0]->terms;
      $deposit_ammount = $allposts[0]->deposit_ammount;
      
$insert = $wpdb->insert( 'wpor_depoist_fund', array( 'customer_id' => $customer, 'resident' => $resident, 'citizen' => $citizen, 'first_name' => $first_name, 'last_name' => $last_name, 'date_of_birth' => $date_of_birth, 'resident_address' => $resident_address, 'moblie' => $moblie, 'tax_file_number' => $tax_file_number, 'terms' => $terms, 'deposit_ammount' => $deposit_ammount, 'transaction_id' => $transid, 'customer_email' => $email ) );

$delete = $wpdb->query('DELETE  FROM wpor_temp_depoist_fund WHERE customer_id = "'.$userid.'"');

if($insert > 0){
$successpayment = '<div class="alert alert-success" role="alert">
  The Payment is a success!
</div>';
 }else{
    $successpayment = '<div class="alert alert-danger" role="alert">
  The Payment is not success!
</div>';
 }
		 
?>
<div class="sub-header">
    <div class="container">
      <div class="board">
        <div class="board-inner">
          <ul class="nav nav-tabs" id="myTab">
            <li class="">
              <a href="#home" data-toggle="tab" title="welcome">
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
              <a href="#funds" data-toggle="tab" title="welcome">
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

             <li class="active">
              <a href="#buy" data-toggle="tab" title="welcome">
                <div class="stepss">
                  <div class="circles">
                    <div class="circle--inner"></div>
                  </div>
                  <div class="borad-title">you're set to go</div>
                  <div class="board-text">Buy units</div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div> 
    </div>
  </div>
  <?php if (isset($successpayment)){ echo "<div style='text-align:center' width:50%;>" . $successpayment . "</div>";}?>
<div class="tab-pane" id="buy">
          <div class="perosnal-details">
            <div class="col-sm-6 pull-right">
              <img src="<?php echo get_template_directory_uri();?>/images/thankyou.jpg" class="thankyou">
            </div>
            <div class="col-sm-6 pull-right">
              <div class="thnkyou-text">
                <h3><b>Thank you </b> , <br> your deposit was successful ! </h3>
                <p>you have been credited <?php echo $deposit_ammount; ?> to buy units </p>
              </div>
            </div>
          </div>
        </div>
<?php get_footer(); ?>