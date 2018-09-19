<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>



<div id="container">
	<main id="main" class="site-main errre" role="main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! <br> That page  can’t be found.', 'twentysixteen' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
			</div><!-- .page-content -->
			<div class="error-img">
				<img src="<?php echo get_template_directory_uri(); ?>/images/error.jpg">
			</div>
		</section><!-- .error-404 -->
	</main><!-- .site-main -->
</div>
<?php get_footer(); ?>