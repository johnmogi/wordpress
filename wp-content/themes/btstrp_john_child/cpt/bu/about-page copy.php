<?php
/**
* Template Name: About Page
*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 * @package btstrp_john
 */

get_header();
?>

<?php
$image1 = get_post_meta( $post->ID, 'john_meta_box_imagefield1', true );
$image2 = get_post_meta( $post->ID, 'john_meta_box_imagefield2', true );
$image3 = get_post_meta( $post->ID, 'john_meta_box_imagefield3', true );
$image4 = get_post_meta( $post->ID, 'john_meta_box_imagefield4', true );

$title1 = get_post_meta( $post->ID, 'john_meta_box_title1', true );
$title2 = get_post_meta( $post->ID, 'john_meta_box_title2', true );
$title3 = get_post_meta( $post->ID, 'john_meta_box_title3', true );
$title4 = get_post_meta( $post->ID, 'john_meta_box_title4', true );

$desc1 = get_post_meta( $post->ID, 'john_meta_box_desc1', true );
$desc2 = get_post_meta( $post->ID, 'john_meta_box_desc2', true );
$desc3 = get_post_meta( $post->ID, 'john_meta_box_desc3', true );
$desc4 = get_post_meta( $post->ID, 'john_meta_box_desc4', true );

?>

	<main id="primary" class="site-main bleach">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'about' );

		

		endwhile; // End of the loop.
		?>
<div class = 'container'>
    
    <div class="container col-6 offset-md-1">
        <div class="pbox col-10">
            <h3><?php echo $title1 ?></h3>
            <hr/>
            <h4><?php echo $desc1 ?></h4>
        </div>
        <img class="pr-image" alt ='team member1' src = "<?php echo $image1 ?>" width="251"/>
    </div>
    <div class="space"></div>
    </div>

    <div class="container col-6 offset-md-10">
        <div class="pbox col-10">
            <h3><?php echo $title2 ?></h3>
            <hr/>
            <h4><?php echo $desc2 ?></h4>
        </div>
        <img class="pr-image" alt ='team member2' src = "<?php echo $image2 ?>" width="251"/>
    </div>
    <div class="space"></div>
    </div>

    <div class="container col-6 offset-md-1">
        <div class="pbox">
            <h3><?php echo $title3 ?></h3>
            <hr/>
            <h4><?php echo $desc3 ?></h4>
        </div>
        <img  class="pr-image" alt ='team member4' src = "<?php echo $image3 ?>" width="251"/>
    </div>
    <div class="space"></div>
    </div>

    <div class="col-6 offset-md-6">
        <div class="pbox">
            <h3><?php echo $title4 ?></h3>
            <hr/>
            <h4><?php echo $desc4 ?></h4>
        </div>
        <img  class="pr-image" alt ='team member5' src = "<?php echo $image4 ?>" width="251"/>
    </div>
    </div>  
    



</div>
	</main><!-- #main -->
<div class="space"></div>

<?php

get_footer();
