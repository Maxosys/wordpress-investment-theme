<!DOCTYPE html>

<html style="" class="" lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">
<title><?php echo the_title(); ?></title>
<!--<link rel="shortcut icon" type="image/x-icon" href="<?php //echo get_template_directory_uri(); ?>/images/favicon.ico">-->
<link href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/custom.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/css/range-slider.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" type="text/css" media="all">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.1.6/css/ion.rangeSlider.min.css'>



<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custome.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/range-slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/highstock.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/exporting.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.1.6/js/ion.rangeSlider.js'></script>
<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/highcharts.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/marquee.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/myloadmore.js"></script>

 <script type="text/javascript">
      
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
      if (scroll >= 400) {
        $("header").addClass("shrink");
      } else {
        $("header").removeClass("shrink");
      }
  });


      
    </script>
		<?php wp_head(); ?>

   

</head>

<body>
  
  <!-- register -->
<div id="my-account" class="popup">
  <a href="#" class="close">&times;</a>
  <div class="modal__wrap">
      <div class="create-account">
        <div class="create-account-img"><img src="<?php echo get_template_directory_uri(); ?>/images/account.png"></div>
        <!-- <h2>Create An Account</h2> -->

      <?php echo do_shortcode("[wpcrl_register_form]"); ?>

     
      </div>
  </div>
</div>
<a href="#" class="close-popup"></a>

<!-- resgister -->


<!-- signin -->
<div id="login" class="popup">
  <a href="#" class="close">&times;</a>
  <div class="modal__wrap">
      <div class="create-account">
        <div class="create-account-img"><img src="<?php echo get_template_directory_uri(); ?>/images/login.png"></div>
        <!-- <h2>Sign In To <br> Your Account</h2> -->

        <?php echo do_shortcode("[wpcrl_login_form]"); ?>


      </div>
  </div>
</div>
<a href="#" class="close-popup"></a>

<!-- signin -->





  <header>
    <div class="container">
      <nav class="navbar navbar-inverse light">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse-4">
            <ul class="nav navbar-nav navbar-right">

              <li><a href="https://investmentssquared.com.au/how-it-work/">How It Works</a></li>
              <li><a href="https://investmentssquared.com.au/properties/">DEVELOPMENTS</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Learn <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  
                  <li><a href="https://investmentssquared.com.au/investments-squared-calculator/">Investments Squared Calculator</a></li>
                  <li><a href="https://investmentssquared.com.au/blog-new/">Blog</a></li>
                </ul>
              </li>
               <li class="dropdown"><a href="#" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">About <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="https://investmentssquared.com.au/about-us/">About Us</a></li>
                  <li><a href="https://investmentssquared.com.au/property-team/">Property Team</a></li>
                  <li><a href="https://investmentssquared.com.au/contact-us/">Contact Us</a></li>
                  
                </ul>
              </li>
			  <?php

        if ( is_user_logged_in() ) {

                $current_user = wp_get_current_user();
        	

          ?>
          
		    <li class="dropdown userpic">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="top-nav-image"><img src="<?php echo esc_url( get_avatar_url( $current_user->ID ) ); ?>" alt="" class="img-rounded user-avatar"></div>
            <span class="user-greeting crop">Hi <?php echo $current_user->display_name; ?> </span>
            <i aria-hidden="true" class="fa fa-angle-down downarrow"></i>
          </a>
          <ul class="dropdown-menu user-account-menu simple pull-right">   
            <li><a class="inline-option" href="https://investmentssquared.com.au/dashboard/">Dashboard</a></li>
            <li><a class="inline-option" href="https://investmentssquared.com.au/depoist-fund/">Deposit Funds</a></li>
            <li><a class="inline-option" href="https://investmentssquared.com.au/setting/">Settings</a></li>
            <li> <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
          </ul>
        </li>
  <?php
   
} else {
    ?>
        <li>  <a href="#login" class="white-empty-button" target="">Login</a>    </li>
        <li>  <a href="#my-account" class="orange-button" target="">Sign Up </a>  </li>
    <?php
}
?>
             
            </ul>
          </div><!-- /.navbar-collapse -->
      </nav><!-- /.navbar -->
    </div>
  </header>