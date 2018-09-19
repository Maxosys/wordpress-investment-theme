<div class="footer">
  <div class="container">
    <div class="col-sm-4">
      <div class="footer-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png">
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
        <?php endif; ?>
      </div>
      <div class="footer__social-block">
        <ul>
          <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
          <?php dynamic_sidebar( 'sidebar-4' ); ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>

    <div class="col-sm-2">
      <h3>Invest</h3>
      <?php
        wp_nav_menu( array(
          'theme_location' => 'footerinvest',
          'menu_class'     => 'footer-links',
          ) );
      ?>
    </div>

    <div class="col-sm-2">
      <h3>Company</h3>
      <?php
        wp_nav_menu( array(
          'theme_location' => 'footercompany',
          'menu_class'     => 'footer-links',
         ) );
      ?>
    </div>

    <div class="col-sm-4">
	     <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-3' ); ?>
      <?php endif; ?> 
    </div>

    <div class="bottom-footer">
      <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-5' ); ?>
      <?php endif; ?>  
      <div class="made">Powered by <a target="_blank" href="http://www.maxosys.com/"> Maxosys Ltd.</a> </div>
    </div>
  </div>
</div>

 <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTA0Moq_CizVlRxFsXnLw9VAnFcjpSuXM&libraries=places&callback=initAutocomplete"
        async defer></script>
        <script>
         
function callme(field) {
  //alert('hello');
 // $('#id_buy_quantity').keyup(function(e) {
    
    var id_buy_quantity = $('#id_buy_quantity').val();
   
    if(id_buy_quantity == "" || id_buy_quantity < 1)
    {    
       $(".quantityerror").text('Please enter valid quantity 1 or more than 1');    
    }
    else{

        $(".quantityerror").text("");
    }
    
    // total amount in card 
    
    
    var fundhidn = $('#fundhidn').val();
    
    // per brick price 
    
    var brickpricehidn = $('#brickpricehidn').val();
    
    // Transaction Fees 
    
    var transactionfeehidn = $('#transactionfeehidn').val();
    
    // Total price = (quantity * per price) + transaction fees 
    
    var totalpricehidn = $('#totalpricehidn').val();

         
    totalpricehidn =  parseFloat(id_buy_quantity) * parseFloat(brickpricehidn);
  
    
//alert(totalpricehidn);

    $("#costofbrick").text('$'+ totalpricehidn);


  var totalvar =  parseFloat(totalpricehidn) +  parseFloat(transactionfeehidn);
           

     $('#totalpricehidn').val(totalvar);
    
    
      var order_total_id = $('#totalpricehidn').val();
               
      $("#order_total_id").text('$'+ order_total_id);
      $("#order_total").text('$'+ order_total_id);
    
        
      if(fundhidn<totalvar)
        {  

          $(".funderror").html('You have insufficient funds. <a href="https://investmentssquared.com.au/depoist-fund/">Deposit Funds</a>');
          
          $("#depositfundd").hide();                 
        }
      else{

          $("#depositfundd").show();
        
        }
     // });
    }

   function checkamt() {
      
   
      
      var fundhidnn = parseFloat($('#fundhidn').val());
  //alert('fundhidnn'+fundhidnn);
      var brickpricehidnn = parseFloat($('#brickpricehidn').val());
 //alert('brickpricehidnn'+brickpricehidnn);

    if(fundhidnn < brickpricehidnn)
        {
           alert("You have insufficient funds. Deposit Funds");
           $(".funderror").html('You have insufficient funds. <a href="https://investmentssquared.com.au/depoist-fund/">Deposit Funds</a>');
          $("#depositfundd").hide();
        
        }else{
         
          $("#depositfundd").show();
        }
}
        </script>
        <script type="text/javascript">
  
$(document).ready(function(){
 
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

  






<?php wp_footer(); ?>
</body>
</html>
