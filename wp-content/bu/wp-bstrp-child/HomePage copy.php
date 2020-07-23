<?php

/**
 * Template Name: Home Page
 */

get_header();
?>

<section id='primary' class='content-area col-sm-12'>
  <main id='main' class='site-main' role='main'>
    <div class='container-uid'>
      <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
        <div class='carousel-inner'>
          <div class='carousel-item active'>
            <img class='d-block w-100' src='...' alt='First slide'>
          </div>
        </div>
      </div>

      <div class='container-uid'>
<?php
      $post_type = 'project';

// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );

foreach( $taxonomies as $taxonomy ) : 

    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );

    foreach( $terms as $term ) : 

        $posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=2" );

        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
            //Do you general query loop here  
        endwhile; endif;

    endforeach;

endforeach;
?>
              <div class='card-<?php $counter; ?>'>

                <h4 class='card-title'>
                  <a href='<?php the_permalink() ?>'>
                    <?php the_title();
                    ?></a>
                </h4>

                <div class='card'>
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail();
                  }
                  ?>

                  <div class='card-body'>
                    <h4 class='card-title'>
                      <a href='<?php the_permalink() ?>'>
                        <?php the_title();
                        ?></a>
                    </h4>
                    <p class='card-text'>
                      <p><?php echo get_the_excerpt();
                          ?></p>
                    </p>
                  </div>
                </div>

              <?php endwhile;
              ?>
              </div>
              <a class='carousel-control-prev' href='#myCarousel' role='button' data-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='sr-only'>Previous</span>
              </a>
              <a class='carousel-control-next' href='#myCarousel' role='button' data-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='sr-only'>Next</span>
              </a>
            </div>
       

    </div>

  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
