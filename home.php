<?php
 /**
    * Template Name: Home Page
    */
?>
<?php get_header(); 
$user_table =  $wpdb->get_results("SELECT COUNT(ID) as userid FROM `wpor_users`" ); 
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

    
      <div id="first-slider">
        <div class="container">
          <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <ol class="carousel-indicators hide">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>


              <div class="carousel-inner" role="listbox">
                <div class="item active slide1">
                  <div class="row">
                    <div class="col-sm-6 text-left">
                      <h3>An Easy Investment With Better Returns</h3>        
                      <p>Investments Squared’s groundbreaking investment platform offers a convenient way to access adove-market returns.</p>
                      <div class="default-head__button-container">
                        <a href="#my-account" class="button white-button">CREATE A FREE ACCOUNT</a>
                        <a href="https://investmentssquared.com.au/how-it-work" class="button outline-button">LEARN HOW IT WORKS</a>
                      </div>
                    </div>
                    <div class="col-sm-6 text-right">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/building.png">
                    </div> 
                  </div>
                </div> 

                <div class="item slide2">
                  <div class="row">
                    <div class="col-sm-6 text-left">
                      <h3>Want an easier way to invest in <b>residential property?</b></h3>
                      <p>Investments squared has an award-winning platform that provides a simple and low cost way to access the property market.</p>
                      <div class="default-head__button-container">
                        <a href="/signup" class="button white-button">CREATE A FREE ACCOUNT</a>
                        <a href="/how-it-works" class="button outline-button">LEARN HOW IT WORKS</a>
                      </div>
                    </div>
                    <div class="col-sm-6 text-right">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/building.png">
                    </div> 
                  </div>
                </div> 
              </div>
          
          </div>
        </div>
      </div>
  </div>

<!--About Section Code-->

  <div class="about">
    <div class="container">
     <?php $post_id = 58;  //Post ID
      $post_data = get_post($post_id); 
      $title = $post_data->post_title; 
      $content = $post_data->post_content;?>
      <div class="col-sm-6 bg">
        <div class="about-img">
        <?php echo get_the_post_thumbnail( $post_id);?>
        </div>
      </div>

      <div class="col-sm-5">
        <div class="desc">
          <h3>About <b><?php echo $title; ?></b></h3>
          <p><?php echo $content; ?></p>
          <a class="button" href="/about-us/">Know more</a>
        </div>
      </div>
    </div>
  </div>
<!--About Section Code End-->
<!--Why Investment squared Section Code-->
<div class="choose">
  <div class="container">
    <div class="main-heading">
      <h3>Why Investments Squared?</h3>
    </div>
      <?php
      global $post;
      $args = array('post_type' => 'post', 'category_name' => 'Why Investments Squared' );
      $myposts = get_posts( $args );
      foreach ( $myposts as $post ) : 
        setup_postdata( $post ); ?>
	     <div class="col-sm-4">
        <div class="img"><?php echo get_the_post_thumbnail( $post);?></div>
        <h4><?php the_title();?></h4>
        <p class="desc"><?php the_content(); ?></p>
      </div>
      <?php endforeach;
      wp_reset_postdata(); ?>   
  </div>
</div>
<!--Why Investment squared Section Code End-->
<!--Investments <br> Squared</b> Properties Section Code -->
  <div class="properties">
    <div class="container">
      <?php $post_id1 = 70;  //Post ID
      $post_data1 = get_post($post_id1); 
      $title1 = $post_data1->post_title; 
      $content1 = $post_data1->post_content;?>
      <div class="col-sm-5">
        <h3><?php echo $title1; ?></h3>
        <?php echo $content1; ?>

        <div class="default-head__button-container">
          <a class="button" href="/properties/">VIEW OUR DEVELOPMENTS</a>
          <a class="button dark-outline-button" href="/property-team/">DEVELOPMENTS TEAM</a>
        </div>
      </div>

      <div class="col-sm-7">
        <div class="prpertyimg"><?php echo get_the_post_thumbnail( $post_id1);?></div>
      </div>

    </div>
  </div>
<!--Investments <br> Squared</b> Properties Section Code End-->
<!--How it Works Section Code-->
  <div class="how-it-works">
    <div class="container">
      <div class="main-heading">
        <h3>How it Works</h3>
      </div>
      <?php
      global $post;
      $count = 0;
      $args1 = array('post_type' => 'post', 'category_name' => 'How it Works', 'order' => 'asc' );
      $myposts1 = get_posts( $args1 );
      foreach ( $myposts1 as $post1 ) : 
        setup_postdata( $post1 ); $count++;?>
      <div class="col-sm-4">
        <div class="step1">
          <div class="icon">
            <?php echo get_the_post_thumbnail( $post1);?>
          </div>
          <div class="text">
            <?php the_content(); ?>
         </div>
         <?php if ($count != 3 ){ ?>
          <div class="sep hidden-sm hidden-xs"></div>
      <?php } ?>
        </div>
      </div>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>
  </div>

<!--How it Works Section Code END-->
<!--What Our Clients Said Section Code-->
  <div class="testimonails">
    <div class="container">
      <div class="main-heading">
        <h3>What Our Clients Said</h3>
      </div>

      <?php if( function_exists( "get_testimonial_slider_recent" ) ){ get_testimonial_slider_recent( $set="2") ;}?>
    
    </div>
  </div>
<!--What Our Clients Said Section Code End-->
<!--Investments Squared  in the Media Section Code-->
  <div class="media-blog">
    <div class="container">
      <div class="main-heading">
        <h3>Investments Squared  in the Media</h3>
      </div>
      <?php
      global $post;
      $args2 = array('post_type' => 'videos', 'category_name' => 'Investments Squared in the Media' );

      $myposts2 = get_posts( $args2 );

      ?>
            <?php
            foreach ( $myposts2 as $post2 ) : 
        setup_postdata( $post2 ); ?>
        
            <div class="col-sm-4">
              <div class="media-box">
                <div class="media-img">
                  <?php echo get_the_post_thumbnail( $post2);?>
                  <?php $value = get_post_meta( $post2->ID, 'video_url', true );

                  ?>
                  <a href="<?php echo $value ?>" target='_blank'><div class="play"></div></a>
                </div>
                <div class="media-desc">
                   <div class="titles"><?php echo $post2->post_title; ?></div>
                  <div class="date"><?php echo get_the_date('d-m-Y');?></div>
                </div>
                <div class="posts">
                  <div class="author">Posted by <?php the_author(); ?></div>
                  <div class="viwes"><?php if(function_exists('bac_PostViews')) { echo bac_PostViews(get_the_ID()); }?></div>
                </div>
              </div>
            </div>
      <?php endforeach;
      wp_reset_postdata(); ?>

    </div>
  </div>
   <!--Investments Squared  in the Media Section Code End-->

  <div class="fees">
    <div class="container">
      <div class="col-sm-6 col-no-padding">
        <div class="feessection">
          <?php $post_id2 = 103;  //Post ID
          $post_data2 = get_post($post_id2); 
          $title2 = $post_data2->post_title; 
          $content2 = $post_data2->post_content;?>
          <h3><?php echo $title2; ?></h3>
          <p><?php echo $content2; ?></p>
          <a href="/investments-squared-calculator/" class="button">LEARN MORE ABOUT FEES</a>
        </div>
      </div>

      <div class="col-sm-6 col-no-padding shadow">
        <div class="portfoilo">
          <h3>Start Your<b>Property Portfolio Today</b></h3>
          <div class="default-head__button-container">
            <a href="#my-account" class="button">Create account </a>
            <a href="/education-centre/" class="button dark-outline-button">Learn more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>