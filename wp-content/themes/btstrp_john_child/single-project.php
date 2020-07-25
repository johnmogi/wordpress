<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package btstrp_john
*/

get_header();
?>
<?php $customCover = get_post_meta( $post->ID, 'john_meta_box_customCover', true );
var_dump( $customCover);
?>
<?php if (!$customCover) { ?>
    <section id = 'primary' class = 'container-fluid hero jumbotron' style = "background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
        <?php
}else{
    ?>
    <section id = 'primary' class = 'container-fluid hero jumbotron' style = "background-image: url('<?php $customCover ?>');">
    <?php } ?>
    

<div class = 'container space-top'>


<?php
while ( have_posts() ) :
the_post();

// get_template_part( 'template-parts/content', get_post_type() );

echo '<h1>';
 the_title();
 echo'</h1>';

the_content();


endwhile;
// End of the loop.
?>
<br/>
<a  href = '<?php echo get_site_url(); ?>/projects'>
<p>
חזרה לפרוייקטים
 </p>
 
     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" alt="back-to-projects">
    </a>
</div>
</section>
<div class="spacer"></div>
<div class = 'container'>
<?php
$image = get_post_meta( $post->ID, 'john_meta_box_imagefield', true );
$image1 = get_post_meta( $post->ID, 'john_meta_box_imagefield1', true );
$image2 = get_post_meta( $post->ID, 'john_meta_box_imagefield2', true );
$image3 = get_post_meta( $post->ID, 'john_meta_box_imagefield3', true );
$image4 = get_post_meta( $post->ID, 'john_meta_box_imagefield4', true );

?>
<img class="pr-image" alt = '' src = "<?php echo $image ?>" width="100%"/>
<br/>
<img  class="pr-image" alt = '' src = "<?php echo $image1 ?>" width="100%"/>
<br/>
<img  class="pr-image" alt = '' src = "<?php echo $image2 ?>" width="100%" />
<br/>
<img  class="pr-image" alt = '' src = "<?php echo $image3 ?>"  width="100%"/>
<br/>
<img  class="pr-image" alt = '' src = "<?php echo $image4 ?>" width="100%"/>
<br/>
</div>


</div>

</section>
</main><!-- #main -->

<?php

get_footer();
