<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package btstrp_john
 */

get_header();
?>
<?php
$image1 = get_post_meta( $post->ID, 'john_meta_box_imagefield1', true );
$image2 = get_post_meta( $post->ID, 'john_meta_box_imagefield2', true );
$image3 = get_post_meta( $post->ID, 'john_meta_box_imagefield3', true );
$image4 = get_post_meta( $post->ID, 'john_meta_box_imagefield4', true );

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		

		endwhile; // End of the loop.
		?>
<div class = 'container'>
<img  class="pr-image" alt ='team member2' src = "<?php echo $image1 ?>" width="251"/>
<br/>
<img  class="pr-image" alt ='team member3' src = "<?php echo $image2 ?>" width="251"/>
<br/>
<img  class="pr-image" alt ='team member4' src = "<?php echo $image3 ?>" width="251"/>
<br/>
<img  class="pr-image" alt ='team member5' src = "<?php echo $image4 ?>" width="251"/>
<br/>
</div>
	</main><!-- #main -->


<?php

get_footer();
