<?php
/**
* Template Name: Projects Page
*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 * @package btstrp_john
 */

get_header();
?>
	<?php
        query_posts(array(
          'post_type' => 'project',
          'showposts' => 10
        ));

        // query for pics
$args=array('post_type' => 'project','posts_per_page'=>10,'orderby'=>'menu_order', 'order'   => 'DESC',);
$fetchQuery = new WP_Query($args);

if ($fetchQuery->have_posts()) : 
    while ($fetchQuery->have_posts()) : $fetchQuery->the_post(); 
      //  $thumb[]=get_the_thumbnail();
       $thumb[]=get_the_post_thumbnail_url();
    endwhile;
endif;

        ?>
 
<main id="primary" class="site-main">

<?php while (have_posts()) : the_post();
        ?>
		

		<div class='row'>
    <a href='<?php the_permalink() ?>'>
    <div class="card col-6" style="background:url('<?php the_post_thumbnail_url()?>')">
                <h4 class='card-title'>
                    <?php the_title(); ?>
                </h4>

          
                    </a>
              
                    <!--php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail_url();
                  }
                  ?-->
          
                    <!-- the_permalink()
                    get_the_excerpt() -->
                    
					<?php endwhile;
              ?>
</div>

</main>


<?php

get_footer();