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
    <!-- Home page thumbnail: -->
    <?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'home' );
endwhile; // End of the loop.
?>

</main><!-- #main -->

<h2 class="font_2 text-center">פרויקטים נבחרים</h2>

<?php
$puff_arg = array(
        'post_type' => 'project',
        'posts_per_page' => 10,
    );

$puff = new WP_Query ( $puff_arg );
if ( $puff->have_posts() ) 
{
    switch ($puff->found_posts) 
    {
        case '2':
            $colClass = 'col-6';
            break;

        case '3':
            $colClass = 'col-4';
            break;

        default:
            $colClass = 'col-12';
    }

    while ( $puff->have_posts() ) {
            $puff->the_post();
            $heading = get_post_meta($post->ID, 'title'); 
            $text = get_post_meta($post->ID, 'content');
            ?>
            <div class="<?php echo $colClass; ?>">
               <div>
                    <h3><?php echo $heading[0] ? $heading[0]: ''; ?></h3>
                    <p><?php echo $text[0] ? $text[0]: ''; ?></p>                       
                </div>
            </div>  
           <?php      
    }
}
wp_reset_postdata();
?>


</div>

<?php

get_footer();