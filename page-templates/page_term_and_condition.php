<?php /* The template name: __Terms and condition */
get_header();
?>
<div class="account-settings calc seeting">
    <div class="container">
      <div class="main-heading">
        <h3>Terms and Conditions</h3>
      </div>
      <?php $the_query = new WP_Query( 'page_id=115' ); ?>
      <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
      <?php the_content(); ?>
     <?php endwhile;?>
  </div>
<?php get_footer();?>