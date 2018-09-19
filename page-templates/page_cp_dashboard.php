<?php /* template name: _Dashboard */ ?>
<?php get_header();$user_table =  $wpdb->get_results("SELECT COUNT(ID) as userid FROM `wpor_users`" ); 
$payment_table =  $wpdb->get_results("SELECT COUNT(id) as transid, purchage_amount, property_name FROM `wpor_buybrick_payment` ORDER BY id DESC LIMIT 1" );

//print_r($payment_table);
?>
<div class="banner">
    <div class="live-stats">
      <div class="container">
        <div class="expanded">
          <div class="col-sm-6 col-no-padding pull-right">
            <div class="col-md-2 col-xs-3 col-no-padding">
              <div class="latest-transactions__title">LATEST TRANSACTIONS</div>
            </div>
            <div class="simple-marquee-container">
              <div class="marquee">
                <ul class="marquee-content-items">
                  <li>
                    <span class="latest-transactions__info-container">
                      <span class="latest-transactions__trade">BUY: <?php echo $payment_table[0]->property_name; ?> trade share @$<?php echo $payment_table[0]->purchage_amount; ?> (23 minutes ago)
                      </span>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-no-padding pull-left">
            <div class="live-stats-icon hidden-xs"><h3>live <span>stats</span></h3></div>
            <div class="latest-stats">
              <div class="latest-stat active-members hidden-xs">
                <div class="stat-info-box">
                  <div class="stats-info-icon text-left"><i class="fa fa-user" aria-hidden="true"></i></div>
                  <div class="stats-info-details">
                    <div class="value-description">
                      <span class="value"><?php echo $user_table[0]->userid; ?></span>
                    </div>
                    <div class="title">Active Members</div>
                  </div>
                </div>
              </div>

              <div class="latest-stat bricks-transacted">
                <div class="stat-info-box">
                  <div class="stats-info-icon text-left"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                  <div class="stats-info-details">
                    <div class="value-description">
                      <span class="value"><?php echo $payment_table[0]->transid;?></span>
                    </div>
                    <div class="title">Transacted</div>
                  </div>
                </div>
              </div>

               <div class="latest-stat median-sale-time">
                <div class="stat-info-box">
                  <div class="stats-info-icon text-left"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                  <div class="stats-info-details">
                    <div class="value-description">
                      <span class="value">15h 15m</span>
                    </div>
                    <div class="title">Median Sale Time</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="dashboard">
  <div class="container">
    <div class="main-heading"><h3>My Dashboard</h3></div>
    <div class="promo-container hidden-xs">
      <div class="diversify-creative">
        <div class="text">
          <h3>Feel like a Property Magnate <br> In Minutes With <b>Investments Squared</b></h3>
        </div>
        <div class="diverstiy">
          <a href="https://investmentssquared.com.au/properties/" class="button">Diversify Now</a>
        </div>
      </div>
    </div>

    <div class="panels">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="box">
            <div class="title-heading">My Wallet</div>
            <ul class="wallts">
            	<?php
              $user_id = get_current_user_id();
        $deposit_table=  $wpdb->get_results("SELECT SUM(deposit_ammount) as total_deposit, customer_id FROM `wpor_depoist_fund` where customer_id = $user_id" ); 
              $payment_table =  $wpdb->get_results("SELECT SUM(purchage_amount) as total_purchage, SUM(product_quantity) as prd_qnty, user_id FROM `wpor_buybrick_payment` where user_id = $user_id" );

              $paymment_prodcut = $wpdb->get_results("SELECT COUNT(product_type) as `product_type`, user_id FROM `wpor_buybrick_payment` where user_id = $user_id GROUP BY `product_type`");
            //print_r($paymment_prodcut);exit('hii');
            $deposit_total =  $deposit_table[0]->total_deposit;
            
            $purchage_total =  $payment_table[0]->total_purchage; 
             $purchagettl = number_format($purchage_total, 2, '.', '');
             $fundamt = abs($deposit_total - $purchage_total);
             $famt = number_format($fundamt, 2, '.', '');
             $product_quantity= $payment_table[0]->prd_qnty; 
             $customer_id= $deposit_table[0]->customer_id;
             $userid= $payment_table[0]->user_id;
             $prd_house = $paymment_prodcut[0]->product_type;
             $prd_unit = $paymment_prodcut[1]->product_type;
             //echo $userid;
             ?>

					   <li><i class="fa fa-money"></i> Funds Available <span class="monry">$<?php echo $famt; ?></span></li>
					   <li><i class="fa fa-folder-open-o"></i> Pending Pre-Orders <span class="monry">$0.00</span></li>
				      <li><i class="fa fa-user-o"></i> My Portfolio <span class="monry">$<?php echo $purchagettl; ?></span></li>
        			<?php $total = $famt + $pending + $purchagettl;
                $totalamt= number_format($total, 2, '.', '');
              ?>
              <div class="total">Total account value <span class="monry total-price">$<?php echo $totalamt;?></span></div>
            </ul>
            <div class="default-head__button-container">
              <a href="https://investmentssquared.com.au/depoist-fund/" class="button">DEPOSIT FUNDS</a>
              <a href="" class="button dark-outline-button">WITHDRAW FUNDS </a>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="box">
            <div class="title-heading">My Portfolio</div>
            <!-- <a class="link" href="javascript:;">See Portfolio</a> -->
            <div id="portfolio" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            <ul class="wallts portfolio-list">
              <li><i class="fa fa-home"></i> Total Properties owned <span class="monry"><?php echo $prd_house; ?></span></li>
              <li><i class="fa fa-credit-card"></i> Total units owned <span class="monry"><?php echo $prd_unit; ?></span></li>
              <div class="total">Total Portfolio Value <span class="monry total-price">$<?php echo $famt;?></span>
                <?php  $data[] = $famt;
                  json_encode($data);
                ?>
              </div>
            </ul>
          </div>
        </div>
          <?php 

          $totalpercanteg = 20;


          $makeyourfirstdeposit = false;
          $buyyourfirstbrick = false;
          $enteryourtfn = false;
          $nominatedbankaccount = false;
          $collectfirstdisstribution = false;

          //echo $user_id; exit;
          if($customer_id == $user_id){
              $makeyourfirstdeposit = true;
          }
          if($userid == $user_id){
              $buyyourfirstbrick = true;
              $enteryourtfn = true;

          }

          if($makeyourfirstdeposit == true){
          $totalpercanteg= $totalpercanteg+30; 
          }
          if($buyyourfirstbrick){
          $totalpercanteg= $totalpercanteg+20; 
          }

          if($enteryourtfn){
          $totalpercanteg= $totalpercanteg+10; 
          }
          if($nominatedbankaccount){
          $totalpercanteg= $totalpercanteg+10; 
          }
          if($collectfirstdisstribution){
          $totalpercanteg= $totalpercanteg+10; 
          }
          ?>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="box">
              <div class="title-heading">Profile Completeness</div>
              <div class="profile-strength"><div><?php echo $totalpercanteg;?>%</div></div>
              <a class="steps">
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <div class="description">
                  <div class="main-description">Registration</div>
                  <div class="sub-description"></div>
                </div>
              </a>

              <a class="steps make-your-first-deposit">
                <?php if($makeyourfirstdeposit == true){?>
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <?php }else{?>
                  <div class="tick cross">
                  <i class="fa fa-times-circle"></i>
                </div>

                <?php } ?>
                <div class="description">
                  <div class="main-description">Make your first deposit</div>
                </div>
              </a>

              <a class="steps buy-your-first-brick">
                <?php if($buyyourfirstbrick == true){?>
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <?php }else{?>
                  <div class="tick cross">
                  <i class="fa fa-times-circle"></i>
                </div>

                <?php } ?>
                <div class="description">
                  <div class="main-description">Buy your first Unit</div>
                 
                </div>
              </a>


              <a class="steps enter-your-tfn not-complete next-to-complete">
                <?php if($enteryourtfn == true){?>
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <?php }else{?>
                  <div class="tick cross">
                  <i class="fa fa-times-circle"></i>
                </div>

                <?php } ?>
                <div class="description">
                  <div class="main-description">Enter your TFN</div>
                  <div class="sub-description">To receive your full distribution amount</div>
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
              </a>

              <a class="steps enter-your-tfn nominated-bank-account not-complete">
                <?php if($nominatedbankaccount == true){?>
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <?php }else{?>
                  <div class="tick cross">
                  <i class="fa fa-times-circle"></i>
                </div>

                <?php } ?>
                <div class="description">
                  <div class="main-description">Nominated Bank Account</div>
                  <div class="sub-description">To make withdrawals</div>
                  <i class="fa fa-angle-right" aria-hidden="true"></i>

                </div>
              </a>

              <a class="steps enter-your-tfn nominated-bank-account not-complete">
                <?php if($collectfirstdisstribution == true){?>
                <div class="tick">
                  <i class="fa fa-check-circle"></i>
                </div>
                <?php }else{?>
                  <div class="tick cross">
                  <i class="fa fa-times-circle"></i>
                </div>

                <?php } ?>
                <div class="description">
                  <div class="main-description">Collect first distribution</div>
                  <div class="sub-description"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="box info">
              <div class="title-heading">Last 5 Transactions</div>
              <a class="link" href="https://investmentssquared.com.au/all-trancation/">Transaction History</a>
              <div class="transaction">
                <table class="table table-striped table-condensed table-responsive">
                  <thead>
                    <tr>
                      <th>Property</th>
                      <th>Date</th>
                      <th>Transaction Id</th>
                      <th>Amount</th>                                          
                    </tr>
                  </thead>
				  
                  <?php
                  $transaction_info =  $wpdb->get_results("SELECT purchage_amount, transactions_id, property_name, created_at   FROM `wpor_buybrick_payment`  where user_id = $user_id limit 5" );
                  	foreach($transaction_info as $items){
                      
                  		$property = $items->property_name;
                      $date= strtotime($items->created_at);
                      $productdate = date('d-m-Y',$date);
                      $transaction_id= $items->transactions_id;
                      $amount= $items->purchage_amount;
                       echo '<tbody><tr><td>'.$property.'</td><td>'.$productdate.'</td><td>'.$transaction_id.'</td><td>$'.$amount.'</td></tr></tbody>';
                  		
                      }
                   ?>		
                </table>
              </div> 
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="box info">
              <div class="title-heading">Helpful information</div>
              <ul class="wallts">
                <!-- <li><a href="javascript:;">Video: Research Properties <i class="fa fa-angle-right" aria-hidden="true"></i></a></li> -->
               <!--  <li><a href="javascript:;">Video: Instantly Buy Bricks <i class="fa fa-angle-right" aria-hidden="true"></i></a> </li> -->
                <li><a href="https://investmentssquared.com.au/investments-squared-calculator/">The Investment Calculator <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
              <!--   <li><a href="javascript:;">Investment  Referrals <i class="fa fa-angle-right" aria-hidden="true"></i></a></li> -->
                <li><a href="https://investmentssquared.com.au/contact-us/">Contact Us <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script>

// Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// Build the chart
Highcharts.chart('portfolio', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            colors: pieColors,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 10
                }
            }
        }
    },
    series: [{
        name: 'Total Portfolio',
        data: [<?php echo join($data) ?>]
    }]
});
</script>
<?php get_footer(); ?>