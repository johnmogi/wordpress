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

<main id = 'primary' class = 'container-fluid hero jumbotron' style = "background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">



<div class="spacer"></div>
<div class="container mx-auto bg-light projects-heading">
<?php the_title( '<h1 class="entry-header font_2 text-center">', '</h1>' ); ?>
</div>
<section class="container-fluid grey">
<div class="main-projects container mx-auto bg-light">
    <div id="stage">
<div class="row bg-light">
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
wp_reset_postdata(); 
endif; ?>
</div>
</div>
</div><!--grey -->

</main>


<?php

get_footer();