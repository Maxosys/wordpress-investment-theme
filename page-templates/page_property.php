<?php
 /**
    * Template Name: Properties Page
    */
?>
<?php get_header(); ?>


<div class="property">
    <div class="container">
      <div class="filters">
	  <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>

                <?php dynamic_sidebar( 'sidebar-6' ); ?>

  <?php endif; ?>

        <div class="viewing-properties">
          <span class="hidden-xs">VIEWING DEVELOPMENT</span>
          <span class="visible-xs">CURRENTLY VIEWING:</span>
        </div>
        <div class="filter-panel">
          <form role="form" class="form-inline">
            <div class="form-group">
              <label for="pref-perpage" class="filter-col">Location :</label>
              <select class="form-control" id="pref-perpage">
                <option value="">All</option>
                <option value="sydney">Sydney</option>
                <option value="melbourne">Melbourne</option>
                <option value="adelaide">Adelaide</option>        
              </select> 
              <span class="fa fa-angle-down"></span>
            </div>

            <div class="form-group">
              <?php //get_sidebar(); ?>
              <?php //echo do_shortcode('[woof]');?>
              <label for="pref-perpage" class="filter-col">Sorted by :</label>
              <select class="form-control" id="pref-perpage">
                <option value="Newest to Development">Newest to Development</option>
                <option value="Discount on Unit Valuation">Discount on Unit Valuation</option>
                <option value="Lowest Unit Price">Lowest Unit Price</option>
                <option value="20 year Historical Suburb Growth">20 year Historical Suburb Growth</option>
                <option value="Debt Percentage">Project Completion Percentage</option>
                <option value="Est. Net Rental Yield">Est. Net Rental Yield</option>        
              </select> 
              <span class="fa fa-angle-down"></span>
            </div>
          </form>
        </div>
      </div>
      <div class="properties-list">
        <div class="row">
      

   

    <!--All Properties Get Code-->      
   
    <?php
   
        $args = array( 'post_type' => 'product','product_cat' => 'all property', 'posts_per_page' => -1, 'orderby' => 'ASC' );
        $wp_query = new WP_Query( $args );

        //print_r($loop);exit;
        while ( $wp_query->have_posts() ) : $wp_query->the_post(); global $product; 
		
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
//echo $total_assets;

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
?>
		
		<!-- TOTAL PROJECT INVESTMENT RENTAL FORMULA -->
 

<!--Yield Calculation Working-->

  
  <!--<div class="math-formula-molecular">$<?php echo get_post_meta( get_the_ID(), 'Estimated Net Income', true); ?> / 10,000</div>-->
  <div class="math-formula-line"></div>
  <!--<div class="math-formula-denominator"><?php echo $product->get_price_html();?></div>-->
                                   
 <?php $estincome = get_post_meta( get_the_ID(), 'Estimated Net Income', true);
                              $estincome_rmv = str_replace( ',', '', $estincome );
                     $brickprice2 =  $product->get_price();
                    
                      $c = $estincome_rmv / $brickprice2 / 100;
                    
                    // $estincome.'_'.$brickprice2;
                     $english_format_number = number_format($c, 2, '.', '');
                    //echo $english_format_number;
                     
                  ?>
                  <!--Yield Calculation Working-->

 <!-- TOTAL PROJECT INVESTMENT RENTAL FORMULA END -->

          <div class="col-md-4 col-sm-6">

            <div class="property-card">
              <a class="picture-box" href="<?php the_permalink(); ?>">
                <div class="baadge house"><?php echo get_post_meta($wp_query->post->ID, 'Property Type', true); ?></div>
                <div class="picture">
                  <?php if (has_post_thumbnail( $wp_query->post->ID )) echo get_the_post_thumbnail($wp_query->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                </div>
                <div class="property-hover">

                  <ul class="debt">

                    <li>

                      <div>Capital Raised/Total Capital<!--<i class="fa fa-cog" aria-hidden="true"></i>--> <?php echo get_post_meta($wp_query->post->ID, 'Expected Profit', true); ?>%</div></li>
                  </ul>
                  <ul class="property-icons">
                    <li> <div><?php echo get_post_meta($wp_query->post->ID, 'Bedrooms', true); ?></div> <i class="fa fa-bed" aria-hidden="true"></i></li>
                    <li><div><?php echo get_post_meta($wp_query->post->ID, 'Bathrooms', true); ?></div> <i class="fa fa-bath" aria-hidden="true"></i></li>
                    <li><div><?php echo get_post_meta($wp_query->post->ID, 'Garage', true); ?></div> <i class="fa fa-car" aria-hidden="true"></i></li>
                  </ul>
                </div>
              </a>
              <div class="financial-info">
                <div class="property-code"><?php the_title(); ?></div>
                <div class="address"><?php the_content(); ?></div>
              </div>

              <table class="table table-striped table-condensed table-responsive info"> 
                <tbody>
                  <tr>
                    <td><div class="texts"><i class="fa fa-database" aria-hidden="true"></i> Projected Returns</div></td>
                    <td><div class="value"><?php echo $english_format_number; ?>%</div></td>                                      
                  </tr>
                  <tr>
                    <td><div class="texts"><i class="fa fa-area-chart" aria-hidden="true"></i> Current Unit Value</div></td>
                    <td><div class="value"><?php echo get_post_meta($wp_query->post->ID, '20yr Historical Suburb Growth', true); ?>%</div></td>                                      
                   </tr>
                  <tr>
                    <td><div class="texts"><i class="fa fa-tag" aria-hidden="true"></i> Projected Unit Value</div></td>
                    <td><div class="value">$<?php echo $projected_unit_value; ?></div></td>                                      
                  </tr>
                  <tr>
                    <td><div class="texts"><i class="fa fa-user" aria-hidden="true"></i> Estimated Completion</div></td>
                    <td><div class="value">$<?php echo $estimated_completion; ?></div></td>                                      
                  </tr>    
                </tbody>
              </table>

              <div class="lowest-available-price-box">
                <div class="available-price">Minimum unit Buy-In </div>
                <div class="value"><?php echo $product->get_price_html();?> <span class="premium-discount"><?php echo get_post_meta($wp_query->post->ID, 'Below Valuation', true); ?>%</span></div>
              </div>

              <div class="default-head__button-container">
                <a class="button" href="<?php echo the_permalink();?>">View DEVELOPMENT</a>
              </div>
            </div>
          </div>
         
 <?php endwhile; ?>
    <?php wp_reset_query(); ?>
        

        </div>
      </div>
	<?php //misha_loadmore_ajax_handler(); ?>
    </div>
  </div>


<?php get_footer(); ?>