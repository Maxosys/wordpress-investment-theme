<?php /*The Template Name: __Test Page*/
get_header();
?>
<?php
echo '<pre>';
print_r($_REQUEST);

echo '</pre>';
?>
 <form action="" method="POST"> 
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_X1J6EKrqmMLZ3ObHVIQJPqlP"
    data-amount="5000"
    data-name="investmentsquared"
    data-currency="USD"
    data-description="Deposit fund"
    data-image="https://investmentssquared.com.au/wp-content/themes/investment/images/logo.jpg"
    data-locale="auto"
    data-zip-code="fasle">
  </script>
 </form>  

<?php get_footer();?>