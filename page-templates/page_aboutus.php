<?php 
	/**
    * Template Name: About Page
    */
get_header();
?>
<div class="aboutus">
    <div class="container">
      <h3 class="heaidng">Our Story</h3>
      <?php $post_id = 213;  //Post ID
      $post_data = get_post($post_id); 
      $content = $post_data->post_content;?>
      <p class="desciprtion"><?php echo $content; ?></p>
    </div>
  </div>


  <div class="values">
    <div class="container">
      <div class="main-heading">
        <h3>Our Values</h3>
        <p>We are driven by strongly held core values that support our commitment to you, <br> our customers, by providing a safe and efficient platform and a rigorous property acquisition strategy.</p>
      </div>
<?php
global $post;
$args = array('post_type' => 'post', 'category_name' => 'Our Values','orderby' => 'DESC', 
    'posts_per_page'=>-1, 'numberposts'=>-1);
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : 
  setup_postdata( $post ); ?>
      <div class="col-sm-4 valuebox">
        <div class="icons"><?php echo get_the_post_thumbnail( $post);?></div>
        <div class="maintitle"><?php the_title();?></div>
        <?php the_content(); ?>
      </div>
<?php endforeach;
wp_reset_postdata(); ?>
     
    </div>
  </div>

  <div class="portfoilio">
    <div class="container">
      <div class="main-heading">
        <h3>Start your property portfolio today</h3>
      </div>
      <div class="default-head__button-container">
          <a href="#my-account" class="button">Create your free account now</a>
          <a href="" class="button dark-outline-button">Learn more</a>
        </div>

    </div>
  </div>
<?php get_footer();?>