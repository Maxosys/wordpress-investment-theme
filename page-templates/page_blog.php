<?php /*The Template Name: __Blog Page*/
get_header();
?>
<div class="account-settings">
    <div class="container">
      <div class="main-heading">
        <h3>Blog</h3>
      </div>

      <div class="bloglist">
      	
        <div class="col-sm-9">
        	<?php
global $post;
$args = array('post_type' => 'blog', 'category_name' => 'Blog' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) :
  setup_postdata( $post ); 
  $excerpt = $post->post_excerpt;
  ?>
          <div class="post-inner group">
            <h1 class="post-title"><?php the_title();?></h1>
            <p class="post-byline">by <?php echo get_the_author(); ?> · <?php echo get_the_date(); ?></p>
            <div class="entry share">
            	
              <h5 class="p1"><?php echo $excerpt; ?></h5>
              <p><a href=""><?php the_post_thumbnail('medium_large', array('class' => 'aligncenter wp-image-289 size-full')); ?></a></p>
              <p class="p1"><?php wp_trim_words( the_content(), 40, '...');  ?></p>
              <a class="button" href="<?php echo get_post_permalink($post->ID); ?>">Continue Reading</a>
            </div>
          </div>
<?php endforeach;
wp_reset_postdata(); ?>


        </div>

        <div class="col-sm-3">
          <div class="right-inner-addon">
            <?php get_sidebar(); ?>
          </div>
         
        </div>

      </div>
    
    </div>
  </div>
<?php get_footer();?>