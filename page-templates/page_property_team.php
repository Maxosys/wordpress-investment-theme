<?php /*The Template Name: __Property Team*/
get_header();
?>
<div class="account-settings team">
    <div class="container">
      <div class="main-heading">
        <h3>The Property Team</h3>
        <p>Investments squared Property Team is drawn from a cross section of professional experience in the property and investment sectors. It consists of three core teams; <br> the Investments squared Buying Team, whose purpose it is to seek out the best investments in the market, the Investments squared Investment Team, who bring years of investment experience into the mix, and the Adviser Panel who are accomplished property market analysts.</p>
      </div>

<?php
global $post;
$args = array('post_type' => 'propertyteam', 'category_name' => 'Property team' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : 
  setup_postdata( $post ); ?>
      <div class="col-md-4 col-sm-6">
        <div class="card">
          <div class="title"><?php the_title();?></div>
          <?php the_content(); ?>
          <div class="identity">
            <?php if (has_post_thumbnail( $post ) ): 
               $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'single-post-thumbnail' ); ?>
            <div class="photo" style="background-image: url('<?php echo $image[0]; ?>')">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name"><?php echo get_post_meta($post->ID, "Team Name", true);?></div>
                  <div class="title"><?php echo get_post_meta($post->ID, "Team Designation", true);?></div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>

          <div class="identity">
            <div class="photo" style="background-image: url('<?php echo $image[0]; ?>')">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name"><?php echo get_post_meta($post->ID, "Team Name", true);?></div>
                  <div class="title"><?php echo get_post_meta($post->ID, "Team Designation", true);?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php endforeach;
wp_reset_postdata(); ?>
      <!--<div class="col-md-4 col-sm-6">
        <div class="card">
          <div class="title">The buying team</div>
          <p>A group of highly driven and market savvy individuals, the Buying Team exemplify research driven thinking. They thrive on statistically proven data and grass roots research.</p>
          <div class="identity">
            <div class="photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/dummy-image.jpg);">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name">David McMillan</div>
                  <div class="title">Buying Team</div>
                </div>
              </div>
            </div>
          </div>

          <div class="identity">
            <div class="photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/dummy-image.jpg);">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name">Ramon Mitchell</div>
                  <div class="title">Buying Team</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="card">
          <div class="title">Our adviser panel</div>
          <p>With the aim of providing Investments squared investors with the best in property expertise, we sought a diverse range of skill sets and perspectives. The Adviser Panel has been carefully selected to bring robust and selective thinking to the strategic acquisition approach.</p>
          <div class="identity">
            <div class="photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/dummy-image.jpg);">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name">Nerida Conisbee</div>
                  <div class="title">Chief Economist</div>
                </div>
              </div>
            </div>
          </div>

          <div class="identity">
            <div class="photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/dummy-image.jpg);">
              <div class="infos">
                <div class="infos-inner">
                  <div class="name">Tim Lawless</div>
                  <div class="title">Head of Research, CoreLogic</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->




    </div>


    <div class="bottomsection">
      <div class="container">
        <div class="col-sm-6">
          <div class="image">
            <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <div class="title">Our Investment Philosophy</div>
          <div class="description">All our property acquisitions are based on a purely results driven mandate, with the sole purpose of securing Investments squared investors balanced and diversified investment opportunities.</div>
        </div>

        <div class="col-sm-6">
          <div class="image">
            <i class="fa fa-handshake-o" aria-hidden="true"></i>
          </div>
          <div class="title">Our Acquisition Strategy</div>
          <div class="description">The Property Team meets quarterly, and reviews the immediate and ongoing needs of the Investments squared Portfolio. Taking into account market conditions and the Investments squared community, the Team aims to keep the property acquisition strategy responsive.</div>
        </div>




      </div>
    </div>
  </div>

  <div class="portfoilio">
      <div class="container">
        <div class="main-heading">
          <h3>Start your property portfolio today</h3>
        </div>
        <div class="default-head__button-container">
            <a class="button" href="#my-account">Create your free account now</a>
            <a class="button dark-outline-button" href="">Learn more</a>
        </div>
      </div>
    </div>
<?php get_footer(); ?>