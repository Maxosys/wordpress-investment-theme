<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>
	<script>
	
	function hideshowfun(dropval)
	{
		console.log(dropval);			
		
		if(dropval == '15yr')
		{
			$(".class15yr").show();
			$(".class20yr").hide();
			$(".class10yr").hide();
			$(".class5yr").hide();
			$(".class1yr").hide();
		}
		if(dropval == '10yr')
		{
			$(".class15yr").hide();
			$(".class20yr").hide();
			$(".class10yr").show();
			$(".class5yr").hide();
			$(".class1yr").hide();
		}
		if(dropval == '5yr')
		{
			$(".class15yr").hide();
			$(".class20yr").hide();
			$(".class10yr").hide();
			$(".class5yr").show();
			$(".class1yr").hide();
		}
		if(dropval == '1yr')
		{
			$(".class15yr").hide();
			$(".class20yr").hide();
			$(".class10yr").hide();
			$(".class5yr").hide();
			$(".class1yr").show();
		}
		if(dropval == '20yr')
		{
			$(".class15yr").hide();
			$(".class20yr").show();
			$(".class10yr").hide();
			$(".class5yr").hide();
			$(".class1yr").hide();
		}
		
		
		
	}
	
	</script>
	<?php

//ACQUISITION COSTS FORMULLA
	//Stamp Duty	
$stamp = get_post_meta( get_the_ID(), 'Stamp Duty', true);
 $stamp_duty = str_replace(',', '', $stamp);

//Legal & Professional Fees
$legal = get_post_meta( get_the_ID(), 'Legal & Professional Fees', true);
 $legal_fees = str_replace(',', '', $legal);

//Buyers Agent Fees
$buyer_fees = get_post_meta( get_the_ID(), 'Buyers Agent Fees', true);
 $legal_agent_fees = str_replace(',', '', $buyer_fees);

//Other Costs
$other_cost = get_post_meta( get_the_ID(), 'Other Costs', true);
 $other_costs = str_replace(',', '', $other_cost);

$total_acq = $stamp_duty + $legal_fees + $legal_agent_fees + $other_costs;
$total_acquition_cost = number_format($total_acq,2);
//echo $total_acquition_cost;

//ACQUISITION COSTS FORMULLA END

//ASSETS FORMULLA START
	//Purchase Cost
$purchage = get_post_meta( get_the_ID(), 'Purchase Cost', true);
$purchage_cost = str_replace(',', '', $purchage);

	//Acquisition Costs
$asset_acqution = $total_acquition_cost;
$asset_acqution_cost = str_replace(',', '', $asset_acqution);

	//Cash Reserve
$cash = get_post_meta( get_the_ID(), 'Cash Reserve', true);
$cash_reserve = str_replace(',', '', $cash);
//echo $cash_reserve; 

$total_assets = $purchage_cost + $asset_acqution_cost + $cash_reserve;
$total_assets_cost = number_format($total_assets,2);

//ASSETS FORMULLA END

//COMPLETION DATE FORMULLA.

	//Total Capital
$total_purchage = $total_assets_cost;
$total_purchage_cost = str_replace(',', '', $total_purchage);

	//Expected Profit
$expected_profit = get_post_meta( get_the_ID(), 'Expected Profit', true );
$expect_multiply = $total_purchage_cost * $expected_profit / 100;
$expected_profit_cost = number_format($expect_multiply,2);
	//Estimated Completion
$estimate = $total_purchage_cost - $expect_multiply;
$estimated_completion = number_format($estimate,2);
//echo $estimated_completion;
$estimate_price = $estimate / 10000;
$projected_unit_value = number_format($estimate_price,2);

//COMPLETION DATE FORMULLA END

//HISTORICAL PURCHASE FORMULLA START
$initial_equity = get_post_meta( get_the_ID(), 'Initial Equity', true );
$initial_equity_cost = str_replace(',', '', $initial_equity);

//Expected Profit
$historical_expect = $expected_profit_cost;
$historical_expect_cost = str_replace(',', '', $historical_expect);

//Acquisition Costs
$historical_acqution = $total_acquition_cost;
$historical_acqution_cost = str_replace(',', '', $historical_acqution);

//Cash Reserve
$cash_reserve = get_post_meta( get_the_ID(), 'Cash Reserve', true );
$historical_cash_reserve = str_replace(',', '', $cash_reserve);

$historical_cost = $initial_equity_cost + $historical_expect_cost + $historical_acqution_cost + $historical_cash_reserve;
$historical_total_purchase_price = number_format($historical_cost,2);
//echo $historical_cost;
//HISTORICAL PURCHASE FORMULLA END


?>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estimated Returns Breakdown for <?php the_title();?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="return-calculator-results-overview">

          <div class="return-calculator-results-overview__left">
            <div class="return-calculator-results-overview__main-title">Your Inputs</div>
            <div class="return-calculator-results-overview__capital-return-rate">
              <div class="return-calculator-results-overview__title">Change in Property Value p.a.:</div>
              <div class="return-calculator-results-overview__value" id="property_value" >0.00%</div>
            </div>
            <div class="return-calculator-results-overview__investment-amount">
              <div class="return-calculator-results-overview__title">I would like to invest:</div>
              <div class="return-calculator-results-overview__value" id="investment_value">$00,000</div>
            </div>
            <div class="return-calculator-results-overview__investment-period">
              <div class="return-calculator-results-overview__title">Holding Period:</div>
              <div class="return-calculator-results-overview__value" id="holding_period">0 Month</div>
            </div>
          </div>

          <div class="return-calculator-results-overview__right">
              <div class="return-calculator-results-overview__returns-estimation">
                 <div class="return-calculator-results-overview__estimated-return"> Estimated Return
                  <div class="return-calculator-results-overview__estimated-return-value" id="estimate_return_pop">$0,000.00</div>
                 </div>
                <div class="return-calculator-results-overview__estimated-return-rates">
                  <div class="return-calculator-results-overview__estimated-return-rate return-calculator-results-overview__estimated-return-rate--positive" id="postive_per_pop">00.00%</div>
                  <div class="return-calculator-results-overview__estimated-return-annualised-rate return-calculator-results-overview__estimated-return-annualised-rate--positive" id="annualised_per_pop">(0.00%annualised) </div>
               </div>
             </div>
         </div>

       </div>


          <div class="col-sm-12" style=""><div id="contain"></div></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!---Modal End-->
 <!--Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues.-->
<div class="banner innerbanner">
    <div class="live-stats">
      <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="property-name">
          <span class="property-code"><?php the_title(); ?></span>
          <span class="property-address"><?php the_content(); ?></span>
        </div>

        <div class="properties-info">
          <span class="num-of-investors hidden-xs">
            <i class="fa fa-user"></i>
            <span class="hidden-sm hidden-xs">Estimated Completion :</span>
            <span class="badge-price"><?php echo get_post_meta( get_the_ID(), 'Invester', true ); ?></span>
          </span>
          <span class="brick-price hidden-xs">
            <i class="fa fa-tag"></i>
            <span class="hidden-sm hidden-xs">Price :</span>
            <span class="badge-price"><?php echo $product->get_price_html();?></span>
          </span>
        </div>



      </div>
    </div>
  </div>

  <div class="property-hero">
    <div id="owl-example" class="owl-carousel">
      
      <?php if( class_exists('Dynamic_Featured_Image') ) {
       global $dynamic_featured_image;
       $featured_images = $dynamic_featured_image->get_featured_images();
       foreach($featured_images as $key => $imagesslide){
       $img = $imagesslide['full'];?>
        <div><a href="<?php echo $img; ?>" rel="lightbox">
<img class="alignnone wp-image-2770 size-single-thumbnail" src="<?php echo $img; ?>" alt="2015-04-10_190211" width="" height="" style="opacity: 1;">
</a></div>
     
       <?php }
   } ?>
    
    </div>


    <div class="property-hero__property-details">
      <div class="property-hero__property-stats-container">
          <div class="property-hover">
            <ul class="debt">
              <li><div> <i aria-hidden="true" class="fa fa-cog"></i><?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>%</div></li>
            </ul>
            <ul class="property-icons">
               <li> <div><?php echo get_post_meta( get_the_ID(), 'Property Type', true ); ?></div> <i aria-hidden="true" class="fa fa-home"></i></li>
              <li> <div><?php echo get_post_meta( get_the_ID(), 'Bedrooms', true ); ?></div> <i aria-hidden="true" class="fa fa-bed"></i></li>
              <li><div><?php echo get_post_meta( get_the_ID(), 'Bathrooms', true ); ?></div> <i aria-hidden="true" class="fa fa-bath"></i></li>
              <li><div><?php echo get_post_meta( get_the_ID(), 'Garage', true ); ?></div> <i aria-hidden="true" class="fa fa-car"></i></li>
            </ul>
          </div>


      </div>
    </div>
  </div>
  
  <div class="property-nav">
    <div class="container">
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active"><a href="#tab_default_1" data-toggle="tab"><i class="fa fa-home visible-xs"></i><span class="tab-name hidden-xs">Summary</span></a> </li>
            <li><a href="#tab_default_2" data-toggle="tab"><i class="fa fa-database visible-xs"></i> <span class="tab-name hidden-xs">Development Data </span></a> </li>
            <li><a href="#tab_default_3" data-toggle="tab"><i class="fa fa-area-chart visible-xs"></i><span class="tab-name hidden-xs"> UNIT DATA</span></a></li>
            <li><a href="#tab_default_4" data-toggle="tab"><i class="fa fa-file visible-xs"></i> <span class="tab-name hidden-xs"> Details </span></a></li>
          </ul> 
          <?php 
          $estincome = get_post_meta( get_the_ID(), 'Estimated Net Income', true);
          $estincome_rmv = str_replace( ',', '', $estincome );
          $brickprice2 =  $product->get_price();
                        
          $c = $estincome_rmv / $brickprice2 / 100;
                        
          // $estincome.'_'.$brickprice2;
           $english_format_number = number_format($c, 2, '.', '');
          //echo $english_format_number;
     
          //Yield Calculation Working

          //TOTAL PROJECT INVESTMENT RENTAL FORMULA END
          ?>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
                <div class="panels">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">Investment Info</div>
                        <div class="financials-panel__section-title financials-panel__text">
                          <span> <i aria-hidden="true" class="fa fa-database"></i> Projected Returns</span>
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Quarterly Payout per Unit</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span id="quartypayout">1.25%</span>
                            </div>
                          </div>
                       </div>
                       <div class="financials-panel__section-title financials-panel__text">
                          <span> <i aria-hidden="true" class="fa fa-area-chart"></i>Suburb Info</span>
                          <select id="pref-perpage" class="form-control" name="percent-year" onchange="hideshowfun(this.value)" >
                            <option value="20yr" selected>20yr</option>
                            <option value="15yr">15yr</option>
                            <option value="10yr">10yr</option>
                            <option value="5yr">5yr</option>
                            <option value="1yr">1yr</option>      
                          </select>

                          <div class="financials-panel-row class20yr" style="display:block">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Historical Suburb Growth*</div>
                              <div class="financials-panel-row__value net-rental-yield">
                                <span>8.64%</span>
                              </div>
                            </div>
                          </div>

                          <div class="financials-panel-row class20yr" style="display:block" >
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Gearing Effect (<?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% Project Completion)</div>
                              <div class="financials-panel-row__value net-rental-yield"> <span>1.93%</span></div>
                            </div>
                          </div>
						  
						              <!--------------- comment of cpital return info -------------->
						  
                          <div class="financials-panel-row class15yr" style="display:none">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Historical Suburb Growth*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>7.40%</span></div>
                            </div>
                          </div>

                          <div class="financials-panel-row class15yr" style="display:none"  >
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">  Gearing Effect (<?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% Project Completion)*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>1.65%</span></div>
                            </div>
                          </div>

                          <div class="financials-panel-row class10yr" style="display:none" >
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Historical Suburb Growth*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>5.38%</span></div>
                          </div>
                          </div>

                          <div class="financials-panel-row class10yr" style="display:none">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">  Gearing Effect (<?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% Project Completion)*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>1.20%</span></div>
                            </div>
                          </div>

                          <div class="financials-panel-row class5yr" style="display:none">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Historical Suburb Growth*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>6.74%</span>
                              </div>
                            </div>
                          </div>

                          <div class="financials-panel-row class5yr" style="display:none">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Gearing Effect (<?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% Project Completion)*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>1.50%</span></div>
                            </div>
                          </div>

                          <div class="financials-panel-row class1yr" style="display:none">
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">  Historical Suburb Growth*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>2.23%</span>
                              </div>
                            </div>
                          </div>

                          <div class="financials-panel-row class1yr" style="display:none" >
                            <div class="flex">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon"> Gearing Effect (<?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% Project Completion)*</div>
                              <div class="financials-panel-row__value net-rental-yield"><span>0.50%</span></div>
                            </div>
                          </div>
						              <!--------------- comment of cpital return info -------------->
                       </div>
                       <div class="note">
                       <p>*Past performance does not indicate future performance. <br>Neither income nor capital returns are guaranteed.</p></div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">COMPLETION DATE</div>
                        <ul class="wallts settlement">
                          <li><i class="fa fa-home"></i>Total Capital <span class="monry">$<?php echo $total_assets_cost; ?></span></li>
                          <li><i class="fa fa-credit-card"></i>Expected Profit <?php echo get_post_meta( get_the_ID(), 'Expected Profit', true ); ?>% <span class="monry">$<?php echo $expected_profit_cost; ?></span></li>
                          <li><i class="fa fa-money"></i>Current Investors<span class="monry">$<?php echo $estimated_completion; ?></span></li>
                          <li><i class="fa fa-tag"></i>Current Unit Price<span class="monry totalmnry">$<?php echo $projected_unit_value; ?></span></li>
                        </ul>

                        <div class="note">
                          <?php echo get_field('next_valuation_date');?>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">Invest in <?php the_title();?></div>
                          <div class="lowest-available-price-box">
                             Current Available Units
                            
                            <div class="larger-text">$<?php echo $product->get_price();?></div>
                            
                          </div>

                          <div class="brick-valuation-bar no-icon">
                            <div class="col-md-8 col-xs-7 col-no-padding">
                              <div class="left-side-no-icon">
                                <span class="brick-valuation-title">Initial Unit Price</span>
                                <div class="valuation-date"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-5 col-no-padding brick-valuation-value">$<?php echo $projected_unit_value; ?></div>
                          </div>

                          <span class="premium-discount-component">
                            <div class="premium-discount-bar wrap-the-col">
                              <!--<div class="col-md-8 col-xs-6 col-no-padding premium-discount-bar-title">Discount on Initial Brick Price
                              </div>
                              <div class="col-md-4 col-xs-6 col-no-padding premium-discount-bar-value"><?php //echo get_post_meta( get_the_ID(), 'Discount on Initial Brick Price', true); ?>%</div>-->
                            </div>
                          </span>
                            <?php
                            if ( is_user_logged_in() ) {
                            echo '<div class="default-head__button-container brickbtn">
                            <!--<a class="button"  href="<?php //echo $product->add_to_cart_url();?>">BUY UNITS </a>-->
                            <a class="button"  id="checkamt" href="#popup1" onclick="checkamt()">BUY UNITS </a>
                            <a class="button dark-outline-button" href="">SELL UNITS </a>
                          </div>';
                          } else {
                              echo '<div class="default-head__button-container brickbtn">
                            <!--<a class="button"  href="<?php //echo $product->add_to_cart_url();?>">BUY UNITS </a>-->
                            <a class="button"  href="#login">BUY UNITS </a>
                            <a class="button dark-outline-button" href="">SELL UNITS </a>
                          </div>';
                          }
                          ?>
                          

                          <div class="note">
                            <p class="bricks-sold-last-month"><span class="bricks">621 Units</span>transacted in <?php the_title(); ?> over the last 30 days.</p>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12 col-sm-12" id="popup1">
                      <div class="box">
                        <div class="popupss" id="popupss">
                          <a href="#" class="close">×</a>
                          <div class="title-heading">Invest in <?php the_title(); ?></div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="brick-valuation-bar">
                                <div class="wrap-the-col">
                                  <div class="col-md-8 col-xs-7 col-no-padding">
                                    <span class="brick-valuation-title">Current Unit Price</span>
                                    <div class="valuation-date"></div>
                                  </div>
                                </div>
                                <div class="col-md-4 col-xs-5 col-no-padding brick-valuation-value"> $<?php echo $projected_unit_value; ?></div>
                              </div>
                              <!--Get Recent Transaction-->

                              <ul class="nav nav-tabs order-listing" role="tablist">
                                <!--<li role="presentation" class="active">
                                  <a href="#tab1" role="tab" data-toggle="tab"> Bricks available</a>
                                </li>-->
                                <li role="presentation" class="active">
                                  <a href="#tab2" role="tab"  data-toggle="tab">Recent Transactions</a>
                                </li>
                              </ul>

                              <div id="myTabContent" class="tab-content">
                                
                                <?php
                                $current_user_id= get_current_user_id();
                                $recenttrancsation = $wpdb->get_results("SELECT `product_quantity`, `purchage_amount`, `created_at` FROM `wpor_buybrick_payment` where user_id = $current_user_id ORDER BY id DESC LIMIT 5");
                                //print_r($recenttrancsation);
                                ?>
                                <div class="tab-pane active" id="tab2">
                                  <table class="table table-bordered table-striped table-hover recently-sold">
                                    <thead>
                                      <tr>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($recenttrancsation as $recent_transaction){
                                      $quantity = $recent_transaction->product_quantity;
                                      $amount= $recent_transaction->purchage_amount;
                                      $date= strtotime($recent_transaction->created_at);
                                      //echo $date;
                                      $productdate = date('d-m-Y',$date);
                                      //echo $productdate;
                                      echo  '<tr>
                                        <td class="text-left trade-0-quantity">'.$quantity.'</td>
                                        <td class="text-left trade-0-brick-price"><span>$'.$amount.'</span></td>
                                        <td class="text-left trade-0-brick-date">'.$productdate.'</td>
                                      </tr>';

                                      }?>
                                      <tr>
                                        <td class="show-button" colspan="3">Show More</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>

                              <div class="note">
                                <p>Note: Units are bought starting with the lowest available price.</p>
                              </div>
                            </div>
                            <!--End Get Recent Transaction-->
                            <?php 
                            $user_info = wp_get_current_user();
                            $user_id = $user_info->ID;
                            $customeremail = $user_info->user_email;
                            //print_r($user_id);
                             
                            $deposit_table=  $wpdb->get_results("SELECT SUM(deposit_ammount) as total_deposit  FROM `wpor_depoist_fund` where customer_id = $user_id" ); 
                            $payment_table =  $wpdb->get_results("SELECT SUM(purchage_amount) as total_purchage  FROM `wpor_buybrick_payment`  where user_id = $user_id" );
                             
                            $deposit_total =  $deposit_table[0]->total_deposit;
                            $purchage_total =  $payment_table[0]->total_purchage; 
                            $fundamt = abs($deposit_total - $purchage_total);
                            $famt = number_format($fundamt, 2, '.', '')
                            ?>
                            <!---Cart Page Working-->
                            <?php

                             $allposts = $wpdb->get_results("SELECT SUM(deposit_ammount) as total_amount , `customer_id`, `transaction_id`, `customer_email`, `first_name` FROM `wpor_depoist_fund` where customer_id = $user_id" );
                             //print_r($allposts);
    
                            foreach($allposts as $fund){
                              //print_r($fund);
                            
                            $customerid = $fund->customer_id;
                            $transactionid = $fund->transaction_id;
                            $customer_email = $customeremail;
                            $cutomername = $fund->first_name;
                            }

                            $product_id = $product->id;
                          
                            $token = md5(uniqid(rand(), true));

                            ?>
                            <form action="/investment-confirm/" method="post">
                              <div class="col-md-8 place-order-panel">
                                <div class="hidden-xs">
                                  <div class="col-md-6 title col-no-padding-left">Place your order</div>
                                  <div class="col-md-6 funds-available col-no-padding-right"> Funds available: $<?php echo $famt;?></div>
                                </div>
                                <div class="white-boxes-container">
                                  <div class="col-inline col-sm-3 col-no-padding-left">
                                    <span class="quantityerror" style="color:red;padding:3px"></span>
                                    <div class="white-box quantity"> Quantity
                                      <input type="text" placeholder="0" class="form-control quantity-to-be-purchased" id="id_buy_quantity" name="buy_quantity" onkeyup="callme(this);" value="1">
                                    </div>
                                  </div>

                                  <div class="col-inline col-sm-3">
                                    <div class="white-box">
                                      <div>Av. Projected Unit Value</div>
                                      <div class="value basis-price">$<?php echo $product->get_price(); ?></div>
                                    </div>
                                  </div>
                                  <?php 
                                  $quantity = 1;
                                  $fund = $famt;
                                  $brickprice = $product->get_price();
                                  $transactionfee = get_post_meta( get_the_ID(), 'Transaction fee', true);
                                  $total = ($quantity * $brickprice) + $transactionfee;
                                  //echo  'total = '.$fund;
                                  ?>

                                  <!--hidden field-->
                                  <input type="hidden" name="fundhidn" id="fundhidn" value="<?php echo $fund; ?>">
                                  <input type="hidden" name="quantityhidn" id="quantityhidn" value="<?php echo $quantity; ?>">
                                  <input type="hidden" name="brickpricehidn" id="brickpricehidn" value="<?php echo $brickprice; ?>">
                                  <input type="hidden" name="transactionfeehidn" id="transactionfeehidn" value="<?php echo $transactionfee; ?>">
                                  <input type="hidden" name="totalpricehidn" id="totalpricehidn" value="<?php echo $total; ?>">
                                  <input type="hidden" name="customeridhidn" id="customeridhidn" value="<?php echo $customerid; ?>">
                                  <input type="hidden" name="transactionid" id="transactionid" value="<?php echo $token;?>">
                                  <input type="hidden" name="customeremail" id="customeremail" value="<?php echo $customer_email; ?>">
                                  <input type="hidden" name="productsid" id="productsid" value="<?php echo $product_id; ?>">
                                  <input type="hidden" name="productstitle" id="productstitle" value="<?php the_title(); ?>">
                                  <input type="hidden" name="customername" id="customername" value="<?php echo $cutomername; ?>">
                                  <input type="hidden" name="product_type" id="product_type" value="<?php echo get_post_meta( get_the_ID(), 'Property Type', true ); ?>">
                                        <!--hidden field-->
                                  <div class="col-inline col-sm-4 col-no-padding-right">
                                    <div class="white-box">
                                      <div>Order Total</div>
                                      <div class="value purchase-proposal-total" id="order_total_id" name="order_total">$<?php echo $total; ?></div>
                                    </div>        
                                  </div>
                                </div>

                                <div class="row"><div class="col-xs-12 error error-proposal">How many Unit would you like to buy? Enter a Quantity to continue your transaction.</div></div>

                                <div class="row table-row">
                                  <div class="col-xs-7 col-no-padding-right col-left"> Cost of Unit </div>
                                  <div class="col-xs-5 col-no-padding-left col-right value-of-bricks" id="costofbrick" name="costofbrick">$<?php echo $brickprice;?></div>
                                </div>

                                <div class="gray-line"></div>

                                <div class="row table-row">
                                  <div class="col-xs-7 col-no-padding-right col-left">Transaction fee (<?php echo get_post_meta( get_the_ID(), 'Transaction fee', true); ?>) </div>
                                  <div class="col-xs-5 col-no-padding-left col-right value-of-bricks" id="transaction_fees" name="transaction_fees">$<?php echo $transactionfee;?></div>
                                </div>

                                <div class="gray-line"></div>

                                <div class="row table-row">
                                  <div class="col-xs-7 col-no-padding-right col-left">Order Total </div>
                                  <div class="col-xs-5 col-no-padding-left col-right value-of-bricks" id="order_total" name="order_total">$<?php echo $total; ?></div>
                                </div>

                                <div class="gray-line"></div>

                                <div class="action-buttons">
                                  <div>
                                    <input type="checkbox" id="consent" required="" name="status" value="1"><label for="consent">&nbsp;I agree to this transaction</label> 
                                  </div>

                                  <div class="cnfrim-btn">
                                    <span class="funderror" style="color:red;padding:3px"></span>
                                    <input type="submit" id="depositfundd" class="button orange-button confirm-purchase-button action-full-button right-arrow-button" name="submit" value="CONFIRM PURCHASE">
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                      <div class="box">
                        <div class="title-heading">Investment Info</div>
                        <div class="disclaimer">Find out how key factors can influence returns by changing the inputs.</div>
                        <div class="property-returns-calculator__title">Estimate the annual change in unit value </div>
						            <div class="percent-input"><input type="text" id="input-annual-growth-rate" name="input-annual-growth-rate" value="10" readonly></div>
										
                        <div class="ranges">
                          <div class="col-xs-1 col-no-padding">10%</div>
                          <div class="col-xs-10"><input type="range" id="slider" value="10" min="10" max="50" step="0.1" /> </div>

                          <div class="col-xs-1 col-no-padding text-right">50%</div>
                        </div>

                        <div class="cal">
                          <div class="col-md-6 col-xs-6 col-no-padding">
                            <div class="property-returns-calculator__investment-amount">
                              <div class="property-returns-calculator__title">I would like to invest</div>
                              <div class="dollar-input">
                                <input type="text" placeholder="Enter Amount" id="investment-amount" name="investment-amount" value="30,000">

                                <input type="hidden" placeholder="Enter Amount" id="investment-amount-value" name="investment-amount-value" value="30,000">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-xs-6 col-no-padding right">
                            <div class="property-returns-calculator__holding-period">
                              <div class="property-returns-calculator__title">Holding period</div>
                              <select id="pref-perpagee" name="selector" class="form-control">
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Month</option>
                                    <option value="3">3 Month</option>
                                    <option value="4">4 Month</option>
                                    <option value="5">5 Month</option>
                                    <option value="6">6 Month</option>
                                    <option value="7">7 Month</option>
                                    <option value="8">8 Month</option>
                                    <option value="9">9 Month</option>
                                    <option value="10">10 Month</option>
                                    <option value="11">11 Month</option>
                                    <option selected="" value="12">12 Month</option>
                                    <option value="13">13 Month</option>
                                    <option value="14">14 Month</option>
                                    <option value="15">15 Month</option>
                                    <option value="16">16 Month</option>
                                    <option value="17">17 Month</option>
                                    <option value="18">18 Month</option>
                                    <option value="19">19 Month</option>
                                    <option value="20">20 Month</option>
                                    <option value="21">21 Month</option>
                                    <option value="22">22 Month</option>
                                    <option value="23">23 Month</option>
                                    <option value="24">24 Month</option>
                                    </select>
                              <input type="hidden" placeholder="option" id="pref-perpagee-value" name="pref-perpagee-value" value="">
                            </div>
                          </div>
                        </div>

                        <div class="property-returns-calculator__estimated-return">
                          <div class="return-calculator-results-overview__returns-estimation">
                            <div class="return-calculator-results-overview__estimated-return">Estimated Return
                              <div class="return-calculator-results-overview__estimated-return-value" id="estimate_return">-----</div>
                            </div>
                            <div class="return-calculator-results-overview__estimated-return-rates">
                              <div class="return-calculator-results-overview__estimated-return-rate return-calculator-results-overview__estimated-return-rate--positive"><span id="postive_value">-----</span>%
                              </div>
                              <div class="return-calculator-results-overview__estimated-return-annualised-rate return-calculator-results-overview__estimated-return-annualised-rate--positive"><span id="annualised_value">(-----</span>% annualised)</div>
                            </div>
                          </div>
                        </div>

                        <div class="property-returns-calculator__view-breakdown-link property-returns-calculator__view-breakdown-link--enabled" data-toggle="modal" data-target="#exampleModal" data-id="ISBN-001122">View Return Breakdown &gt;</div>

                        <div class="note">
                          <p>Note: The Development Calculator is for illustrative purposes only and has been prepared without taking account of your objectives, financial situation or needs. You should consider the Assumptions and Qualifications to understand how the calculator works and how the results can differ from actual investment returns.</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8 col-sm-12 chartsection">
                      <div class="box">
                        <div class="title-heading">Historical Suburb Performance - Median Price</div>
                        <a class="link">St Peters, SA (Houses)</a>
                        
						            <div id="container"></div>
            						<button id="large">Large</button>
            						<button id="small">Small</button>
            						<button id="auto">Auto</button>
                        
                        <div class="note">
                          <p class="bricks-sold-last-month">SA2 Suburb Index for the median price of all sales (excluding multi-sales) for rolling 12 months. Source: CoreLogic</p>
                        </div>
                      </div>
                    </div>

                    <script type="text/javascript">
                      $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {

                      // Create the chart
                      var chart = Highcharts.stockChart('container', {

                          chart: {
                              height: 530
                          },

                          title: {
                              text: ''
                          },

                          subtitle: {
                              text: ''
                          },

                          rangeSelector: {
                              selected: 1
                          },

                          series: [{
                              name: 'Price',
                              data: data,
                              type: 'area',
                              threshold: null,
                              tooltip: {
                                  valueDecimals: 2
                              }
                          }],

                          responsive: {
                              rules: [{
                                  condition: {
                                      maxWidth: 500
                                  },
                                  chartOptions: {
                                      chart: {
                                          height: 300
                                      },
                                      subtitle: {
                                          text: null
                                      },
                                      navigator: {
                                          enabled: false
                                      }
                                  }
                              }]
                          }
                      });

                      $('#small').click(function () {
                          chart.setSize(400);
                      });

                      $('#large').click(function () {
                          chart.setSize(800);
                      });

                      $('#auto').click(function () {
                          chart.setSize(null);
                      });
                      });
		                </script>

                    <!--Yield Calculation Working-->
                    <?php $estincome = get_post_meta( get_the_ID(), 'Estimated Net Income', true);
                      $estincome_rmv = str_replace( ',', '', $estincome );
                      $brickprice2 =  $product->get_price();
                    
                      $c = $estincome_rmv / $brickprice2 / 100;
                    
                      // $estincome.'_'.$brickprice2;
                       $english_format_number = number_format($c, 2, '.', '');
                      //echo $english_format_number;
                    ?>
                    <!--Yield Calculation Working-->
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">QUARTERLY DISTRIBUTIONS</div>
                        <div class="financials-panel__section-title financials-panel__text monthly">
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Quarterly Payout per Unit</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span id="quartypayoutt">1.25%</span>
                              <div class="box-financials-description">Annualised</div>
                            </div>
                          </div>
                       </div>

                       <div class="financials-panel__section-title financials-panel__text monthly">
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Your Quarterly Return</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span id="quartlyreturn">$0.00</span>
                              <div class="box-financials-description">Lump Sum Payment (instead of ‘Currently tenanted’)</div>
                            </div>
                          </div>
                       </div>

                       <div class="financials-panel__section-title financials-panel__text monthly">
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Final Distribution</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span id="last_distribution">$0.00</span>
                              <div class="box-financials-description"></div>
                            </div>
                          </div>
                       </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">Capital Returns</div>
                        <div class="financials-panel__section-title financials-panel__text monthly">
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Development Returns</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span><?php echo get_post_meta( get_the_ID(), '20yr Historical Suburb Growth', true); ?>%</span>
                              <div class="box-financials-description">20 years average, <br> CoreLogic</div>
                            </div>
                          </div>
                        </div>

                        <div class="financials-panel__section-title financials-panel__text monthly">
                            <div class="financials-panel-row">
                              <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                             Development Profit</div>
                              <div class="financials-panel-row__value net-rental-yield">
                                <span>$<?php echo $total_assets_cost; ?></span>
                                <div class="box-financials-description"></div>
                              </div>
                            </div>
                        </div>

                        <div class="financials-panel__section-title financials-panel__text monthly">
                          <div class="financials-panel-row">
                            <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                           Project Completion</div>
                            <div class="financials-panel-row__value net-rental-yield">
                              <span><?php echo get_post_meta( get_the_ID(), 'Expected Profit', true); ?>%</span>
                              <div class="box-financials-description"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="box">
                        <div class="title-heading">Investment Case Overview for <?php the_title();?></div>
                        <div class="grey-box reasons-text">
                          <div>
                            <span>
                              <?php echo get_field('investment_case_overview');?>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="box">
                        <div class="title-heading">Property Location</div>
                        <div class="row">
                          <div class="properties-map col-md-6">
                            <div class="properties-map-title">Suburb: St Peters (SA)</div>
                            <div class="properties-map-container">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13088.255990306949!2d138.6141597300024!3d-34.90484343852691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0c96bee679a0d%3A0x5033654628ebf60!2sSt+Peters+SA+5069%2C+Australia!5e0!3m2!1sen!2sin!4v1518784909438" width="530" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                          </div>

                          <div class="properties-map col-md-6">
                            <div class="properties-map-title">Address: 73 Third Avenue, St Peters SA 5069</div>
                            <div class="properties-map-container">
                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3272.133410915175!2d138.62663661495804!3d-34.90310138090669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0c96f8ab29e1d%3A0xc3212ffa8ef384ad!2s73+Third+Ave%2C+St+Peters+SA+5069%2C+Australia!5e0!3m2!1sen!2sin!4v1518784741596" width="540" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="tab-pane" id="tab_default_2">
              <div class="panels">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="box metrics">
                      <div class="title-heading">PROJECT CAPITAL: KEY METRICS</div>
                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Funds under Management</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span>$<?php echo get_post_meta( get_the_ID(), 'Rent Per Week', true); ?></span>
                            <div class="box-financials-description">Currently tenanted</div>
                          </div>
                        </div>
                      </div>

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Monthly Accrual</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span>$<?php echo get_post_meta( get_the_ID(), 'Estimated Net Income', true); ?></span>
                            <div class="box-financials-description">Currently tenanted</div>
                          </div>
                        </div>
                      </div>

                      <!--Yield Calculation Working-->
                              <?php 
                                // Fixed Rate
                                   $brickprice =  $product->get_price();
                                   $brick_divide = ($brickprice * 20) / 100; 
                                   $brick_plus =  $brick_divide + $brickprice;
                                    $format_numberr = ($brick_plus - $brickprice) / 2;
                                      $format_number = number_format($format_numberr, 2, '.', '');
                                 // Variable Rate         
                                    $brickpricee =  $product->get_price();
                                    $brick_dividee = ($brickprice * 35) / 100; 
                                    $brick_pluss =  $brick_dividee + $brickpricee ;
                                    $format_number_variablee = ($brick_pluss - $brickpricee) / 2;
                                    $format_number_variable = number_format($format_number_variablee, 2, '.', '');
                                      
                                ?>
                      <?php
                            // Gross Fiexd Rate

                         $estincome = $brick_plus - $brickprice;
                         $english_format_numberr = ($estincome * 0.71) / 2;
                         $english_format_number = number_format($english_format_numberr, 2, '.', '');

                            // Estimate Variable Rate

                         $estincomee = $brick_pluss - $brickpricee;
                         $english_format_number_variablee = ($estincomee * 0.71) / 2;
                        $english_format_number_variable = number_format($english_format_number_variablee, 2, '.', '');
                      ?>
                      <!--Yield Calculation Working-->

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Estimated Quarterly Payout</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span><?php echo $english_format_number; ?>%</span>
                            <div class="box-financials-description">Annualised</div>
                          </div>
                        </div>
                      </div>

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Final Distribution </div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span id="last_distribution_val">$0.00</span>
                            <div class="box-financials-description"></div>
                              <?php $distribution = get_post_meta( get_the_ID(), 'Nov Distribution', true);
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="note">
                       <p>The distribution for the month ending Nov 2017 was $0.11 per Unit and performed in line with our forecast. This has been paid into Member's Digital Wallets.</p></div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="box metrics">
                      <div class="title-heading">Yield Calculations</div>
                      <div class="col-md-12 col-sm-12">
                        <div class="row">
                          <div class="gross">
                            <div class="col-sm-6 col-no-padding">
                              <div class="math-formulas">
                                <div class="math-formula estimated-gross-rental-yield-1">
                                  <div class="math-formula-box">
                                    <div class="math-formula-molecular">Profit Estimated</div>
                                    <div class="math-formula-line"></div>
                                    <div class="math-formula-denominator">Total Capital</div>
                                  </div>
                                </div>

                                <div class="math-formula estimated-gross-rental-yield-2">
                                  <div class="math-formula-box">
                                    <!--<div class="math-formula-molecular">$<?php echo get_post_meta( get_the_ID(), 'Projected GRV', true); ?> / 10,000</div>-->
                                    <div class="math-formula-line"></div>
                                      <!--<div class="math-formula-denominator"><?php echo $product->get_price_html();?></div>-->
                                  </div>
                                </div>
              									
                                <equal></equal>
                              </div>
                            </div>

                            <div class="col-sm-6 gross-rental-yield col-no-padding">
                              <div class="box-financials financials-box-small">
                                <div class="gray-box">
                                  <div class="box-financials-title"><span>Estimated</span></div>
                                  <div class="box-financials-value">(Fixed) <?php echo $format_number; ?>%</div>
                                  <!-- <div class="box-financials-value">(Variable) <?php echo $format_number_variable; ?>%</div> -->
                                  <div class="box-financials-description">Annualised</div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="yield">
                            <div class="col-sm-6 col-no-padding">
                              <div class="math-formulas">
                                <div class="math-formula">
                                  <div class="math-formula-box">
                                    <div class="math-formula-molecular">Gross-29% </div>
                                    <div class="math-formula-line"></div>
                                    <!--<div class="math-formula-denominator">Lowest Available Brick Price</div>-->
                                  </div>
                                </div>

                                <div class="math-formula">
                                  <div class="math-formula-box">
                                    <!--<div class="math-formula-molecular">$<?php echo get_post_meta( get_the_ID(), 'Estimated Net Income', true); ?> / 10,000</div>-->
                                    <div class="math-formula-line"></div>
                                      <!--<div class="math-formula-denominator"><?php echo $product->get_price_html();?></div>-->
                                    </div>
                                </div>

                                <equal></equal>
                              </div>
                            </div>

                            <div class="col-sm-6 net-rental-yield col-no-padding">
                              <div class="box-financials financials-box-small">
                                <div class="gray-box">
                                  <div class="box-financials-title">
                                    <span>Estimated</span>
                                  </div>
                                  <div class="box-financials-value">(Fixed) <?php echo $english_format_number; ?>%</div>
                                  <!-- <div class="box-financials-value">(Variable) <?php echo $english_format_number_variable; ?>%</div> -->
                                  <div class="box-financials-description">Annualised</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="note">
                        <p>Estimated Gross Income is calculated assuming 100% tenancy, and using the current rent. Estimated Re-Investment Pool is forecast based on current rental income and forecasted expenses. Lowest Available Unit Price at 2017-12-14 19:59</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-12 Cashflow">
                    <div class="box">
                      <div class="title-heading">CASHFLOW: ANNUAL FORECAST</div>
                      <div class="table-responsive panel-financials-table">
                        <table class="table">
                          <tbody>
                              <tr>
                                <td><i class="fa fa-circle grey"></i>Projected GRV</td>
                                <td class="text-right annual-gross-rental-income">$<?php echo get_post_meta( get_the_ID(), 'Projected GRV', true); ?></td>
                                <?php $gross = get_post_meta( get_the_ID(), 'Projected GRV', true);
                                		$gross_symbols = array(",", ".");
										            $gross_value = str_replace($gross_symbols, "", $gross);
										
                                ?>
                              </tr>

                              <tr>
                                <td><i class="fa fa-circle blue"></i>Projected Expenses</td>
                                <td class="text-right annual-property-expenses">$<?php echo get_post_meta( get_the_ID(), 'Projected Expenses', true); ?></td>
                                <?php $property = get_post_meta( get_the_ID(), 'Projected Expenses', true);
                                		$property_symbols = array(",", ".");
										            $property_value = str_replace($property_symbols, "", $property);
                                ?>
                              </tr>

                              <tr>
                                <td><i class="fa fa-circle red"></i>Projected Profit</td>
                                <td class="text-right interest-payment">$<?php echo get_post_meta( get_the_ID(), 'Projected Profit', true); ?></td>
                                <?php $interest = get_post_meta( get_the_ID(), 'Projected Profit', true);
                                		$interest_symbols = array(",", ".");
										            $interest_value = str_replace($interest_symbols, "", $interest);
                                ?>
                              </tr>

                              <tr class="totalss">
                                <td>
                                  <i class="fa fa-circle green"></i>Re-Investment Pool</td>
                                  <td class="text-right net-rental-income"> $<?php echo get_post_meta( get_the_ID(), 'Re-Investment Pool', true); ?></td>
                                  <?php $net = get_post_meta( get_the_ID(), 'Re-Investment Pool', true);
                                  			$net_symbols = array(",", ".");
										              $net_value = str_replace($net_symbols, "", $net);
                                  ?>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <?php //$historical_month = 10000 / 8;
                $interest_month = $brickprice * 20 / 100;
                $interest_year = $interest_month / 2;
                $month3 = ($interest_year / 1) + $brickprice + $interest_year;

                $month3 = number_format($month3, 2, '.', '');

                $month6 = ($interest_year / 2) + $brickprice + $interest_year;

                $month6 = number_format($month6, 2, '.', '');

                $month9 = ($interest_year / 3) + $brickprice + $interest_year;

                $month9 = number_format($month9, 2, '.', '');

                $month12 = ($interest_year / 4) + $brickprice + $interest_year;

                $month12 = number_format($month12, 2, '.', '');

                $month15 = ($interest_year / 5) + $brickprice + $interest_year;

                $month15 = number_format($month15, 2, '.', '');

                $month18 = ($interest_year / 6) + $brickprice + $interest_year;

                $month18 = number_format($month18, 2, '.', '');

                $month21 = ($interest_year / 7) + $brickprice + $interest_year; 

                $month21 = number_format($month21, 2, '.', '');   

                $month24 = ($interest_year / 8) + $brickprice + $interest_year;

                $month24 = number_format($month24, 2, '.', '');

                  ?>

                  <div class="col-md-7 col-sm-12">
                    <div class="box">
                      <div class="title-heading">Historical Development Monthly Distributions</div>
                      <div class="line-chart">
						            <div id="historical-brickx"></div>
                      </div>
                      <div class="note">
                        <p>Distributions displayed for up to last 12 months. Past performance is not a guide to future performance.</p>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12 col-sm-12">
                    <div class="box">
                      <div class="title-heading">Cashflow Breakdown: Annual Forecast</div>
                      <div id="anual-forcast"></div>
                      <div class="note">
                        <p>Re-Investment Pool is forecast based on current rental income and predicted expenses.</p>
                      </div>
                    </div>
                  </div>

                  <script>
                  	Highcharts.chart('anual-forcast', {
                      chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                      },
                      title: {
                          text: ''
                      },
                       lang: {
                          decimalPoint: ',',
                          thousandsSep: ' '
                      },
                      tooltip: {
                          //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                          pointFormat: "Forecast: {point.y:.f}",
                              valuePrefix: '$',
                              valueSuffix: ' million'
                      },
                      plotOptions: {
                          pie: {
                              allowPointSelect: true,
                              cursor: 'pointer',
                              dataLabels: {
                                  enabled: true,
                                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                  style: {
                                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                  }
                              }
                             
                          }
                      },
                      series: [{
                          name: 'Forecast',
                          colorByPoint: true,
                          data: [{name: 'Projected GRV',
                          				color: '#acabab',
                          			y: <?php echo $gross_value; ?>},
                  					{
                  			            name: 'Projected Expenses',
                  			            color: '#256bc4',
                  			            y: <?php echo $property_value; ?>
                  			        }, {
                  			            name: 'Projected Profit',
                  			            color: '#ff0000',
                  			            y: <?php echo $interest_value; ?>
                  			        }, {
                  			            name: 'Re-Investment Pool',
                  			            color: '#11e406',
                  			            y: <?php echo $net_value; ?>
                  			        }]
                      }]
                  });
                  </script>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab_default_3">
              <div class="panels">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="box metrics">
                      <div class="title-heading">Capital Returns: Key Metrics</div>
                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                           Historical Suburb Growth</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span><?php echo get_post_meta( get_the_ID(), '20yr Historical Suburb Growth', true); ?>%</span>
                            <div class="box-financials-description">20 years average, CoreLogic</div>
                          </div>
                        </div>
                      </div>

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Total Purchase Cost</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span>$<?php echo $total_assets_cost; ?></span>
                            <div class="box-financials-description"><?php echo get_the_date(); ?></div>
                          </div>
                        </div>
                      </div>

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                           Expected Profit</div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span>$<?php echo $expected_profit_cost; ?></span>
                            <div class="box-financials-description"><?php echo get_the_date(); ?></div>
                          </div>
                        </div>
                      </div>

                      <div class="financials-panel__section-title financials-panel__text monthly">
                        <div class="financials-panel-row">
                          <div class="financials-panel-row__title financials-panel__text financials-panel-row__title--no-icon">
                            Projected Unit Value </div>
                          <div class="financials-panel-row__value net-rental-yield">
                            <span>$<?php echo $projected_unit_value;?></span>
                            <div class="box-financials-description"><?php echo get_the_date(); ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="box metrics">
                      <div class="title-heading">Settlement Date: <?php echo get_the_date(); ?></div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="text-left">
                            <div class="blue-label">Assets</div>
                          </div>
                          <div class="row my-row">
                            <div class="col-xs-8 col-left">Purchase Cost</div>
                            <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo get_post_meta( get_the_ID(), 'Purchase Cost', true); ?></div></div>
                          </div>

                          <div class="row my-row">
                            <div class="col-xs-8 col-left">Acquisition Costs</div>
                            <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo$total_acquition_cost;?></div></div>
                          </div>

                          <div class="row my-row">
                            <div class="col-xs-8 col-left">Cash Reserve</div>
                            <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo get_post_meta( get_the_ID(), 'Cash Reserve', true); ?></div></div>
                          </div>

                          <div class="row my-row">
                            <div class="col-xs-8 col-left">Total Purchase Cost</div>
                            <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo $total_assets_cost; ?></div></div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="text-left">
                            <div class="blue-label">Liabilities</div>
                          </div>
                          <div class="row my-row">
                            <div class="col-xs-8 col-left">Expected Profit</div>
                            <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo $expected_profit_cost; ?></div></div>
                          </div>
                        </div>

                        <div class="equailtytotal">
                          <div class="col-md-6 col-sm-12">
                            <div class="row my-row">
                              <div class="col-xs-8 col-left">Estimated Completion</div>
                              <div class="col-xs-4 col-right"> <div class="last-property-valuation">$<?php echo $estimated_completion; ?></div></div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 blue-box">
                          <div class="box-financials financials-box-small latest-value">
                            <div class="gray-box">
                              <div class="box-financials-title">Estimated Completion</div>
                              <div class="box-financials-value">$<?php echo $estimated_completion; ?></div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 blue-box">
                          <div class="box-financials financials-box-small latest-value">
                            <div class="gray-box">
                              <div class="box-financials-title">Projected Unit Value</div>
                              <div class="box-financials-value">$<?php echo $projected_unit_value; ?></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="note"><p>Next Valuation Date: June, 2018</p></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="box">
                      <div class="title-heading">Historical INVESTMENTSSQUARED Monthly Distributions</div>
                        <div class="line-chart">
                          <div id="Development-monthly"></div>
                        </div>
                        <div class="note">
                          <p>SA2 Suburb Index for the median price of all sales (excluding multi-sales) for rolling 12 months. Source: CoreLogic</p>
                        </div>
                    </div>
                  </div>

                  <script type="text/javascript">
                   var chart = new Highcharts.Chart({

                      chart: {
                          renderTo: 'Development-monthly'
                      },

                      xAxis: {
                          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                      },
                      
                      tooltip: {
                          pointFormat: "Value: {point.y:.0f} mm"
                      },

                      series: [{
                          data: [1029.9, 1071.5, 1106.4, 1129.2, 1144.0, 1176.0, 1135.6, 1148.5, 1216.4, 1194.1, 1095.6, 1054.4]
                      }]

                    });
                  </script>

                  <div class="col-md-4">
                    <div class="box panel-acquisition-costs">
                      <div class="title-heading">Historical Purchase</div>
                      <div class="listingd">
                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Settlement Date</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date"><?php echo get_the_date(); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Initial Equity</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Initial Equity', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Expected Profit</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $expected_profit_cost; ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Acquisition Costs</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $total_acquition_cost; ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Cash Reserve</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Cash Reserve', true); ?></div>
                        </div>

                        <div class="black-line"></div>
                        <div class="row my-row">
                            <div class="col-xs-7 col-no-padding-right bold">Total Purchase Price</div>
                            <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $historical_total_purchase_price; ?></div>
                        </div>
                        <div class="black-line"></div>
                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Projected Unit Value</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $projected_unit_value; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box panel-acquisition-costs">
                      <div class="title-heading">Acquisition Costs</div>
                      <div class="listingd">
                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Stamp Duty</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Stamp Duty', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Legal & Professional Fees</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Legal & Professional Fees', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Buyers Agent Fees</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Buyers Agent Fees', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Other Costs</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo get_post_meta( get_the_ID(), 'Other Costs', true); ?></div>
                        </div>

                        <div class="black-line"></div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Total Acquisition Costs</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $total_acquition_cost; ?></div>
                        </div>

                        <div class="note"><p>Note: Acquisition Costs are amortised evenly over 60 month periods. </p></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box panel-acquisition-costs">
                      <div class="title-heading">Debt Breakdown</div>
                      <div class="listingd">
                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Expected Profit</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date">$<?php echo $expected_profit_cost; ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Loan Terms</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date"><?php echo get_post_meta( get_the_ID(), 'Loan Terms', true); ?> Years</div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Loan Type</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date"><?php echo get_post_meta( get_the_ID(), 'Loan Type', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Fixed Terms</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date"><?php echo get_post_meta( get_the_ID(), 'Fixed Terms', true); ?></div>
                        </div>

                        <div class="row my-row">
                          <div class="col-xs-7 col-no-padding-right bold">Interest Rate</div>
                          <div class="col-xs-5 col-no-padding-left text-right acquisition-date"><?php echo get_post_meta( get_the_ID(), 'Interest Rate', true); ?>%</div>
                        </div>

                        <div class="note"><p>Note: 5 year interest only, variable rate currently at 4.54% (provided by Macquarie Bank Limited). After 5 years loan reverts to principal and interest. </p></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab_default_4">
              <div class="panels">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="title-heading">Investment Case</div>
                      <?php the_excerpt(); ?>
                      <p><a class="readmore" href="#">Show more</a> </p>
                    </div>
                  </div>


                  <div class="col-md-4">
                      <div class="box panel-acquisition-costs">
                        <div class="title-heading">Amenities</div>
                        <?php echo get_field('amenities');?>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box panel-acquisition-costs">
                      <div class="title-heading">Monthly Updates</div>
                      <div class="listingd">
                        <article>
                          <?php echo get_field('monthly_updates');?>
                          <p><a class="readmore" href="#">Show more</a> </p>
                        </article>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box panel-document">
                      <div class="title-heading">Due Diligence & Key Documents</div>
                      <div class="listingd">
                        <ul>
                          <div><a href="javascript:;" target="_blank" title="Jun 2017 Investment Report" class="document">
                            <i class="fa fa-file"></i><?php echo do_shortcode('[bsk-pdf-manager-pdf id="1"]');?> </a></div>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
   </div>
   <?php endwhile; // end of the loop. ?>
  </div>
 <script type="text/javascript">
$(document).ready(function(){
	
	    $('#investment-amount').keyup(function(event){
		//slider value
		var investment = $(this).val();
		var investment_val = parseFloat(investment.replace(/,/g, ''));
		//set slider value
		if(event.which >= 37 && event.which <= 40) return;

		  // format number
		  $(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			;
		  });
		  
		var slider_range = $('#input-annual-growth-rate').val();
		var slider_val= get_range_val;
		//get range value
		var get_range_val = parseFloat($('#input-annual-growth-rate').val());
		//investment value
		//var investment_val = parseFloat($('#investment-amount').val());
		//Month value
		var month_val = parseFloat($('#pref-perpagee').val());
		//console.log('get_range_val'+month_val);

		calculation(slider_val,get_range_val,investment_val,month_val);
		quaterhistorical(investment_val);
	});
	    
	     // Envestment Amount Function End

	     // Month Change function
	     $('#pref-perpagee').change(function(){
		//slider value
		var month_val = $(this).val();
		//set slider value
		
	
		var get_range_val = parseFloat($('#input-annual-growth-rate').val());
		var slider_val= get_range_val;
		//investment value
		var investment = $('#investment-amount').val();
		var investment_val = parseFloat(investment.replace(/,/g, ''));
		//Month value
		//var month_val = parseFloat($('#pref-perpagee').val());
		//console.log('get_range_val'+month_val);

		calculation(slider_val,get_range_val,investment_val,month_val);
		
	});
	     // Month Change function End
    $(document).on('input', '#slider', function() {
		//slider value
		var slider_val = $(this).val();
		//set slider value
		var slider_range = $('#input-annual-growth-rate').val(slider_val);
		//get range value
		var get_range_val = parseFloat($('#input-annual-growth-rate').val());
		//investment value
		var investment = $('#investment-amount').val();
		var investment_val = parseFloat(investment.replace(/,/g, ''));
		//Month value
		var month_val = parseFloat($('#pref-perpagee').val());
		//console.log('get_range_val'+month_val);

		calculation(slider_val,get_range_val,investment_val,month_val);
		
	});

});


function calculation(slider_val,get_range_val,investment_val,month_val){

  var monthValueArr = [];
  
	var slider_val1 = slider_val;
	var get_range_val1 = get_range_val;
	var investment_val1 = investment_val;
  
  for(var i = 1; i<=month_val; i++ )
    {
	var month_val1 = i;
	// ESTIMATE FORMULA START
	 var estimate = parseFloat((investment_val1) * get_range_val1) / 100;
   //console.log(estimate);
	 var annualised_count = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 3 }).format(estimate);
	  var investment_val1= investment_val1;
	  //console.log(annualised_count);
	  var estimate_formula =  (estimate * month_val1) / 12;
    //console.log(estimate_formula);
	   var principal_amount = parseFloat(investment_val1) + estimate_formula;
	 //var estimate_return = parseFloat(principal_amount + month_val1);

	  var estimate_number = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 3 }).format(principal_amount);
		console.log(estimate_number);
    monthValueArr.push([parseFloat(estimate_number.replace(/,/g, ''))]);
	    var estimate_number = '$' + estimate_number;
	 var estimate_total = $('#estimate_return').text(estimate_number);
	 //var return_total = $('#estimate_return').text();
	
	 var annualised = $('#annualised_value').text(annualised_count);
	 //var annualised_count = number_format($annualised, 2, '.', '');
	 	
	
	 var annualised_text = $('#annualised_value').text();
	 
	 var postive_value = parseFloat(annualised_text * month_val1);
	 var postive_count = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 3 }).format(postive_value);
	 $('#postive_value').text(postive_count);
}
setvalueonpop(monthValueArr);
}
document.getElementById("input-annual-growth-rate").onkeyup=function(){
    var input=parseInt(this.value);
    if(input<1 || input>45)
    alert("Value should be between 30 - 45");
    return;
}
document.getElementById("investment-amount").onkeyup=function(){
	var investment= $(this).val();
	var a = investment.replace(/\,/g,'');
	 var b = Number(a);
	//console.log(b);
	
	if(b < 1 || b > 1000000)
		//alert('hrllo');
		alert("Your investment amount is over the maximum ownership (5% per property) in this property. As per the PDS, 500 Units is the maximum you can own in each property.");
	return;
} 

function setvalueonpop(monthValueArr){
  
  
  var investrange_val = $('#input-annual-growth-rate').val();
  var investrange_val_per = investrange_val + '%';
  $("#property_value").text(investrange_val_per);

  var invest_val = $('#investment-amount').val();
  var invest_val_curry = '$' + invest_val;
  $("#investment_value").text( invest_val_curry ); 

  var holding_val = $('#pref-perpagee').val();
  var holding_val_month = holding_val  +  'Month';
  $("#holding_period").text( holding_val_month );

  var estimatereturn_val = $('#estimate_return').text();
  $("#estimate_return_pop").text( estimatereturn_val );

  var postive_val = $("#postive_value").text();
  var postive_val_per = postive_val + '%'
  $('#postive_per_pop').text(postive_val_per);
      
  var annualed_value =  $('#annualised_value').text();
  var annualed_value_per = (annualed_value + '% annualised');
  $("#annualised_per_pop").text( annualed_value_per );

    
Highcharts.chart('contain', {

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Est. Account Value'
        }
    },
  
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
  
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
        },
            pointStart:1
        }
    },
  
    series: [{
    month:"%B %Y",
        name: 'Estimate Value',
        data: monthValueArr
    
    }
  
    ],
    responsive: {
        rules: [{
            condition: {
                
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
    
}
  </script>

  <script>

  function quaterhistorical(investment_val){

var quaterinvestment_val = investment_val;
var estimate_the_annual = 20;

// 24 months or 2 years or 8 quaters

var twenty_per_of_invest  =  (quaterinvestment_val * estimate_the_annual) / 100;


// distribution @ half the fixed rate 

var twenty_per_of_invest_half = twenty_per_of_invest / 2;

// Month 3  - $1250 (10% of $100K) / 8 (number of quarters in 2 years)

// 1250 per quater  value for 3,6,9,12,15,18,21,24  total 8 

var per_qua_value = twenty_per_of_invest_half / 8;

var quater_value_per = (per_qua_value / 10000);

 $("#quartypayout").text( quater_value_per );
 $("#quartypayoutt").text( quater_value_per );
 var quater_return = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 3 }).format(per_qua_value)
 $("#quartlyreturn").text( quater_return );
//console.log(quater_value_per);
// 1 to 7 quater value 
var Quater_values = [];
//console.log(Quater_values);
// 1st

 Quater_values[0] = per_qua_value;

//Quater_values.push(per_qua_value);

// 2nd 

 Quater_values[1] = per_qua_value;

// 3rd

 Quater_values[2] = per_qua_value;

// 4th

 Quater_values[3] = per_qua_value;

// 5th

 Quater_values[4] = per_qua_value;

// 6th
 Quater_values[5] = per_qua_value;

// 7th

 Quater_values[6] = per_qua_value;

// final values means last quater or no of month 24 month
var last_calculation = per_qua_value + quaterinvestment_val + twenty_per_of_invest_half;
 //var last_calculation = push.(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(last_calculation_val));
//Quater_values.push(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(last_calculation));
 //console.log(last_calculation);
 var final_calcu = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 3 }).format(last_calculation)
 $("#last_distribution").text( final_calcu );

 $("#last_distribution_val").text( final_calcu );
 
// 8th

 Quater_values[7] = last_calculation; 

//console.log(Quater_values);
 quatersetvalue(Quater_values);
  }
  
// Create the chart
function quatersetvalue(Quater_values){

var chart = new Highcharts.Chart({

                      chart: {
                          renderTo: 'historical-brickx'
                      },

                      xAxis: {
                          categories: ['Month 3', 'Month 6', 'Month 9', 'Month 12', 'Month 15','Month 18','Month 21', 'Final Payout']
                      },
                      
                      tooltip: {
                          pointFormat: "Distribution per Unit: {point.y:.0f}"
                      },

                      series: [{
                          data: Quater_values
                      }]

                    });

}
</script>
<style>
text.highcharts-title {
    display: none;
}
</style>
 <?php get_footer( 'shop' );?>