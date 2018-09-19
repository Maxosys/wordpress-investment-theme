<?php /* The Template Name: Investment Calculater */
get_header();
?>
<div class="account-settings calc seeting">
  <div class="container">
      <div class="main-heading">
        <h3>Investments Squared Calculator</h3>
        <div class="des">
          <p>Welcome to the Investments Squared Calculator. Find out how key factors can <br> influence returns by changing your inputs for the investment criteria.</p>
        </div>
      </div>
      <div class="perosnal-details">
        <div class="col-md-5">
          <div class="filterss">
            <h3>Choose your investment amount and period:</h3>
            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-md-6">
                  <div class="label-input">I would like to invest</div>
                </div>
                <div class="col-md-6">
                  <div class="dollar-input">
                      <input type="text" placeholder="Enter Amount" id="investment-amount" name="investment-amount" value="">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <div class="label-input">Holding Period</div>
                </div>
                <div class="col-md-6">
                  <div class="select-box">
                    <select id="investment-period">
                      <option value="1">1 month</option>
                      <option value="2">2 month</option>
                      <option value="3">3 month</option>
                      <option value="4">4 month</option>
                      <option value="5">5 month</option>
                      <option value="6">6 month</option>
                      <option value="7">7 month</option>
                      <option value="8">8 month</option>
                      <option value="9">9 month</option>
                      <option value="10">10 month</option>
                      <option value="11">11 month</option>
                      <option value="12">12 month</option>
                      <option value="13">13 month</option>
                      <option value="14">14 month</option>
                      <option value="15">15 month</option>
                      <option value="16">16 month</option>
                      <option value="17">17 month</option>
                      <option value="18">18 month</option>
                      <option value="19">19 month</option>
                      <option value="20">20 month</option>
                      <option value="21">21 month</option>
                      <option value="22">22 month</option>
                      <option value="23">23 month</option>
                      <option value="24">24 month</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="info-box-disclosures">
                <div class="settings-blue-notification small">
                    <div class="col-info-icon"><i aria-hidden="true" class="fa fa-info-circle"></i></div>
                    <div class="col-info-description"> Did you know? Investments Squared Calculator allows you to list your Units at any time*&nbsp;
                      <!-- <a class="clickable" target="_blank" href="/terms/returns-calculator-disclosures">Full Disclosures</a> -->
                    </div>
                </div>
              </div>
              <div class="disclaimer text-left">*Note: For the period your deposited funds are pending (estimated 1-2 days), you are not eligible to list your units for sale. This only applies for advanced funds.</div>
            </div>
          </div>
        </div>
       
        <div class="col-md-7">
          <div class="filterss">
            <div id="containn" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>
        </div>

        <div class="return-calculator-results  very-blue-background">
          <div class="col-md-12" id="variablehigh">
            <div id="containerHigh" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>

          <!-- <div class="info-box-disclosures">
          <div class="settings-blue-notification small">
            <div class="col-info-icon"><i aria-hidden="true" class="fa fa-info-circle"></i></div>
              <div class="col-info-description"> Did you know? The graph illustrates that whether you hold your Bricks for 1 year or 10 years, you only pay the 1.75% transaction fee each time you buy and sell. Therefore, the shorter your holding period, the larger the impact of the transaction fees on your Total ROI.
            </div>
          </div>
        </div> -->
        </div>

        
      </div>
  </div>      
</div>

      


  <div class="journy">
    <div class="container">
      <div class="invite"><h3>Ready to start your property market journey</h3>
        <a href="#my-account" class="button orange-button right-arrow-button">SIGN UP NOW</a>
      </div>

    </div>
  </div>


  <div class="how-do-i-make-money">
    <div class="container">
        <h2 class="text-center">How can I earn Potential Returns?</h2>
        <div class="col-sm-6 step">
          <span class="fa hidden-xs">+</span>
          <div class="circle">1</div>
          <div class="sub-title">MONTHLY RENTAL DISTRIBUTION</div>
          <img src="<?php echo get_template_directory_uri();?>/images/hiw_distributions.png">
          <div class="text"> At the end of every month, if you are a Unit Holder in any Investments Squared  Property, receive your share of the net rental income. Rental distributions are paid to your Investments Squared  Wallet within 10 days after month end. Our Property Management team takes care of the hassles involved in managing a rental property, from finding and managing tenants to property maintenance. Look for the Net Rental Yield % on each property.
          </div>
        </div>

        <div class="col-sm-6 step">
          <span class="fa hidden-xs">+</span>
          <div class="circle">2</div>
          <div class="sub-title">CAPITAL RETURNS</div>
          <img src="<?php echo get_template_directory_uri();?>/images/how_make_money_capreturns.png">
          <div class="text">After you buy Units, monitor your potential Capital Returns through your Investments Squared  Portfolio. Independent external property valuations are performed semi-annually, serving as a price guide for investors, and is represented by the Unit Valuation. If the property's value goes up or down, so does the Unit Valuation. When the time is right for you, place your Units for sale to realise any Capital Returns.
          </div>
        </div>


    </div>
  </div>
  <style>
  #variable_return {
  width: 50px;
}
  </style>
  <script>
  $(document).ready(function(){
    $('#investment-amount').keyup(function(){
    
      //Investment Keyup value
    var investment_value = $(this).val();
   
    
    var holding_period = $('#investment-period').val(); 
    //console.log(holding_period);
    calc(investment_value,holding_period)
    });
    
    //Holding Period Change function      
  $('#investment-period').change(function(){
    
      //Holding period value
    var holding_period = $(this).val();
    var investment_value = $('#investment-amount').val();
    //console.log(holding_period);
  
   //Set Function
    calc(investment_value,holding_period)
});
  
 });
 function calc(investment_value,holding_period)
{
  var monthValueArr = [];
    //Investment Value
 var investment_rs = investment_value;
  
  //console.log('investment_rs'+ investment_rs);
 for(var i = 1; i<=holding_period; i++ )
    {
    //Holding Time Value
 var holding_time = i;
 //console.log(holding_time);
  //Variable Return
  
  var return_formula = (investment_rs * 40) / 100;
  //console.log(return_formula);
  var holding_return =   return_formula * holding_time;
  var monthly_return = holding_return / 12;
  
  var total_estimate = parseFloat(investment_rs) + monthly_return ;
  var total_return = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 5 }).format(total_estimate);
  //console.log(total_return);
  monthValueArr.push([parseFloat(total_return.replace(/,/g, ''))]);
  
  }
setvalueonpop(monthValueArr)
}

function setvalueonpop(monthValueArr){
Highcharts.chart('containn', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: '$100,000 Investment-fixed Vs. Variable-Over 24 Months'
    },
    subtitle: {
       //text: 'Source: WorldClimate.com'
    },
    xAxis: [{
        categories: ['1 Month', '2 Month', '3 Month', '4 Month', '5 Month', '6 Month',
            '7 Month', '8 Month', '9 Month', '10 Month', '11 Month', '12 Month','13 Month', '14 Month', '15 Month', '16 Month', '17 Month', '18 Month',
            '19 Month', '20 Month', '21 Month', '22 Month', '23 Month', '24 Month'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '$ {value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Fixed Rate',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Fixed Rate',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '$ {value}',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: [{
        name: 'Fixed Rate',
        type: 'column',
        yAxis: 1,
        data: monthValueArr,
        tooltip: {
            valuePrefix: '$'
        }

    }, ]
});
};



$(document).ready(function(){
    $('#investment-amount').keyup(function(){
    
      //Investment Keyup value
    var investment_valuee = $(this).val();
    //var investtext_value = $('#initial-investments').text(investment_value);
    //console.log(investtext_value);
    var variable_return = $('#return-variable').val();
      //console.log(variable_return);
    
    var holding_periodd = $('#investment-period').val(); 
    //console.log(holding_period);
    calculfun(investment_valuee,variable_return,holding_periodd)
    });
    
    //Holding Period Change function      
  $('#investment-period').change(function(){
    
      //Holding period value
    var holding_periodd = $(this).val();
    var variable_return = $('#return-variable').val();
    var investment_valuee = $('#investment-amount').val();
    //console.log(holding_period);
  
   //Set Function
    calculfun(investment_valuee,variable_return,holding_periodd)
});
$('#return-variable').change(function(){
    
      //Holding period value
    var variable_return = $(this).val();
    var investment_valuee = $('#investment-amount').val();
    var holding_periodd = $('#investment-period').val();
    
    //console.log(holding_period);
  
   //Set Function
    calculfun(investment_valuee,variable_return,holding_periodd)
});
     
 });

function calculfun(investment_valuee,variable_return,holding_periodd){
  var estimateValueArr = [];
    //Investment Value
 var investment_rss = investment_valuee;
  
  //console.log('investment_rs'+ investment_rs);
 for(var zi = 1; zi<=holding_periodd; zi++ )
    {
    var monthPer = variable_return;
  //console.log(monthPer);
  if(zi== 1)
  {
    monthPer =  0.2
  } else if(zi== 2)
  {
    monthPer =  0.4
  }
  else if(zi== 3)
  {
    monthPer =  0.6
  }
  else if(zi== 4)
  {
    monthPer =  0.8
  }
  else if(zi== 5)
  {
    monthPer =  0.9
  }
  else if(zi== 6)
  {
    monthPer =  0.8
  }
  else if(zi== 7)
  {
    monthPer = 2
  }
  else if(zi== 8)
  {
    monthPer =  2.2
  }
  else if(zi== 9)
  {
    monthPer =  3
  }
  else if(zi== 10)
  {
    monthPer =  2.9
  }
  else if(zi== 11)
  {
    monthPer =  3.22
  }
  else if(zi== 12)
  {
    monthPer =  3.4
  }
  else if(zi== 13)
  {
    monthPer =  3.1
  }else if(zi== 14)
  {
    monthPer =  3.25
  }
  else if(zi== 15)
  {
    monthPer =  3.2
  }
  else if(zi== 16)
  {
    monthPer =  3.1
  }else if(zi== 17)
  {
    monthPer =  3.4
  }
  else if(zi== 18)
  {
    monthPer =  3.7
  }
  else if(zi== 19)
  {
    monthPer =  4.9
  }
  else if(zi== 20)
  {
    monthPer =  6
  }
  else if(zi== 21)
  {
    monthPer =  6.1
  }
  else if(zi== 22)
  {
    monthPer =  7
  }
  else if(zi== 23)
  {
    monthPer =  7.1
  }
  else if(zi== 24)
  {
    monthPer =  7.8
  }
  var return_formulaa = (investment_rss / 24) * monthPer;
  var total_estimate = parseFloat(investment_rss) + return_formulaa;
  var total_returnn = new Intl.NumberFormat('en-AUS', { maximumSignificantDigits: 5 }).format(total_estimate);
  //console.log(total_return);
  estimateValueArr.push([parseFloat(total_returnn.replace(/,/g, ''))]);
  }
  setvalueonpopfunction(estimateValueArr)
}

function setvalueonpopfunction(estimateValueArr){
var highchart = new Highcharts.Chart({
     chart: {
     renderTo: 'containerHigh',
        type: 'line',
        zoomType: 'xy'
    },
    title: {
        text: '$100,000 Investment-fixed Vs. Variable-Over 24 Months'
    },
    subtitle: {
        text: 'Source: 32.5% to 20% month by month'
    },
    xAxis: [{
        categories: ['1 Month', '2 Month', '3 Month', '4 Month', '5 Month', '6 Month',
            '7 Month', '8 Month', '9 Month', '10 Month', '11 Month', '12 Month','13 Month', '14 Month', '15 Month', '16 Month', '17 Month', '18 Month',
            '19 Month', '20 Month', '21 Month', '22 Month', '23 Month', '24 Month'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '$ {value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
    
        title: {
            text: 'Variable Rate',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { 
        labels: {
            format: '$ {value}',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
     series:[{
        name: 'Variable Rate',
        type: 'spline',
        data: estimateValueArr,
        tooltip: {
            valuePrefix: '$',
        }
    }]
});
};

  

  </script>
  
<script type="text/javascript">
  
$(document).ready(function(){
  
  $('input', '.rangeSlider').on('change', function() {
    //console.log($( this ).val());
});


$('.clickable').on('click', function() {
    val = $('#s3').val('1.8');
    //alert(val);
});
 
 var $result = $("#output");
 var track = function (data) {
   delete data.input;
   delete data.slider;
   if (JSON) {
     $result.html('<pre>'+JSON.stringify(data, null, 2)+'</pre><br>');
   } else {
     $result.html('<pre>'+data.toString()+'</pre><br>');
   }

 };
  
  var maxAll = $('#max').val();
  var $match = $('.irs-shadow');
  var $s1 = $('#s1');
  var $s2 = $('#s2');
  var $s3 = $('#s3');
  
$s1.ionRangeSlider({
  type: 'single',
  grid: 'true',
  grid_num: 6,
  min: 0,
  from_max: 5,
  prettify_enabled: true,
  prettify_separator: ",",
  force_edges: true,
  keyboard: true,

  // onStart: track,
  // //onChange: calc,
  // onFinish: track,
  // onUpdate: track,  

});
  
$s2.ionRangeSlider({
  type: 'single',
  grid: 'true',
  grid_num: 6,
  min: -10,
  from_max: 20,
  prettify_enabled: true,
  prettify_separator: ",",
  force_edges: true,
  keyboard: true,

  // onStart: track,
  // //onChange: calc,
  // onFinish: track,
  // onUpdate: track,  

});

$s3.ionRangeSlider({
  type: 'single',
  grid: 'true',
  grid_num: 6,
  min: 0,
  from_max: 40,
  prettify_enabled: true,
  prettify_separator: ",",
  force_edges: true,
  keyboard: true,

  // onStart: track,
  // //onChange: calc,
  // onFinish: track,
  // onUpdate: track,  

});

 
  

});

</script> 
<style>
#variablehigh{display:none;}
</style>
  <script>
$(function () {    
    $('#investment-amount').keyup(function() {
        $('#variablehigh').toggle($(this).val().length !== 0);
    });
});
  </script>

<?php get_footer(); ?>