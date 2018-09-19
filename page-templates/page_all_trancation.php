<?php /* The Template Name: __All Trancation */
get_header();

?>
<div class="account-settings my-transactions">
    <div class="container">
      <div class="main-heading">
        <h3>My Transactions</h3>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered  transactions-history">
          <thead>
            <tr>
              <th>Property</th>
             <!--  <th>Reference</th> -->
              <th>Date</th>
              <th>Transaction</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $user_id = get_current_user_id();
          //echo $user_id;
$transaction_info =  $wpdb->get_results("SELECT purchage_amount, transactions_id, property_name, created_at   FROM `wpor_buybrick_payment`  where user_id = $user_id" );

//print_r($transaction_info);exit;
  foreach($transaction_info as $items){
    
    $property = $items->property_name;
    $date= strtotime($items->created_at);
    $productdate = date('d-m-Y',$date);
    $transaction_id= $items->transactions_id;
    $amount= $items->purchage_amount;
echo '<tbody><tr><td>'.$property.'</td><td>'.$productdate.'</td><td>'.$transaction_id.'</td><td>$'.$amount.'</td></tr></tbody>';


}
    ?>
            

          </tbody>
        </table>
      </div>
    </div>
  </div> 
  <?php get_footer(); ?>