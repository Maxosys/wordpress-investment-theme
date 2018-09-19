<?php /* template name: _BASIC PAGE */ ?>
<?php get_header(); ?>

<div class="account-settings">
 <div class="container">
 	<div class="tab-content">
	
	<?php while ( have_posts() ) : the_post(); ?>

    	<?php the_content(); ?>

    <?php endwhile; // end of the loop. ?>

    </div>
</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>