<?php
/**
* Template Name: Home Page
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

    <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <?php 

                    if( $query->have_posts() ) : 
                      while( $query->have_posts() ) : 
                        $query->the_post(); 
                        $i++;
                  ?>

                    <div class="item <?php if ( $i == 1 ) {echo 'active';} ?>">

                      <p><?php the_field('testimonial'); ?></p>
                      <div class="testimonials-image">
                          <img class="img-responsive" src="<?php the_field('testimonial_image'); ?>" alt="">
                      </div>
                      <h5><?php the_field('testimonial_name'); ?></h5>
                      <h6><?php the_field('testimonial_occupation'); ?></h6>

                    </div>

                  <?php 
                    endwhile; 
                      endif; 
                        wp_reset_postdata(); 
                  ?>

                </div>

                <!-- Controls -->
                <a class="left" href="#carousel-example-generic" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                </a>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
