<?php

/**
 * Template Name: Home Page
 */

get_header(); ?>

<section id="primary" class="content-area col-sm-12">
	<main id="main" class="site-main" role="main">
						
	<div class="container-uid">

      
	<?php
      query_posts(array(
        'post_type' => 'items',
        'showposts' => 10
      ));
	  ?>
	  		
	<?php while (have_posts()) : the_post(); ?>
	<?php foreach ($terms as $t) { ?>
		
		
		<?php } ?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner row w-100 mx-auto">
    <div class="carousel-item col-md-4 active">

	<div   data-filtre="<?php $t->name ?>" style="background: url(`<?php the_post_thumbnail(); ?>`) no-repeat center center; background-size: cover">
            <h4 class="card-title">
              <a href="<?php the_permalink() ?>">
                <?php the_title(); ?></a>
            </h4>

            <div class="card">
              <img class="card-img-top img-fluid" src="
<?php the_post_thumbnail(); ?>" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">
                  <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?></a>
                </h4>
                <p class="card-text">
                  <p><?php echo get_the_excerpt(); ?></p>
                </p>
              </div>
            </div>
       
  <?php endwhile; ?>
	</div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  </div>
</div>

</div>
						
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
