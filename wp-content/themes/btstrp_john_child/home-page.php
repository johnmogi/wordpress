<?php
/**
* Template Name: Home Page
*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 * @package btstrp_john
 */

get_header();
?>

<main id="primary" class="site-main">




<?php
while ( have_posts() ) :
	the_post();
	
	get_template_part( 'template-parts/content', 'home' );
	
	
	
endwhile; // End of the loop.
?>

</main><!-- #main -->

<h2 class="font_2 text-center">פרויקטים נבחרים</h2>




		<?php


	
			// Get all the categories for Custom Post Type project
			$args = array( 
				'post_type' => 'project', 
				'orderby' => 'id', 
				'order' => 'ASC' 
			);
	?>
	
					<ul class="mhc-project-grid">
	
						<?php
							// Get all the projects of each specific category
							$project_args = array(
								'post_type'     => 'project',
								'orderby'      => 'id',
								'order'         => 'ASC',
								'post_status'   => 'publish',
								'category_name' => $category->slug //passing the slug of the current category
							);
	
							$project_list = new WP_Query ( $project_args );
	
						?>
	
						<?php while ( $project_list -> have_posts() ) : $project_list -> the_post(); ?>
	
							<li class="project">
								<a href="<?php the_permalink(); ?>" class="project-link">
	
									<!-- if the post has an image, show it -->
									<?php if( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'full', array( 'class' => 'img', 'alt' => get_the_title() ) ); ?>
									<?php endif; ?>
	
									<!-- custom fields: project_flavor, project_description ... -->
									<h3 class="title"><?php the_title(); ?></h3>
									<p class="description">project_description</p>
								</a>
							</li>
	
						<?php endwhile; wp_reset_query(); ?>
					</ul>
	
	
</div>

<?php

get_footer();
