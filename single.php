<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
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
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="post-inner group">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p class="post-byline">by<?php get_the_author(); ?> · <?php echo get_the_date(); ?></p>
            <div class="entry share">
            	<?php $excerpt = $post->post_excerpt; ?>
              <h5 class="p1"><?php echo $excerpt; ?></h5>
              <p><?php the_post_thumbnail('medium_large', array('class' => 'aligncenter wp-image-289 size-full')); ?></p>
              
              <p class="p1"><?php the_content(); ?></p>
              <p class="p1">As the gateway to the Barossa Valley, Adelaide has always had a good food and wine scene. But it’s now considered exceptional. The small bars, tucked away in city laneways, rival those of Melbourne. Sure, Adelaide is small, but gone is its small town mentality.</p>
              <p class="p1">It’s a city that means business but with a more relaxed lifestyle. It has recently been voted the fifth most livable city in the world by The Economist Intelligence Unit which ranks world cities based on healthcare, education, infrastructure, stability, culture and environment.</p>
              <h3 class="p1">The indicators</h3>
              <p class="p1">The Investments squared Property Team considers a wide range of economic indicators in determining when to move into a particular capital city.</p>
              <p class="p1">The Adelaide&nbsp;housing market continues to be at one of the most affordable points since the large price increases seen in 2003.</p>
              <p class="p2">According to Performance Property Advisory, the Gross Affordability Index is currently sitting at 26%, meaning on average, 26% of an average income goes towards&nbsp;mortgage repayments.&nbsp;This index is based on the current median house price, an interest only loan and a 20% deposit. The Gross Affordability Index in Melbourne is currently 43% and Sydney 56%, making Adelaide an affordable investment option in comparison.<sup>1</sup></p>
              <div class="wp-caption aligncenter"><a href=""><img src="https://blog.brickx.com/wp-content/uploads/2017/08/Gross-Affordability2-1024x619.png" class="wp-image-283 size-large"></a><p class="wp-caption-text">Source: RBA, ABS, BIS Shrapnel</p></div>


              <h3 class="p6">Local economy</h3>
              <p class="p6">Greater Adelaide’s economy is considered well-diversified, with no one industry contributing more than 12.1% of gross regional product.<sup>2</sup>&nbsp;A diversified economy&nbsp;is one factor influencing housing stability and a well-diversified economy should mean more stability for the housing market.&nbsp;And with the likes of Tesla planning to manufacture the world’s largest lithium ion battery just out of town, this could be the start of something big for South Australia.<sup>3</sup></p>

              <p><a href=""><img src="https://blog.brickx.com/wp-content/uploads/2017/08/Industry-Value-1024x660.png" class="aligncenter wp-image-284 size-large"></a></p>

              <p class="p6">The unemployment rate in Greater Adelaide is on a downward trend. The rate in June 2017 was 6.5% down from a high of 7.7% in 2015.&nbsp;This downward trend is another factor influencing confidence in the Adelaide property market.<sup>4</sup></p>

              <p><a href=""><img src="https://blog.brickx.com/wp-content/uploads/2017/08/Unemployment-1-1024x665.png" class="aligncenter size-large wp-image-297"></a></p>

              <p class="p6">Also generating confidence in the Adelaide property market is the amount being spent on infrastructure projects. Public spending in 2016 was up around 147% from 2014. In 2017 public and private infrastructure spending is running at approximately $7400 per person &ndash; more than double both Sydney and Melbourne.</p>

              <p><a href=""><img src="https://blog.brickx.com/wp-content/uploads/2017/08/Public-Private-Infrastructure-1024x665.png" class="aligncenter wp-image-286 size-large"></a></p>

              <p class="p6">As with other major cities, the inner metro suburbs have tended to perform the strongest &ndash; that is, those suburbs within a 5-10 kilometre radius of the CBD.<sup>&nbsp;5&nbsp;</sup></p>
              <p class="p6">In the opinion of the Investments squared Property Team, all of these indicators align to suggest the Adelaide property market has strong short to medium term growth prospects.</p>
              <p style="font-size: 12px;"><em>With thanks to Performance Property Advisory &ndash;<span class="Apple-converted-space">&nbsp; </span>one of Australia’s leading independent research providers. With a team of researchers in-house, PPA conducts extensive quarterly research reports on the five major capital city markets, 25 major regional markets around Australia, and a biannual national research report analysing economic, demographic, and residential property data. PPA are part of the Investments squared Property Team.</em></p>
              <ol style="font-size: 12px;" class="ol1">
                <li><em> RBA, ABS, Bis Shrapnel</em></li>
                <li><em>Value of sales generated by an industry minus the costs of that industry</em></li>
                <li><em>Economy-ID</em></li>
                <li><em> ABS</em></li>
                <li><em> Bis Shrapnel medians. PPA calculations</em></li>
              </ol>
            </div>
          </div>
<?php endwhile; ?>
          <div id="respond" class="comment-respond">
          	 <?php comment_form();?>
          
          </div>



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