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
        ?>
 
<main id="primary" class="site-main">

<?php while (have_posts()) : the_post();
        ?>
		

		<div class='card'>
                <h4 class='card-title'>
                  <a href='<?php the_permalink() ?>'>
                    <?php the_title();
                    ?></a>
                </h4>

          
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail();
                  }
                  ?>

                      <a href='<?php the_permalink() ?>'>
                        <?php the_title();
                        ?></a>
                 
                    <p class='card-text'>
                      <p><?php echo get_the_excerpt();
                          ?></p>
                    </p>
               

					<?php endwhile;
              ?>
</div>



</main>


<?php

get_footer();