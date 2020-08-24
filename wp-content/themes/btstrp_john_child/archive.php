<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package btstrp_john
 */

get_header();




$cat_id = get_query_var('cat');
 $category_image = get_option("category_$cat_id");


?>



<main id = 'primary' class = 'container-fluid hero jumbotron' style = "background-image: url('<?php echo $category_image['img']; ?>');">
	

</main>

<div class="container mx-auto bg-white projects-heading" style="margin-top: -250px;">
<?php single_cat_title( '<h1 class="entry-header font_2 text-center">', '</h1> ' ); ?>
</div>
<section class="container-fluid grey">
<div class="main-projects container mx-auto bg-white">
    <div id="stage">
<div class="row bg-white">
<?php


global $post;
$posts = get_posts( array( 'post_type' => 'project',  'posts_per_page'=>6 ) );
if( $posts ):
   foreach( $posts as $post ) :   
    setup_postdata($post); ?>
    <a href="<?php the_permalink(); ?>" class="col-6 px-3" >
        <div class="layer text-center">
        <span class="project-name "><?php the_title(); ?></span>

        </div>
<div class="card-bg" >
    <div class = 'project-card' style = "height:250px;background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
        </div>
    </div>
    </a>

   <?php endforeach; 
endif; ?>
</div>
</div>
</div><!--grey -->



<?php

get_footer();
