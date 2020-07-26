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

<div class="main-projects container mx-auto bg-light">

<header class="entry-header">
		<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
	</header>
<div class="row">
<?php


global $post;
$posts = get_posts( array( 'post_type' => 'project',  'posts_per_page'=>6 ) );
if( $posts ):
   foreach( $posts as $post ) :   
    setup_postdata($post); ?>
        <div class = 'card project-card col-6' style = "background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

    <p class="project-name text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
   <?php endforeach; 
wp_reset_postdata(); 
endif; ?>
</div>
</div>

</div>
</main>

<?php

get_footer();