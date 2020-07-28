<?php
/**
* Template part for displaying page content in homepage.php
*
* @link https://developer.wordpress.org/themesbasics/template-hierarchy/
*
* @package btstrp_john
*/

?>

<?php
$imageHome = get_post_meta( $post->ID, 'john_meta_box_homeImage', true );
?>
<img class = 'contact-image' alt = '' src = "<?php echo $imageHome ?>" width = '100%'/>

<article id = 'post-<?php the_ID(); ?>' <?php post_class();
?>>

<section class = 'container-fluid bg-white'>

<div id="contact" class = 'container entry-content' style ="background-image: url('<?php echo get_post_meta($post->ID, 'john_meta_box_customCover', true); ?>');">
<div class="spacersm"></div>
<div class="card col-4 homebox-contact">
<?php
the_content();
//calling contact form:
require_once( get_stylesheet_directory() . '/page-contact-us.php' );
?>



</div><!-- .entry-content -->

<?php if ( get_edit_post_link() ) : ?>
<footer class = 'entry-footer'>
<?php
edit_post_link(
    sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Edit <span class="screen-reader-text">%s</span>', 'btstrp_john' ),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        wp_kses_post( get_the_title() )
    ),
    '<span class="edit-link">',
    '</span>'
);
?>

</section>
</footer><!-- .entry-footer -->
<?php endif;
?>
</article><!-- #post-<?php the_ID();
?> -->
